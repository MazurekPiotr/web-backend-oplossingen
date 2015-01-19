<?php

	session_start();
	
	if(isset($_COOKIE["login"])){
		
		header("Location: dashboard.php");
		
	}
	
	
	$message = "";
	$email = false;
	$paswoord = false;
	
	if(isset($_SESSION["registration"]["notification"]["LOGOUT"])){
		$message = $_SESSION["registration"]["notification"]["LOGOUT"];
	}
	if(isset($_SESSION["registration"]["notification"]["NOT"])){
		$message = $_SESSION["registration"]["notification"]["NOT"];
	}
	if(isset($_SESSION["registration"]["password"])){
		$paswoord = $_SESSION["registration"]["password"];
	}
	if(isset($_SESSION["registration"]["email"])){
		$email = $_SESSION["registration"]["email"];
	}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="http://oplossingen.web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://oplossingen.web-backend.local/css/directory.css">
        
        <style>
	        
	        #inloggen{
		        display: block;
		        margin-top: 30px;
	        }
	        
        </style>
		
	</head>
	<body>
	
		<p><?= $message ?></p>
	
		<h1>Inloggen</h1>
		
		<form action="login-proces.php" method="post">
			
			<label for="email">e-mail</label>
			<input type="text" name="email" id="email" value="<?= $email ?>"/>
			
			<label for="paswoord">paswoord</label>
			<input type="text" name="paswoord" id="paswoord" value="<?= $paswoord?>"/>
			
			<input id="inloggen" type="submit" name="Inloggen" value="Inloggen"/>
			
		</form>
		
	</body>
</html>