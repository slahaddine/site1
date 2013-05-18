<?php
	require_once('Database.class.php'); 
	require_once('Activity.class.php');
	require_once('ListeActivity.class.php');

	class ActivityDAO{ // findById, findAll, remove, add, update; 
		public function __construct(){
			
		}
		
		public function findActivityById($identifiant) // return String
		{
			$db = Database::getInstance(); 
			$request = "SELECT * FROM activity WHERE identifiant=:x"; 
			$pstmt = $db->prepare($request); 
			$pstmt->execute(array(":x" => $identifiant)); 
			$result = $pstmt->fetch(PDO::FETCH_OBJ); 
			
			if ($result){
				$activity = new Activity($result->identifiant, $result->date, $result->duree, $result->description, $result->lieu, $result->nbpersonnes, $result->isInscription, $result->datelimite, $result->cout); 
				return $activity; 
			}else{
				echo "The Activity doesn't exist "; 
				return null; 
			}
		}
		public function findAllActivity($method){
			try {	
				$db = Database::getInstance(); 
				if($method == 0){
					$list = new ListeActivity(); 
					$request = "SELECT * FROM Activity ORDER BY date; "; 
					$result = $db->query($request); 
					foreach($result as $row){
						$temporaryActivity = new Activity(); 
						$temporaryActivity->loadFromRecord($row); 
						$list->add($temporaryActivity); 
					}
					$result->closeCursor(); 
					$db = null; 
					return $list; 
				}else if ($method == 1){
					$request = "SELECT * FROM Activity ORDER BY date; "; 
					$result = $db->query($request);
					$obj = $result->fetchAll(); 
					$jsonObj = json_encode($obj);
					$db = null;
					return $jsonObj; 
				}else {
					$db = null; 
					return false; 
				}
				
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage() . "<br/>";
		   		return $list;
			}
			
		}
		public function addActivity($activity){ // Return String 
			$db = Database::getInstance(); 
			$identifiant = $activity->getIdentifiant(); 
			$duree = $activity->getDuree(); 
			$date = $activity->getDate(); 
			$description = $activity->getDescription(); 
                        $cout = $activity->getCout() ;
                        $datelimite = $activity->getDateLimite() ;
                        $nbPersonnes =$activity->getNbPersonnes() ; 
                        $inscriptionRequise = $activity->isInscriptionRequise() ;
                        $lieu = $activity->getLieu(); 
			$request = "INSERT INTO Activity(`identifiant`, `duree`, `date`, `description`, `cout`, `nbpersonnes`, `datelimite`, `isInscription`, `lieu`) VALUES('$identifiant', '$duree', '$date', '$description', '$cout', '$nbPersonnes', '$datelimite', '$inscriptionRequise', '$lieu')";
			$pstmt = $db->prepare($request); 
			$result = $pstmt->execute(); 
			if ($result)
				return "Activity successfuly added ! "; 
			return "Failed to add the Activity, please try again or call the admin if the problem persist"; 
		}
		public function removeActivity($id){
			$db = Database::getInstance(); 
			$request = "DELETE FROM Activity WHERE identifiant=:x";
			$pstmt = $db->prepare($request); 
			$result = $pstmt->execute(array(':x' => $id )); 
			if ($result)	
				return "Activity successfuly deleted ! "; 
			return "Failed to delete the Activity, please try again or call the admin if the problem persist"; 
		}
		
		public function updateActivity($activity){
			$db = Database::getInstance(); 
			$identifiant = $activity->getIdentifiant(); 
			$duree = $activity->getDuree();
			$date = $activity->getDate();
			$description = $activity->getDescription(); 
			//UPDATE `site`.`activity` SET `description` = 'Everything vds' WHERE `activity`.`id` =6;
			//$request = "UPDATE `site`.`activity` SET `duree`='$duree', `date`='$date', `description`='$description' WHERE identifiant='$identifiant'"; 
			$request = "UPDATE `site`.`activity` SET `duree`=:w, `date`=:z, `description`=:y WHERE identifiant=:x;"; 
			$pstmt = $db->prepare($request); 
			$result = $pstmt->execute(array(':x' => $identifiant, ':y' => $description, ':z' => $date, ':w' => $duree)); 
			if ($result)
				return "Activity successfuly updated !"; 
			return "Failed to update the activity !";
		}
		
	}
?>
