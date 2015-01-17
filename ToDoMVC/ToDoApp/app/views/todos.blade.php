@extends('layouts.main')

@section('content')
	<h1>De TODO-app</h1>
	<a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/todos/add">Voeg item toe.</a>
	@if($items->isEmpty()) 
		Nog geen todo-items 
	@else
		<h2>Wat moet er allemaal gebeuren?</h2>
		Todo
		<ul id="list1">
			@foreach($items as $item)
				@if(!$item->done)
					<li>
						{{Form::open()}}
							<input type="checkbox" onClick="this.form.submit()" {{$item->done ? 'checked' : ''}} /> 
							<input type="hidden" name="id" value="{{$item->id}}" /> 
							{{e($item->name)}}
							<a href="{{URL::route('delete', $item->id)}}">(Delete)</a>
						{{Form::close()}}
					</li>
				@endif
			@endforeach
		
		</ul>
		Done
		<ul id="list2">
			@foreach($items as $item)
				@if($item->done)
					<li> 
						{{Form::open()}}
							<input type="checkbox" onClick="this.form.submit()" {{$item->done ? 'checked' : ''}} /> 
							<input type="hidden" name="id" value="{{$item->id}}" /> 
							{{e($item->name)}}
							<a href="{{URL::route('delete', $item->id)}}">(Delete)</a>
						{{Form::close()}}
					</li>
				@endif
			@endforeach	
		</ul>
	@endif
	
@stop