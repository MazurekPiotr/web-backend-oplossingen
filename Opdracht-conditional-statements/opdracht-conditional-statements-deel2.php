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
    $uppercase = strtoupper($dag);
    $uppercase_a = str_replace("A", "a", $uppercase);
    $laatste_a = strrpos($uppercase, "A");
    $upper_zonder_a = substr_replace($uppercase, "a", $laatste_a, 1);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht Conditionals statement deel 2</title>
    </head>
    <body>
        <p><?php echo $teller?></p>
        <p><?php echo $dag?></p>
        <p><?= $uppercase?></p>
        <p><?= $uppercase_a?></p>
        <p><?= $upper_zonder_a?></p>
    </body>
</html>
