<?php
	require_once('../classes/Database.class.php'); 
	require_once('../classes/Activity.class.php');

	class ActivityDAO{
		public function __construct(){
			
		}
		
		public function findActivityById($identifiant) // return String
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
		public function addActivity($activity){ // Return String 
			$db = Database::getInstance(); 
			$identifiant = $activity.getIdentifiant(); 
			$duree = $activity.getDuree(); 
			$date = $activity.getDate(); 
			$description = $activity.getDescription(); 
			$request = "INSERT INTO Activity(`identifiant`, `nom`, `duree`, `date`) VALUES('$identifiant', '$identifiant', '$duree', '$date', '$description')";
			$pstmt = $db->prepare(); 
			$result = $db->execute(); 
			if ($result)
				return "Activity successfuly deleted ! "; 
			return "Failed to delete the Activity, please try again or call the admin if the problem persist"; 
		}
		public function removeActivity($id){
			
		}
		
	}
?>