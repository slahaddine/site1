<?php
	ob_start();
	//if (!isset($_SESSION))
		session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	$ver=true; 
	if(isset($_SESSION["connected"])){
		$ver=false; 
	}

	if(!isset($_REQUEST["page"])){
		$_GET["page"] = "acceuil";
		$titrePage = "Acceuil";
	}
	
	switch ($_GET["page"]){
		case "acceuil" 		: $currentPage = './php/pages/acceuil.php';
							  $titrePage = "Acceuil";
							  break;
		case "inscription" 	: $currentPage = './php/pages/inscription.php';
							  $titrePage = "Inscription";
							  break;
		case "multimedia" 	: $currentPage = './php/pages/multimedia.php';
							  $titrePage = "Multimedia";
							  break;
		case "contact"		: $currentPage = './php/pages/contact.php';
							  $titrePage = "Contact"; 
							  break;
		case "activites"	: $currentPage = './php/pages/activites.php';
							  $titrePage = "Activites"; 
	}	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script>			
			function toYoutube(){
				window.open("http://www.youtube.com/embed/KIoHP3rD9S8");
			}
			function toFacebook(){
				window.open("http://www.facebook.com");
			}
		</script>
		<title>
			<?php
				echo $titrePage;
			?>
		</title>
			<link href="style/styleIndex.css" rel="stylesheet" style="text/css">	
			<link href="style/index.css" rel="stylesheet" style="text/css">
			<link href="style/styleInscription.css" rel="stylesheet" style="text/css">
			<link href="style/styleMultimedia.css" rel="stylesheet" style="text/css">
			<link href="style/styleContact.css" rel="stylesheet" style="text/css">
			<link href="style/styleActivites.css" rel="stylesheet" style="text/css">
		<?php 
		$popup = false; 
			if(!isset($_COOKIE["firefoxMessage"]))
			{
				$popup = true; 
				if(isset($_GET["c"]))
				{
				setcookie("firefoxMessage", true); 
				$popup = false; 
				}
			}
	?>
	</head>
	<body>
		<div id="premierDiv">
		<?php
		if($ver){
			echo "<div id='connexionInscription'> 
					<span id='visibilityConnexion'>
						<a id='connexion' href='#'>Se connecter </a>
						<div id='divConnexion'>
							<div id='contenantConnexion'>
									<form action='./php/interactions/connection.php' method='post'>
										<table>
											<tr>
												<td>
													Username : 
												</td>
												<td>
													<input type='text' name='cUsername'> <br />
												</td>
											</tr>
											<tr>
												<td>
													Password :
												</td>
												<td>
													<input type='password' name='cPassword'> <br />
												</td>
											</tr>
										</table>
										<input type='submit' name='Connect' value='Connect'> <br />
									</form>
							</div>
						</div>
					</span>";
					echo "/ <a id='inscription' href='index.php?page=inscription'>S'enregistrer</a>
				</div>" ;
		}
		else{
			echo "<a id='deconnexion' href='./php/interactions/disconnect.php'> <p>Se Deconnecter </p></a>"; 
		}
		?>
		<div id="entete">
		</div>
		<div id="bar1"> </div>
		<div id="menu">
			<ul>
				<li> 
					<a href="index.php?page=acceuil"> <p>Acceuil </p></a>	
						<ul>
							<li> 
								<a href="index.php?page=acceuil"> <p>Premiere Page </p></a>
							</li>
							<li> 
								<a href="#"> <p>Activite de la semaine </p></a>
							</li>
							<li> 
								<a href="#"> <p>Dernieres nouvelles</p></a>
							</li>
						</ul>
				</li>
				<li> 
					<a href="#"> <p>Timesline </p></a>
				</li>
				<li> 
					<a href="index.php?page=multimedia"> <p>Mediatheque</p></a>
				</li>	
				<li> 
					<a href="index.php?page=activites"> <p>Activit&eacutes</p></a>
				</li>
				<li> 
					<a href="index.php?page=contact"> <p>Contact</p></a>
				</li>				
				<?php
					if (!$ver)
						if ($_SESSION["privilege"]=="admin")
							echo "<li> <a href='./prototype/panneau.php'> <p>Administration</p></a></li>"
				?>	
			</ul>
		</div>
		<div id="bar2"> </div>
		<hr id="xmenu"> </hr>
	</div>
	<div id="deuxiemeDiv">
		<div id="firstBG">   </div>
		<div id="main">
			<?php
				include $currentPage;
			?>
			<!-- ici le include -->
		</div>
		<div id="secondBG"></div>
		
	</div>
	<?php
		if ($popup)
		{
	?>
	<div id="firefox_message" style="z-index: 16777271; position: fixed; left: 50%; bottom: 0px; width: 970px; margin-left: -485px; height: 30px; line-height: 30px; border: none; background-color: rgb(245, 221, 136); color: rgb(0, 0, 0); overflow: hidden; text-align: center; font-size: 12px; font-family: arial; padding: 0px;">
			This website is optimized for <strong>FireFox 21</strong>, please consider to download the latest version
			<a href="http://www.mozilla.org/fr/firefox/new/" target="_blank" style="color: #000; font-weight: bold; text-decoration: none;
			border-bottom: 1px solid #000;">here</a>. <a id="ff_messageCloseCookie" href="?c=02938465" style="display: block; width: 30px; height: 30px; background-color: rgb(180, 141, 4); border: none; color: rgb(255, 255, 255);
			font-size: 20px; line-height: 30px; text-decoration: none; position: absolute; right: 0px; top: 0px;"> X </a>
	</div>
	<?php
		}
	?>
	<div id=PDP>
			<div id="acces">
				Acc&eacutes <br />
				<p id="sous-acces">
					<a href="index.php?page=acceuil">Acceuil</a><br />
					<a href="#">Timesline</a><br />
					<a href="index.php?page=multimedia">Mediatheque</a><br />
					<a href="index.php?page=activites">Activit&eacutes </a><br />
					<a href="index.php?page=contact">Contact</a><br />
				</p>				
			</div>
			
			<div id="contactPDP">
				Contact :
				<div id="sous-contact">
					Centre de fraternité Anjou <br />
					7801 boulevard Roi René <br />
					H1K 3G9, Anjou. <br />					
				</div>					
			</div>
			
			<div id="lienPDP">
				<span id="alignementLogo">		
					<img id="lienLogo" src="images/youtube.jpeg" onclick="toYoutube()"/> 
					<img id="lienLogo" src="images/facebook.jpeg" onclick="toFacebook()" /> <br />
				</span>
				© 2013 by association fraternité Anjou.
			</div>
			
			<hr id="hrPDP"><hr/>
	</div>
	
	</body>
</html>