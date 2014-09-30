<?php 
    $jaartal = 1904;
    if(($jaartal%4 == 0 && $jaartal%100 != 0) || $jaartal %400 == 0 )
    {
        $zin = "Het jaar ".$jaartal." is een schrikkeljaar";
    }
    else
    {
        $zin = "Het jaar ".$jaartal." is geen schrikkeljaar";
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else</title>
    </head>
    <body>
        <p><?= $zin?></p>
    </body>
</html>
