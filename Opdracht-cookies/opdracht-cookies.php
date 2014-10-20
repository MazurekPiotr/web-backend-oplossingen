<?php 
	$file = file_get_contents('gegevens.txt');
	$array = explode(',', $file);
	$info = '';
	$cookie = false;

	if(!isset($_COOKIE['cookie']))
	{
		if(isset($_POST['verzenden']))
		{
			if($_POST['gebruiker'] == $file[0] && $_POST['paswoord'] == $file[1])
			{
				setcookie('cookie', '', time()+ 3600);
				header( 'location: opdracht-cookies.php' );
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
<head></head>
	<body>
		<h1>Inloggen</h1>
		<?= $info ?>
			<form action="opdracht-cookies.php" method="post">
						<label for="gebruiker">Gebruikersnaam: </label>
						<input type="text" name="gebruiker" id="gebruiker">
						<label for="Paswoord">Paswoord: </label>
						<input type="password" name="paswoord" id="paswoord">
						<input type="submit" name="verzenden" value="verzenden">
			</form>
	</body>