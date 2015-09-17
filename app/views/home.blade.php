@extends('layouts.master')

@section('head')
    <meta name="description" content="Home Page">
    <title>Welcome!</title>
@stop

@section('content')
    <div class="container">
        <div class="col-md-12 homepage-signup">
            <h1 class="site-name">Gamer-Time</h1>
            <p id="home-text">Find gaming events near you!</p>

            <div id="img-move" class="row">
            	<img id="r2d2" class="pixel-img" src="/img/r2d2.gif">
            	<img id="mario" class="pixel-img" src="/img/mariopixel.png">
        		<img id="pokemon" class="pixel-img" src="/img/pokemon.png">
            </div>
        </div>
    </div>
@stop

@section('script')
	<script type="text/javascript" src="/js/home.js"></script>
@stop