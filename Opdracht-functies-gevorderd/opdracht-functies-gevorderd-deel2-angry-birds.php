<?php

	$pigHealth = 5;
    $maximumThrows = 8;

    $spelverloop = array();

    function calculateHit( )
    {
        global $pigHealth;
        $dataArray = array();
        $raakkans = rand(0,9);
        $geraakt = ($raakkans <= 3) ? true : false;
        if ($geraakt)
        {
            --$pigHealth;
            $dataArray['isHit'] = true;
            $dataArray['string'] = 'Raak! Er zijn nog maar ' . $pigHealth . ' varkens over.'; 
        }
        else
        {
            $dataArray['isHit'] = false;
            $dataArray['string'] = 'Mis! Nog ' . $pigHealth . ' varkens in het team.';
        }

        return $dataArray;
    }

    function launchAngryBird( $maximumThrows,   )
    {
        global $maximumThrows;
        global $pigHealth;
        global $spelverloop;

        if ($maximumThrows != 0 && $pigHealth > 0)
        {
            $hit = calculateHit();
            
            --$maximumThrows;

            $spelverloop[] = $hit['string'];

            launchAngryBird();
        }
        else
        {
            if ( $pigHealth > 0 )
            {
               $spelverloop[] = 'Verloren.'; 
            }
            else
            {
                $spelverloop[] = 'Gewonnen!';
            }
        }
    } 
    launchAngryBird( $maximumThrows, );
?>
	

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Opdracht functies gevorderd deel 2 (Angry birds)</title>
    </head>
    <body>
        <ul>
            <?php foreach($spelverloop as $value): ?>
                <li><?= $value ?></li>
            <?php endforeach ?>
        </ul>
    </body>
</html>
