<?php
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/Wall_Updates.php';
include_once 'includes/tolink.php';
include_once 'includes/textlink.php';
include_once 'includes/htmlcode.php';
include_once 'includes/Expand_URL.php';
include_once 'includes/time_stamp.php';
include_once 'session.php';

$Wall = new Wall_Updates();

?>
<!DOCTYPE html>

<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Facebook Timeline Design with jquery and CSS</title>
<head>
<link href="css/timeline.css" rel="stylesheet" type="text/css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery.masonry.min.js"></script>
<script src="js/timeline.js"></script>
</head>
<body>
 <div id="containertop" >
 

</div>
<div id="container">
<div class="timeline_container">
<div class="timeline">
<div class="plus"></div>
</div>
</div>
<div>


<?php include("timeline_load_messages.php"); ?>

	  
<div id="popup" class='shade'>
<div class="Popup_rightCorner" >	</div>
<div id='box'>
<b>What's Up?</b><br/>
<textarea id='update'></textarea>
<input type='submit' value=' Update ' id='update_button'/>
</div>
</div>
</div>
	
</div>


</body>
</html>