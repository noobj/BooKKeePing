<style>
a{
	text-decoration: none;
}
.day{
	font-size: 12px;
	display: block;
}

</style>
@extends('layouts.head')


@section('content')

<div class="container">

<a href="{{ url('/records', $date->subDay()->format('Y_m_d')) }}"><</a>

<h1 style='display:inline'>{{ $date->addDay()->format('Y/m/d') }}</h1>

<a href="{{ url('/records', $date->addDay()->format('Y_m_d')) }}">></a>

<h1 style='display:inline'><a href="{{ url('/records/setting') }}">Setting</a></h1>

<h1 style='display:inline'><a href="{{ url('/records/create') }}">Create</a></h1>

@if (session()->has('flash_message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ session('flash_message') }}
</div>
@endif

<h1>Total ${{ $sum }}</h1>

@forelse ($records as $record)
	<article>
		<h3> <span class="day">{{ $record->category->name }}</span><a href="{{ url('/records', $record->id) }}">${{ $record->amount }} </a>
		<span class="day">
			@foreach($record->tags()->pluck('name')->toArray() as $tag)
				{{ $tag }}
			@endforeach
		</span>
		</h3>
	</article>
@empty
	<h1>NO fucking record here</h1>
@endforelse

@include('errors.list')
</div>

@endsection

<script type="text/javascript">
	$('div.alert-success').delay(1000).fadeOut(500);
</script>


@php
Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
@endphp