<?php 
    $dieren[0] = "hond";
    $dieren[1] = "walvis";
    $dieren[2] = "kat";
    $dieren[3] = "schaap";
    $dieren[4] = "dolfijn";
    $dieren[5] = "rat";
    $dieren[6] = "muis";
    $dieren[7] = "luipaard";
    $dieren[8] = "leeuw";
    $dieren[9] = "panter";
    $dieren = array("hond", "walvis", "kat", "schaap", "dolfijn", "rat", "muis", "luipaard", "leeuw", "panter");

    $voertuigen = array("landvoertuigen" =>  array("Vespa", "fiets"),
                        "watervoertuigen" => array("surfplank", "vlot", "schoener", "driemaster"),
                        "luchtvoertuigen" => array("luchtballon", "helicopter", "B52"))
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis</title>
    </head>
    <body>
    <?php var_dump($dieren) ?>
    <?php var_dump($voertuigen)?>
    </body>
</html>
