<?php
	 try{
            $fetchArraySelect = array();
	 		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'rtoip3107');
	 		$message = "Verbinding gemaakt";
	 		$string = 'SELECT brouwernr,brnaam FROM brouwers LIMIT 5';
	 		$statement = $db->prepare($string);
			$statement->execute();
			$fetchArray = array();
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$fetchArray[] =	$row;
			}
            
            if(isset($_GET['selectBrouwer']))
            {
                $stringSelect = 'SELECT bieren.naam
                                    FROM bieren INNER JOIN brouwers
                                    ON bieren.brouwernr = brouwers.brouwernr
                                    WHERE brouwers.brnaam = :selectBrouwer';
                $statementSelect = $db->prepare($stringSelect);
                $statementSelect->bindParam(':selectBrouwer', $_GET['selectBrouwer']);
                $statementSelect->execute();
                
                while ($row = $statementSelect->fetch(PDO::FETCH_ASSOC))
                {
                    $fetchArraySelect[] = $row;
                }
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
        <?= $message ?>
        <form action="index.php" method="GET">
            <select name="selectBrouwer">
                <?php foreach ($fetchArray as $key => $brouwer): ?>
                    <?php foreach ($brouwer as $brouwerKey => $value): ?>
                        <?php if($brouwerKey == 'brnaam'):?>
                            <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Geef mij alle bieren van deze brouwer"/>
        </form>
        <table>
            <thead>
                <th>Aantal</th>
                <th>naam</th>
            </thead>
            <tbody>
                <?php foreach ($fetchArraySelect as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['naam'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php var_dump($fetchArray) ?>
        <?php var_dump($fetchArraySelect) ?>
    </body>
</html>