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
                    <a class="navbar-brand site-name" href="#">Gamer-Time</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="console dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Console <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">XBox/360/One</a></li>
                                <li><a href="#">PlayStation/2/3/4</a></li>
                                <li><a href="#">PC</a></li>
                                <li><a href="#">Mac</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="location dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Genre <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action-Shooter</a></li>
                                <li><a href="#">Action-Adventure</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Board Games</a></li>
                                <li><a href="#">MMORPG</a></li>
                                <li><a href="#">Role Playing</a></li>
                                <li><a href="#">Simulation</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Strategy</a></li>
                                <li><a href="#">Survival Horror</a></li>
                                <li><a href="#">Table Top</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="location dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Location <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another Thing</a></li>
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
                                    <li class="signin"><a class="navbar-user" href="#">Sign In</a><li>
                                    <li class="signup"><a class="navbar-user" href="#">Sign Up</a></li>
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

            <div id="practice">
            </div>
        </main>

        <script type="text/javascript" src="/js/moment.js"></script>
        <script type="text/javascript" src="/js/moment-timezone-2010-2020.js"></script>
        <script type="text/javascript" src="/vendor/angular/angular.min.js"></script>
        <script type="text/javascript" src="/js/event.js"></script>
        <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/vendor/bootstrap-scss/assets/javascripts/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        @yield('script')
    </body>
</html>