@extends('layouts.main')

@section('content')
	<h1>Your Items</h1>
	<ul>
		@foreach($items as $item)
			<li>{{$item->name}}</li>
		@endforeach
	</ul>

@stop