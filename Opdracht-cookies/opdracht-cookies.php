<?php 
	$file = file_get_contents('gegevens.txt');
	$array = explode(',', $file);
	
	if(isset($_POST['submit']))
	{
		if($_POST['gebruiker'] == $file[0] && $_POST['paswoord'] == $file[1])
		{
			setcookie('gegevens', true, time()+ 3600);
			$info = 'U bent ingelogd.';
		}
		else{
			$info = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
		}
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
						<input type="submit" name="submit" value="verzenden">
			</form>
	</body>