<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
		</title>
		<link href="../../style/style1.css" rel="stylesheet" style="text/css">
	</head>
<?php
	include '../body/general.php';
?>
<div id="mainConnexion">
	<div id="divNewMembre">
		<h2 id="h2NouveauMembre">Nouveau membre ?</h2>
		<div id="nouveauMembre">
			<?php
				include '../../HTML/formulaires/create_user.html';
			?>
		</div>
	</div>
	<h2 id="h2Connexion">Deja inscrit ?</h2>
	<div id="connexionRegistration">
		<h2 id="baliseConnexion">Connexion</h2>
		<?php
			include '../../HTML/formulaires/connect_user.html';
		?>
	</div>
</div>
<?php
	include '../body/pdp.php';
?>