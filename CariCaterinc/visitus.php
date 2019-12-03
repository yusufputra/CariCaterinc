<div class="container">
  <div class="jumbotron"  style="background-color:#eee; margin-top:10px; margin-bottom:0px;">
  	<h2 class="text-center">Kunjungi Kami</h2><hr>
  	<div class="row">
  		<div class="col-md-6"> 
  			<h4><i class="fa  fa-map-marker"></i><strong>  Alamat</strong></h4>
  			<p>Jalan Danau Ranau G6B3<br>Sawojajar, Malang 65139<br>Jawa Timur, Indonesia</p>
  		</div>
  		<div class="col-md-6 text-right"> 
  			<h4><i class="fa  fa-inbox"></i><strong>  Hubungi Kami</strong></h4>
  			<p>0812 5255 0224<br>caricatering@gmail.com</p>
  		</div>
  	</div>
  	<div id="map"></div>
    <script>
      function initMap() {
        var myLatLng = {lat: -7.976803, lng: 112.659395};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: true,
          zoom: 17
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Kos Ning'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlti8rx_ui1O1GACidy2k3Z5dpYTYklXw&callback=initMap"
        async defer></script>
  </div>
</div>