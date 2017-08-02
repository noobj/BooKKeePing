<?php

namespace App\Http\Controllers;

use App\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * index controll
     *
     * @param string
     * @return \Illuminate\Http\Response
     */
    public function index(string $date = 'today')
    {
        $date = str_replace('_', '-', $date);
        $date =  Carbon::parse($date);
    	$records = Record::where('created_at', '=', $date)->get();
        $sum = 0;

        foreach ($records as $record) {
            $sum += $record->amount;
        }

    	return view('records.index', compact('records', 'sum', 'date'));
    }

    public function create()
    {
    	return view('records.create');
    }

    public function store(Request $request)
    {
    	$record = new Record($request->all());

    	Auth::user()->records()->save($record);
        session()->flash('flash_message', 'abc');

    	return redirect('records');
    }

    public function show(Record $record)
    {
        return view('records.show', compact('record'));
    }

    /**
     * Description
     * @param \App\Record $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }
}
