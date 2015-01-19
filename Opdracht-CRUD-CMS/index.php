<?php 
	session_start();

	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}

	$notification	=	Notification::getNotification();
	$email		=	'';
	$password	=	'';

	if(isset($_SESSION['register']))
	{
		$email = $_SESSION['register']['email'];
		$password = $_SESSION['register']['password'];
	}

	if(isset($_COOKIE['authenticated']))
	{
		header('location: dashboard.php');
	}

	
 ?>
<!doctype html>
<html>
<head>
	<title>Opdracht Security Login</title>
</head>
<body>
	<h1>Registreren</h1>
	<?php if ( $notification ): ?>
		<div>
			<?= $notification['text'] ?>
		</div>
	<?php endif ?>
	<form action="registratie-process.php" method="POST">
		<ul>
			<li>
				<label>email</label>
				<input name="email" type="email" value="<?= $email ?>"/>
			</li>
			<li>
				<label>Passwoord</label>
				<input name="password" type="<?= ( $password != '' ) ? 'text' : 'password' ?>" value="<?= $password ?>"/>
				<input type="submit" name="generatePassword" value="Genereer Passwoord"/>
			</li>
			<li> 
				<input type="submit" name="register" id="register" value="Registreer"/>
			</li>
		</ul>
	</form>
</body>
</html>