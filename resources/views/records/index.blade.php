<style>
a{
	text-decoration: none;
}
.day{
	font-size: 12px;
	display: block;
}

</style>

<h1>Records</h1>

@forelse ($records as $record)
	<article>
		<h3> <span class="day">{{ $record->category->name }}</span><a href="{{ url('/records', $record->id) }}">${{ $record->amount }} </a><span class="day">{{ $record->created_at }}</span>
		</h3>
	</article>
@empty
	<h1>NO fucking record here</h1>
@endforelse

@include('errors.list')