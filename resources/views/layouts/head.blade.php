<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>


<a href="{{ url('/records', $date->subDay()->format('Y_m_d')) }}"><</a>

<h1 style='display:inline'><a href="{{ url('/records') }}">H</a></h1>

<a href="{{ url('/records', $date->addDays(2)->format('Y_m_d')) }}">></a>

@yield('content')