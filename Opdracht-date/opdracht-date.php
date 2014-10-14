<?php 
	$timestamp = mktime(22,35, 25, 21, 1, 1904);
	$datum = strftime('%d %B %Y, %H:%M:%S', $timestamp);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Opdracht date</title>
	</head>
	<body>
		<?= $datum ?>
	</body>
</html>