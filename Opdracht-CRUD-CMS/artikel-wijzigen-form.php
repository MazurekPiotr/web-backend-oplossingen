<?php 
	
	$message = false;

	session_start();
	
	$isauthenticated = false;
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	if(isset($_COOKIE["authenticated"])){
		$explodedCookie = explode(",", $_COOKIE["authenticated"]);
		$email = $explodedCookie[0];
		$top = '<a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als ' . $email . ' | <a href="logout.php">uitloggen</a> | <a href="artikel-overzicht.php">Terug naar overzicht</a>';
		
		
		$connection = new PDO("mysql:host=localhost;dbname=crud-cms", "root", "rtoip3107");
		$db = new Database($connection);
		$fetched = $db->query("SELECT * FROM users WHERE email = :email", array(":email" => $email));
	}
	else{
	
		header("Location: login-form.php");
		
	}
	
	
	$artikel = $db->query("SELECT * FROM artikels WHERE id = :id", array(":id" => $_GET["artikel"]));
	
	$artikel = $artikel["data"][0];
	
	if(isset($_SESSION["artikel"]["notification"])){
		$message = $_SESSION["artikel"]["notification"];
	}
	
	$_SESSION["artikel"]["notification"] = "";
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Artikel wijzigen</title>
	</head>
	<body>
		<div><?php if($top): ?>
			<?= $top ?>
		<?php endif ?></div>
		
			<h1>Artikel Wijzigen</h1>
			
			<p><?= $message ?></p>
			
			
			<form action="artikel-wijzigen.php" method="post">
				
				<label for="titel">Titel</label>
				<input id="titel" name="titel" type="text" value="<?= $artikel["titel"] ?>"/>
				
				<label for="artikel">Artikel</label>
				<input id="artikel" name="artikel" value="<?= $artikel["artikel"] ?>"/>
				
				<label for="kernwoorden">Kernwoorden</label>
				<input id="kernwoorden" name="kernwoorden" type="text" value="<?= $artikel["kernwoorden"] ?>"/>
				
				<label for="datum">Datum (dd-mm-jjj)</label>
				<input id="datum" name="datum" type="text" value="<?= $artikel["datum"] ?>"/>
				
				<input type="hidden" name="id" value="<?= $artikel["id"] ?>"/>
				
				<input type="submit" id="wijzigen" value="Wijzigen" name="wijzigen" />
				
			</form>	

	</body>
</html>