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
		$top = '<a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als ' . $email . ' | <a href="logout.php">uitloggen</a>';
	}
	if(isset($_SESSION['notification']['text']))
	{
		$notification = $_SESSION['notification']['text'];
	}
	if (User::validate($connection))
	{
		$notification = Notification::getNotification();
	}
	else
	{
		User::logout();
		new Notification('Er ging iets mis, probeer opnieuw in te loggen.');
		header('location: login.php');
	}
	$connection = new PDO("mysql:host=localhost;dbname=crud-cms", "root", "rtoip3107");
	$db = new Database($connection);
	$fetchedArtikels = $db->query("SELECT * FROM artikels");

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Artikel overzicht</title>
		<style type="text/css">
		.notActive{
		        background-color: #c5c5c5;
		        border-radius: 5px;
	        }
	        </style>
	</head>
	<body>
		<div><?php if($top): ?>
			<?= $top ?>
		<?php endif ?></div>
		<h1>Overzicht van de artikels</h1>
		<ul>
			<li>
				<a href="artikel-toevoegen-form.php">Voeg artikel toe</a>
			</li>
		</ul>
		
		<?php if (isset($notification)): ?>
			<div>
				<?= $notification['text'] ?>
			</div>
		<?php endif ?>
		<?php if($fetchedArtikels["data"]): ?>
			
				<?php foreach($fetchedArtikels["data"] as $artikel): ?>
				
					<?php if($artikel["is_archived"] != 1): ?>
					
						<article class="<?= ($artikel["is_active"])? "" : "notActive" ; ?>">
						
							<h3><?= $artikel["titel"] ?></h3>
							
							<ul>
								<li>Artikel: <?= $artikel["artikel"] ?></li>
								<li>Kernwoorden: <?= $artikel["kernwoorden"] ?></li>
								<li>Datum: <?= $artikel["datum"] ?></li>
							</ul>
							
							<a href="artikel-wijzigen-form.php?artikel=<?= $artikel["id"] ?>">artikel wijzigen</a> | 
							<a href="artikel-activeren.php?artikel=<?= $artikel["id"] ?>"><?= ($artikel["is_active"])? "artikel deactiveren" : "artikel activeren" ; ?></a> |
							<a href="artikel-verwijderen.php?artikel=<?= $artikel["id"] ?>">artikel verwijderen</a>
						</article>
					
					<?php endif; ?>
				
				<?php endforeach; ?>
			
			<?php endif; ?>
	</body>
</html>