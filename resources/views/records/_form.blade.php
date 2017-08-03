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

<br />
	{!! Form::label('memo', 'Memo:') !!}
	{!! Form::input('text', 'memo', null, ['class' => 'form-control']) !!}
<br />

<div class="form-group">
	{!! Form::label('tags', 'Tags') !!}
	{!! Form::select('tags[]', $tagList, null, ['class' => 'form-control', 'multiple']) !!}
</div>
<br />

<div class="form-group">
	{!! Form::label('category_id', 'Category') !!}
	{!! Form::select('category_id', $categoryList, null, ['class' => 'form-control']) !!}
</div>
<br />

<div class="form-group">
	{!! Form::submit($submitBtnText, ['class' => 'btn btn-primary']) !!}
</div>
