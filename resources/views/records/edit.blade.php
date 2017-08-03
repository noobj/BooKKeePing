<h1>EDIT</h1>
{!! Form::model($record, ['method' => 'PATCH', 'url' => 'records/'.$record->id]) !!}
@include('records._form', ['submitBtnText' => 'fucked update'])

{!! Form::close() !!}


@include('errors.list')