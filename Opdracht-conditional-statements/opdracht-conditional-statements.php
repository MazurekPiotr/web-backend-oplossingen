<?php 
    $teller = 1;
    $dag;
    if($teller == 1)
    {
        $dag = "maandag";
    }
    if($teller == 2)
    {
        $dag = "dinsdag";
    }
    if($teller == 3)
    {
        $dag = "woensdag";
    }
    if($teller == 4)
    {
        $dag = "donderdag";
    }
    if($teller == 5)
    {
        $dag = "vrijdag";
    }
    if($teller == 6)
    {
        $dag = "zaterdag";
    }
    if($teller == 7)
    {
        $dag = "zondag";
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string concatenate</title>
    </head>
    <body>
        <p><?php echo $teller?></p>
        <p><?php echo $dag?></p>
       
    </body>
</html>
