<?php
require_once('../php/classes/ActivityDAO.class.php');
require_once('../php/classes/Activity.class.php');
if (isset($_REQUEST["actName"])){
    if ($_REQUEST["actDuree"] != "" && $_REQUEST["actDate"] != "" && $_REQUEST["actDescription"] != "" ) {
        if (!isset($actDAO))
            $actDAO = new ActivityDAO();
        $activity = new Activity($_REQUEST["actName"], $_REQUEST["actDuree"], $_REQUEST["actDate"], $_REQUEST["actDescription"], $_REQUEST["actLieu"], $_REQUEST["actParticipants"], $_REQUEST["actInscriptionRequise"], $_REQUEST["actDateLimite"], $_REQUEST["actCout"]);
        echo $actDAO->addActivity($activity);
    }
    else
        echo "Vous avez oubli&eacute; de fournir des informations importantes. <br />";
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="all" href="./js/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src=".js/jsDatePick.min.1.3.js"></script>
       <script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"actDate",
			dateFormat:"%d-%M-%Y"
		});
	};
        </script> 
        
        <title>
            Ajouter une activit&eacute;
        </title>
    </head>
    <body>
        <div id="all">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            Nom de l'activit&eacute; 
                        </td>
                        <td>
                            <input type='text' name='actName' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dur&eacute; de l'activit&eacute; 
                        </td>
                        <td>
                            <input type='text' name='actDuree' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date de D&eacute;but  
                        </td>
                        <td>
                            <input type='date' name='actDate' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Description de l'activit&eacute; 
                        </td>
                        <td>
                            <TEXTAREA NAME="actDescription" ROWS=3 COLS=30> </TEXTAREA>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lieu de D&eacute;but  
                        </td>
                        <td>
                            <input type='text' name='actLieu' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombre de participants : 
                        </td>
                        <td>
                            <input type='text' name='actParticipants' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Inscription requise ? 
                        </td>
                        <td>
                            <select>
                                <option value="actInscriptionRequise">true</option>
                                <option value="actInscriptionRequise">false</option>
                             </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date limite  
                        </td>
                        <td>
                            <input type='date' name='actDateLimite' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cout de l'activit&eacute;  
                        </td>
                        <td>
                            <input type='text' name='actCout' />
                        </td>
                    </tr>
                </table>
                <input type='submit' value="Cr&eacute;&eacute;e l'activit&eacute;">
            </form>
        </div>
    </body>
</html>