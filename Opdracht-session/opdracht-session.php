<?php 

	session_start();
	if(isset($_SESSION['deel1']))
	{
		$email = $_SESSION['deel1']['email'];
		$nickname = $_SESSION['deel1']['nickname'];
	}
	else{
		$email = '';
		$nickname = '';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht session</title>
	</head>
	<body>
		<h1>Registratiegegevens</h1>
			<form action="opdracht-session-adres.php" method="POST">
				<p><label for="e-mail">e-mail:</label></p>
				<p><input type="text" value="<?= $email ?>" name="e-mail" id="e-mail"></p>
				<p><label for="nickname">nickname</label></p>
				<p><input type="text" value="<?= $nickname ?>" name ="nickname" id="nickname"></p>
				<p><input type="submit" name="volgende" value="Volgende"></p>	
			</form>
</html>