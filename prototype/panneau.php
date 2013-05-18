<?php
	session_start(); 
	ob_start(); 
	if(!isset($_SESSION["privilege"]))// || $_SESSIION["privilege"]!="admin"){
		header('Location: ../index.php'); 
	
?>
<html>
	<head>
	<link href="./style.css" rel="stylesheet" style="text/css">
		<title>
		</title>
		<script>
			function open_users_managment() 
			{
				window.open("./administrationU.php");
			}
			function open_activity_managment() 
			{
				window.open("./administrationA.php");
			}
			function open_add_user(){
				window.open("./addUser.php"); 
			}
			function open_add_activity(){
				window.open("./addActivity.php"); 
			}
		</script>
	</head>
	<body>
		<div id="all">
		<div id="utilisateurs" onclick="open_users_managment()">
		</div>
		<div id="Activites" onclick="open_activity_managment()">
		</div>
		<div id="addUser" onclick="open_add_user()">
		</div>
		<div id="addActivity" onclick="open_add_activity()">
		</div>
		</div>
	</body>
</html>