<?php
    require_once('../classes/UsersDAO.class.php'); 
	require_once ('../classes/Users.class.php'); 
    if ((isset($_REQUEST["iUsername"])) && ($_REQUEST["iPassword"]!="") && ($_REQUEST["iEmail"]!="") && $_REQUEST["iName"]!="" && $_REQUEST["iFirstname"]!=""){
	    $Op = new UsersDAO(); 
		$user = new Users($_REQUEST["iUsername"], $_REQUEST["iPassword"], $_REQUEST["iName"], $_REQUEST["iFirstname"], $_REQUEST["iEmail"]); 
		$result = $Op->inscription($user); 
		echo $result . "<br /> MESSAGE AU STAFF : IL FAUT REDIRIGER VERS L'ACUEIL"; 
	 }else{
        echo "Vous avez oublier de fournir une information primordiale <br />"; 
        die(); 
     }        
     
	

?>