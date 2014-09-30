<?php

    $tijd['seconden']   =   221108521;
    $tijd['minuten'] = $tijd['seconden']/60;
    $tijd['uren'] = $tijd['minuten']/60;
    $tijd['dagen'] = $tijd['uren'] /24;
    $tijd['weken'] = $tijd['dagen']/7;
    $tijd['maanden'] = $tijd['weken']/4.5;
    $tijd['jaren'] = $tijd['maanden']/12;

    foreach ($tijd as $key => $value) {
        $tijd[$key] = round($tijd[$key]);
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else deel 2</title>
    </head>
    <body>
        <p>In <?= $tijd['seconden']?> zitten er:</p>
        <p><ul><?php foreach ($tijd as $key => $value): ?>
        
            <li><?= $key.' : '.$value?></li>
            
        
        <?php endforeach ?>
        </ul></p>
    </body>
</html>
