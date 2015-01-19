<?php 
	session_start();
	$redirect = "index.php";
	
	function __autoload($classname)
	{
		require_once( './classes/'.$classname.'.php');
	}
	if(isset($_POST['submit']))
	{	
		try{
			$titel = $_POST['titel'];
			$artikel = $_POST['artikel'];
			$kernwoorden = $_POST['kernwoorden'];
			$time = strtotime($_POST["datum"]);
			$datum = date('Y-m-d', $time);

			$connection	= new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');

			$db = new Database($connection);

			$artikelData = $db->query('INSERT INTO artikels
									(titel, artikel, kernwoorden, datum)
									VALUES 
									(:titel, :artikel, :kernwoorden, :datum)', 
									array(':titel' => $titel,
										':artikel' => $artikel,
										':kernwoorden' => $kernwoorden,
										':datum' => $datum));
			if($artikelData){
				header('location: artikel-overzicht.php');
				$_SESSION['notification']['text'] = "Het artikel werd succesvol toegevoegd.";
				}
		}
		catch(PDOException $e){
		
			$_SESSION["notification"]['text'] = "Fout bij connectie database:". $e->getMessage();
			header("Location: artikel-toevoegen-form.php");
			
		}
		
		
	}
 ?>