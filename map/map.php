<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?sensor=true&language=en">
</script>
<script type="text/javascript">

// Note that using Google Gears requires loading the Javascript
// at http://code.google.com/apis/gears/gears_init.js

var initialLocation;
var siberia = new google.maps.LatLng(60, 105);
var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
var browserSupportFlag =  new Boolean();

function initialize() {
  var myOptions = {
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  
  var myloc = new google.maps.Marker({
	  clickable: false,
	  icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
                                                    new google.maps.Size(22,22),
                                                    new google.maps.Point(0,18),
                                                    new google.maps.Point(11,11)),
      shadow: null,
	  zIndex: 999,
      map: map, 
});

      
  // Try W3C Geolocation (Preferred)
  if(navigator.geolocation) {
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      map.setCenter(initialLocation);
      myloc.setPosition(initialLocation);
    }, function() {
      handleNoGeolocation(browserSupportFlag);
    });
  // Try Google Gears Geolocation
  } else if (google.gears) {
    browserSupportFlag = true;
    var geo = google.gears.factory.create('beta.geolocation');
    geo.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
      map.setCenter(initialLocation);
    }, function() {
      handleNoGeoLocation(browserSupportFlag);
    });
  // Browser doesn't support Geolocation
  } else {
    browserSupportFlag = false;
    handleNoGeolocation(browserSupportFlag);
  }
  
  function handleNoGeolocation(errorFlag) {
    if (errorFlag == true) {
      alert("Geolocation service failed.");
      initialLocation = newyork;
    } else {
      alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
      initialLocation = siberia;
    }
    map.setCenter(initialLocation);
  }
  
  /* Babbio Center  */
  var myLatlng = new google.maps.LatLng(40.742684,-74.026827);    
  var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map}); 

   /* Morton Bldg  */     
  var myLatlng = new google.maps.LatLng(40.743261,-74.026687);    
  var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map}); 

  /* Burchard Bldg  */ 
  var myLatlng = new google.maps.LatLng(40.742964,-74.027323);    
  var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map}); 
              
  /* McLean Hall */ 
  var myLatlng = new google.maps.LatLng(40.742278,-74.027012);    
  var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map}); 
        
  /* Edwin A. Stevens Hall  */      
  var myLatlng = new google.maps.LatLng(40.742387,-74.02772);    
  var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map}); 
}

</script>
</head>


<body onload="initialize()">
<div id="map_canvas" style="width:100%; height:100%"></div>
</body>

</html>
