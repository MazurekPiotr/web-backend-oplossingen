<?php 
session_start(); 
function __autoload($classname) {
    include_once ('./classes/'. $classname .'.php');
}
//___destroy session__//
if(isset($_SESSION['notification']))
{
	$message = $_SESSION['notification'];
}
if (isset($_GET['session'])) {
    
    if ($_GET['session'] === 'destroy') {
        session_destroy();
        Header('Location: artikels/');
    }
}
$connection = new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');
$db = new Database($connection);
$fetchedArtikels = $db->query("SELECT * FROM artikels");
$artikels = $fetchedArtikels['data'];

$email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
var_dump($_SESSION);
var_dump($_GET);
 ?>

 <!doctype html>
 <html>
     <head>
         <title>Overzicht artikels</title>
     </head>
     <body>
     <a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <a href="<?='mailto:$email'  ?>"><a href="">test@test.be</a>  <?=$email  ?> </a>  | <a href="logout.php">uitloggen</a>


	<h1>Overzicht van de artikels</h1>
	<?php if ($message): ?>
           <?= $message ?>
        <?php endif ?>

    <form action="artikel-zoeken.php" method="GET">
        
        <input  type="text"  
                name="query-content" 
                value="Search..." 
        </input>

        <input  type="submit" 
                name="btn_search" 
                value="zoeken">
        </input>

    </form>

    <form action="artikel-zoeken.php" method="GET">
        
    <select id="datum_select" name="datum">
        <option value = "2014">2014</option>
        <option value = "2013">2013</option>
        <option value = "2012">2012</option>
    </select>
    
    <input type="submit" name="jaar" value="zoeken op datum"></input>

    </form>

    <a href="toevoegen/">Voeg een artikel toe</a>

    <?php if ($artikels): ?>
        <?php  foreach ($artikels as $key => $value): ?>
                <article?>">
                <h2><?=$value['titel'] ?> | <?=$value['datum'] ?></h2>
                <p ><?=$value['artikel'] ?></p>
                <p><span>Kernwoorden: </span><a href=""><?=$value['kernwoorden'] ?></a></p>
                <p><a href="artikel-wijzigen-form.php?artikel=<?=$key ?>">artikel wijzigen</a> | <a href="artikel-activeren.php?artikel=<?=$key ?>">artikel <?=( ($value['is_active'] == 0) ? 'activeren' : 'deactiveren' ) ?></a> | <a href="artikel-verwijderen.php?artikel=<?=$key ?>">artikel verwijderen</a></p>
                </article>
        <?php endforeach; ?>
    <?php endif ?>
     </body>
 </html>