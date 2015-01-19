<?php 
	
	session_start();
	
	function __autoload($class) {
		require_once($class . '.php');
	}
	
	if(isset($_GET["artikel"])){
	
		try{
			
			$connection = new PDO("mysql:host=localhost;dbname=crud-cms", "root", "rtoip3107");
			$db = new Database($connection);
			$fetched = $db->query("UPDATE artikels SET is_active = IF(is_active =1, 0, 1) WHERE `id` = " . $_GET["artikel"]);
			
			if($fetched["isexexuted"]){
				$_SESSION['notification']['text'] = "artikel is succesvol geactiveerd.";
				
				header("Location: artikel-overzicht.php");
			}
			else{
				$_SESSION['notification']['text'] = "Kon artikel niet activeren.";
				
				header("Location: artikel-overzicht.php");
			}
			
		}
		catch(PDOException $e){
		
			$_SESSION['notification']['text'] = "Fout bij connectie database:". $e->getMessage();
			header("Location: artikel-overzicht.php");
			
		}
		
	}
	else{
		
		$_SESSION['notification']['text'] = "Er is een probleem.";
				
		header("Location: artikel-overzicht.php");
		
	}
	
?>