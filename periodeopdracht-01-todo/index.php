<?php 
	session_start();
	$errormessage = '';
	if(isset($_POST['submitTodo']))
	{
		if($_POST['input'] != '')
			{
				$_SESSION['todo'][] = $_POST['input'];
				$bericht = '';
				$errormessage ='';
			}
		else
		{
			$errormessage = 'Ahh, damn. Lege todos zijn niet toegestaan...';
		}
	}
	if(isset($_GET['do']))
	{
		$_SESSION['done'][] = $_SESSION['todo'][$_GET['do']];
		unset($_SESSION['todo'][$_GET['do']]);
		header('location: index.php');
	}
	if (isset($_GET['undo'])) 
	{
		$_SESSION['todo'][] = $_SESSION['done'][$_GET['undo']];
		unset($_SESSION['done'][$_GET['undo']]);
		header('location:index.php');
	}
	if(!isset($_SESSION['todo']) && !isset($_SESSION['done']))
	{
			$bericht = 'Je hebt nog geen TODOs toegevoegd. Zo weinig werk of meesterplanner?';
	}
	if(isset($_SESSION['todo']) && isset($_SESSION['done']))
	{
		if(empty($_SESSION['todo']) && empty($_SESSION['done']))
		{
			$bericht = 'Je hebt nog geen TODOs toegevoegd. Zo weinig werk of meesterplanner?';
		}
	}
	
	if(isset($_GET['deleteTodo']))
	{
		unset($_SESSION['todo'][$_GET['deleteTodo']]);
	}
	if(isset($_GET['deleteDone']))
	{
		unset($_SESSION['done'][$_GET['deleteDone']]);
	}


?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Todo App</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<header class="error"><?= $errormessage?></header>
		<h1>Todo App</h1>
		<?php if(!empty($bericht)): ?>
			<p><?= $bericht ?></p>
		<?php else: ?>
			<h2>Nog te doen</h2>
			<?php if(isset($_SESSION['todo']) && $_SESSION['todo'] != null): ?>
				<ul>
					<?php foreach($_SESSION['todo'] as $key => $value): ?>
						<li><a href="index.php?do=<?= $key ?>" class="doUndo"></a><?= $value ?>
							<a href="index.php?deleteTodo=<?= $key ?>" class="verwijder"></a>
						</li>	
					<?php endforeach ?>
				</ul>
			<?php else: ?>
			<p>Schouderklopje, alles is gedaan!</p>
			<?php endif ?>
			<h2>Done and done!</h2>
			<?php if (isset($_SESSION['done']) && $_SESSION['done'] != null): ?>
				<ul>
					<?php foreach($_SESSION['done'] as $key => $value): ?>
						<li><a href="index.php?undo=<?= $key ?>" class="doUndo"></a>
						<?= $value ?><a href="index.php?deleteDone=<?= $key ?>" class="verwijder"></a></li>
					<?php endforeach ?>
				</ul>
			<?php else: ?>
				<p>Werk aan de winkel...</p>
			<?php endif ?>
		<?php endif ?>
		<h1>Todo's toevoegen</h1>
		<form action="index.php" method="POST">
			<label for="input">Beschrijving: </label>
			<input type="text" id="input" name="input">
			<input type="submit" name="submitTodo" value="Toevoegen">
		</form>
		<?php var_dump($_SESSION) ?>
	</body>
</html>