<?php

	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$needle1 = "2";
	$needle2 = "8";
	$needle3 = "a";

	function tel_2($string, $needle)
	{
		$count = strlen($string);
		$aantal = substr_count($string, $needle);
		$procent = ($aantal / $count) * 100;
		return $procent;
	}

	function tel_8($needle)
	{
		global $md5HashKey;
		$string = $md5HashKey;
		$count =  strlen($string);
		$aantal = substr_count($string, $needle);
		$procent = ($aantal / $count) * 100;
		return $procent;
	}

	function tel_a($needle)
	{
		$string = $GLOBALS['md5HashKey'];
		$count =  strlen($string);
		$aantal = substr_count ($string, $needle);
		$procent = ($aantal / $count) * 100;
		return $procent;
	}

	$eerste = tel_2($md5HashKey, $needle1);
	$tweede = tel_8($needle2);
	$derde = tel_a($needle3);
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht functies gevorderd</title>
	</head>
	<body>
	<p><?= $eerste ?></p>
	<p><?= $tweede ?></p>
	<p><?= $derde ?></p>
	</body>
</html>