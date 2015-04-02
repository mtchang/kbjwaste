#!/usr/bin/php

<?php
//
// 轉換資料成為 address 查詢座標的程式
// user: http://gissrv4.sinica.edu.tw/gis/tools/geocoding.aspx
//
// by mtchang.tw@gmail.com


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
//
//
function address2geometry($address) {
	$api_key = "AIzaSyCNw6NuuVlyhvX6NuW-2kU_dNyHbRUBFQw";
	$address = '高雄市仁武區八卦里京中五街300號';
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
	// var_dump($map_json);
	// print_r($map_json);
	$json_debug=NULL;
	// 取得GPS資訊
	$json_value["lat"] 		= $map_json["results"][0]["geometry"]["location"]["lat"];
	$json_value["lng"] 	= $map_json["results"][0]["geometry"]["location"]["lng"];

	echo "<br>JSON debug:  ";
	// echo $map_json[results];
	var_dump($json_value);
	
	sleep(1);
	// 關閉CURL連線
	curl_close($ch);

	return($json_value);
}
//
//


$filename = 'trash_map.csv';
$arr = csv_to_array($filename);

$country = "高雄市";

$i=0;
foreach ($arr as &$line) {
	// var_dump($contents);
	//$line = str_getcsv($value);
	if($line["行政區"] == "仁武區" AND $line["里別"] == "八卦里") {
		// var_dump($line);
		// $address = $i.','.$country.$line["行政區"].$line["里別"].$line["停留地點"].',,,';
		$address = $country.$line["行政區"].$line["里別"].$line["停留地點"];
		$address_desc = $line["停留時間"].'_'.$line["責任區"].'_'.$line["車次"].'_'.$line["停留點編號"];
		// $address = trim($address).','.$i.'_'.base64_encode($address_desc);
		// var_dump($address);
		echo $address."\n";
		
		$address_geometry = address2geometry($address);
		var_dump($address_geometry);
		$i++;
	}
	
	if($i == 3) {
	  break;
	}
}



?>
