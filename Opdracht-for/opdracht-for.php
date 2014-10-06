<?php 
    $getallen = array();
    $hoeveelheid = 100;
    $getal = 0;
    for($getal; $getal < $hoeveelheid; $getal++)
    {
        $getallen[] = $getal;
    }

    $reeks = implode(', ', $getallen);

    $getal = 0;
    $getallen2 = array();
    for($getal; $getal < $hoeveelheid; $getal++)
    {
        if($getal%3 == 0 && $getal > 40 && $getal < 80)
        {
            $getallen2[] = $getal;
        }
    }
    $reeks2 =   implode( ', ', $getallen2 );
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht for</title>
    </head>
    <body>
        <p><?= $reeks ?></p>
        <p><?= $reeks2 ?></p>     
    </body>
</html>
