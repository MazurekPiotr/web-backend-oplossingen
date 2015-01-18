<?php
	session_start();

	$email		=	'';
	$password	=	'';

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$connection 	=	 new PDO( 'mysql:host=localhost;dbname=phpoefening029', 'root', '' );
	
	if ( User::validate( $connection ) )
	{
		header('location: phpoefening-029-a-dashboard.php');
	}
	else
	{
		$message	=	Message::getMessage();

		if ( isset( $_SESSION[ 'login' ] ) )
		{
			$email		=	$_SESSION[ 'login' ][ 'email' ];
			$password	=	$_SESSION[ 'login' ][ 'password' ];
		}
	}
?>

<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
		
		<h1>Inloggen</h1>

		<?php if ( $message ): ?>
			<div class="modal <?php echo $message['type'] ?>">
				<?php echo $message['text'] ?>
			</div>
		<?php endif ?>

		<form action="phpoefening-029-a-login-confirm.php" method="post">
			<ul>
				<li>
					<label for="email">Email</label>
					<input type="text" name="email" id="email" value="<?= $email ?>">
				</li>
				
				<li>
					<label for="password">Paswoord</label>
					<input type="password" name="password" id="password" value="<?= $password ?>">
				</li>
			</ul>
			
			<input type="submit" name="submit" value="log in">
		</form>
		
		<p>Nog geen login? <a href="phpoefening-029-a-registration-form.php">Registreer dan hier.</a></p>
		
		<p>Opm: het paswoord van alle gebruikers is "test"</p>
	</body>
</html>