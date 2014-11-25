<?php 
	if(isset($_POST['submit']))
	 	{
	 		try{
		 		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'rtoip3107');
		 		$message = "Verbinding gemaakt";
		 	
		 		$string ='INSERT INTO brouwers(brnaam,adres,postcode,gemeente,omzet)
		 					VALUES(:brouwernaam,:adres,:postcode,:gemeente,:omzet)';
		 		$statement = $db->prepare($string);
		 		$statement->bindParam(':brouwernaam', $_POST['brouwernaam']);
		 		$statement->bindParam(':adres', $_POST['adres']);
		 		$statement->bindParam(':postcode', $_POST['postcode']);
		 		$statement->bindParam(':gemeente', $_POST['gemeente']);
		 		$statement->bindParam(':omzet', $_POST['omzet']);
				$isToegevoegd = $statement->execute();
				if($isToegevoegd)
				{
					$insertedID = $db->lastInsertId();
					$message = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $insertedID;
				}
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
        <?= $message ?>
        <form action="index.php" method="POST">
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