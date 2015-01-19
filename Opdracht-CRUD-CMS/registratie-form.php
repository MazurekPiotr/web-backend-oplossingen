<?php

	if(isset($_COOKIE["login"])){
		
		header("Location: dashboard.php");
		
	}

	session_start();
	
	$password = false;
	$email = false;
	$errors = array();
	$isValid = false;
	
	
	if(isset($_SESSION["registration"])){
		$password = $_SESSION["registration"]["password"];
		$email = $_SESSION["registration"]["email"];
		$isValid = (isset($_SESSION["registration"]["notification"]["EMAIL_ERROR"])
						&&$_SESSION["registration"]["notification"]["EMAIL_ERROR"] == "Geen geldig paswoord")?true:false;
		$errors = array();
		if(isset($_SESSION["registration"]["notification"])){
			foreach($_SESSION["registration"]["notification"] as $err){
				$errors[] = $err;
			}
		}
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Registratie</title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="http://oplossingen.web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/directory.css">
		
		<style>
			
			#registreer{
				display: block;
				margin-top: 30px;
			}
			
			.errorEmail{
				background-color: red;
			}
			
		</style>
		
	</head>
	<body>
	
		<p>
			<?php foreach($errors as $err): ?>
				<li><?= $err ?></li>
			<?php endforeach; ?>
		</p>
	
		<h1>Registratie</h1>
		
		<form action="registratie-process.php" method="post">
			
			<label for="email">e-mail</label>
			<input type="text" name="email" id="email" value="<?= $email?>" class="<?= ($isValid)? "errorEmail" : "" ;?>" />
			
			<label for="paswoord">paswoord</label>
			<input type="text" name="paswoord" id="paswoord" value="<?= $password?>"/>
			<input type="submit" name="genPas" value="Genereer een paswoord"/>
			
			<input id="registreer" type="submit" name="registreer" value="Registreer"/>
			
		</form>
		
		
	</body>
</html>