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

<h1>You've spent ${{ $sum }}</h1>

<h1>Records</h1>

<div class="container">
@if (session()->has('flash_message'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ session('flash_message') }}
</div>
@endif

@forelse ($records as $record)
	<article>
		<h3> <span class="day">{{ $record->category->name }}</span><a href="{{ url('/records', $record->id) }}">${{ $record->amount }} </a><span class="day">{{ $record->created_at }}</span>
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