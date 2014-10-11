<?php 
    $password = 'azerty';
    $username = 'stijn';
    $message = 'Geef uw naam en paswoord in';

    if(isset($_POST['verzenden']))
    {
        if($_POST['naam'] == $username && $_POST['paswoord'] == $password)
        {
            $message = 'Welkom';
        }
        else
        {
            $message = 'Er ging iets mis bij het inloggen, probeer opnieuw.';
        }
    }


?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Opdracht post</title>
    </head>
    <body>
        <h1>Inloggen</h1>
        <form action='opdracht-post.php' method='post'>
            <?= $message ?>
            <p><label for="naam">Gebruikersnaam</label>
            <input type="text" name="naam" id="naam"> </p>
            <p><label for="paswoord">Paswoord</label>
            <input type="password" name="paswoord" id="paswoord"></p>
            <input type="submit"  name="verzenden" value="Verzenden">
        </form>
    </body>
</html>
