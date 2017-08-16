@extends('layouts.head')

@section('content')
<br /><br /><br />
<h1> setting </h1>
{!! Form::open(['url' => 'records/add_category']) !!}
<div class="form-group">
	{!! Form::label('name', 'Add Category:') !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
	<br />
</div>
{!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection