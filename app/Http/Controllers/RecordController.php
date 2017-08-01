<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
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

    public function index()
    {
    	$records = Record::latest('created_at')->get();

    	return view('records.index', compact('records'));
    }

    public function create()
    {
    	return view('records.create');
    }

    public function store(Request $request)
    {
    	$record = new Record($request->all());

    	Auth::user()->records()->save($record);

    	return redirect('records');
    }

    public function show(Record $record)
    {
        return view('records.show', compact('record'));
    }

    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }
}
