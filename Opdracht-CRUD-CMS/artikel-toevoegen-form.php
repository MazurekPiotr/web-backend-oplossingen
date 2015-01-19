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
		$top = '<a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als ' . $email . ' | <a href="logout.php">uitloggen</a> | <a href="artikel-overzicht.php">Terug naar overzicht</a>';
	}
	$connection = new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');
	if (User::validate($connection))
	{
		$notification = Notification::getNotification();
	}
	else
	{
		User::logout();
		new Notification('Er ging iets, probeer opnieuw in te loggen.');
		header('location: index.php');
	}
	if(isset($_SESSION["notification"]['text'])){
		$message = $_SESSION["notification"]['text'];
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Artikel toevoegen</title>
	</head>
	<body>
		<div><?php if($top): ?>
			<?= $top ?>
		<?php endif ?></div>
		<h1>Artikel toevoegen</h1>
		<form method="post" action="artikel-toevoegen-process.php">
				<p><label for="titel">Titel</label></p>
				<p><input type="text" id="titel" name="titel"></p>
				<p><label for="artikel">Artikel</label></p>
				<p><input type="text" id="artikel" name="artikel"></p>
				<p><label for="kernwoorden">Kernwoorden</label></p>
				<p><input type="text" id="kernwoorden" name="kernwoorden"></p>
				<p><label for="datum">Datum(dd-mm-jjjj)</label></p>
				<p><input type="text" id="datum" name="datum"></p>
				<p><input type="submit" name="submit" value="Verzenden"></p>
				
		</form>
		<?php if (isset($notification)): ?>
			<div>
				<?= $notification['text'] ?>
			</div>
		<?php endif ?>
	</body>
</html>