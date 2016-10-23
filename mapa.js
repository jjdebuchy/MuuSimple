function initialize() {
  var locations = [
   ["Trenque Launque", -36.152587, -62.445315, 4],
   ['Ultracan', -37.204111, -65.907238, 5],
   ['La Toma', -33.069421, -65.627285, 3],
   ['Venado Tuerto',-33.776045, -61.986526, 2],
   ['Villa San Jose', -31.340217, -61.625601, 1]
 ];

 var map = new google.maps.Map(document.getElementById('googleMap'), {
   zoom: 6,
   center: new google.maps.LatLng(-35.6,-64.5),
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });

 var infowindow = new google.maps.InfoWindow();

 var marker, i;


 for (i = 0; i < locations.length; i++) {
   marker = new google.maps.Marker({
     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
     map: map ,
     icon: "imagenes/cow.png"
   });

   google.maps.event.addListener(marker, 'click', (function(marker, i) {
     return function() {
       infowindow.setContent(locations[i][0]);
       infowindow.open(map, marker);
     }
   })(marker, i));
 }
}
google.maps.event.addDomListener(window, 'load', initialize);
