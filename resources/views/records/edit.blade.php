@extends('layouts.head')

@section('content')

<div class="container">
<h1>EDIT</h1>
{!! Form::model($record, ['method' => 'PATCH', 'url' => 'records/'.$record->id]) !!}
@include('records._form', ['submitBtnText' => 'update'])

{!! Form::close() !!}


@include('errors.list')

</div>
@endsection