<?php 
    $text = "";
    $expression = "";
    $resultaat = null;
    if(isset($_POST['submit']))
    {
        $expression = $_POST['expression'];
        $text = $_POST['text'];
        $regEx = '/'.$expression.'/';
        $resultaat = preg_replace($regEx, '<b>#</b>', $text);
    }
    $text2= "Memory can change the shape of a room; it can change the color of a car. And memories can be distorted. They're just an interpretation, they're not a record, and they're irrelevant if you have the facts.";
    $expression2 = "/[a-du-zA-DU-Z]/";
    $resultaat2 = preg_match_all($expression2, $text2, $returnArray);
    $text3= "Zowel colour als color zijn correct Engels";
    $expression3 = "/color|colour/";
    $resultaat3 = preg_match_all($expression3, $text3, $returnArray);
    $text4 = "1020 1050 9784 1560 0231 1546 8745";
    $expression4 = "/1\w+/";
    $resultaat4 = preg_match_all($expression4, $text4, $returnArray);
    $text5 ="24/07/1978 en 24-07-1978 en 24.07.1978";
    $expression5 = "/[^ en]+/";
    $resultaat5 = preg_match_all($expression5, $text5, $returnArray);
?>
<!doctype html>
<html>
    <head>
    
    </head>
    <body>
        <h1>RegEx tester: deel 1</h1>
        <form method="POST">
            <p><label for="regex">Regular Expression</label></p>
            <p><input type="text" name="expression"></p>
            <p><label for="string">String</label></p>
            <p><textarea id="string" name="text" cols="30" rows="10"></textarea></p>
            <p><input type="submit" name="submit"></p>
        </form>
        <?php if($resultaat != null): ?>
            <?= $resultaat ?>
        <?php endif ?>
        <h1>Deel 2</h1>
        <?php var_dump($returnArray) ?>
    </body>
</html>