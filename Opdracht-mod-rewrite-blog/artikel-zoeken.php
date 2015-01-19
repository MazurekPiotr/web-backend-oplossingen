<?php 
session_start(); 
function __autoload($classname) {
    include_once ('./classes/'. $classname .'.php');
}
$artikels = false;
$keyword = false;
$datum = false;
if (isset( $_GET['query-content'] ) ) {
	
	try {
		$keyword = '%'.$_GET['query-content'].'%';
		$_SESSION['keyword'] = strtoupper( $_GET['query-content'] ) ;
        $valToBind = array( ':keyword' => $keyword );
        $connection = new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');
        $db = new Database($connection);
        $fetchedArtikels = $db->query('SELECT * FROM artikels WHERE artikel LIKE :keyword', $valToBind);
        $artikels = $fetchedArtikels['data'];
		$_SESSION['artikels'] = $artikels;
		
		
	} catch (PDOException $e) {
		
        header( 'Location: artikel-overzicht.php' );
	}
}
elseif( isset( $_GET['datum'] ) ) {
	
	try {
		$datum = $_GET['datum'];
		$_SESSION['dateSearch'] = '%'.$datum.'%';
		$valToBind = array( ':datum' => $datum );
        $connection = new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');
        $db = new Database($connection);
        $fetchedArtikels = $db->query('SELECT * FROM artikels WHERE datum LIKE :datum', $valToBind);
        $artikels = $fetchedArtikels['data'];

		
	} catch (PDOException $e) {
        header( 'Location: artikel-zoeken.php' );
	}
}
$artikels = isset( $_SESSION['artikels'] ) ? $_SESSION['artikels'] : false;
$keyword = isset( $_SESSION['keyword'] ) ? $_SESSION['keyword'] : false;
$email = isset($_SESSION['login']['email']) ? $_SESSION['login']['email'] : '';
 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Overzicht artikels</title>
     </head>
     <body>

     <header>
     

     <a href="artikels/">Terug naar artikels overzicht</a> | Ingelogd als <a href="<?='mailto:$email'  ?>"><a href="">test@test.be</a>  <?=$email  ?> </a>  | <a href="logout.php">uitloggen</a>

     </header>

    <div class="container">

	<h1>Zoek resultaat</h1>

    <div class="search-block">
       
    <form action="zoeken/" method="GET">
        
        <input  type="text" 
                class="search" 
                name="query-content" 
                value="Search..." 
                onblur="if(this.value==''){this.value='Search...'}" 
                onclick="if(this.value=='Search...'){this.value=''}">
        </input>

        <input  type="submit" 
                class="btn_search" 
                name="btn_search" 
                value="zoeken">
        </input>

    </form>

    <form action="zoeken/" method="GET">
        
    <select name="datum">
        <option value = "2015">2015</option>
        <option value = "2013">2013</option>
        <option value = "2012">2012</option>
    </select>
    
    <input type="submit" name="date_search" value="zoeken op datum"></input>

    </form>

   </div>

    <a href="/toevoegen">Voeg een artikel toe</a>

    <?php if ( $artikels && $keyword ): ?>
        <section id='artikel'>

        <p>Artikels die het woord "<?=$keyword ?>"  bevatten</p>

        <?php  foreach ($artikels as $key => $value): ?>
                <article>
                <h2><?=$value['titel'] ?> | <?=$value['datum'] ?></h2>
                <p><?=$value['artikel'] ?></p>
                <p><span>Kernwoorden: </span><a href=""><?=$value['kernwoorden'] ?></a></p>
                <p><a href="artikel-wijzigen-form.php?artikel=<?=$key ?>">artikel wijzigen</a> | <a href="artikel-activeren.php?artikel=<?=$key ?>">artikel <?=( ($value['is_active'] == 0) ? 'activeren' : 'deactiveren' ) ?></a> | <a href="artikel-verwijderen.php?artikel=<?=$key ?>">artikel verwijderen</a></p>
                </article>
        <?php endforeach; ?> 
        </section>

    <?php elseif( !$artikels && $keyword ): ?>
    <p>Geen artikels gevonden, die het woord "<?=$keyword ?>"  bevatten</p>
    
    <?php else: ?>
        <section>

        <?php  foreach ($alleArtikels as $key => $value): ?>
                <article>
                <h2><?=$value['titel'] ?> | <?=$value['datum'] ?></h2>
                <p><?=$value['artikel'] ?></p>
                <p><span>Kernwoorden: </span><a href=""><?=$value['kernwoorden'] ?></a></p>
                <p><a href="artikel-wijzigen-form.php?artikel=<?=$key ?>">artikel wijzigen</a> | <a href="artikel-activeren.php?artikel=<?=$key ?>">artikel <?=( ($value['is_active'] == 0) ? 'activeren' : 'deactiveren' ) ?></a> | <a href="artikel-verwijderen.php?artikel=<?=$key ?>">artikel verwijderen</a></p>
                </article>
        <?php endforeach; ?>

        </section>
    <?php endif ?>

    </div>

     </body>
 </html>