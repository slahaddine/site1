<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load("swfobject", "2.1");
</script>    
<script type="text/javascript">
	function _run() {
		/*
		* Simple player embed
		*/
		//http://www.youtube.com/watch?v=KIoHP3rD9S8&feature=share&list=PLE27063AE160613B8
		// The video to load.
		var videoID = "KIoHP3rD9S8"
		// Lets Flash from another domain call JavaScript
		var params = { allowScriptAccess: "always" };
		// The element id of the Flash embed
		var atts = { id: "ytPlayer" };
		// All of the magic handled by SWFObject (http://code.google.com/p/swfobject/)
		swfobject.embedSWF("http://www.youtube.com/v/" + videoID + "?version=3&enablejsapi=1&playerapiid=player1",
						   "player", "480", "295", "9", null, null, params, atts);	
	}
	google.setOnLoadCallback(_run);
</script>

<!-- Channel -->
<script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
<script type="text/javascript">
	// How to search through a YouTube channel aka http://www.youtube.com/members

	google.load('search', '1');

	function OnLoad() {

	  // create a search control
	  var searchControl = new google.search.SearchControl();

	  // So the results are expanded by default
	  options = new google.search.SearcherOptions();
	  options.setExpandMode(google.search.SearchControl.EXPAND_MODE_OPEN);

	  // Create a video searcher and add it to the control
	  searchControl.addSearcher(new google.search.VideoSearch(), options);

	  // Draw the control onto the page
	  searchControl.draw(document.getElementById("channel"));

	  // Search for a YouTube channel
	  searchControl.execute("ytchannel:NBA");
	}

	google.setOnLoadCallback(OnLoad);
</script>

<div id="channel">
</div>