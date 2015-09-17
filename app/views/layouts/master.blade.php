<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" contents="Tarek S Hafez">
        <meta name="csrf-token" content="{{{ csrf_token() }}}">
    	@yield('head')
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Datepicker -->
        <link rel="stylesheet" type="text/css" href="../vendor/datetimepicker/jquery.datetimepicker.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Press+Start+2P|Unica+One' rel='stylesheet' type='text/css'>
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        @yield('style')
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand site-name" href="{{{ action('HomeController@showHome') }}}">Gamer-Time</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="console dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Console <span class="caret"></span></a>
                            <ul class="dropdown-menu scrollable-menu">
                                @foreach(Config::get('devices') as $key => $console)
                                    <li><a href="events?devices={{ $key }}">{{ $console }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="location dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Genre <span class="caret"></span></a>
                            <ul class="dropdown-menu scrollable-menu">
                                @foreach(Config::get('genres') as $key => $genre)
                                    <li><a href="events?genres={{ $key }}">{{ $genre }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="location dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Location <span class="caret"></span></a>
                            <ul class="dropdown-menu scrollable-menu">
                                @foreach (Config::get('states') as $key => $state)
                                    <li><a href="locations?state={{ $key }}">{{ $state }}</a></li>
                                @endforeach
                                <li role="separator" class="divider"></li>
                                <li>Search Near Me</li>
                            </ul>
                        </li>
                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::check())
                                    <li class="signin dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, {{{Auth::user()->first_name}}} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Create an Event</a></li>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="#">Logout</a></li>
                                        </ul>
                                    </li>
                            @else
                                    <li class="signin"><a class="navbar-user" href="{{ action('HomeController@login') }}">Sign In</a><li>
                                    <li class="signup"><a class="navbar-user" href="{{ action('UsersController@create') }}">Sign Up</a></li>
                            @endif
                            {{ Form::open(array('action' => 'CalendarEventsController@index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search', 'autofocus']) }}
                                {{ Form::submit() }}
                            {{ Form::close() }}
                        </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <main>
            @yield('content')
        </main>
        <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/vendor/moment/moment.js"></script>
        <script type="text/javascript" src="/vendor/datetimepicker/jquery.datetimepicker.js"></script>
        <script type="text/javascript" src="/vendor/moment-timezone/moment-timezone.js"></script>
        <script type="text/javascript" src="/vendor/angular/angular.min.js"></script>
        <script type="text/javascript" src="/js/event.js"></script>
        <script type="text/javascript" src="/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
        @yield('script')
    </body>
</html>