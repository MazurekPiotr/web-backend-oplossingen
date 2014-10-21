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
	$straat = $_SESSION['deel2']['straat'];
	$nummer = $_SESSION['deel2']['nummer'];
	$gemeente = $_SESSION['deel2']['gemeente'];
	$postcode = $_SESSION['deel2']['postcode'];

	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht session</title>
	</head>
	<body>
		<h1>Overzicht</h1>
		<?php if(isset($_SESSION['deel1']) && isset($_SESSION['deel2'])): ?>
			<ul>
				<li>e-mail: <?= $email ?><a href="opdracht-session.php?focus=email">Wijzig</a></li>
				<li>nickname: <?= $nickname ?><a href="opdracht-session.php?focus=nickname">Wijzig</a></li>
				<li>straat: <?= $straat ?><a href="opdracht-session-adres.php?focus=straat">Wijzig</a></li>
				<li>nummer: <?= $nummer ?><a href="opdracht-session-adres.php?focus=nummer">Wijzig</a></li>
				<li>gemeente: <?= $gemeente ?><a href="opdracht-session-adres.php?focus=gemeente">Wijzig</a></li>
				<li>postcode: <?= $postcode ?><a href="opdracht-session-adres.php?focus=postcode">Wijzig</a></li>
			</ul>
		<?php endif ?>
</html>