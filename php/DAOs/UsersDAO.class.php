<?php
	require_once('../classes/Users.class.php');
	require_once('../classes/Database.class.php');  
	class UsersDAO{
	//	private $db; 
		private $ver; 
		private $verD; 
		public function __construct(){
			$this->ver = false; 
			$this->verD = false; 
			$db = Database::getInstance(); 
		}
		public function findById($username){
			$db = new Database(); 
			$informations = array(); 
			$fetchResult = array(); 
			$request = "SELECT * FROM Users WHERE username='$username'";
			$result = $db->query($request);
			if ($result){
				$fetchResult = mysql_fetch_array($result); 
				$informations["username"] = $fetchResult["username"]; 
				$informations["password"] = $fetchResult["password"]; 
				$informations["name"] = $fetchResult["name"]; 
				$informations["firstname"] = $fetchResult["firstname"]; 
				if ($informations["privilege"]=="admin"){
					$_SESSION["privilege"] = "admin";
				}else 
					$_SESSION["privilege"] = "user"; 
				return $informations; 
			}else{
				return "Username not found !"; 
			}
				
		}
		public function findAll($id){
			//A FAIRE 
		}
		public function inscription($user){
		$this->ver = true; 
		$db = Database::getInstance();
			if($this->verification($user->getUsername())) {
				$username = $user->getUsername(); 
				$password = $user->getPassword(); 
				$email = $user->getEmail(); 
				$name = $user->getName(); 
				$firstname = $user->getFirstName(); //On Rajouter les privilèges pour voir si c'est un amdin ou pas, tous les utilisateurs son user et NON admin par défault
				$requestStr = "INSERT INTO users(`username`, `password`, `email`, `name`, `firstname`, `user`) VALUES('$username', '$password', '$email', '$name', '$firstname', user);";
				$result = $db->query($requestStr); 
				if($result)
					return "Account successfuly created";
				return "Failed to create new account "; 
			}else
				return "Username already exists"; 
			
		}
		public function verification($username){
			$db = Database::getInstance();
			if (!$this->ver)
				return false; 
			$this->ver = false; 
			$r = "SELECT * FROM users WHERE username='$username'"; 
			$s = $db->query($r);
			return ( mysql_num_rows($s) <= 0)?true:false; 
		}
		public function supression($username, $password, $email){
			$db = Database::getInstance(); 
			$this->verD = true; 
			if ($this->deleteVerification($username, $password, $email)){
				$req = "DELETE FROM users WHERE username='$username' AND password='$password' AND email='$email'";
				$r = mysql_query($req);
				if ($req)
					echo "Account Successfuly deleted "; 
				else 
					echo "Something went wrong, account isn't deleted :S "; 
			}else 
				echo "Wrong informations :S "; 			
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
			$request = "SELECT * FROM users WHERE username='$username' AND password='$password';";
			$pstmt = $db->prepare($request); 
			$result = $pstmt->execute(); 
			
			//$result = $db->query($request); 
			if ($result){
				session_start(); 
				$informations = array(); 
				$informations = $pstmt->fetch(PDO::FETCH_OBJ);					
				$_SESSION["connected"] = true;
				$_SESSION["username"] = $username; 
				$_SESSION["name"] = $informations["name"]; 
				$_SESSION["firstName"] = $informations["firstname"]; 
				$_SESSION["email"] = $informations["email"];
				$_SESSION["ver"] = true;  
				return true; 
			}else 
				return false;  			
		}
	}	
?>