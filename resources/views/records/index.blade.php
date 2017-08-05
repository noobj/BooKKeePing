<style>
a{
	text-decoration: none;
}
.day{
	font-size: 12px;
	display: inline;
}

a.arrow{
	font-size: 30px;
	font-weight: bold;
	color: #ccc;
	margin-left: 20px;
	margin-right: 20px;
}

</style>

@extends('layouts.head')


@section('content')

<div class="container">

<a href="{{ url('/records', $date->subDay()->format('Y_m_d'))  }}" class="arrow"><span class="glyphicon glyphicon-chevron-left"></span></a>

<h1 style='display:inline'>{{ $date->addDay()->format('Y/m/d') }}</h1>

<a href="{{ url('/records', $date->addDay()->format('Y_m_d')) }}" class="arrow"><span class="glyphicon glyphicon-chevron-right"></span></a>

<h1 style='display: inline;margin-left: 160px'>Total ${{ $sum }}</h1>

@if (session()->has('flash_message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ session('flash_message') }}
</div>
@endif


@forelse ($records as $record)
	<article>
		<h3> <span class="day">{{ $record->category->name }}</span><a href="{{ url('/records', $record->id) }}">${{ $record->amount }} </a>
		<span class="glyphicon glyphicon-tags day">
			@foreach($record->tags()->pluck('name')->toArray() as $tag)
				{{ $tag }}
			@endforeach
		</span>
		</h3>
	</article>
@empty
	<h1>NO fucking record here</h1>
@endforelse
@unset ($record)

@include('errors.list')



</div>



@endsection


@php
Debugbar::addMeasure('now', LARAVEL_START, microtime(true));
@endphp

