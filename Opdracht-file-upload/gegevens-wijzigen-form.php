<?php 
    session_start(); 
    function __autoload($classname) {
        include_once ('./classes/'. $classname .'.php');
    }
    if(isset($_COOKIE['authenticated']))
    {
        $img = isset( $_SESSION['profileImg'] ) ? $_SESSION['profileImg'] : '';
        $explodedCookie = explode(",", $_COOKIE['authenticated']);
        $email = $explodedCookie[0];
        $top = '<a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als ' . $email . ' | <a href="logout.php">uitloggen</a> | <a href="artikel-overzicht.php">Terug naar overzicht</a>';
    }
?>

 <!doctype html>
 <html>
     <head>
         <title>Gegevens wijzigen</title>
     </head>
     <body>
        <div><?php if($top): ?>
            <?= $top ?>
        <?php endif ?></div>
     <h1>Gegevens wijzigen</h1>

     <form action="gegevens-bewerken.php" method="POST" enctype="multipart/form-data">

     	<img src="<?= $img ?>" alt="<?='Profile photo van '.$email ?>" class="profile_img">

     	<input type="file" name="file" class="file" ></input>

     	<input type="email" name="email" class="email" value="<?=(isset($_POST['email']) ? $_POST['email'] : $email )  ?>"></input>

     	<input id="submit" name="submit" type="submit" value="wijziging opslaan"></input>
    </form>

     </body>
 </html>