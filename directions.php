<?php
/**
 * Created by PhpStorm.
 * User: HojaeYoon
 * Date: 2018. 6. 2.
 * Time: PM 6:38
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style type="text/css">
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

        #map-canvas, #map_canvas {
            height: 70%;
        }
        #path-canvas {
            height: 30%;
        }
        @media print {
    html, body {
        height: auto;
    }

            #map_canvas {
                height: 650px;
            }
        }

        #panel {
            position: absolute;
            top: 5px;
            left: 50%;
            margin-left: -180px;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAu8GSiXzCiJjsDQx5l_ALsNH0rXIzjv2k"></script>

    <script>
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();
        var map;

        function initialize() {
            var center = new google.maps.LatLng(37.556093, 126.937029);
            var mapOptions = {
                zoom:15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: center
            };
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('path-canvas'));
        }

        function calcRoute() {
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
            var mode = document.getElementById('mode').value;

            var request = {
                origin: start,
                destination: end,
                travelMode: eval("google.maps.DirectionsTravelMode."+mode)
            };
            directionsService.route(request, function(response, status) {
                alert(status);  // 확인용 Alert..미사용시 삭제
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
<div id="panel" >
    <b>Start: </b>
    <input type="text" id="start" />
    <b>End: </b>
    <input type="text" id="end" />
    <div>
        <strong>Mode of Travel: </strong>
        <select id="mode">
            <option value="DRIVING">Driving</option>
            <option value="WALKING">Walking</option>
            <option value="BICYCLING">Bicycling</option>
            <option value="TRANSIT">Transit</option>
        </select>
        <input type="button" value="길찾기" onclick="Javascript:calcRoute();" />
    </div>
</div>
<div id="map-canvas"></div>
<div id="path-canvas"></div>
</body>
</html>