<?php

    $rijen      =   10;
    $kolommen     =   10;
    $rij      =   0;
?>
    

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oplossing for deel2</title>
        <style>
            
            .even
            {
                background-color    :   lightgreen;
            }

        </style>
    </head>
    <body>
        <table>
            <?php for($rij; $rij < $rijen; $rij++):  ?>
                
                <tr>
                    <?php 
                        $kolom =  1;
                    ?>
                    <?php for($kolom; $kolom < $kolommen; $kolom++ ):  ?>

                        <td class="<?= (($rij * $kolom) % 2 > 0) ? '' : 'even' ?>"><?= $rij * $kolom ?></td>
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
        </table>

    </body>
</html>