
<style>
a{
	text-decoration: none;
}
.day{
	font-size: 12px;
	display: block;
}

</style>

<h1>Dummies</h1>

@forelse ($dummies as $dummy)
	<article>
		<h3> <a href="{{ url('/dummies', $dummy->id) }}">{{ $dummy->body }} </a><span class="day">{{ $dummy->fucked_time }}</span></h3>
	</article>
@empty
	<h1>NO fucking Dummy here</h1>
@endforelse

@if ($errors->any())
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
@endif