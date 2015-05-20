<?php
//
// 程式起始頁
//
// Model – 持有資料、狀態、程式邏輯，並提供介面供人取得資料與狀態。
// View – 用來呈現 Model 中的資料與狀態。
// Controller – 取得使用者的輸入後，並解讀此輸入以轉換成 Model 對應的動作。
//
//

session_start();
require("config.php"); 


$page_view = '
<div class="row">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img valign="center" src="./images/pic5.png" height="40"  vspace="5" style="float:left;">
        <a class="navbar-brand" href="#">&nbsp&nbsp'.$system_config['host_name'].'</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#">'.$system_config['trash'].'</a></li>
          <li><a href="#">'.$system_config['trash_detail'].'</a></li>
          <li><a href="#about">'.$system_config['news'].'</a></li>
          <li><a href="#contact">'.$system_config['readme_and_feedback'].'</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>    
';



$page_view = $page_view.'
<div class="row">
  <script
  src="http://maps.googleapis.com/maps/api/js">
  </script>

  <script>
  var myCenter=new google.maps.LatLng(22.6811803, 120.3392053);
  var marker;

  function initialize()
  {
  var mapProp = {
    center:myCenter,
    zoom:17,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };

  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

  var marker=new google.maps.Marker({
    position:myCenter,
    });

  marker.setMap(map);
  }

  google.maps.event.addDomListener(window, "load", initialize);
  </script>

  <div id="googleMap" style="width:100%;height:380px;"></div>
</div>
';





$page_view = $page_view.'
<div class="row">

  <div class="col-xs-4">
    <a href="#" title="'.$system_config['trash'].'">
    <img class="img-circle" src="./images/map2.png" alt="Generic placeholder image" width="100" height="100">
    </a>
  </div>

  <div class="col-xs-4">
    <a href="#" title="'.$system_config['trash_detail'].'">
    <img class="img-circle" src="./images/map.png" alt="Generic placeholder image" width="100"  height="100">
    </a>
  </div>


  <div class="col-xs-4">
    <a href="#" title="'.$system_config['news'].'">
    <img class="img-circle" src="./images/information2.png" alt="Generic placeholder image" width="100" height="100">
    </a>
  </div>

  <div class="col-xs-4">
    <a href="#" title="'.$system_config['readme_and_feedback'].'">  
    <img class="img-circle" src="./images/information.svg" alt="Generic placeholder image" width="100" height="100">
    </a>
  </div>

</div>
';


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $system_config['host_name']; ?></title>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="import/jquery-1.11.3.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="import/bs/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="import/bs/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="import/bs/js/bootstrap.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
  <div class="navbar-wrapper">
    <div class="container">
	<?php 
	echo $page_view; 
	?>
    </div>
  </div>
  </body>
</html>
