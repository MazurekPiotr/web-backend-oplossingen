<?php 
    session_start();
    if(isset($_POST['submit']))
        {
            try{
                
                $_SESSION['titel'] = $_POST['titel'];
                $_SESSION['artikel'] = $_POST['artikel'];
                $_SESSION['kernwoorden'] = $_POST['kernwoorden'];
                $_SESSION['datum'] = $_POST['datum'];
                $db = new PDO('mysql:host=localhost;dbname=mod-rewrite-blog', 'root', 'rtoip3107');
                $datum = date('Y-m-d', strtotime( $_SESSION['datum']));

                $string ='INSERT INTO artikels(titel,artikel,kernwoorden,datum)
                            VALUES(:titel,:artikel,:kernwoorden,:datum)';
                $statement = $db->prepare($string);
                $statement->bindParam(':titel', $_SESSION['titel']);
                $statement->bindParam(':artikel', $_SESSION['artikel']);
                $statement->bindParam(':kernwoorden', $_SESSION['kernwoorden']);
                $statement->bindParam(':datum', $datum);
                $isToegevoegd = $statement->execute();
                if($isToegevoegd)
                {
                    $_SESSION['added'] = true;
                    $insertedID = $db->lastInsertId();
                    $_SESSION['notification'] = "Artikel succesvol toegevoegd. Het unieke nummer van dit artikel is " . $insertedID;
                    header('Location: artikel-overzicht.php');
                    exit;
                }
                
            }
            catch(PDOException $e)
            {
                $_SESSION['added'] = false;
                $_SESSION['notification'] = "Artikel kon niet worden toegevoegd. Probeer opnieuw. " . $e->getMessage();
                header('Location: artikels-toevoegen-form.php');
                exit;
            }
        }
    
        
        
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Opdracht mod rewrite basis</title>
    </head>
    <body>
        <h1>Artikel toevoegen</h1>
        

    </body>
</html>