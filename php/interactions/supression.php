<?php
	require_once('../DAOs/UsersDAO.class.php');
	if (isset($_REQUEST["dUsername"]) && ($_REQUEST["dPassword"] != "") && ($_REQUEST["dEmail"] !="")){
		$op = new UsersDAO(); 
		$username = $_REQUEST["dUsername"];
		$password = $_REQUEST["dPassword"];
		$email = $_REQUEST["dEmail"];
		$op->supression($username, $password, $email);
	}else 
		echo "Something went wrong :S Important informations not found ! "; 
		
?>
