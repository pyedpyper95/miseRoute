<?php
/**
 * Created by PhpStorm.
 * User: HojaeYoon
 * Date: 2018. 6. 9.
 * Time: PM 4:58
 */
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>

        var lat;
        var lng;
        var latString ="";
        var lngString ="";
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
                {
                    enableHighAccuracy:true
                }
            }
        }

        function showPosition(position) {
            console.log("edafsda");
            lat = position.coords.latitude;
            lng = position.coords.longitude;
            latString = lat.toString();
            lngString = lng.toString();
            document.cookie = "lat=" + latString;
            document.cookie = "lng=" + lngString;
            var myDistrictData = <?php
                include('myLocationData.php');
                if (isset($_COOKIE['lat'])) {
                    $lat = $_COOKIE['lat'];
                    $lng = $_COOKIE['lng'];
                    echo getMylocationDataString($lat, $lng);
                }
                ?>;
            console.log(typeof  myDistrictData);
        }

        getLocation();

    </script>

</body>
</html>