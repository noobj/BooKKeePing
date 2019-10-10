<br /><br /><br /><br />
@extends('layouts.head')

@section('content')

<h1 align="center">Upload Avatar</h1>
<img src="/images/avatars/{{ Auth::user()->avatar }}" >
<div class="container">
{!! Form::open(['url' => 'avatars', 'files' => 'true']) !!}
<br />
<div class="form-group">
	{!! Form::label('avatar', 'File:') !!}
	{!! Form::file('avatar', ['class' => 'form-control', 'required']) !!}
</div>
<br />
	<div class="form-group">
	{!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
</div>


@include('errors.list')
@endsection