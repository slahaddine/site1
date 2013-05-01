<?php
	require_once('../classes/Database.class.php'); 
	require_once('../classes/Activity.class.php');

	class ActivityDAO{
		public function __construct(){
			
		}
		
		public function findActivityById($identifiant)
		{
			$db = Database::getInstance(); 
			$request = "SELECT * FROM Activity WHERE identifiant=:x"; 
			$pstmt = $db->prepare($request); 
			$result = $stnt->execute(array(":x" => $identifiant)); 
			if ($result){
				$informations = array(); 
				$informations = $pstmt->fetch(PDO::FETCH_OBJ);
				return $informations; 
			}else{
				return null; 
			}
		}
	}
?>