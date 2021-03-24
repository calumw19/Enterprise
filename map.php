<?php
session_start();
require_once('database/dbconfig.php');
$email = $_SESSION["username"];

$query = "SELECT * FROM heroku_1b4d8c3621f1afb.user WHERE email='$email' LIMIT 1";
$query_run = mysqli_query($connection, $query);


if($query_run)
{
    while($row = mysqli_fetch_array($query_run))
    {
        if($row["food"] != 0)
        {
            $veggie = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=Vegetarian%20Restaurant&sensor=true&location=57.145438,-2.102758&radius=5500&key=AIzaSyD3RSD0_HDapb0f3e6rm7gy4VuhMa5Nud8";
            $steakhouse = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=Steakhouse&sensor=true&location=57.145438,-2.102758&radius=5500&key=AIzaSyD3RSD0_HDapb0f3e6rm7gy4VuhMa5Nud8";
            $jsonURL = $row["food"] == 1 ? $steakhouse : $veggie;

            $json = file_get_contents($jsonURL);
            $obj = json_decode($json);
        }
    }
}

$restaurants = array();

foreach($obj->results as $key => $restaurant)
{
    $name = $restaurant->name;
    $latlong = ["lat"=>$restaurant->geometry->location->lat,
                "long"=>$restaurant->geometry->location->lng];
    $address = $restaurant->formatted_address;


    $details = array("name"=>$name, "latlong"=>$latlong, "address"=>$address);
    array_push($restaurants, $details);
}

?>
<!DOCTYPE html>
<html>
  <head>

          <?php include('inc/head.php'); ?>

    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
    height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
    height: 100%;
    margin: 0;
    padding: 0;
}
    </style>
    <script>
      var restaurants = <?php echo json_encode($restaurants); ?>;

      let map;
      let infowindow;
      let service;

      // Create google map
      function initMap()
      {
          var aberdeen = new google.maps.LatLng(57.145438, -2.102758);

          infowindow = new google.maps.InfoWindow();
          map = new google.maps.Map(document.getElementById("map"),
          {
              center: aberdeen,
              zoom: 15,
          });

          // Loop through each restaurant and mark it
          $.each(restaurants, function(index, restaurant)
          {
              createMarker(restaurant)
          });
      }

      // Create marker on the map at a specific lat/long
      function createMarker(restaurant)
      {
          var latlong = new google.maps.LatLng(restaurant.latlong.lat, restaurant.latlong.long)

          var marker = new google.maps.Marker({
              map : map,
              position : latlong
          });

          // Click listener for when a marker is pressed to display info
          google.maps.event.addListener(marker, 'click', function()
          {
              infowindow.setContent(`<b>${restaurant.name}</b><br>${restaurant.address}`);
              infowindow.open(map, this);
          });
      }


    </script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3RSD0_HDapb0f3e6rm7gy4VuhMa5Nud8&callback=initMap&libraries=places" async></script>
  </body>
</html>
