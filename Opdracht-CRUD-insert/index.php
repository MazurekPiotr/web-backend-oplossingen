<?php 
	if(isset($_POST['submit']))
	 	{
	 		try{
	 		$brouwernaam = $_POST['brouwernaam'];
	 		$adres = $_POST['adres'];
	 		$postcode = $_POST['postcode'];
	 		$gemeente = $_POST['gemeente'];
	 		$omzet = $_POST['omzet'];
	 		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'rtoip3107');
	 		$message = "Verbinding gemaakt";
	 	
	 		$string ='INSERT INTO brouwers(brouwernaam,adres,postcode,gemeente,omzet)
	 					VALUES($brouwernaam,$adres,$postcode,$gemeente,$omzet)';
	 		$statement = $db->prepare($string);
			$statement->execute();
	 		}
	 		catch(PDOException $e)
	 		{
	 		$message = "Er ging iets mis: " . $e->getMessage();
	 		}
	 	}
	
	 	
	 	
?>
<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h1>Voeg een brouwer toe</h1>
        <form action="opdracht-session-overzicht.php" method="POST">
        	<p><label for="brouwernaam">brouwernaam</label></p>
        	<p><input type="text" name="brouwernaam" id="brouwernaam"></p>
        	<p><label for="adres">adres</label></p>
        	<p><input type="text" name="adres" id="adres"></p>
        	<p><label for="postcode">postcode</label></p>
        	<p><input type="text" name="postcode" id="postcode"></p>
        	<p><label for="gemeente">gemeente</label></p>
        	<p><input type="text" name="gemeente" id="gemeente"></p>
        	<p><label for="omzet">omzet</label></p>
        	<p><input type="text" name="omzet" id="omzet"></p>
        	<p><input type="submit" name="submit" id="submit" value="verzenden"></p>
        </form>
    </body>
</html>