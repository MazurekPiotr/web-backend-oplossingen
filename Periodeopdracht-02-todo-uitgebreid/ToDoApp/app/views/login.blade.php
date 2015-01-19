@extends('layouts.main')

@section('content')
	@foreach($errors->all() as $error)
		<p class="error">{{$error}}</p>
	@endforeach
	<h1>Meld je aan</h1>
	{{Form::open(array('autocomplete' => 'off'))}}
		<p><label for="email">Email</label></p>
		<p><input type="text" name="e-mail" id="email" placeholder="E-mail"></p>
		<p><label for="password">Email</label></p>
		<p><input type="password" name="password" id="password" placeholder="Password"></p>
		<p><input type="submit" value="Login"></p>
	{{Form::close()}}

@stop