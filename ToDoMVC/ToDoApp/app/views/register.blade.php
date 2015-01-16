@extends('layouts.main')

@section('content')
	@foreach($errors->all() as $error)
		<p class="error">{{$error}}</p>
	@endforeach
	{{Form::open(array('autocomplete' => 'off'))}}
		<input type="text" name="e-mail" placeholder="E-mail">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="Registreer">
	{{Form::close()}}

@stop