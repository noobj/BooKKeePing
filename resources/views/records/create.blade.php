<div class="wrap container container-create">
<h1>Create</h1>
{!! Form::open(['url' => 'records']) !!}
@include('records._form', ['submitBtnText' => 'submit'])

{!! Form::close() !!}
</div>
