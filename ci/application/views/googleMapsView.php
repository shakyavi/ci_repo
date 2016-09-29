<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Location</title>
        <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyB7RsPTu5e2TP8af5J3RiA_a-RByYif1uc"></script>
      
      <script>
         function loadMap() {
			
            var mapOptions = {
               center:new google.maps.LatLng(27.7172, 85.3240), zoom:12,
               mapTypeId:google.maps.MapTypeId.ROADMAP
            };
				
            var map = new google.maps.Map(document.getElementById("sample"),mapOptions);
         }
          google.maps.event.addDomListener(window, 'load', loadMap);
      </script>
    </head>
    <body>
      <div id = "sample" style = "width:570px; height:580px;"></div>
   </body>
</html>
