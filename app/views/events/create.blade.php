@extends('layouts.master')

@section('content')
	<div class="form-group @if($errors->has('title')) has-error @endif">
	    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
	</div>

	<div class="form-group">
		{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location'])}}
	</div>

	<div class="form-grpup">
		{{ Form::text('console', null, ['class,' => 'form-control', 'placeholder' => 'Console'])}}
	</div>

	<div class="form-grpup">
		{{ Form::text('genre', null, ['class,' => 'form-control', 'placeholder' => 'Genre'])}}
	</div>

	<div class="form-group @if($errors->has('body')) has-error @endif">
	    {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Contents Here']) }}
	</div>

	<button class="btn btn-primary">Save</button>
@stop