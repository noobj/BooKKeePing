<div class="form-group">
	{!! Form::label('amount', 'Amount:$') !!}
	{!! Form::input('number', 'amount', null, ['class' => 'form-control']) !!}
</div>
<br />
	{!! Form::label('created_at', 'At:') !!}
	@if (isset($record))
		{!! Form::input('date', 'created_at') !!}
	@else
		{!! Form::input('date', 'created_at', date('Y-m-d')) !!}
	@endif


	{!! Form::hidden('category_id', '1') !!}
<br />
	{!! Form::label('memo', 'Memo:') !!}
	{!! Form::input('text', 'memo') !!}
<br />
	{!! Form::submit($submitBtnText) !!}