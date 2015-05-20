<?php
//
// 程式起始頁
//
// Model – 持有資料、狀態、程式邏輯，並提供介面供人取得資料與狀態。
// View – 用來呈現 Model 中的資料與狀態。
// Controller – 取得使用者的輸入後，並解讀此輸入以轉換成 Model 對應的動作。
//
//vref:http://app.essoduke.org/tinyMap/
//

session_start();
require("config.php"); 


$page_view = '
    <div class="navbar-wrapper">
      <div class="container">
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
                <li class="active"><a href="#">'.$system_config['host_name'] .'</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$system_config['trash_title'].'<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">'.$system_config['trash'].'</a></li>
                    <li><a href="#">'.$system_config['trash_detail'].'</a></li>
                  </ul>
                </li>
                <li><a href="#about">'.$system_config['news'].'</a></li>
                <li><a href="#contact">'.$system_config['readme_and_feedback'].'</a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
';


$page_view = $page_view.'
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(51.508742,-0.120850);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, "load", initialize);
</script>

<div id="googleMap" style="width:500px;height:380px;"></div>
';

$page_view = $page_view.'
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="./images/map2.png" alt="Generic placeholder image" width="140" height="140">
          <h2>'.$system_config['trash_title'].'</h2>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
              前往
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$system_config['trash'].'</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$system_config['trash_detail'].'</a></li>
            </ul>
          </div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="./images/board.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>'.$system_config['news'].'</h2>
          <p><a class="btn btn-primary" href="#" role="button">前往</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="./images/question.png" alt="Generic placeholder image" width="140" height="140">
          <h2>'.$system_config['readme_and_feedback'].'</h2>
          <p><a class="btn btn-primary" href="#" role="button">前往</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
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
	<?php 
	echo $page_view; 
	?>
  </body>
</html>
