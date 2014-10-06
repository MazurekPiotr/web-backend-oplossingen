<?php
	function bereken($start, $rente, $aantal)
	{
		static $teller 		= 	1;
		static $arrayDump 	= 	array();

		$winst = $start * ( $rente / 100);

		$totaal	=	$start + $winst;

		$arrayDump[] .= 'Na ' . $teller . ' jaar bedraagt het totaal bedrag ' . floor($totaal) . ' en is de winst voor dat jaar ' . floor($winst);

		if ($teller < $aantalJaar)
		{
			++$teller;
			return bereken( $totaal, $rente, $aantal );
		}
		
		return $arrayDump;
	}
	$start 	=	100000;
	$rente		=	8;
	$aantal		=	10;
	$totalewinst = bereken( $start, $rente, $aantal );
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht recursive</title>
	</head>
	<body>
		<ul>
			<?php foreach($totalewinst as $value): ?>
				<li><?php echo $value ?></li>
			<?php endforeach ?>
		</ul>
	</body>
</html>