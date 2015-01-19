<?php 
	session_start();
	if(isset($_SESSION['added']) && $_SESSION['added'] == true)
	{
		$titel = $_SESSION['titel'];
		$artikel = $_SESSION['artikel'];
		$kernwoorden = $_SESSION['kernwoorden'];
		$datum = $_SESSION['datum'];
		$message = $_SESSION['notification'];
	}
	$titel = "";
	$artikel = "";
	$kernwoorden = "";
	$datum = "";
	$message = "";
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Opdracht mod rewrite basis</title>
    </head>
    <body>
        <h1>Artikel toevoegen</h1>
        <form action="artikel-toevoegen.php" method="POST">
        	<p><a href="">Terug naar overzicht</a></p>
        	<p><label for="titel">Titel</label></p>
        	<p><input type="text" id="titel" name="titel" value="<?= $titel ?>" /></p>
        	<p><label for="artikel">Artikel</label></p>
        	<p><input type="text" id="artikel" name="artikel" value="<?= $artikel ?>"
        	/></p>
        	<p><label for="kernwoorden">Kernwoorden</label></p>
        	<p><input type="text" id="kernwoorden" name="kernwoorden" value="<?= $kernwoorden ?>" /></p>
        	<p><label for="datum">Datum</label></p>
        	<p><input type="text" id="datum" name="datum" value="jjjj/mm/dd" /></p>
        	<p><input type="submit" value="Verzenden" id="submit" name="submit"></p>
        </form>
        <?= $message ?>
        <?php var_dump($_SESSION) ?>
    </body>
</html>