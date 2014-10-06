<?php
	function berekenSom($getal1, $getal2)
	{
		return $getal2 + $getal1;
	}
	function vermenigvuldig($getal1, $getal2)
	{
		return $getal2 * $getal1;
	}
	function isEven($getal)
	{
		if($getal%2 == 0)
		{
			return 'ja';
		}
		else
		{
			return 'nope';
		}
	}
	function strUppLen( $string ) 
	{
		$upp_length['upper'] = strtoupper( $string );
		$upp_length['length'] =	strlen( $string );

		return $upp_length;
	}
	
	$som 		=	berekenSom(12, 5);
	$product 	= 	vermenigvuldig(8,9);

	$getal = 65;
	$even = isEven( $getal );

	$string = 'Ik ben kat en zeg woef.';
	$resultaat	= strUppLen( $string );
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht functies</title>
	</head>
	<body>
	<p><?= $som?></p>
	<p><?= $product ?></p>
	<p><?= $even ?></p>
	<p><?php foreach ($resultaat as $key => $value): ?>
                <li><?= $resultaat[$key]?></li>
       <?php endforeach ?></p>


	</body>
</html>