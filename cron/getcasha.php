<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////
ini_set('max_execution_time', 0);

include("../config/db.php");

try {
	$cVar_main_db_c89712h = new PDO('mysql:host='.$jVar_DBHOST.'; dbname='.$jVar_DBNAME, $jVar_DBUSER, $jVar_DBPASS); 
	$cVar_main_db_c89712h->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_main_db_c89712h->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}

try {
	$cVar_second_db_nfasd8 = new PDO('mysql:host='.$jVar_Steam_HOST.'; dbname='.$jVar_Steam_DB, $jVar_Steam_USER, $jVar_Steam_PASS); 
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
		$queryxx2="SELECT pid, cash, bankacc FROM players";
		
		$c231a1=$cVar_main_db_c89712h->prepare($queryxx2);
		$c231a1->execute();
		$resul232xxxt=$c231a1->fetch(PDO::FETCH_ASSOC);
		$iteratorxx = new IteratorIterator($c231a1);
		
		
		foreach ($iteratorxx as $row) {
			$id=$row['pid'];
			$cash=$row['cash'];
			$bank=$row['bankacc'];
			
			$totalcash=($cash+$bank);
			$q2a="SELECT * FROM anticheat WHERE pid='$id'";
			$c2ss=$cVar_second_db_nfasd8->prepare($q2a);
			$c2ss->execute();
			$resultxx=$c2ss->fetch(PDO::FETCH_ASSOC);
			if($resultxx) {
				//Update Cash
				$update32=$cVar_second_db_nfasd8->prepare("UPDATE anticheat SET cash='$totalcash' WHERE pid='$id'");
				$update32->execute();
				//echo $id."<BR>";
				//echo "Pril is a pedo";
			} else {
				$update322=$cVar_second_db_nfasd8->prepare("INSERT INTO `anticheat` ( `pid` , `cash` ) VALUES ( '$id', '$totalcash' )");
				$update322->execute();
			}					
		}
		
		?>
	</body>
</html>

<?php
/* Close Database Connections one page has loaded */
$cVar_main_db_c89712h = null;
$cVar_second_db_nfasd8 = null;
?>