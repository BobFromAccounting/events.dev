@extends('layouts.master')

@section('content')
	<div class="container" id="signup-form">
		<div class="form-background col-md-12">
			{{ Form::open(array('action' => 'UsersController@store')) }}
				<div class="row">
					{{ Form::label('name', 'Name') }}<br>
					<div class="form-group col-md-6" id="first-name">
					    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) }}
					</div>
					<div class="form-group col-md-6" id="last-name">
					    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
					</div>
				</div>

				<div class="row">
					{{ Form::label('email', 'Email') }}<br>
					<div class="form-group col-md-8" id="email">
						{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
					</div>
				</div>

				<div class="row">
					{{ Form::label('password', 'Password') }}<br>
					<div class="form-group col-md-6 password">
						{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
					</div>
					<div class="form-group col-md-6 password">
						{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation']) }}
					</div>
				</div>
				<div class="row">
					{{ Form::submit('Sign Up', ['class' => 'btn btn-default form-control form-submit']) }}
				</div>
			{{ Form::close() }}
			<p class="login">Already a member? <a href="{{{ action('HomeController@login') }}}">Login!</a></p>
		</div>
	</div>
@stop