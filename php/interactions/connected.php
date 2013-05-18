<?php 
	if(!isset($_SESSION))
		session_start(); 
?>
<link href="../style/style.css" rel="stylesheet" style="text/css">
<?php
	if (isset($_SESSION["name"])){	
		$bienvenue = "Welcome back ". $_SESSION["name"] . " ! You are now connected ! ";
		if ($_SESSION["privilege"]=="admin")
			$bienvenue = $bienvenue . " Vous êtes admin ! "; 
		$_SESSION["welcome"] = $bienvenue; 
		include("../../index.php"); 
	}else
		echo "ERROR 7003"
?>