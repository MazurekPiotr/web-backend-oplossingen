<?php 
	
	session_start();
	if(isset($_POST['volgende']))
	{
		$_SESSION['deel2']['straat'] = $_POST['straat'];
		$_SESSION['deel2']['nummer'] = $_POST['nummer'];
		$_SESSION['deel2']['gemeente'] = $_POST['gemeente'];
		$_SESSION['deel2']['postcode'] = $_POST['postcode'];
	}
	$email = $_SESSION['deel1']['email'];
	$nickname = $_SESSION['deel1']['nickname'];

	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht session</title>
	</head>
	<body>
		<h1>Registratiegegevens</h1>
		<?php if(isset($_SESSION['deel1']) ): ?>
			<ul>
				<li>e-mail: <?= $email ?></li>
				<li>nickname: <?= $nickname ?></li>
			</ul>

		<h1>adres</h1>
			<form action="opdracht-session-overzicht.php" method="POST">
				<p><label for="straat">straat</label></p>
				<p><input type="text" name="straat" id="straat"></p>
				<p><label for="nummer">nummer</label></p>
				<p><input type="text" name ="nummer" id="nummer"></p>
				<p><label for="gemeente">gemeente</label></p>
				<p><input type="text" name ="gemeente" id="gemeente"></p>
				<p><label for="postcode">postcode</label></p>
				<p><input type="text" name ="postcode" id="postcode"></p>
				<p><input type="submit" name="volgende" value="Volgende"></p>	
			</form>
			
		<?php else: ?>
			
			</form>
		<?php endif ?>
</html>