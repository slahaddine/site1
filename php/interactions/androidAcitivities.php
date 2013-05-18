<?php
	require_once('../classes/Activity.class.php');
	require_once('../classes/ActivityDAO.class.php');
//	if(isset($_REQUEST["hello"]))
		if (!isset($activity))
			$activity = new Activity("Yanis", "Yanis ", "Hello"); 
		//echo $activity; 
		$actDao = new ActivityDAO(); 
		
		$arr = $actDao->findAllActivity(1); 
		echo $arr; 
		
?>