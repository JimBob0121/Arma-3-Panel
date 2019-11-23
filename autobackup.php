<?php
$page = 1;
include("class/steamlogin.php");
include("class/functions.php");

$cfg_ = parse_ini_file("./config/config.ini",true);
include("config/load_vars.php");

try {
	$cVar_main_db_c89712h = new PDO('mysql:host=localhost; dbname=armalife', 'panel', '4KZewb3nW8exhcFs'); 
	$cVar_main_db_c89712h->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_main_db_c89712h->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}

try {
	$cVar_main_db_c89712h2 = new PDO('mysql:host=localhost; dbname=armalife', 'panel', '4KZewb3nW8exhcFs'); 
	$cVar_main_db_c89712h2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_main_db_c89712h2->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}


try {
	$cVar_second_db_nfasd8 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');
	$cVar_second_db_nfasd8->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_second_db_nfasd8->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}

$tableX = array();
backup_tables($cVar_main_db_c89712h, $tableX, $jVar_DBNAME);
$tableZ = array();
backup_tables($cVar_second_db_nfasd8, $tableZ, $jVar_Steam_DB);
$tableY = array();
backup_tables($cVar_main_db_c89712h2, $tableY, $jVar_DBNAME2);

echo "AN AUTOMATIC BACKUP HAS BEEN PERFORMED.";
echo "THESE BACKUPS ARE MADE EVERY 4 HOURS.";

$cVar_main_db_c89712h=null;
$cVar_second_db_nfasd8=null;
$cVar_main_db_c89712h2=null;
?>