<?php
	require_once('../php/classes/ActivityDAO.class.php'); 
	require_once('../php/classes/ListeActivity.class.php'); 
	require_once('../php/classes/UsersDAO.class.php'); 
	require_once('../php/classes/ListeUsers.class.php'); 
	
	if (ISSET($_GET["action"]))
	{
		switch ($_GET["action"])
		{
			case 'delete' : 
				$act = $_GET["id"]; 
				if (!isset($actDAO))
					$actDAO = new ActivityDAO(); 
				echo $actDAO->removeActivity($act); 
				break; 
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
                Administration 
        </title>
    </head>
    <body>
    	<div style="border-bottom:dashed black 1px;padding:50px;" id="idActivity">
        <table border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <strong>  Identifiant </strong>
                </td>
                <td>
                       <strong>  Date </strong>
                </td>    
                <td>
                    <strong>   Dur&eacute;e </strong>
                </td>    
                <td>
                    <strong>   Description </strong>
                </td>   
                <td>
                    <strong>   Actions </strong>
                </td>     
            </tr>
            <?php
            	$actDAO = new ActivityDAO(); 
            	$listActivities = new ListeActivity(); 
            	$listActivities = $actDAO->findAllActivity(); 
            	echo "<div style=\"border-bottom:dashed black 1px;\">"; 
            	while($listActivities->next()){
            		//var_dump($listActivities->getCurrent());//
            		if ($current = $listActivities->getCurrent()){  
            		echo "<tr>";
            		echo "<td>".$current->getIdentifiant()."</td>"; 
            		echo "<td>".$listActivities->getCurrent()->getDate()."</td>"; 
            		echo "<td>".$listActivities->getCurrent()->getDuree()."</td>"; 
            		echo "<td>".$listActivities->getCurrent()->getDescription()."</td>"; 
            		echo "<td>"; 
            		?>
            		 <a href="?action=delete&id=<?php echo $current->getIdentifiant(); ?>" style="background-image:url(./DeleteRed.png);text-decoration : none;width:25px; height:25px;" title="Delete the activity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
       				 <a href="modifyActivity.php?id=<?php echo $current->getIdentifiant(); ?>&dr=<?php echo $current->getDuree(); ?>&date=<?php echo $current->getDate(); ?>" style="background-image:url(./modify.png);text-decoration : none;width:25px; height:25px;" title="Modify the activity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            		<?php 
            		echo "</td>"; 
            		echo "</tr>"; 
            		}
            	}
            	
            ?>
        </table>
        </div>
        <div style="border-bottom:dashed black 1px;padding:50px;" id="idUser">
        	<table border="0" cellspacing="0" cellpadding="10">
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
        <a href="addUser.php" style="background-image:url('./users_add.png');text-decoration : none;width:50px; height:50px;" title="Add new user">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
   