<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--[if lt IE 9]>
  			<script src="../js/html5shiv.js"></script>
  			<script src="../js/respond.js"></script>
  	<![endif]-->
</head>
<body class="fadeIn">
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#383D63;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/records">BooKKeePing</a>

        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav">
            <li><a id="create-form-btn"><span class='glyphicon glyphicon-plus'></span></a></li>
          </ul>

          <ul class="nav navbar-nav">
            <li><a href="/statistic"><span class='glyphicon glyphicon-stats'></span></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
          	<li><a style='color: lightgreen'>${{ $sum }}</a></li>
            <li><a href="/records/setting"><span class="glyphicon glyphicon-cog"></span></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <img src="/images/avatars/{{ Auth::user()->avatar }}" height="25" width="25">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="{{ url('avatars') }}">
                            Profile
                        </a>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
 </nav>



<div id='create-form' hidden="true">
@include('records.create')
</div>



<script>
  $("#create-form-btn").click(function() {
    $("#create-form").slideToggle(500);
  });
</script>

<script src="{{ asset('js/app.js') }}"></script>

@yield('content')
