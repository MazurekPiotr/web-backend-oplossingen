<?php 
if (isset( $_GET['logout']))
	{
		setcookie( 'cookie', '', time() - 1000 );
		header('location: opdracht-cookies.php');
	}
	$file = file_get_contents('gegevens.txt');
	$gegevens = explode(',', $file);
	$array = array('piotr','cookie');
	$info = '';
	$cookie = false;

	if(!isset($_COOKIE['cookie']))
	{
		if(isset($_POST['verzenden']))
		{
			if($_POST['gebruiker'] == $gegevens[0] && $_POST['paswoord'] == $gegevens[1])
			{
				setcookie('cookie', true, time()+ 3600);
				header('location: opdracht-cookies.php');
			}
			else
			{
				$info = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
			}
		}
	}
	else
	{
		$info = 'U bent ingelogd.';
		$cookie = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Opdracht cookie</title>
</head>
	<body>
		<h1>Inloggen</h1>
		<?= $info ?>
		<?php if(!$cookie): ?>
			<form action="opdracht-cookies.php" method="post">
						<label for="gebruiker">Gebruikersnaam: </label>
						<input type="text" name="gebruiker" id="gebruiker" value="piotr">
						<label for="Paswoord">Paswoord: </label>
						<input type="password" name="paswoord" id="paswoord" value="cookie">
						<input type="submit" name="verzenden" value="verzenden">
			</form>
		<?php else : ?>
			<a href="opdracht-cookies.php?logout=true">Uitloggen</a>
		<?php endif ?>
	</body>