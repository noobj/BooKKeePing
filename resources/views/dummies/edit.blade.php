<h1>123</h1>
{!! Form::model($dummy, ['method' => 'PATCH', 'url' => 'dummies/'.$dummy->id]) !!}
	@include('dummies._form', ['submitBtnText' => 'fucked update'])
{!! Form::close() !!}


@include('errors.list')