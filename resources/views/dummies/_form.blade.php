	{!! Form::label('body', 'TEXT:') !!}
	{!! Form::textarea('body') !!}
<br />
	{!! Form::label('fucked_time', 'Fucked at') !!}
	{!! Form::input('date', 'fucked_time', date('Y-m-d')) !!}
	{!! Form::submit($submitBtnText) !!}