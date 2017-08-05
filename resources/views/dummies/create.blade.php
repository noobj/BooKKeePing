<h1>123</h1>
{!! Form::open(['url' => 'dummies']) !!}
@include('dummies._form', ['submitBtnText' => 'submit'])

{!! Form::close() !!}


@include('errors.list')