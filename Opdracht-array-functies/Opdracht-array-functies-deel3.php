<?php

	$getallen = array(8,7,8,7,3,2,1,2,4);
	$verwijderd = array_unique($getallen);
	asort($verwijderd);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht array functies deel 3</title>
	</head>
	<body>
		<ul>
			<?php foreach($verwijderd as $key => $value): ?>
        		<li><?= $verwijderd[$key]?></li>
   			<?php endforeach ?>
    	</ul>
	</body>
</html>