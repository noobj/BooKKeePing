@extends('layouts.head')

@section('content')

<div class="wrap container-day">
	<div class="box">
			<a href="{{ url('/records', $date->subDay()->format('Y_m_d'))  }}" class="arrow arrow-left"><span class="glyphicon glyphicon-chevron-left"></span></a>

			<h1>{{ $date->addDay()->format('Y/m/d') }}</h1>

			<a href="{{ url('/records', $date->addDay()->format('Y_m_d')) }}" class="arrow arrow-right"><span class="glyphicon glyphicon-chevron-right"></span></a>
			<div class="total"><h2>Total</h2><span>${{ $sum }}</span></div>
	</div>
@if (session()->has('flash_message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ session('flash_message') }}
</div>
@endif

<article>
@forelse ($records as $record)

		<h3> <font>{{ $record->category->name }}</font>
		<a href="{{ url('/records', $record->id) }}">NT${{ number_format($record->amount) }} </a>
		</h3>

@empty
	<p class="note">NO record today</p>
		</article>
@endforelse
@unset ($record)

@include('errors.list')


</div>
</body>
@endsection

