<?php
	if(!isset($_COOKIE["firefoxMessage"]))
	{
		if(isset($_REQUEST["c"])){
			setcookie("firefoxMessage", true); 
		}
?>
<html>
	<head>
		<title>Message</title>
	</head>
	<body>
		<div id="firefox_message" style="z-index: 16777271; position: fixed; left: 50%; bottom: 0px; width: 970px; margin-left: -485px; height: 30px; line-height: 30px; border: none; background-color: rgb(245, 221, 136); color: rgb(0, 0, 0); overflow: hidden; text-align: center; font-size: 12px; font-family: arial; padding: 0px;">
			This website is optimized for <strong>FireFox 20</strong>, please consider to download the latest version
			<a href="http://www.mozilla.org/fr/firefox/new/" target="_blank" style="color: #000; font-weight: bold; text-decoration: none;
			border-bottom: 1px solid #000;">here</a>. <a id="ff_messageCloseCookie" href="?c=02938465" style="display: block; width: 30px; height: 30px; background-color: rgb(180, 141, 4); border: none; color: rgb(255, 255, 255);
			font-size: 20px; line-height: 30px; text-decoration: none; position: absolute; right: 0px; top: 0px;"> X </a>
		</div>
	</body>

</html>
<?php
	}
?>
