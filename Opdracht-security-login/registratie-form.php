<?php 
	session_start();
	$email = "";
	$password = "";
	
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>Registreren</h1>
		<form action="registratie-process.php" method="post">
			<p><label for="email">e-mail</label></p>
			<p><input type="text" id="email" value="<?= $email ?>"></p>
			<p><label for="password">paswoord</label></p>
			<p><input type="password" id="password" value="<?= $password ?>"></p>
			<p><input type="submit" name="generatePassword" value="Genereer een paswoord"></p>
			<p><input type="submit" value="Registreer"></p>
		</form>
		
	</body>
</html>