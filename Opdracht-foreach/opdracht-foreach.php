<?php
    $text = file_get_contents('text-file.txt');
    $textChars = str_split($text);
    arsort($textChars);
    $rev_sort = array_reverse($textChars);
    $teller = array();

    foreach($rev_sort as $value)
    {
        if ( isset ( $teller[ $value ] ) )
        {
            ++$teller[ $value ];
        }
        else
        {
            $teller[ $value ] = 1;
        }
        
    }
    
?>
    

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oplossing foreach</title>
    </head>
    <body>
        <?php foreach ($teller as $key => $value): ?>
                <li><?= $teller[$key]?></li>
            <?php endforeach ?>

    </body>
</html>