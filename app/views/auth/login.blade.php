@extends('layouts.master')

@section('content')
	<div class="container" id="login-form">
		<div class="login-form-background col-md-offset-3 col-md-6">
			{{ Form::open(array('action' => 'HomeController@doLogin')) }}
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
				<div class="row">
					{{ Form::submit('Login', ['class' => 'btn btn-default form-control form-submit']) }}
				</div>
			{{ Form::close() }}
			<p class="sign-up">Not a member yet? <a href="{{{ action('HomeController@signup') }}}">Sign Up!</a></p>
		</div>
	</div>
@stop