<?php

	$dieren	=	array('tijger', 
                     'hond', 
                     'walvis', 
                     'gorilla',
                     'kat');

	$aantal	=	count ( $dieren );

	$teZoekenDier	=	'paard';
	$gevonden	=	in_array ( $teZoekenDier , $dieren ); 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht array functies</title>
	</head>
	<body>
		<?= $aantal ?>

		<?php if ($gevonden === true) : ?>
			Het dier is gevonden.
		<?php else : ?>
			Het dier is niet gevonden.
		<?php endif ?>
		
	</body>
</html>