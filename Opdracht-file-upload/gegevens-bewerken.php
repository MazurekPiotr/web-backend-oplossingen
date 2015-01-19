<?php 
	session_start();
	function __autoload($class) {
		require_once('/classes/'.$class . '.php');
	}
	if(isset($_POST['submit'])) {
		if (checkFile($_FILES['file'])) {
				$stamp = uniqid();
				
				define('ROOT', dirname(__FILE__));
				while (file_exists(ROOT . "/img/" . $stamp . '_' . $_FILES["file"]["name"])) {
					var_dump('Regenerate stamp');
					$stamp = uniqid();
				}
				move_uploaded_file($_FILES['file']['tmp_name'], (ROOT . "/img/" . $stamp . '_' . $_FILES["file"]["name"]));
			
				$_SESSION['profilePicture'] = $stamp . '_' . $_FILES["file"]["name"];

				$connection	= new PDO('mysql:host=localhost;dbname=file-upload', 'root', 'rtoip3107');

				$db = new Database($connection);

				$artikelData = $db->query('UPDATE users
									(profile_picture)
									VALUES 
									(:picture)
									WHERE email = :email', 
									array(':picture' => $_FILES['file']['name'],
										':email' => $_POST['email']));
			}
			header('location: gegevens-wijzigen-form.php');
	}
	else {
		User::logout();
		new Notification('Error', 'Deze gebruiker kon niet gevalideerd worden, log terug in!');
		header('location: registration-form.php');
	}





	function checkFile($file) {
		if (($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg")
		 || ($file["type"] == "image/png")  || ($file["type"] == "image/gif")) {
			if ($file['size'] <= 2000000) {
				if ($file["error"] < 0)
					new Notification('Error', 'Er is iets fout gegaan met het bestand te uploaden, probeer opnieuw!');
				else return true;
			} else
				new Notification('Error', 'Bestand groter dan maximum grootte 2Mb!');
		} else
			new Notification('Error', 'Je kan enkel png, jpg, jpeg en gif afbeeldingen toevoegen!');
		header('location: gegevens-wijzigen-form.php');
	}
 ?>