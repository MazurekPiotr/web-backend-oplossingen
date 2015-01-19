<?php
	
	session_start();
	$top = "";
	function __autoload( $classname )
	{
		require_once( './classes/'.$classname . '.php' );
	}
	if(isset($_COOKIE['authenticated']))
	{
		$explodedCookie = explode(",", $_COOKIE['authenticated']);
		$email = $explodedCookie[0];
		$top = 'Ingelogd als ' . $email . ' | <a href="logout.php">uitloggen</a>';
	}
	$connection = new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');
	if (User::validate($connection))
	{
		$notification = Notification::getNotification();
	}
	else
	{
		User::logout();
		new Notification('Er ging iets mis tijdens het inloggen, probeer opnieuw.');
		header('location: login.php');
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
		<div><?php if($top): ?>
			<?= $top ?>
		<?php endif ?></div>
		<h1>Dashboard</h1>
		<ul>
			<li>
				<a href="artikel-overzicht.php">Artikels</a>
			</li>
			<li>
				<a href="gegevens-wijzigen-form.php">Gegevens wijzigen</a>
			</li>
		</ul>
		
		<?php if ( isset ( $notification ) ): ?>
			<div>
				<?= $notification['text'] ?>
			</div>
		<?php endif ?>
	</body>
</head>