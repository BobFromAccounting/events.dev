@extends('layouts.master')

@section('head')
	<link rel="stylesheet" href="/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
@stop

@section('content')
	<div class="container">
		<div class="form-background col-md-12">
			<div class="row">
				{{ Form::label('title', 'Title') }}
				<div class="form-group col-md-12" id="event-title">
				    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Event Title']) }}
				</div>
			</div>

			<div class="row">
				{{ Form::label('when', 'When') }}<br>
				<div class="form-group col-md-6">
			    	{{ Form::text('start_time', null, ['class' => 'form-control time-form start-time-form', 'id' => 'startsAtDateTimePicker_dark', 'placeholder' => 'Start Time'])}}
				</div>
				<div class="form-group col-md-6">
			    	{{ Form::text('end_time', null, ['class' => 'form-control time-form end-time-form', 'id' => 'endsAtDateTimePicker_dark', 'placeholder' => 'End Time'])}}
				</div>
 
			</div>

			<div>
				<div class="row">
					{{ Form::label('where', 'Where') }}<br>
					<div class="dropdown form-group col-md-3" id="location">
						{{ Form::select('location_dropdown', $dropdown, null, ['class' => 'form-control dropdown-toggle btn btn-default', 'id' => 'location-dropdown']) }}
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
						{{ Form::select('state', Config::get('states'), null, ['class' => 'form-control dropdown-toggle btn btn-default' ]) }}
					</div>
					<div class="form-group col-md-4" id="zip">
						{{ Form::number('zip', null, ['class' => 'form-control', 'placeholder' => 'Zip']) }}
					</div>
				</div>
			</div>

			<div class="row">
				{{ Form::label('game', 'Game') }}<br>
				<div class="dropdown form-group col-md-3" id="console">
	  				{{ Form::select('console', Config::get('devices'), null, ['class' => 'form-control dropdown-toggle btn btn-default' ]) }}
				</div>
				<div class="dropdown form-group col-md-3" id="genre">
					{{ Form::select('genre', Config::get('genres'), null, ['class' => 'form-control dropdown-toggle btn btn-default' ]) }}

				</div>
				<div class="form-group col-md-6" id="games">
				    {{ Form::text('game', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
				</div>
			</div>
				
			<div class="row">
				{{ Form::label('price', 'Price') }}<br>
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

			{{ Form::submit('Save', ['class' => 'btn btn-large btn-default', 'id' => 'save']) }}
		</div>
	</div>
@stop

@section('script')
	<script>
	   	Date.parseDate = function( input, format ){
	    	return moment(input,format).toDate();
	   	};
	   	Date.prototype.dateFormat = function( format ){
	    	return moment(this).format(format);
	   	};
	   	jQuery('#startsAtDateTimePicker_dark').datetimepicker({
	    	format:'YYYY-MM-DD h:mm:s a',
	    	formatTime:'h:mm a',
	    	formatDate:'DD-MM-YYYY'
	   	});
	   	jQuery('#endsAtDateTimePicker_dark').datetimepicker({
	    	format:'YYYY-MM-DD h:mm:s a',
	    	formatTime:'h:mm a',
	    	formatDate:'DD-MM-YYYY'
	   	});
	</script>
@stop