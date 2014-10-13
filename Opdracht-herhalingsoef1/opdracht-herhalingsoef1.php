<?php
$cursus = false;
$voorbeelden = false;
$oplossingen = false;
$link;
if(isset($_GET['link']))
{
	switch ($_GET['link']) {
		case 'cursus':
			$cursus = true;
			break;
		case 'voorbeelden':
			$voorbeelden = true;
			$link = "../*.php";
		case 'oplossingen':
			$oplossingen = true;
			break;
		default;
			# code...
			break;
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Opdracht herhalingsoefening 1</title>
	</head>
	<body>
		<div>
		<h1>Indexpagina</h1>
			
			<ul>
				<li><a href="opdracht-herhalingsoef1.php?link=cursus">Cursus</a></li>
				<li><a href="opdracht-herhalingsoef1.php?link=voorbeelden">Voorbeelden</a></li>
				<li><a href="opdracht-herhalingsoef1.php?link=oplossingen">Oplossingen</a></li>
			</ul>
			<form action="opdracht-herhalingsoef1.php" method="GET">
				<p><label for="zoek">Zoek naar:</label>
				<input type="text" id="zoek">
				<input type="submit" name="verzenden" value="verzenden">
				</p>
			</form>
			<h1>Inhoud</h1>
			<?php if($cursus): ?>
				<iframe src="web-backend-inleiding.pdf" width="1000px" height="750px"></iframe>
			<?php endif ?>
			
			<?php if($voorbeelden || $oplossingen): ?>
				<ul>
					<?php foreach ( glob($link) as $value ): ?>
						<li><?php echo $value ?></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		</div>

	</body>
</html>