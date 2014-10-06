<?php

    $rijen      =   10;
    $kolommen     =   10;
    $rij      =   0;
?>
    

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oplossing while deel2</title>
        <style>
            
            .even
            {
                background-color    :   lightgreen;
            }

        </style>
    </head>
    <body>
        
        <h1>Oplossing while deel2</h1>

        <table>
            <?php while( $rij < $rijen ):  ?>
                
                <tr>
                    <?php 
                        $kolom =  1;
                    ?>
                    <?php while( $kolom <= $kolommen ):  ?>

                        <td class="<?= (($rij * $kolom) % 2 > 0) ? '' : 'even' ?>"><?= $rij * $kolom ?></td>
                        <?php $kolom++ ?>
                    <?php endwhile ?>
                </tr>

                <?php $rij++ ?>
            <?php endwhile ?>
        </table>

    </body>
</html>