<?php
	ob_start(); 
	require_once('../php/classes/ActivityDAO.class.php');
	require_once('../php/classes/Activity.class.php');  
	$identifiant = $_GET["id"]; 
    if (ISSET($_REQUEST["newDate"]) && (!$_REQUEST["newDuree"]=="")){
    	$actDAO = new ActivityDAO(); 
    	$activity = new Activity($identifiant, $_REQUEST["newDuree"], $_REQUEST["newDate"], $_REQUEST["newDescription"]); 
		echo $activity->getDescription(); 
		echo $activity->getDate(); 
    	echo $actDAO->updateActivity($activity); 
    	header('Location: ./administrationA.php'); 
    }
?>
<html>
    <head>
        <title>
            Modify Activity 
        </title>
    </head>
    <body>
        <form action="" method="POST" >
            <table border='0'>
                <?php?>
                <tr>
                    <td>
                        Nom de l'activit&eacute; : <strong> <?php echo $_GET["id"]; ?> </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nouveau la date de l'activit&eacute; : 
                    </td>
                    <td>
                        <input type='date' name='newDate' value="<?php echo $_GET["date"]?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Dur&eacute;e de l'activit&eacute; : 
                    </td>
                    <td>
                        <input type='text' name='newDuree' value="<?php echo $_GET["dr"]?>" /> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Nouvelle description: 
                    </td>
                    <td>
                        <TEXTAREA NAME="newDescription" ROWS=3 COLS=30> </TEXTAREA>
                    </td>
                </tr>
                
            </table>
            <input type="submit" value="Modifi&eacute; l'activit&eacute;" />
        </form>
    </body>
</html>
