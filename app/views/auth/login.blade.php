@extends('layouts.master')

@section('content')
	<div class="container" id="login-form">
		<div class="login-form-background">
			<div class="row">
				{{ Form::label('email', 'Email') }}<br>
				<div class="form-group col-md-12" id="email">
					{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
				</div>
			</div>

			<div class="row">
				{{ Form::label('password', 'Password') }}<br>
				<div class="form-group col-md-12 password">
					{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
				</div>
			</div>

			{{ Form::submit('Save', ['class' => 'btn btn-large btn-default', 'id' => 'login-save']) }}
		
			<div id="login-signup">
				<p id="sign-up">Not a member yet?</p>
				<a href="{{{ action('HomeController@signup') }}}"><button class="btn btn-large btn-default" id="signup-btn">Sign Up!</button></a>
			</div>
		</div>
	</div>
@stop