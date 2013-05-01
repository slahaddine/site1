	<?php
			session_start(); 
	?>
	<body>
		<?php $ver=false; ?> 
		<div id="premierDiv">
			<?php
					if (isset($_SESSION["ver"])){
						$ver=true; 
					}
					if(!$ver){
						echo "<p><a id='connexion' href='./HTML/formulaires/connect_user.html'>Se connecter \n";
						echo "<a id='inscirption' href='./HTML/formulaires/create_user.html'></a>/ S'enregistrer</p></a>" ;
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
						<a href="#"> <p>Acceuil </p></a>	
							<ul>
								<li> 
									<?php
										if ( dirname('./')=='../db' )
											echo "<a href='../index.php'> <p>Premiere Page </p></a>";
										else if ( dirname('./')=='../site_finale_version_1.1' )
											echo "<a href='./index.php'> <p>Premiere Page </p></a>";
											else
												echo("<p>point point</p>");
									?>
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
						<a href="#"> <p>Mediatheque</p></a>
					</li>	
					<li> 
						<a href="#"> <p>Activites</p></a>
					</li>
					<li> 
						<a href="#"> <p>Contact</p></a>
					</li>				
					<?php
						if ($ver)
							if ($_SESSION["privilege"]=="admin")
								echo "<li> <a href='#'> <p>Administrration </p></a></li>"
					?>	
				</ul>
			</div>
			<div id="bar2"> </div>
			<hr id="xmenu"> </hr>
		</div>
		<div id="deuxiemeDiv">
			<div id="firstBG"></div>
			<div id="main">