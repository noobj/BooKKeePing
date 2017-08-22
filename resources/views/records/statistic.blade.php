
@extends('layouts.head')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>

<br /><br /><br /><br />

@if(isset($recordsGroupByCategory))

	<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<div class="wrap container-day">
	@foreach ($statDatas as $statData)
	<article>
		{{ $statData['name'] }}
		${{ $statData['sum'] }}
		@foreach ($statData['records'] as $record)
			<p> <font>{{ $record->created_at }}</font>
			<a href="{{ url('/records', $record->id) }}">{{ number_format($record->amount) }} </a>
			</p>
		@endforeach
	</article>
	@endforeach
</div>
<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: '<b>Total</b><br />'+'{!! number_format($sum) !!}',
        align: 'center',
        verticalAlign: 'middle',
        y: 0
    },
    tooltip: {
        pointFormat: '${point.sum}  <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -30,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: 0,
            endAngle: 360,
            center: ['50%', '50%']
        }
    },
    series: [{
        type: 'pie',
        name: 'category',
        innerSize: '70%',
        data: {!! json_encode($statDatas) !!}
    }]
});
</script>
@endif


<h1 align="center">choose the period</h1>
<div class="container">
{!! Form::open(['url' => 'statistic']) !!}
<br />
	{!! Form::label('date_begin', 'From:') !!}
	{!! Form::input('date', 'date_begin', date('Y-m-d'), ['required']) !!}
<br />
	{!! Form::label('date_end', 'To:') !!}
	{!! Form::input('date', 'date_end', date('Y-m-d'), ['required']) !!}
<br />
	<div class="form-group">
	{!! Form::submit('Query', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
</div>



@endsection