<div class="form-group">
	{!! Form::label('amount', 'Amount:$') !!}
	{!! Form::input('number', 'amount', null, ['class' => 'form-control', 'required']) !!}
</div>
<br />
	{!! Form::label('created_at', 'At:') !!}
	@if (isset($record))
		{!! Form::input('date', 'created_at', null, ['required']) !!}
	@else
		{!! Form::input('date', 'created_at', date('Y-m-d'), ['required']) !!}
	@endif

<br />
	{!! Form::label('memo', 'Memo:') !!}
	{!! Form::input('text', 'memo', null, ['class' => 'form-control']) !!}
<br />

<div class="form-group">
	{!! Form::label('tags', 'Tags') !!} <br />
	{!! Form::select('tags[]', $tagList, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>
<br />

<div class="form-group">
	{!! Form::label('category_id', 'Category') !!}
	{!! Form::select('category_id', $categoryList, null, ['class' => 'form-control', 'required']) !!}
</div>
<br />

<div class="form-group">
	{!! Form::submit($submitBtnText, ['class' => 'btn btn-primary']) !!}
</div>

<script type="text/javascript">
	$('#tag_list').select2({
		placeholder: 'Choose a tag',
		tags: true,
		width: '100%',
	});
</script>
