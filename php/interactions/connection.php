<?php
	require_once('../DAOs/UsersDAO.class.php'); 
	if (isset($_REQUEST["cUsername"]) && isset($_REQUEST["cPassword"])){
		$op = new UsersDAO(); 
		$username = $_REQUEST["cUsername"]; 
		$password = $_REQUEST["cPassword"]; 
		if ($op->connection($username, $password))
			header("Location:http://localhost/site/php/interactions/connected.php"); 		 
		else{
			echo "Wrong informations, please try again or register.<br />";
			echo "<a href='http://localhost/site/index.php'> Cliquez ici pour revenir au site </a> <br />\n";
		}
	
	}else 
		die('Des informations sont manquantes ! '); 

?>