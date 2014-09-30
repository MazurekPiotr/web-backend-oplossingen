<?php $lettertje = "e";
	  $cijfertje = 3;
      $langsteWoord = "zandzeepsodemineralenwatersteenstralen";
      $alle_e = str_replace($lettertje, $cijfertje, $langsteWoord)
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string extra functions</title>
    </head>
    <body>
        <p><?php echo $alle_e ?></p>

    </body>
</html>