<?php
	 try{
	 		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'rtoip3107');
	 		$message = "Verbinding gemaakt";
	 		$string = 'SELECT * FROM bieren 
	 					INNER JOIN brouwers 
	 					ON bieren.brouwernr = brouwers.brouwernr
	 					WHERE bieren.naam LIKE "Du%" 
	 					AND brouwers.brnaam LIKE "%a%"';
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
    	.even
			{
				background-color:lightgrey;
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
        	<?php foreach ($fetchArray as $key => $bieren): ?>
        		<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
        			<?php foreach ($bieren as $bierkey => $value): ?>
        				<td><?= $value ?></td>
        			<?php endforeach ?>
        		</tr>
        	<?php endforeach ?>
        </table>
        <?php var_dump($fetchArray) ?>
    </body>
</html>