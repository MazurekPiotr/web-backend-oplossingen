<?php 
	$users[] = array('username' => 'info@test.be',
		'salt' => '56a',
		'password' => '95df3d1cc1f45f250ce23bed4dfe3e35997c959f3226a1beec088a0d9dac945607eb15388708a79460b9331701d5fa319f0aec39991d9fafc20a61238d876f3f');
	$users[] = array('username' => 'test@kdg.be',
		'salt' => 'azerty',
		'password' => '9cdd280f56bc8731f10b18993b20d9802c3082d35636c3ca629a9972dd6bdbdf1e09ab90a6bd7e6f99e6cce559eebe11d24799aa00eaba0c42bd613ba5511b00');
	//unieke salt geven aan gebruiker, voorkomt dat users met hetzelfde password worden gehackt
	$loggedIn = false;
	$username = false;
	$password = false;
	$userIsValid = false;
	$authentication = false;
	$salt = false;
	if(isset($_COOKIE['loggedIn']))
	{
		$cookiedata = explode('##', $_COOKIE['loggedIn']);
		var_dump($cookiedata);
		$usernameCookie = $cookiedata['0'];
		$hashedUsernameCookie  = $cookiedata['1'];
		foreach ($users as $user) {
			if($user['username'] == $cookiedata[0])
			{
				$hashedUsername = hash('sha512', $user['salt'] . $user['username']);
				if($hashedUsername == $hashedUsernameCookie)
				{
					$loggedIn = true;
				}
			}
		}
	}
	else
	{
		if(isset($_POST['submit']))
		{
			$authentication = true;
			$username = $_POST[ 'username' ];
			$password = $_POST['password'];
		}
		if($username && $password)
		{
			foreach ($users as $user) 
			{
				$hashedAndSaltedPassword = hash('sha512', $user['salt'] . $password);
				if($user['username'] == $username && $user['password'] == $hashedAndSaltedPassword)
				{
					$salt = $user['salt'];
					$userIsValid = true;
				}
			}
		}
		if($authentication && $userIsValid)
		{
			$hashedUsername = hash('sha512', $salt . $username);
			$cookieValue = $username ."##" . $hashedUsername; 
			setcookie('loggedIn', $cookieValue, time() + 60);
			header('location: test-security.php');
		}
	}
	
?>
<!doctype html>
<html>
    <head>
    </head>
    <body>
    <?php if($loggedIn): ?>
    	<p>U bent correct ingelogd.</p>
    <?php else: ?>
    	<?php if($authentication): ?>
    		<?= ($userIsValid) ? "" : "Username & password niet geldig" ?>
    	<?php endif ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        	<input type="text" name="username"/>
        	<input type="text" name="password"/>
        	<input type="submit" name="submit"/>
        </form>
    <?php endif ?>
    </body>
</html>