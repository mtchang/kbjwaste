<?php
// Geocoding Service

$api_key = "AIzaSyCNw6NuuVlyhvX6NuW-2kU_dNyHbRUBFQw";

$address = '高雄市仁武區八卦里京中五街300號';
$get_curl_url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=FALSE';
$get_xml_url = 'http://maps.googleapis.com/maps/api/geocode/xml?address='.$address.'&sensor=FALSE';
// http://maps.googleapis.com/maps/api/json?key=AIzaSyCNw6NuuVlyhvX6NuW-2kU_dNyHbRUBFQw&sensor=FALSE&address=高雄市仁武區八卦里京中五街300號

// http://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=SET_TO_TRUE_OR_FALSE&address=高雄市仁武區八卦里京中五街300號
var_dump($get_curl_url);
echo '<a href="'.$get_curl_url.'">'.$get_curl_url.'</a>';

// 建立CURL連線
$ch = curl_init();

// 設定擷取的URL網址
curl_setopt($ch, CURLOPT_URL, "$get_curl_url");
curl_setopt($ch, CURLOPT_HEADER, false);

//將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

// 執行
$map_json_curl = curl_exec($ch);

$map_json = json_decode($map_json_curl, true);
// var_dump($map_json);
// print_r($map_json);
$json_debug=NULL;
// 取得GPS資訊
$json_value["lat"] 		= $map_json["results"][0]["geometry"]["location"]["lat"];
$json_value["lng"] 	= $map_json["results"][0]["geometry"]["location"]["lng"];

echo "<br>JSON debug:  ";
// echo $map_json[results];
var_dump($json_value);

// 關閉CURL連線
curl_close($ch)

?>
