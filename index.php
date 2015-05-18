<?php
//
// 程式起始頁
//
// Model – 持有資料、狀態、程式邏輯，並提供介面供人取得資料與狀態。
// View – 用來呈現 Model 中的資料與狀態。
// Controller – 取得使用者的輸入後，並解讀此輸入以轉換成 Model 對應的動作。

session_start();
require("config.php"); 
require("model.php"); 

@$page_controller	= filter_var($_GET["p"], FILTER_UNSAFE_RAW);

if($page_controller == 'hello') {
	$page_view 			= model("hello");
}else{
	$page_view 			= model("hello");
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>title</title>


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
