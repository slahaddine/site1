<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
		</title>
		<link href="style/style1.css" rel="stylesheet" style="text/css">
	</head>
<?php
	include './php/body/general.php';
?>
<img id="jquery" src="images/jquery.jpg" />
<div id="center">
	<div id="msgBienvenue">
		<?php
			if (isset($_SESSION["welcome"]))
			echo $_SESSION["welcome"];
		?>
	</div>
	<h2 id="baliseActivite">Activité</h2>
	<div id="messageActivite">
		<p> Bienvenue ! Ici seront disposes les articles sur les activites <br />
			Ils changeront au fur et à mesure qu'on ajoutera des articles. 
		</p>
	</div>
</div>
<div id="second">
	<h2 id="baliseConnexion">Connexion</h2>
	<?php
		include './HTML/formulaires/connect_user.html';
	?>
</div>
<?php
	include './php/body/pdp.php';
?>