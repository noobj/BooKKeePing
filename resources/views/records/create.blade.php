@extends('layouts.head')

@section('content')
<h1>Create</h1>
{!! Form::open(['url' => 'records']) !!}
@include('records._form', ['submitBtnText' => 'fucked'])

{!! Form::close() !!}
@endsection

@include('errors.list')