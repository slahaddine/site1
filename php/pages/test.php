<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google AJAX Search API Sample</title>
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
      searchControl.draw(document.getElementById("content"));
    
      // Search for a YouTube channel
      searchControl.execute("ytchannel:NBA");
    }
    
    google.setOnLoadCallback(OnLoad);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="content">Loading...</div>
  </body>
</html>
