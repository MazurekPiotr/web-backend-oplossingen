<?php
	
	session_start();
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	if(isset($_POST["wijzigen"])){
							
		try{
		
			$connection = new PDO("mysql:host=localhost;dbname=crud-cms", "root", "rtoip3107");
			$db = new Database($connection);
			$fetched = $db->query("UPDATE `artikels` 
								SET `titel`= :titel,
							        `kernwoorden`= :kernwoorden,
							        `artikel`= :artikel,
							        `datum`= :datum
								WHERE id = :id", array(":titel" => $_POST["titel"], ":kernwoorden" => $_POST["kernwoorden"], ":artikel" => $_POST["artikel"], ":datum" => $_POST["datum"], ":id" => $_POST["id"]));
								
			if($fetched["isexexuted"]){
			
				$_SESSION['notification']['text'] = "Het artikel werd succesvol gewijzigd";
				
				header("Location: artikel-overzicht.php");
				
			}
			else{
				
				$_SESSION['notification']['text'] = "Het artikel kon niet gewijzigd worden";
				
				header("Location: artikel-wijzigen-form.php?artikel=" . $_POST["id"]);
				
			}
			
		}
		catch(PDOException $e){
		
			$_SESSION['notification']['text'] = "Fout bij connectie database:". $e->getMessage();
			header("Location: artikel-overzicht.php");
			
		}
		
	}


 

?>