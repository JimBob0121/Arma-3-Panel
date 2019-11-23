<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////
ini_set('max_execution_time', 0);
require_once("../class/encryption.php");
$page = 3;

$cfg_ = parse_ini_file("../config/config.ini",true);
include("../config/load_vars.php");

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
	$cVar_second_db_nfasd8 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');  
	$cVar_second_db_nfasd8->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_second_db_nfasd8->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}

?>

<html lang="en">
	<body>
		<?php 
		$q7722asx="SELECT * FROM points_logs WHERE date < (CURDATE() - INTERVAL 6 DAY) AND active = 1";
		$stsm=$cVar_second_db_nfasd8->prepare($q7722asx);
		$stsm->execute();
		$stsm->setFetchMode(PDO::FETCH_ASSOC);
		$iteratorss = new IteratorIterator($stsm);
		foreach ($iteratorss as $row) {
			$amount=$row['amount'];
			$uid=$row['uid'];
			$pid=$row['pid'];
			$sd7a=$cVar_second_db_nfasd8->prepare("UPDATE points_logs SET active=0 WHERE uid='$uid'");
			$sd7a->execute();
			$sd7az=$cVar_second_db_nfasd8->prepare("UPDATE points SET points=points-$amount WHERE pid='$pid'");
			$sd7az->execute();
		}
		$nigga="UPDATE points SET points=0 WHERE points < 0";
		$n123=$cVar_second_db_nfasd8->prepare($nigga);
		$n123->execute();
		echo "point cron ran....";
		?>
		
	</body>
</html>


<?php
/* Close Database Connections one page has loaded */
$cVar_main_db_c89712h = null;
$cVar_second_db_nfasd8 = null;
?>