<?php

	$dieren	=	array('tijger', 
                     'hond', 
                     'walvis', 
                     'gorilla',
                     'kat');
	$zoogdieren = array('paard', 'schaap', 'rat');
	$aantal	=	count ( $dieren );
	$teZoekenDier	=	'walvis';
	$gevonden	=	in_array ( $teZoekenDier , $dieren );
	$gesorteerd = array_multisort($dieren);
	$dierenLijst =  array_merge($dieren, $zoogdieren);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht array functies deel 2</title>
	</head>
	<body>
		<?= $aantal ?>
		<?php if ($gevonden) : ?>
			Het dier is gevonden.
		<?php else : ?>
			Het dier is niet gevonden.
		<?php endif ?>
		<ul>
			<?php foreach ($dierenLijst as $key => $value): ?>
        		<li><?= $dierenLijst[$key]?></li>
   			<?php endforeach ?>
    	</ul>
	</body>
</html>