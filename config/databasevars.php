<?php
/* Database Information & Variables */
$cfg_ = parse_ini_file("config.ini",true);
include("db.php");
if(isset($_COOKIE['steamID'])){ 
	$cookieID=decryptCookie($_COOKIE["steamID"]);
	
	
	try {
		$cVar_connect_vol00 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');
		$cVar_connect_vol00->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$cVar_connect_vol00->exec("SET CHARACTER SET utf8");
		
		$cVar_run_query_nsadss = "SELECT * FROM accounts WHERE pid='$cookieID'";	
		$cVar_run_statement123s = $cVar_connect_vol00->prepare($cVar_run_query_nsadss);
		$cVar_run_statement123s->execute();
		$cVar_run_statement123s->bindColumn('avatarurl', $cVar_Steam_Avatar);
		$cVar_run_statement123s->bindColumn('staffname', $cVar_Staffname);
		$cVar_run_statement123s->bindColumn('TotalCases', $cVar_TotalCases);
		$cVar_run_statement123s->bindColumn('WeeklyCases', $cVar_WeeklyCases);
		$cVar_run_statement123s->bindColumn('FormalWarnings', $cVar_FormalWarnings);
		$cVar_run_statement123s->bindColumn('pid', $cVar_ID);
		while($row=$cVar_run_statement123s->fetch(PDO::FETCH_BOUND)) {
		}
	}
	catch(PDOException $err) {
		echo "Connection failed!". $err->getMessage();
		die();
	}

	try {
		$cVar_connect_a12 = new PDO('mysql:host=localhost; dbname=armalife', 'panel', '4KZewb3nW8exhcFs'); 
		$cVar_connect_a12->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$cVar_connect_a12->exec("SET CHARACTER SET utf8");		
		$cVar_query_am8 = "SELECT * FROM players WHERE pid='$cookieID'";	
		$cVar_run_ejc87 = $cVar_connect_a12->prepare($cVar_query_am8);
		$cVar_run_ejc87->execute();
		$cVar_run_ejc87->bindColumn('adminlevel', $cVar_Admin);
		while($row=$cVar_run_ejc87->fetch(PDO::FETCH_BOUND)) {
		}		
	}
	catch(PDOException $err) {
		echo "Connection failed!". $err->getMessage();
		die();
	}
	
	
	$cVar_run_query_nsad8=$cVar_connect_vol00->prepare("SELECT * FROM accounts WHERE pid='$cookieID'");
	$cVar_run_query_nsad8->execute();
	$cVar_run_query_nsad8->bindColumn('avatarurl', $cVar_Steam_Avatar);
	$cVar_run_query_nsad8->bindColumn('staffname', $cVar_Staffname);
}


?>