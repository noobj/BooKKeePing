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

        $sum = $records->sum('amount');

    	return view('records.index', compact('records', 'date', 'sum'));
    }

    /**
     * show create form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagList = \App\Tag::pluck('name', 'name');
        $categoryList = \App\Category::pluck('name', 'id');

        return view('records.create', compact('tagList', 'categoryList'));
    }

    /**
     * show specific record
     *
     * @param Record $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        $records = [];
        $records[] = $record;
        return view('records.show', compact('records'));
    }

    /**
     * Edit record
     *
     * @param \App\Record $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        $tagList = \App\Tag::pluck('name', 'name');
        $categoryList = \App\Category::pluck('name', 'id');

        return view('records.edit', compact('record', 'tagList', 'categoryList'));
    }

    /**
     * Add new category
     *
     * @param \App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(\App\Http\Requests\CategoryRequest $request)
    {
        $category = new \App\Category($request->all());

        $category->save();
        session()->flash('flash_message', 'new category has been added');

        return redirect('records');
    }

    /**
     * update record
     *
     * @param Record $record
     * @param \App\Http\Requests\RecordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Record $record, \App\Http\Requests\RecordRequest $request)
    {
        $record->update($request->all());

        if($request->input('tags')) {
            $this->syncTags($record, $request->input('tags'));
        }

        session()->flash('flash_message', 'record has been updated');

        return redirect('records');
    }

    /**
     * store new record
     *
     * @param \App\Http\Requests\RecordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\RecordRequest $request)
    {

        $this->createRecord($request);

        session()->flash('flash_message', 'record has been stored');

        return redirect('records');
    }

    /**
     * statistic of certain period
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function statistic(Request $request)
    {
        $sum = 0;

        if ($request->isMethod('get')) {
            return view('records.statistic');
        }

        $date_begin =  Carbon::parse($request->input('date_begin'));
        $date_end =  Carbon::parse($request->input('date_end'));
        $records = Record::where([
            ['created_at', '>=', $date_begin],
            ['created_at', '<=', $date_end],
        ])->get();

        $sum = $records->sum('amount');

        $recordsGroupByCategory = $records->groupBy('category_id');
        $statDatas = [];

        foreach ($recordsGroupByCategory as $category => $records)
        {
            $tmp = [];
            $tmp['records'] = $records;
            $tmp['name'] = \App\Category::find($category)->name;
            $tmp['sum'] = $records->sum('amount');
            $tmp['y'] = round($tmp['sum']/$sum*100, 1);

            $statDatas[] = $tmp;
        }

        return view('records.statistic', compact('recordsGroupByCategory', 'sum', 'statDatas'));
    }

    /**
     * create new record
     *
     * @param \App\Http\Requests\RecordRequest $request
     * @return \App\Record
     */
    private function createRecord(\App\Http\Requests\RecordRequest $request)
    {
        $record = new Record($request->all());

        Auth::user()->records()->save($record);

        if($request->input('tags')) {
            $this->syncTags($record, $request->input('tags'));
        }

        return $record;
    }

    /**
     * sync up the list of tags in the database
     *
     * @param Record $record
     * @param array $tags
     * @return \Illuminate\Http\Response
     */
    private function syncTags(Record $record, array $tags)
    {
        $tagList = [];
        foreach ($tags as $tag) {
            if(\App\Tag::where('name', '=', $tag)->exists()) {
                $tag = \App\Tag::where('name', $tag)->first();
                $tagList[] = $tag->id;
            } else {
                $tag = new \App\Tag(['name' => $tag]);
                $tag->save();
                $tagList[] = $tag->id;
            }
        }

        $record->tags()->sync($tagList);
    }
}
