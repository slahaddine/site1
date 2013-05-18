<?php
	require_once('../php/classes/UsersDAO.class.php'); 
	require_once('../php/classes/ListeUsers.class.php'); 
	if (ISSET($_GET["action"]))
	{
		switch ($_GET["action"])
		{
			case 'deleteUser' : 
				$us = $_GET["id"]; 
				$pwd = $_GET["pwd"]; 
				$em = $_GET["em"]; 
				if(!isset($userDAO))
					$userDAO = new UsersDAO(); 
				$msg = $userDAO->supression($us, $pwd, $em);
				 
				unset($_GET["id"]); 
				$_GET["pwd"]=""; 
				$_GET["em"]=""; 
				echo $msg;
				break; 
		}
	}
?>
<html>
	<head>
		<title>
			Administration d'utilisateur
		</title>
		<link href="./style_user.css" rel="stylesheet" style="text/css">
	</head>
	<body>
  		<div style="padding:50px;" id="divUser">
        	<table border="0" cellspacing="0" cellpadding="10" id="table">
        		<tr>
        			<td>
        				<strong>  Username </strong>
        			</td>
        			<td>
        				<strong>  Name </strong>
        			</td>
        			<td>
        				<strong>  FirstName </strong>
        			</td>
        			<td>
        				<strong>  Email </strong>
        			</td>
        			<td>
        				<strong>  privilege </strong>
        			</td>
        		</tr>
        		<?php
        			$userDAO = new UsersDAO(); 
        			$listU = new ListeUsers(); 
        			$listU = $userDAO->findAllUsers(); 
        			while($listU->next()){
        				if ($user = $listU->getCurrent()){
        					echo "<tr>";
            				echo "<td>".$user->getUsername()."</td>"; 
            				echo "<td>".$user->getName()."</td>"; 
            				echo "<td>".$user->getFirstName()."</td>"; 
            				echo "<td>".$user->getEmail()."</td>"; 
            				echo "<td>".$user->getPrivilege()."</td>"; 
            				echo "<td>"; 
            				?>
            				 <a href="?action=deleteUser&id=<?php echo $user->getUsername(); ?>&pwd=<?php echo $user->getPassword(); ?>&em=<?php echo $user->getEmail(); ?>" style="background-image:url(./DeleteRed.png);text-decoration : none;width:25px; height:25px;" title="Delete the User">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
       				 	<a href="modifyUser.php?id=<?php echo $user->getUsername(); ?>" style="background-image:url(./modify.png);text-decoration : none;width:25px; height:25px;" title="Modify the User">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            				
            				<?php 
            				echo "</td>"; 
            				echo "</tr>"; 
        				}
        			}
        		?>
        	</table>
        </div>
    </body>
</html>