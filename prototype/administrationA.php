<?php
	require_once('../php/classes/ActivityDAO.class.php'); 
	require_once('../php/classes/ListeActivity.class.php'); 
	
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
                    <strong>   Lieu </strong>
                </td> 
                <td>
                    <strong>   Cout </strong>
                </td> 
                <td>
                    <strong>   Nombre de personnes </strong>
                </td> 
                <td>
                    <strong>   Inscription requise ? </strong>
                </td> 
                <td>
                    <strong>   Date Limite </strong>
                </td> 
                <td>
                    <strong>   Actions </strong>
                </td>     
            </tr>
            <?php
            	$actDAO = new ActivityDAO(); 
            	$listActivities = new ListeActivity(); 
            	$listActivities = $actDAO->findAllActivity(0); 
            	echo "<div style=\"border-bottom:dashed black 1px;\">"; 
            	while($listActivities->next()){
            		//var_dump($listActivities->getCurrent());//
            		if ($current = $listActivities->getCurrent()){  
            		echo "<tr>";
            		echo "<td>".$current->getIdentifiant()."</td>"; 
            		echo "<td>".$listActivities->getCurrent()->getDate()."</td>"; 
            		echo "<td>".$listActivities->getCurrent()->getDuree()."</td>"; 
            		echo "<td>".$listActivities->getCurrent()->getDescription()."</td>"; 
                        echo "<td>".$listActivities->getCurrent()->getLieu()."</td>"; 
                        echo "<td>".$listActivities->getCurrent()->getCout()."$ </td>"; 
                        echo "<td>".$listActivities->getCurrent()->getNbPersonnes()."</td>"; 
                        echo "<td>".$listActivities->getCurrent()->isInscriptionRequise()."</td>"; 
                        echo "<td>".$listActivities->getCurrent()->getDateLimite()."</td>"; 
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
    </body>
</html>
