<?php
	
	session_start();

	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}

	$connection = new PDO('mysql:host=localhost;dbname=security-login', 'root', 'rtoip3107');
	if (User::validate($connection))
	{
		$notification = Notification::getNotification();
	}
	else
	{
		User::logout();
		new Notification('Er ging iets mis tijdens het inloggen, probeer opnieuw.');
		header('location: index.php');
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>

		<h1>Dashboard</h1>
		
		<?php if ( isset ( $notification ) ): ?>
			<div>
				<?= $notification['text'] ?>
			</div>
		<?php endif ?>
		
		<p>Hallo,</p>
		
		<a href="logout.php">uitloggen</a>
	</body>
</head>