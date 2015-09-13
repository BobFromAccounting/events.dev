<!doctype html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" contents="Tarek S Hafez">
        <meta name="csrf-token" content="{{{ csrf_token() }}}">
    	@yield('head')
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/vendor/bootstrap-scss/assets/javascripts/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{{ action('HomeController@showHome') }}}">Gamer-Time</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        {{ Form::open(array('action' => 'CalendarEventsController@index', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                            {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search', 'autofocus']) }}
                            {{ Form::submit() }}
                        {{ Form::close() }}
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="">See All Venues</a></li>
                            <li><a href="">See All Events</a></li>
                            <li><a href="">Login</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        @yield('content')

        @yield('script')

        <script type="text/javascript" src="/js/moment.js"></script>
        <script type="text/javascript" src="/js/moment-timezone-2010-2020.js"></script>
        <script type="text/javascript" src="/vendor/angular/angular.min.js"></script>
        <script type="text/javascript" src="/js/event.js"></script>
    </body>
</html>
