${{ $record->amount }} <br />
{{ $record->created_at }}<br />
{{ $record->category->name }} <br />
{{ $record->memo }} <br />

<a href="{{ action('RecordController@edit', $record->id) }}">EDIT</a>