@extends('layouts.main')

@section('content')
	@foreach($errors->all() as $error)
		<p class="error">{{$error}}</p>
	@endforeach
	{{Form::open(array('autocomplete' => 'off'))}}
		<p>Email :</p>
 
        <p>{{ Form::text('email') }}</p>
 
        <p>Password :</p>
 
        <p>{{ Form::password('password') }}</p>
 
        <p>{{ Form::submit('Registreer') }}</p>
	{{Form::close()}}

@stop