@extends('layouts.head')

@section('content')
<br /><br /><br /><br />

@foreach($records as $record)
<div>
${{ $record->amount }} <br />
{{ $record->created_at }}<br />
{{ $record->category->name }} <br />
{{ $record->memo }} <br />
@foreach($record->tags->pluck('name') as $tag)
	{{ $tag }}
@endforeach
</div>
<a href="{{ action('RecordController@edit', $record->id) }}">EDIT</a>
<br /><br />

@endforeach

@endsection