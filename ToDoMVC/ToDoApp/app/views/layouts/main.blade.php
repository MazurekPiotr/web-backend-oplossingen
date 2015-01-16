<html>
	<head>
		<title>ToDo</title>
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
	</head>
	<body>
		<header class="group">
			<div>
				<a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public">Home</a>
			</div>
			@if(Auth::check())
				<nav>
                	<ul>
                    	<li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/dashboard">Dashboard</a></li>
                        <li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/todos">Todos</a></li>
                        <li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/logout">Logout ({{Auth::user()->email}})</a></li>
                    </ul>
            	</nav>
			@else
				<nav>
	                <ul>
	                    <li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/login">Login</a></li>
	                    <li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/register">Registreer</a></li>
	                </ul>
	            </nav>
            @endif
		</header>
		<div>
			@yield('content')
		</div>

	</body>
</html>