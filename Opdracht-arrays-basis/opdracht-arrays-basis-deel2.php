<?php 
    $getallen = array(1,2,3,4,5);
    $oneven = array();
    $omgekeerd = array_reverse($getallen);
    $product = array_product($getallen);
    $optelling = array();

    foreach ($getallen as $key => $value) {
        if($getallen[$key]%2 == 1)
        {
            $oneven[] = $getallen[$key];
        }
    }

    foreach ($getallen as $key => $value) {
        if(isset($omgekeerd[$key]))
        {
            $optelling[$key] = $omgekeerd[$key] + $value;
        }
    }
    
    


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis deel 2</title>
    </head>
    <body>
    <?= $product ?>
    <ul><?php foreach ($oneven as $key => $value): ?>
        <li><?= $oneven[$key]?></li>
    <?php endforeach ?></ul>
    <ul><?php foreach ($optelling as $key => $value): ?>
        <li><?= $optelling[$key]?></li>
    <?php endforeach ?></ul>
    </body>
</html>
