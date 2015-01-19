<?php
	
	class Database{
		
		private $db;
		
		function __construct($db){
			$this->db = $db;
		}
		
		public function query($query, $token = false){
			
			$statement = $this->db->prepare($query);
			
			if($token){
				foreach($token as $token => $value){
					$statement->bindValue($token, $value);
				}
			}
			
			$isexecuted = $statement->execute();
			
			$fetched = array();
		
			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ))
			{
				$fetched[]	=	$row;
			}
			
			$dbData = array("isexexuted"=> $isexecuted, "data"=> $fetched);
			
			return $dbData;
		
			
		}
		
	}
	
	
?>