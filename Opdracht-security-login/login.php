<?php
	session_start();

	$email		=	'';
	$password	=	'';

	function __autoload( $classname )
	{
		require_once('./classes/'.$classname.'.php' );
	}

	$connection = new PDO( 'mysql:host=localhost;dbname=security-login', 'root', 'rtoip3107' );
	if(isset($_COOKIE['authenticated']))
	{
		header('location: dashboard.php');
	}
	if(User::validate($connection))
	{
		header('location: dashboard.php');
	}
	else
	{
		$message = Notification::getNotification();

		if (isset($_SESSION['login']))
		{
			$email = $_SESSION['login']['email'];
			$password =	$_SESSION['login']['password'];
		}
	}
?>

<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
		
		<h1>Inloggen</h1>

		<?php if($message): ?>
			<div>
				<?php echo $message['text'] ?>
			</div>
		<?php endif ?>

		<form action="login-process.php" method="post">
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
		
		<p>Nog geen login? <a href="index.php">Registreer dan hier.</a></p>
	</body>
</html>