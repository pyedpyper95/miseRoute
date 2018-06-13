<!doctype html>
<html lang="en">
  <head>
      <style type="text/css">

          #legal-disclaimer {
              width: 100%;
              background-color: black;
              color: white;
              text-align: center;
              padding: 30px;
          }

      </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">

      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<!-- Font-awesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
      <title>미세Route</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-h2="Toggle navigation">
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
                  <div class="dropdown-menu" aria-h2ledby="navbarDropdown">
                      <a class="dropdown-item" href="map.html">Map #1</a>
                      <a class="dropdown-item" href="#">Map #2</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">아직 미정</a>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="product.html">Product</a>
              </li>
          </ul>
      </div>

  </nav>

  <!--cctv화면-->
    <div id="cctv-panel" class="flex-container-column-center" style="width:100%; height: 340px; background-color: #c5c5c5">
        <embed src='http://its.pyeongtaek.go.kr/js/player/player.swf' width='100%' height='100%' name='movie' flashvars='file=20.stream&amp;streamer=rtmp://61.108.209.102/live/&amp;controlbar=none&amp;autostart=true&amp;stretching=exactfit&amp;duration=&amp;' style='border:0px solid #c5d6ff' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer'>
<!--        <object id=‘mov’ classid=‘clsid:D27CDB6E-AE6D-11cf-96B8-444553540000’ codebase=‘http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0’ width=‘320’ height=‘240’><param name=‘bgcolor’ value=‘#000000’><param name=‘movie’ value=‘http://www.utic.go.kr/contents/js/img/smpa_player.swf’><param name=‘allowfullscreen’ value=‘true’><param name=‘allowscriptaccess’ value=‘always’><param name=‘wmode’ value=‘none’><param name=‘flashvars’ value=‘file=9.stream&amp;streamer=rtmp://61.108.209.102:1935/live&amp;bufferlength=3&amp;autostart=true&amp;stretching=exactfit&amp;fullscreen=true&amp;image=http://www.utic.go.kr/contents/js/img/320240-5.gif&amp;skin=http://www.utic.go.kr/contents/js/img/skin_black30live.swf&amp;frontcolor=FFFFFF&amp;lightcolor=00AEEF&amp;backcolor=111111’><embed src=‘http://its.pyeongtaek.go.kr/js/player/player.swf’ width=‘320’ height=‘240’ name=‘movie’ flashvars=‘file=9.stream&amp;streamer=rtmp://61.108.209.102/live/&amp;controlbar=none&amp;autostart=true&amp;stretching=exactfit&amp;duration=&amp;image=play.png’ style=‘border:0px solid #c5d6ff’ type=‘application/x-shockwave-flash’ pluginspage=‘http://www.macromedia.com/go/getflashplayer’></object>-->
    </div>
    <!--District Info-->
    <div id="info-panel" class="jumbotron jumbotron-top" style="width:100%; background-color: seashell">
        <h1 id="info-panel-h" class="display-4">Loading...</h1>
        <p id="info-panel-p" class="lead"></p>
        <hr class="my-4">
        <p id="info-panel-time" style="color: white; font-size: 10px"></p>
    </div>
    <!--To Map-->
      <div id="info-panel-map" class="jumbotron jumbotron-down text-center" style="width:100%">
          <h1 class="display-5 text-center" style="margin-bottom: 10px;">미세 루트 경로 검색</h1>
          <a class="btn btn-success btn-lg text-center" href="map.php" role="button">경로찾기</a>
          <p style="color: white; font-size: 10px"></p>
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

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript">
      function getLocation() {
          if (navigator.geolocation)
          {
              navigator.geolocation.watchPosition(showPosition);
              {enableHighAccuracy:true}
          } else {
              alert("browser does not support GEOLOCATION");
          }
      }
      function showPosition(position) {

          var lat = position.coords.latitude.toString();
          var lng = position.coords.longitude.toString();
          console.log(lat);
          document.cookie = "lat="+lat;
          document.cookie = "lng="+lng;
          console.log(lat);
          console.log(lng);
          // loadItems();
      }
    getLocation();
  </script>
    <scrpit src="https://code.jquery.com/jquery-2.1.4.min.js"></scrpit>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEFrK71pKn4D0dzTVCjybWKNLQ3OBxOCU&language=ko-KR&region=ko-KR"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  </body>
  <script type="text/javascript">
      var dDustData = <?php include("dataFile.php");
                echo $dDustPair
          ?>;

      var cctv = JSON.parse(<?php echo json_encode(file_get_contents('cctv.json'));?>);

      $(window).bind("load", function() {
          function loadItems(){
              var myDistrictData = <?php
                  include('myLocationData.php');
                  if(isset($_COOKIE['lat'])){
                      $lat = $_COOKIE['lat'];
                      $lng = $_COOKIE['lng'];
                      echo getMylocationData($lat,$lng);
                  } else print_r("error loading");
                  ?>;
              var print="";
              for(var x=0; x<myDistrictData.length; x++){
                  print+=myDistrictData[x]+" ";
              }
              var districtName = myDistrictData[2];
              // document.getElementById('cctv-panel').innerHTML = cctv[districtName]['object'];
              console.log(districtName);
              var info = dDustData[districtName]['color'].split(" ");
              document.getElementById('info-panel').style.backgroundColor = info[0];
              document.getElementById('info-panel-p').innerText = print;
              var currentdate = new Date();
              var datetime = "정보 접근 시간: " + currentdate.getDate() + "/"
                  + (currentdate.getMonth()+1)  + "/"
                  + currentdate.getFullYear() + " @ "
                  + currentdate.getHours() + ":"
                  + currentdate.getMinutes() + ":"
                  + currentdate.getSeconds();
              document.getElementById('info-panel-h').innerHTML = "미세먼지 " + info[1];
              var imageLocation = "";
              switch(info[1]){
                  case "최고":
                  case "좋음":
                  case "양호":
                      imageLocation = "images/P1.png";
                      break;
                  case "보통":
                  case "상당히나쁨":
                      imageLocation = "images/P1.png";
                      break;
                  case "매우나쁨":
                  case "최악":
                      imageLocation = "images/P1.png";
                      break;
                  case "정보없음":
                      imageLocation = "images/good2.png.png";
                      break;
              }
              console.log(imageLocation);
              document.getElementById('info-panel-time').innerHTML = datetime;
              document.getElementById('info-panel').style.backgroundImage = "url('"+imageLocation + "')";

              document.getElementById('info-panel').style.color = "#FFFFFF";
              var cctvAddress = cctv[districtName]['content'];
          }
          loadItems();
      });

  </script>



</html>