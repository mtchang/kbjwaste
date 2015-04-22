<?php 
// -------------------------------------------------------------------------------------
// 切換系統模式及資料庫
// -------------------------------------------------------------------------------------


//$system_mode = 'release';
$system_mode = 'developer';
if($system_mode == 'developer') {
	// sql DB infomation -- for develop
	$dbhost		='localhost';
	$dbname		='kbjwaste';
	$dbuser		='';
	$dbpassword	='';
	// ---- WEB
	$host_url 	= 'http://localhost/kbjwaste/';
}elseif($system_mode == 'release') {
	// sql DB infomation -- for develop
	$dbhost		='localhost';
	$dbname		='kbjwaste';
	$dbuser		='';
	$dbpassword	='';
	// ---- WEB
	$host_url 	= 'http://kbjwaste.jangmt.com/';
}else{
	// 沒有設定 STOP
	die('system mode set error.');
}


//
// 連接資料庫的的設定,預設將 set name utf8 開啟
//

try {
	// 在 PDO 宣告的時候就要將編碼一併宣告。 ref.pdo-mysql.connection
	global $dbh;
	$dsn = "mysql:host=$dbhost;dbname=$dbname";
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
	$dbh = new PDO($dsn, $dbuser, $dbpassword, $options);
	
	//$sql = "set name utf8;";
	/*$host_url
	$sql = "SELECT * FROM `People` WHERE 1 LIMIT 0, 30 ";
	$stmt = $dbh->prepare("$sql");
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_OBJ);	
	var_dump($sql);
	var_dump($result);
	*/
} catch (PDOException $e) {
    print "DB connect Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
