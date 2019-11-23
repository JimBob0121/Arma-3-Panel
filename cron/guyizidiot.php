<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////
ini_set('max_execution_time', 0);
include("../config/db.php");

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
		$q1asd=$cVar_main_db_c89712h->prepare("SELECT name,pid,cash,bankacc,adminlevel FROM players");
		$q1asd->execute();
		
		$result321=$q1asd->fetch(PDO::FETCH_ASSOC);
		$iterator22 = new IteratorIterator($q1asd);
		foreach ($iterator22 as $row) {
			$id=$row['pid'];
			$cash=$row['cash'];
			$bank=$row['bankacc'];
			$anigga=$row['adminlevel'];
			$totalcash=($cash+$bank);
			
			$q2sss="SELECT pid,cash FROM anticheat WHERE pid='$id'";
			$c2xss=$cVar_second_db_nfasd8->prepare($q2sss);
			$c2xss->execute();
			$c2xss->bindColumn('cash', $oldcash);
			$resultaa=$c2xss->fetch(PDO::FETCH_ASSOC);
			if($resultaa && $anigga < 10) {
				if($totalcash > ($oldcash+600000)) {
					// Flag User
					if(file_exists("../flagged/".$id.".txt")) {
						$time=date('D M j G:i:s');
						$file = "../flagged/".$id.".txt";
						$current = file_get_contents($file);
						file_put_contents($file,"".$time." | ".$row['name']."(".$id.") - Has been flagged by the anti cheat! (Old Cash: ".$oldcash." | New Cash: ".$totalcash.") \r\n" . $current);
					} else { 
						$file = fopen("../flagged/".$id.".txt","w");  
						$time=date('D M j G:i:s');
						fwrite($file,"".$time." | ".$row['name']."(".$id.") - Has been flagged by the anti cheat! (Old Cash: ".$oldcash." | New Cash: ".$totalcash.") \r\n");  
						fclose($file); 
					}
					$q22a="SELECT pid FROM anticheat WHERE pid='$id'";
					$c2ssa=$cVar_second_db_nfasd8->prepare($q22a);
					$c2ssa->execute();
					$resultxxx=$c2ssa->fetch(PDO::FETCH_ASSOC);
					if($resultxxx) {
						$nquer77=$cVar_second_db_nfasd8->prepare("INSERT INTO flagged (pid) VALUES ('$id')");
						$nquer77->execute();
					}
				}
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