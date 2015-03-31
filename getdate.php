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
		$address = $country.$line["行政區"].$line["里別"].$line["停留地點"].','.$line["停留點編號"].'_'.$line["停留時間"];
		$address = trim($address);
		// var_dump($address);
		echo $address."\n";
		$i++;
	}
	
	if($i == 50) {
	  //break;
	}
}



?>
