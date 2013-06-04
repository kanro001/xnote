// Note that using Google Gears requires loading the Javascript
// at http://code.google.com/apis/gears/gears_init.js

var initialLocation;
var howe = new google.maps.LatLng(40.744816,-74.023957);
var browserSupportFlag =  new Boolean();

function initialize() {
  var myOptions = {
    zoom: 17,
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
      initialLocation = howe;
    } else {
      alert("Your browser doesn't support geolocation. We've placed you in Howe Center.");
      initialLocation = howe;
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