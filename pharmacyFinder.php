<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>미세루트</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Font-awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/map.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #jumbotron-mask{
            margin-bottom: 0px;
            background-image: url("images/maskinfo.png");
            background-position: 0% 25%;
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
        }


    </style>
    <script>

        var map;
        var infowindow;
        var pos;
        var directionsDisplay;
        var directionsService;
        var markers = [];

        function initMap() {

            // Instantiate a directions service.
            directionsService = new google.maps.DirectionsService();

            navigator.geolocation.getCurrentPosition(function (position) {
                pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map = new google.maps.Map(document.getElementById('map'), {
                    center: pos,
                    zoom: 16
                });

                // Create a renderer for directions and bind it to the map.
                var rendererOptions = {
                    map: map
                };
                directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

                infowindow = new google.maps.InfoWindow();
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch({
                    location: pos,
                    radius: 500,
                    type: ['pharmacy']
                }, callback);
            });

            function callback(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        markers.push(results[i]);
                        createMarker(markers[i]);
                    }
                }
            }

            function createMarker(place) {
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.setContent(place.name);
                    infowindow.open(map, marker);
                    calcRouteToPharmacy(place);
                });
            }

            function calcRouteToPharmacy(place) {
                var request = {
                    origin: pos,
                    destination: {lat:place.geometry.location.lat(), lng:place.geometry.location.lng()},
                    travelMode: 'TRANSIT'
                };
                directionsService.route(request, function(response, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="index.php"><img src="images/logo.png" class="navbar-brand logo-center"></a>
    <!--login icon-->
    <i class="fas fa-sign-in-alt"></i>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Map
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="map.html">Map #1</a>
                    <a class="dropdown-item" href="#">Map #2</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">아직 미정</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pharmacyFinder.php">Product</a>
            </li>
        </ul>
    </div>
</nav>

<div id="map" style="width:100%; height: 80%;"></div>
<a href="product.html"><div id="jumbotron-mask" style="width:100%; height: 200px; text-align: center; justify-content: center">
    </div></a>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwnmPJrhlY9o8DvKqRRoBIzDFDLsDckbg&libraries=places&callback=initMap" async defer></script>
</body>
</html>