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
			<nav>
                <ul>
                    <li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/login">Login</a></li>
                    <li><a href="http://oplossingen.web-backend.local/ToDoMVC/ToDoApp/public/register">Registreer</a></li>
                </ul>
            </nav>
		</header>
		<div>
			@yield('content')
		</div>

	</body>
</html>