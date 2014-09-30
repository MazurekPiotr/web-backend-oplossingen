<?php 
    $voornaam ="Piotr";
    $familienaam = "Mazurek";
    $volledigeNaam = $voornaam." ".$familienaam;
    $lengte = strlen($volledigeNaam);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string concatenate</title>
    </head>
    <body>
        <p><?php echo $volledigeNaam?></p>
        <p><?php echo $lengte ?></p>

    </body>
</html>
