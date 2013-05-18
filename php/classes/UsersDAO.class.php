<?php
	ob_start();
	require_once('Users.class.php');
	require_once('Database.class.php');  
	class UsersDAO{
	//	private $db; 
		private $ver; 
		private $verD; 
		public function __construct(){
			$this->ver = false; 
			$this->verD = false; 
			$db = Database::getInstance(); 
		}
		public function findUserById($username){
			$db = Database::getInstance(); 
			/*$informations = array(); 
			$fetchResult = array(); */
			$request = "SELECT * FROM users WHERE username='".$username."'";
			$pstmt = $db->prepare($request); 
			$pstmt->execute();
			
			$result = $pstmt->fetch(PDO::FETCH_OBJ); 
			 
			if ($result){
				$u = new Users($result->username, $result->password, $result->firstname, $result->name, $result->email);
			//	$u->setUsername($result->username); 
			//	$msg = $u->toString(); 
			//	return $msg; 
				return $u; 
			}else
				echo "ECHEC USERSDAOS"; 
			/*	$informations["username"] = $fetchResult["username"]; 
				$informations["password"] = $fetchResult["password"]; 
				$informations["name"] = $fetchResult["name"]; 
				$informations["firstname"] = $fetchResult["firstname"]; 
			/*	if ($informations["privilege"]=="admin"){
					$_SESSION["privilege"] = "admin";
				}else 
					$_SESSION["privilege"] = "user"; 
				return $informations; 
			}else{
				return "Username not found !"; 
			}*/
				
		}
		public function findAllUsers(){
			$db = Database::getInstance(); 
			$listUsers = new ListeUsers(); 
			$request = "SELECT * FROM users ORDER BY privilege; "; 
			$result = $db->query($request); 
			foreach($result as $row){
					$temporaryUser = new Users("","","","",""); 
					$temporaryUser->loadFromRecord($row); 
					$listUsers->add($temporaryUser); 
				}
			$result->closeCursor(); 
			$db = null; 
			return $listUsers; 
			
		}
		public function inscription($user){
		$this->ver = true; 
		$db = Database::getInstance();
			//if($this->verification($user->getUsername())) {
				$username = $user->getUsername(); 
				$password = $user->getPassword(); 
				$email = $user->getEmail(); 
				$name = $user->getName(); 
				$firstname = $user->getFirstName(); //On Rajouter les privilèges pour voir si c'est un amdin ou pas, tous les utilisateurs son user et NON admin par défault
				$requestStr = "INSERT INTO users(`username`, `password`, `email`, `name`, `firstname`, `privilege`) VALUES('$username', '$password', '$email', '$name', '$firstname', 'user');";
				$result = $db->query($requestStr); 
				if($result)
					return "Account successfuly created";
				return "Username already exists"; 
			//}else
			//	return "Username already exists"; 
			
		}
		private function verification($username){
			$db = Database::getInstance();
			if (!$this->ver)
				return false; 
			$this->ver = false; 
			$r = "SELECT * FROM users WHERE username='$username'"; 
			$r = $db->prepare($r);
			$s = $r->execute();
			if(!$s->num_rows > 0 )
				return true;
			return false; 
		}
		public function supression($username, $password, $email){
			$db = Database::getInstance(); 
			$this->verD = true; 
			//if ($this->deleteVerification($username, $password, $email)){
				$req = "DELETE FROM users WHERE username='$username' AND password='$password' AND email='$email'";
				$pstmt = $db->exec($req);
				if ($pstmt)
					echo "Account Successfuly deleted "; 
				else 
					echo "Something went wrong, account isn't deleted :S "; 
			//}else 
			//	echo "Wrong informations :S "; 			
		}
		public function deleteVerification($username, $password, $email){
			$db = Database::getInstance();
			if(!$this->verD)
				return false; 
			$this->verD = false; 
			$request = "SELECT * FROM users WHERE username='$username' AND password='$password' AND email='$email';"; 
			$result = $db->query($request);
			return (mysql_num_rows($result)==1)?true:false; 			
		}
		
		public function connection($username, $password){
			try{
			$db = Database::getInstance();
			}catch(Exception $e){
				echo $e;
			}
			$request = "SELECT * FROM users WHERE username=:x;";
			$pstmt = $db->prepare($request); 
			$pstmt->execute(array(':x' => $username)); 
			$result = $pstmt->fetch(PDO::FETCH_OBJ);
			//$result = $db->query($request); 
			if ($result){
				if ($result->password == $password){
					session_start(); 
				/*	$informations = array(); 
					$informations = $pstmt->fetch(PDO::FETCH_OBJ);	*/				
					$_SESSION["connected"] = true;
					$_SESSION["username"] = $username; 
					$_SESSION["name"] = $result->name; 
					$_SESSION["firstName"] = $result->firstname; 
					$_SESSION["email"] = $result->email;
					$_SESSION["privilege"] = $result->privilege; 
					$_SESSION["ver"] = true;  
					return true; 
				}else 
					return false; 
			}else 
				return false;  			
		}
		public function updateUser($id, $user){
			$db = Database::getInstance(); 
			$username = $user->getUsername(); 
			$password = $user->getPassword(); 
			$name = $user->getName(); 
			$fName = $user->getFirstName();
			$email = $user->getEmail(); 
			$privilege = $user->getPrivilege(); 
			$request = "UPDATE `site`.`users` SET `username`=:x, `password`=:z, `name`=:y , `firstname`=:v, `email`=:q, `privilege`=:r WHERE username=:w;"; 
			$pstmt = $db->prepare($request); 
			$result = $pstmt->execute(array(':x' => $username, ':y' => $name, ':z' => $password, ':v' => $fName, ':q' => $email, ':r' => $privilege, ':w' => $id)); 
			if ($result)
				return "User successfuly updated !"; 
			return "Failed to update the user !";
		
		}
	}	
?>