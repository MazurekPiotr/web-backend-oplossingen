@extends('layouts.main')

@section('content')
	
	<h1>Voeg een TODO-item toe</h1>
	<p>Wat moet er gedaan worden?</p>
	{{Form::open(array('autocomplete' => 'off'))}}
		<input type="text" name="todo">
		<input type="submit" value="Toevoegen">
	{{Form::close()}}
@stop