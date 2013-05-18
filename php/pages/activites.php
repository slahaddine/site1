<?php
	require_once('./php/classes/ActivityDAO.class.php'); 
	require_once('./php/classes/ListeActivity.class.php'); 

?>
<h2 id="h2Titre">Liste des activit&eacutes </h2>
<div id="divActivite">
<span id="titreActivite">Ouverture du site internet!<br/></span>
	<p id="sous-titre">
		<span id="underline">Desciptif</span> :<br/>
		<div id="texte">
			Le site internet du centre est enfin arriv&eacute!<br/> 
			Venez d&eacutecouvrir les nombreux services qui vous sont maintenant offerts en ligne.<br/>
			Un buffet vous sera servi et une pr&eacutesentation des concepteurs du site sera donn&eacute insh'Allah.<br/>
		</div>
	</p>
	<p id="sous-titre"><span id="underline">Date</span> : 12 mai 2013 &aacute 15:00.</p>
	<p id="sous-titre">
		<span id="underline">Lieu</span> : 
		<div id="texte">
			Centre de fraternit&eacute Anjou<br/>
			7801 boulevard Roi Ren&eacute <br/>
			H1K 3G9, Anjou. <br/>
		</div>
	</p>
	<p id="sous-titre">
		<span id="underline">Conditions</span> :<br/>
		<div id="texte">
			Nombre de personnes pour cette activit&eacute; : pas de limite<br/>
			Inscription requise : non<br/>
			Date limite d'inscription : aucune<br/>
			Co&ucirct de l'activit&eacute : gratuite<br/>
		</div>
		
	</p>
</div>
<?php
            	$actDAO = new ActivityDAO(); 
            	$listActivities = new ListeActivity(); 
            	$listActivities = $actDAO->findAllActivity(0); 
            	while($listActivities->next()){
            		//var_dump($listActivities->getCurrent());//
            		if ($current = $listActivities->getCurrent()){  
            		?>
            		<div id="divActivite">
            		<span id="titreActivite"> <?php	echo $current->getIdentifiant(); ?><br/></span>
					<p id="sous-titre">
						<span id="underline">Desciptif</span> :<br/>
							<div id="texte">
								<?php
									echo $current->getDescription(); 
								?>
							</div>
						</p>
            	
            		<p id="sous-titre">
            		<span id="underline">Date</span> <?php  echo $current->getDate(); ?></p>
            			<p id="sous-titre">
	            			<span id="underline">Lieu</span> : 
            				<div id="texte">
            					<?php echo $current->getLieu(); ?>
            				</div>
            			</p>
            		
            			<p id="sous-titre">
            				<span id="underline">Conditions</span> :<br/>
            				<div id="texte">
	            				Nombre de personnes pour cette activit&eacute; : <?php echo $current->getNbPersonnes(); ?><br/>
            					Inscription requise : <?php echo $current->isInscriptionRequise(); ?><br/>
	            				Date limite d'inscription : <?php echo $current->getDateLimite(); ?><br/>
	            				Co&ucirct de l'activit&eacute : <?php echo ($current->getCout()=="0")?"gratuit":$current->getCout()."$"; ?><br/>
	            				Dur&eacute;e : <?php echo $current->getDuree(); ?> heure<?php echo ($current->getDuree()>1)?"s":"" ?><br/>
							</div>
		
						</p>
            		</div>
            		<?php
            		}
            	}
            	
?>

	
	
	
