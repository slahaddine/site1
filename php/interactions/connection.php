<?php
	ob_start(); 
	require_once('../classes/UsersDAO.class.php'); 
	if (isset($_REQUEST["cUsername"]) && (!$_REQUEST["cPassword"]=="")){
		$op = new UsersDAO(); 
		$username = $_REQUEST["cUsername"]; 
		$password = $_REQUEST["cPassword"]; 
		if ($op->connection($username, $password))
		{
			echo "Connected"; 		 
			//header('Location: ./../../index.php'); 
		}
		else{
			echo "Wrong informations";
		}
	}else 
		die('Des informations sont manquantes ! '); 

?>