<?php class Users{
	private $username = ""; 
	private $password = ""; 
	private $name = ""; 
	private $firstName = ""; 
	private $email = ""; 
	private $privilege=""; 

	public function __construct($_username, $_password, $_fName, $_name, $_email, $_privilege="user"){
		$this->username = $_username; 
		$this->password = $_password; 
		$this->name = $_name; 
		$this->firstName = $_fName; 
		$this->email = $_email; 
		$this->privilege = $_privilege; 
	}
	
	public function setUsername($_username){
		$this->username = $_username;
	}
	public function setPassword($_password){
		$this->password = $_password; 
	}
	public function setName($_name){
		$this->name = $_name; 
	}
	public function setFirstName($_fName){
		$this->firstName = $_fName; 
	}
	public function setEmail($_email){
		$this->email = $_email; 
	}
	
	public function getUsername(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;; 
	}
	public function getName(){
		return $this->name;
	}
	public function getFirstName(){
		return $this->firstName;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPrivilege(){
		return $this->privilege; 
	}
	
	public function __toString(){
		$result = "<b>Username</b> : ".$this->getUsername().", <b>Password</b> : ".$this->getPassword(). ", <b>email</b> : ".$this->getEmail().", <b>Name</b> : ".$this->getName().", <b>First name</b> : ".$this->firstName; 
		return $result;
	}
	function __destruct(){
		
	
	}
	public function loadFromRecord($line)
	{
		$this->username = $line["username"];
		$this->password = $line["password"];
		$this->name = $line["name"];
		$this->firstName = $line["firstname"];
		$this->email = $line["email"];
		$this->privilege = $line["privilege"];
	}
}
?>