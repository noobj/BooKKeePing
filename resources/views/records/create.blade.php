@extends('layouts.head')

<h1>123</h1>
{!! Form::open(['url' => 'records']) !!}
@include('records._form', ['submitBtnText' => 'fucked'])

{!! Form::close() !!}


@include('errors.list')