#!/usr/bin/php

<?php
//
// 轉換資料成為 address 查詢座標的程式
// user: http://gissrv4.sinica.edu.tw/gis/tools/geocoding.aspx
//
// by mtchang.tw@gmail.com
//
// https://developers.google.com/maps/documentation/geocoding/?hl=zh-tw
//
//


// 
// 將 csv 檔案匯入成為陣列
//
/**
 * Convert a comma separated file into an associated array.
 * The first row should contain the array keys.
 * 
 * Example:
 * 
 * @param string $filename Path to the CSV file
 * @param string $delimiter The separator used in the file
 * @return array
 * @link http://gist.github.com/385876
 * @author Jay Williams <http://myd3.com/>
 * @copyright Copyright (c) 2010, Jay Williams
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
function csv_to_array($filename='', $delimiter=',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				@$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}

//
// 把地址轉換為google map 經緯度資訊
//
function address2geometry($address) {
	$api_key = "AIzaSyCNw6NuuVlyhvX6NuW-2kU_dNyHbRUBFQw";
	// $address = '高雄市仁武區八卦里京中五街300號';
	$address = urlencode(trim($address));
	$get_curl_url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=FALSE';
	// var_dump($get_curl_url);
	// echo '<a href="'.$get_curl_url.'">'.$get_curl_url.'</a>';

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
	//var_dump($map_json);
	// print_r($map_json);
	$json_debug=NULL;
	// 取得GPS資訊
	$json_value["lat"] 		= $map_json["results"][0]["geometry"]["location"]["lat"];
	$json_value["lng"] 		= $map_json["results"][0]["geometry"]["location"]["lng"];

	//echo "<br>JSON debug:  ";
	// echo $map_json[results];
	//var_dump($json_value);
	
	sleep(1);
	// 關閉CURL連線
	curl_close($ch);

	return($json_value);
}
//
//
//

//
// 將垃圾車停留時間轉換成為 sql time 格式
//
function strtime2time($stay_time_var) {
	
	// $stay_time_var = $line["停留時間"];
	//var_dump($stay_time_var);
	$stay_time_var = preg_replace('/ /', "", $stay_time_var);
	$stay_time_var = preg_replace('/~/', "-", $stay_time_var);
	$stay_time_var = preg_replace('/～/', "-", $stay_time_var);
	//var_dump($stay_time_var);
	$stay_time_var = preg_replace('/：/', ":", $stay_time_var);
	//var_dump($stay_time_var);
	$route_time = explode("-", $stay_time_var, 20);
	//var_dump($route_time);
	
	$route_time_0_str = trim($route_time['0']);
	//var_dump($route_time_0_str);
	$route_time['0'] = date('H:i:s', strtotime($route_time_0_str));
	//var_dump($route_time['0']);
	
	$route_time_1_str = trim($route_time['1']);
	//var_dump($route_time_1_str);
	$route_time['1'] = date('H:i:s', strtotime($route_time_1_str));
	//var_dump($route_time['1']);		
	
	return($route_time);
}

//
// 將回收日轉換為阿拉伯數字
//
function str2recoveryday($str_recoveryday) {
	$str_recoveryday = preg_replace('/ /', "", $str_recoveryday);
	$str_recoveryday = preg_replace('/、/', ",", $str_recoveryday);
	$str_recoveryday = preg_replace('/一/', "1", $str_recoveryday);
	$str_recoveryday = preg_replace('/二/', "2", $str_recoveryday);
	$str_recoveryday = preg_replace('/三/', "3", $str_recoveryday);
	$str_recoveryday = preg_replace('/四/', "4", $str_recoveryday);
	$str_recoveryday = preg_replace('/五/', "5", $str_recoveryday);
	$str_recoveryday = preg_replace('/六/', "6", $str_recoveryday);
	$str_recoveryday = preg_replace('/日/', "7", $str_recoveryday);
	return($str_recoveryday);
}

// ======================================================================
//
// main() 
//
// ======================================================================


$filename = 'opendata/kh_trash_map.csv';
// 把檔案內容轉換為陣列
$arr = csv_to_array($filename);

echo "\n-- 檔案 $filename 資料數量：".count($arr)."\n";
// 針對高雄市政府釋放出來的 opendata 轉換並匯入 SQL
// http://data.kaohsiung.gov.tw/Opendata/DetailList.aspx?CaseNo1=AH&CaseNo2=10&Lang=C&FolderType=O
$country = "高雄市";


$i=0;
foreach ($arr as &$line) {
	// 責任區,車次,停留點編號,行政區,里別,停留地點,停留時間,回收日
	//var_dump($line);

	// 拆解時間
	$time_range = strtime2time($line["停留時間"]);
	//var_dump($time_range);
	
	// 拆解回收日
	$recovery_day = str2recoveryday($line["回收日"]);
	//var_dump($recovery_day);

	// 轉換地址
	// $address = $i.','.$country.$line["行政區"].$line["里別"].$line["停留地點"].',,,';
	$address = $country.$line["行政區"].$line["里別"].$line["停留地點"];
	//echo $address."\n";
	// 將地址轉換為經緯度
	$address_geometry = address2geometry($address);
	//var_dump($address_geometry);
	// sleep(2);
	
	$place['country'] 		= 	$country;
	$place['area'] 			= 	$line["責任區"];
	$place['trinNO'] 		= 	$line["車次"];
	$place['stayNO'] 		= 	$line["停留點編號"];
	$place['township'] 		= 	$line["行政區"];
	$place['hometown'] 		= 	$line["里別"];
	$place['stayaddress'] 	= 	trim($line["停留地點"]);
	$place['RecyclingDay'] 	= 	$recovery_day;
	$place['staytime'] 		= 	$line["停留時間"];
	$place['staytime_start']= 	$time_range["0"];
	$place['staytime_end'] 	= 	$time_range["1"];
	$place['Longitude'] 	= 	$address_geometry["lng"];
	$place['Latitude'] 		= 	$address_geometry["lat"];
	// var_dump($place);
	$insertsql		=	"-- $i,$address \n".
	"INSERT INTO `garbagetruck_route` 
	(`gID`, `area`, `trainNO`, `stayNO`, `township`, `hometown`, `stayaddress`, `RecyclingDay`, `staytime`, `staytime_start`, `staytime_end`, `Longitude`, `Latitude`, `updatetime`) 
	VALUES (NULL, '".$place['area']."', '".$place['trinNO']."', '".$place['stayNO']."', '".$place['township']."', '".$place['hometown']."', '".$place['stayaddress']."', '".$place['RecyclingDay']."', '".$place['staytime'] ."', '".$place['staytime_start']."', '".$place['staytime_end']."', '".$place['Longitude']."', '".$place['Latitude']."', CURRENT_TIMESTAMP);";
	echo "\n".$insertsql;
	
	$i++;
	
	//if($i == 3) {
	//  break;
	//}
}
echo "\n";


?>
