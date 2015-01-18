<?php

	session_start();

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$message	=	Message::getMessage();
	$email		=	'';
	$password	=	'';

	if ( isset( $_SESSION[ 'registration' ] ) )
	{
		$email		=	$_SESSION[ 'registration' ][ 'email' ];
		$password	=	$_SESSION[ 'registration' ][ 'password' ];
	}

	var_dump( $_SESSION );
?>

<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
	
		<h1>Registreer</h1>
		
		<?php if ( $message ): ?>
			<div class="modal <?php echo $message['type'] ?>">
				<?php echo $message['text'] ?>
			</div>
		<?php endif ?>
		
		<form action="registratie-process.php" method="post">
			<p><label for="email">Email</label></p>
			<p><input type="text" name="email" id="email" value="<?= $email ?>"></p>
			<p><label for="password">Paswoord</label></p>
			<p><input type="<?= ( $password != '' ) ? 'text' : 'password' ?>" name="password" id="password" value="<?= $password ?>"></p>
			<p><input type="submit" name="generate-password" value="genereer een paswoord"></p>
			<p><input type="submit" name="submit" value="registreer"></p>
		</form>
	</body>
</head>