<?php
	 try{
            $fetchArraySelect = array();
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
                            <td><a href="index.php?delete=<?= $brouwer['brnaam'] ?>"><img src="img/icon-delete.png"></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php var_dump($fetchArray) ?>
        <?php var_dump($fetchArraySelect) ?>
    </body>
</html>