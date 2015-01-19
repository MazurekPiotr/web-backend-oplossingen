@extends('layouts.main')

@section('content')
	<h1>De TODO-app</h1>
	<a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/todos/add">Voeg item toe.</a>
	@if($items->count() == 0) 
		Nog geen todo-items 
	@else
		<h2>Wat moet er allemaal gebeuren?</h2>
		Todo
		<ul id="list1">
			<?php $counttodo = 0?>
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
					<?php $counttodo++?>
				@endif
			@endforeach
			@if($counttodo == 0)
				All right, all done!
			@endif
		</ul>
		Done
		<ul id="list2">
			<?php $countdone = 0?>
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
					<?php $countdone++?>
				@endif
			@endforeach	
			@if($countdone == 0)
				Nog werk aan de winkel...
			@endif
		</ul>
	@endif
	
@stop