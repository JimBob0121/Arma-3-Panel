<?php
////////////////////////////////////////////
//				 Panel Fix		          //
//  			by Chapo Guzman		      //
//				Web Developer			  //
////////////////////////////////////////////

$page = 1;
include("class/steamlogin.php");
include("class/functions.php");

$cfg_ = parse_ini_file("./config/config.ini",true);
include("config/load_vars.php");

try {
	$cVar_main_db_c89712h = new PDO('mysql:host=localhost', 'alrppanel', 'WxZUwUU0lV9g7LVvSg70OJNkv');
	$cVar_main_db_c89712h->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_main_db_c89712h->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}
	
	$GG=$cVar_main_db_c89712h->prepare("SET global max_connections = 99999999");
	$GG->execute();
	echo "use this to fix panel you cry baby sack of shits. Thanks panel is fixed pz!";
	$cVar_main_db_c89712h = null;
?>