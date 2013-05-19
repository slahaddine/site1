<div id="hr" style="position:relative;width:100%;height:350px;border:1px solid black;overflow:hidden;">
<!-- <img id="jquery" src="images/jquery.jpg" /> -->
<script>
function defilImgHrz(el,srcs,pas,tps) {
  if(typeof el=="string") { el = document.getElementById(el); }
  var tps = tps || 50;
  var pas = pas || 1;
  var imgs = [];
  var offset = 0;
  for(var i=0,l=srcs.length;i<l;i++) {
    var img = new Image();
    img.src = srcs[i];
    imgs.push(img);
    img.style.height=el.offsetHeight+"px";
    img.style.position = "absolute";
    img.style.left = offset+"px";
    el.appendChild(img);
    offset += img.offsetWidth;
  }
  var first = 0;
  var last = imgs.length-1;

  (function d() {
    for(var i=0,l=imgs.length;i<l;i++) {
      var left = parseInt(imgs[i].style.left,10);
      imgs[i].style.left = (left-pas)+"px";
      if(i==first && (left-pas+imgs[i].offsetWidth)<0) {
        imgs[i].style.left = (parseInt(imgs[last].style.left,10)+imgs[last].offsetWidth-(i==0?pas:0))+"px";
        last = first++;
        if(first>imgs.length-1) { first = 0; }
      }
    }
    setTimeout(d,tps);
  })();
}

window.onload=function() {
	defilImgHrz('hr',[
    "images/island.jpg",
    "images/mecca.jpeg",
    "images/turkey.jpeg",
 
  ]);
};
</script>
</div>
<div id="center">
	<div id="msgBienvenue">
		<?php
			if (isset($_SESSION["welcome"]))
			echo $_SESSION["welcome"];
		?>
	</div>
	<h2 id="baliseActivite">Fil d'actualit&eacute</h2>
	<div id="messageActu">
		<p> Bienvenue ! Ici seront disposes les articles sur les actualit&eacute; <br />
		</p>
	</div>
</div>
<?php
	if($ver){
		echo "<div id='second'>
			<h2 id='baliseConnexion'>Connexion</h2>";
		include './HTML/formulaires/form_connect_user.html';
		echo "</div>";
	}
?>
