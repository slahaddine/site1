<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  function initialize() {
	var mapDiv = document.getElementById('divMap');
	var map = new google.maps.Map(mapDiv, {
	  center: new google.maps.LatLng(45.612995, -73.55652),
	  zoom: 14,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	});
  
	var content = '<strong>Salam aleykoum!</strong><br/>Le centre est situ&eacute; au <br/>7801 boulevard Roi Ren&eacute; H1K 3G9';
  
	var infowindow = new google.maps.InfoWindow({
	  content: content
	});
  
	var marker = new google.maps.Marker({
	  map: map,
	  position: map.getCenter(),
	  draggable: true
	});
  
	infowindow.open(map, marker);
  }
  

  google.maps.event.addDomListener(window, 'load', initialize);
</script>


<div id="divContent">
	<div id="divMap" ></div>
</div>
<div id="hrVertical" > </div>
<h2 id="h2Texte">
	Ou nous trouver ?
</h2>
<div id="texteContact">
	Centre de fraternit&eacute Anjou <br/>
	7801 boulevard Roi Ren&eacute <br/>
	H1K 3G9, Anjou. <br/> <br/>
	
	Sortie 82 de l'autoroute 40 est.<br/> </br>
	
	Contact pour tout renseignement :<br/>
	Mr foulen<br/>
	514-123-4567<br/>
	aanjou2012@yahoo.fr<br/>		
</div>
<div id="sendEmail">
	<h3>Envoyer nous un e-mail :</h3>

	<form action="HTML/formulaires/send_email/send_mail.php" method="POST">
	Nom :<br>
	<input type="text" name="name" value="votre nom"><br>
	E-mail :<br>
	<input type="text" name="mail" value="votre e-mail"><br>
	Commentaire :<br>
	<textArea name="comment" value="tapez votre commentaire" size="500" rows="10" cols="50" ></textArea><br><br>
	<input type="submit" value="Envoyer">
	<input type="reset" value="Annuler">
	</form>
</div>