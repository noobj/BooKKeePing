<?php

namespace App\Http\Controllers;

use App\Dummy;
use Carbon\Carbon;
use App\Http\Requests\DummyRequest;
use Illuminate\Support\Facades\Auth;

class DummiesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index()
    {
    	$dummies = Dummy::latest('fucked_time')->fucked()->get();

    	return view('dummies.index', compact('dummies'));
    }

    public function show($id)
    {
    	$dummy = Dummy::findOrFail($id);

    	return $dummy->body;
    }

    public function create()
    {
    	return view('dummies.create');
    }

    public function store(DummyRequest $request)
    {
    	if(!Auth::user())
    	{
    		return 'you havnt logged in yet';
    	}

    	$dummy = new Dummy($request->all());

    	Auth::user()->dummies()->save($dummy);

    	return redirect('dummies');
    }

    public function edit($id)
    {
    	$dummy = Dummy::findOrFail($id);

    	return view('dummies.edit', compact('dummy'));
    }

    public function update($id, DummyRequest $request)
    {
    	$dummy = Dummy::findOrFail($id);
    	$dummy->update($request->all());

    	return redirect('dummies');
    }

}
