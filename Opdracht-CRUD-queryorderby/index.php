<?php
     try{
            if(isset($_GET['order_by']))
            {
                $orderArray = explode('-', $_GET['order_by']);
                $orderColumn = $orderArray[0];
                $order = $orderArray[1];
            }
            $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'rtoip3107');
            $order = 'ASC';
            $orderColumn = 'biernr';
            $string = 'SELECT bieren.biernr,
                              bieren.naam,
                              brouwers.brnaam,
                              soorten.soort,
                              bieren.alcohol
                        FROM bieren
                        INNER JOIN brouwers
                        ON bieren.brouwernr = brouwers.brouwernr
                        INNER JOIN soorten
                        ON bieren.soortnr = soorten.soortnr
                        ORDER BY '.$orderColumn .' '.$order;
            $statement = $db->prepare($string);
            $statement->execute();
            $fetchArray = array();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $fetchArray[] = $row;
            }
            $names = array();
            foreach ($fetchArray[0] as $key => $value) {
                $names[] = $key;
            }
        }
            catch(PDOException $e)
            {
                $message = "Er ging iets mis: " . $e->getMessage();
            }
?>
<!doctype html>
<html>
    <head>
    <style type="text/css">
        tr:nth-child(even){
            background-color: lightgrey
        }
    </style>
    </head>
    <body>
        <table>
            <thead>
                <?php foreach ($names as $value): ?>
                    <th class="order "><a href="index.php?order_by=<?= $value ?>-<?= ($order == 'ASC' && $orderColumn == $value)? 'DESC' : 'ASC'?>"><?= $value ?></a></th>
                <?php endforeach ?>
            </thead>
            <?php foreach ($fetchArray as $key => $bieren): ?>
                <tr>
                    <?php foreach ($bieren as $bierkey => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
        <?php var_dump($fetchArray) ?>
    </body>
</html>