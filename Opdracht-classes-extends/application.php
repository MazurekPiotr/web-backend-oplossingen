<?php 
	function __autoload($klasse)
	{
		include 'classes/'. $klasse . '.php';
	}
	$krokodil = new Animal('krokodil','man', 150);
	$muis = new Animal('muis','vrouw',50);
	$paard = new Animal('paard', 'man', 100);
	$muis->changeHealth(20);
	$krokodil->changeHealth(-30);
	$paard->changeHealth(10);
	$simba = new Lion('Simba','man', 100, 'Congo lion');
	$scar = new Lion('Scar', 'man', 100, 'Kenia lion');
	$zebra1 = new Zebra('Zeke', 'man', 100, 'Quagga');
	$zebra2 = new Zebra('Zana', 'vrouw', 100, 'Selous');
?>
<html>
<head>
	<title>Opracht classes extend</title>
</head>
<body>
	<p><?= $krokodil->getName()?>, <?= $krokodil->getGender()?>, <?= $krokodil->getHealth()?> </p>
	<p><?= $muis->getName()?>, <?= $muis->getGender()?>, <?= $muis->getHealth()?></p>
	<p><?= $paard->getName()?>, <?= $paard->getGender()?>, <?= $paard->getHealth()?></p>
	<p><?= $paard->doSpecialMove()?></p>
	<p> De special move van <?= $simba->getName()?> (soort:<?= $simba->getSpecies()?>) : <?= $simba->doSpecialMove()?></p>
	<p> De special move van <?= $scar->getName()?> (soort:<?= $scar->getSpecies()?>) : <?= $scar->doSpecialMove()?></p>
	<p> De special move van <?= $zebra1->getName()?> (soort:<?= $zebra1->getSpecies()?>) : <?= $zebra1->doSpecialMove()?></p>
	<p> De special move van <?= $zebra2->getName()?> (soort:<?= $zebra2->getSpecies()?>) : <?= $zebra2->doSpecialMove()?></p>
</body>
</html>