@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="create-form-background col-md-12">
			<div class="row">
				{{ Form::label('title', 'Title') }}
				<div class="form-group col-md-12" id="event-title">
				    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Event Title']) }}
				</div>
			</div>

			<div>
				<div class="row">
					{{ Form::label('location', 'Location') }}<br>
					<div class="dropdown form-group col-md-3" id="location">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu-location" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    				Select Location
		    				<span class="caret"></span>
		  				</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							@foreach(Config::get('genres') as $genre)
		                        <li><a href="#">{{ $genre }}</a></li>
		                    @endforeach
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6" id="location-name">
						{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location Name']) }}
					</div>

					<div class="form-group col-md-6" id="street-address">
						{{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Street Address']) }}
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-5" id="city">
						{{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) }}
					</div>

					<div class="dropdown form-group col-md-3" id="state">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu-state" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    				State
		    				<span class="caret"></span>
		  				</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							@foreach(Config::get('states') as $state)
		                        <li><a href="#">{{ $state }}</a></li>
		                    @endforeach
						</ul>
					</div>

					<div class="form-group col-md-4" id="zip">
						{{ Form::number('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) }}
					</div>
				</div>
			</div>

			<div class="row">
				{{ Form::label('game', 'Game') }}<br>
				<div class="dropdown form-group col-md-3" id="console">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu-console" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    				Console
	    				<span class="caret"></span>
	  				</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						@foreach(Config::get('devices') as $console)
	                        <li><a href="#">{{ $console }}</a></li>
	                    @endforeach
					</ul>
				</div>

				<div class="dropdown form-group col-md-3" id="genre">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	    				Genre
	    				<span class="caret"></span>
	  				</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						@foreach(Config::get('genres') as $genre)
	                        <li><a href="#">{{ $genre }}</a></li>
	                    @endforeach
					</ul>
				</div>

				<div class="form-group col-md-6" id="games">
				    {{ Form::text('game', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
				</div>
			</div>
				
			<div class="row">
				{{ Form::label('price', 'Price') }}
				<div class="form-group col-md-3" id="price">
				    {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Max $20']) }}
				</div>
			</div>

			<div class="row">
				{{ Form::label('description', 'Description') }}
				<div class="form-group col-md-12" id="description">
				    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}
				</div>
			</div>

			{{ Form::submit('Save', ['class' => 'btn btn-large btn-default']) }}
		</div>
	</div>
@stop