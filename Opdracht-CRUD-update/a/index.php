<?php
	 try{
            $fetchArraySelect = array();
            $showUpdate = false;
            $namesSelect = array();
	 		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'rtoip3107');
	 		$message = "Verbinding gemaakt";
	 		$string = 'SELECT * FROM brouwers';
	 		$statement = $db->prepare($string);
			$statement->execute();
			$fetchArray = array();
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$fetchArray[] =	$row;
			}
            $names = array();
            foreach ($fetchArray[0] as $key => $value) {
                $names[] = $key;
            }
            if(isset($_GET['delete']))
            {
                $stringDelete = 'DELETE FROM brouwers
                                    WHERE brnaam = :brouwernaam';
                $statementDelete = $db->prepare($stringDelete);
                $statementDelete ->bindParam(':brouwernaam', $_GET['delete']);
                $statementDelete->execute();
            }
            if(isset($_GET['submit']))
            {
                $showUpdate = true;
                $brouwernaam = $_GET['submit'];
                if(isset($_GET['nummer']))
                {
                    $brouwernr = $_GET['nummer'];
                } 
            }
            if(isset($_POST['update']))
            {

                $stringUpdate ='UPDATE brouwers 
                                SET brnaam = :brouwernaam,
                                    adres = :adres, postcode = :postcode,
                                     gemeente = :gemeente, omzet = :omzet
                                WHERE brouwernr = :brouwernr
                                LIMIT 1';
                $statementUpdate = $db->prepare($stringUpdate);
                $statementUpdate->bindParam(':brouwernr', $_POST['nummer']);
                $statementUpdate->bindParam(':brouwernaam', $_POST['brouwernaam']);
                $statementUpdate->bindParam(':adres', $_POST['adres']);
                $statementUpdate->bindParam(':postcode', $_POST['postcode']);
                $statementUpdate->bindParam(':gemeente', $_POST['gemeente']);
                $statementUpdate->bindParam(':omzet', $_POST['omzet']);
                var_dump($_POST);
                $isUpdated = $statementUpdate->execute();
            }
	 	}
	 	catch(PDOException $e)
	 		{
	 			$message = "Er ging iets mis: " . $e->getMessage();
	 		}
?>
<!doctype html>
<html>
    <head>
    <style type="text/css">
    	tr:nth-child(even){
    		background-color: lightgrey;
    	}
    </style>
    </head>
    <body>
        <?php if($showUpdate):?>
            <h1>Brouwerij <?= $brouwernaam ?> (#<?= $brouwernr?>)</h1>
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
            <input type="hidden" name="nummer" value="<?= $_GET['nummer'] ?>"/>
            <p><input type="submit" name="update" id="update" value="verzenden"></p>
        </form>
        <?php endif ?>
        <table>
            <thead>
                <?php foreach ($names as $key => $value): ?>
                    <th><?= $value ?></th>
                <?php endforeach ?>
            </thead>
            <tbody>
                <?php foreach ($fetchArray as $key => $brouwer): ?>
                    <tr>
                        <?php foreach ($brouwer as $brouwerkey => $value): ?>
                            <td><?= $value ?></td>   
                        <?php endforeach ?>
                            <td><a href="index.php?delete=<?=$brouwer['brnaam']?>"><img src="img/icon-delete.png"></a></td>
                            <td><a href="index.php?submit=<?=$brouwer['brnaam']?>&nummer=<?=$brouwer['brouwernr']?>"><img src="img/icon-edit.png"></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>