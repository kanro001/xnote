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

var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
    var mapOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  }

  function codeAddress() {
    var address = document.getElementById("mapadd").innerText;
    geocoder.geocode( { 'mapadd': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
</script>
</head>


<body onload="initialize()">
<div id="map_canvas" style="width:100%; height:30%"></div>
</body>

</html>
