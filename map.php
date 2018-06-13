<?php
    include("dataFile.php");
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Font-awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



    <title>미세루트</title>
    <link rel="stylesheet" type="text/css" href="styles/map.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">


    <style type="text/css">
        #legal-disclaimer {
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
            padding: 30px;
        }

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }
        #right-panel {
            height: 100%;
            width: 390px;
            overflow: auto;
        }
        #jumbotron-pharmacy{
            margin-bottom: 0px;
            background-image: url("images/pharmacy.png");
            background-position: 0% 25%;
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
        }
        #jumbotron-pharmacy: hover{
            margin-bottom: 0px;
            background-image: url("images/pharmacy.png");
            background-position: 0% 25%;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.7;
            color: white;
        }
        



    </style>

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

<!--길 찾기 to-->
<div style="position: relative; padding-left: 3rem;padding-right: 3rem; margin: 1rem -15px 0">
    <form>
        <div class="form-group">
            <label for="directionFrom">출발지</label>
            <input name="directionFrom" id="directionFrom" type="text" class="form-control"  placeholder="출발지점">
            <button id="current-location-search" type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-screenshot"></span>현재위치로 시작
            </button>
        </div>
        <div class="form-group">
            <label for="directionTo">도착지</label>
            <input name="directionTo" id="directionTo" type="text" class="form-control" placeholder="도착지점">
        </div>

        <button type="button" class="btn btn-primary" onclick="calcRoute()">미세루트</button>
    </form>
</div>

<!--맵 표시-->
<div id="map-canvas">

</div>
<div id="right-panel-background" class="flex-container-column-center" style="width:100%;">
<div id="right-panel"  style="padding: 10px"></div>
</div>
<div id="jumbotron-pharmacy" style="width:100%; height: 150px; text-align: center; justify-content: center">
    <a href="pharmacyFinder.php" style="text-decoration: none; font-size: 30px; color: white">내 주변 <strong>약국</strong>찾기</a>
</div>
<footer>
    <div id="legal-disclaimer" style="font-size: 10px">
        <p><em>미세Route 사전 동의 없이 웹사이트 일체의 정보, 콘텐츠 및 UI 등을 상업적 목적으로 전재, 전송, 스크래핑 등 무단 사용 할 수 없습니다</em><br></p>
        <p><span style="color:greenyellow">고객센터: 02–0424-2525</span></p>
        <p>사업장: 연세대학교 중앙도서관 창업센터</p>
        <p>Email: miseroot@gmail.com</p>
        <p><a href="#" style="margin-right: 10px; border-right: solid 2px white; padding: 10px">개인정보처리방침</a><a href="#">약관</a></p>
        <p>Copyright &copy;미세Route Co., Ltd. All Rights Reserved</p>
    </div>
</footer>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAu8GSiXzCiJjsDQx5l_ALsNH0rXIzjv2k"></script>
<script src="geolocation_marker.js"></script>
    <script>
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();
        var map;
        var latitude = null;
        var longitude = null;
        var formatted_address = null;

        function getLocation() {
            var bool = false;
            bool = <?php echo isset($_COOKIE['lat'])?>;
            if(bool === 1){
                latitude = <?php echo $_COOKIE['lat'];?>;
                longitude = <?php echo $_COOKIE['lng'];?>;
                return;
            }
            if (navigator.geolocation)
            {
                navigator.geolocation.watchPosition(showPosition);
                {enableHighAccuracy:true}
            } else {
                alert("browser does not support GEOLOCATION");
            }
        }
        function showPosition(position) {

            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            document.cookie = "lat=" + lat;
            document.cookie = "lng=" + lng;
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 15,
                center: {lat: latitude, lng: longitude},
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            document.getElementById('right-panel-background').style.display="none";

            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('right-panel'));
            var GeoMarker = new GeolocationMarker(map);
            var data = <?php echo $dDustPair?>;

            function maskMap() {

                for (var obj in data) {
                    var coords;
                    coords = data[obj]['geometry'];
                    var _fillColor;
                    _fillColor = data[obj]['color'].split(" ")[0];
                    var lv = data[obj]['level'];
                    var data_spray = new google.maps.Polygon({
                        paths: coords, // district boundary
                        strokeColor: _fillColor, // level line color
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: _fillColor, // level fill color
                        fillOpacity: 0.30
                    });
                    data_spray.setMap(map);
                }

            }
            // Construct the polygon.
            maskMap()
        }

        function calcRoute() {
            var start = document.getElementById('directionFrom').value;
            var end = document.getElementById('directionTo').value;

            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.DirectionsTravelMode.TRANSIT
            };
            directionsService.route(request, function(response, status) {
                alert(status);  // 확인용 Alert..미사용시 삭제
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
            document.getElementById('right-panel-background').style.display="";
            document.getElementById('right-panel-background').style.backgroundColor = "#D6FFE5";
        }

        document.getElementById('current-location-search').addEventListener('click',function (ev) {
            document.getElementById('directionFrom').value = <?php include('myLocationData.php'); echo getMylocationDataString($_COOKIE['lat'],$_COOKIE['lng']);?>;
        });

        getLocation();
        initMap();
</script>
</body>
</html>