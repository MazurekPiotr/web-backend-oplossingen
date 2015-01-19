<?php 
	session_start();
	$redirect = "index.php";
	
	function __autoload($classname)
	{
		require_once( './classes/'.$classname.'.php');
	}
	if(isset($_POST['submit']))
	{	
		$titel = $_POST['titel'];
		$artikel = $_POST['artikel'];
		$kernwoorden = $_POST['kernwoorden'];
		$datum = $_POST['datum'];

		$connection	= new PDO('mysql:host=localhost;dbname=crud-cms', 'root', 'rtoip3107');

		$db = new Database($connection);

		$artikelData = $db->query('INSERT INTO artikels
								(email, artikel, kernwoorden, datum, is_active, is_archived)
								VALUES 
								(:titel, :artikel, :kernwoorden, :datum, null, null)', 
								array(':titel' => $titel,
									':artikel' => $artikel,
									':kernwoorden' => $kernwoorden,
									':datum' => $datum));
		if($artikelData){
			header('location: artikel-overzicht.php');
		}
	}
 ?>