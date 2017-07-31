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

    public function show(Dummy $dummy)
    {
    	return $dummy->body;
    }

    public function create()
    {
    	return view('dummies.create');
    }

    public function store(DummyRequest $request)
    {
    	$dummy = new Dummy($request->all());

    	Auth::user()->dummies()->save($dummy);

    	return redirect('dummies');
    }

    public function edit(Dummy $dummy)
    {
    	return view('dummies.edit', compact('dummy'));
    }

    public function update(Dummy $dummy, DummyRequest $request)
    {
    	$dummy->update($request->all());

    	return redirect('dummies');
    }

}
