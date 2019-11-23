<?php
ini_set('memory_limit', '-1');
if($jVar_LOCKDOWN == 1) {
	?>
	<body background="img/lockdown.jpg" style="background-size: cover;-moz-background-size: cover;">
	<center style="position:relative;top:40%;"><h1 style="color:red;font-size:30px; font-type:Arial;">!WARNING!<br>A SECURITY BREACH WITH THE STAFF PANEL HAS BEEN DETECTED UNTIL THIS HAS BEEN RESOLVED ACCESS TO THE PANEL IS RESTRICTED.</h1></center>
		<audio autoplay="autoplay">
			<source src="img/siren.wav">
		</audio>
		<center style="position:relative;top:40%;"><h1 style="color:red;font-size:90px;">!!LOCKDOWN!!<br>LOGOUT FORCED</h1></center>
	</body>
	
	<?php
	setcookie('steamID', '', -1, '/'); 
	exit;
}
function KickBackNerd() {
	echo "NAUGHTY......";
	return;
}

function LogAction($type,$log,$date) {
	if($type == 1) { //Player Log
		$file = "logs/chapoisbea-Huskiesxx/players.txt";
	} else if($type == 2) { //Vehicle Log
		$file = "logs/chapoisbea-Huskiesxx/vehicles.txt";
	} else if($type == 3) { //Gang Log
		$file = "logs/chapoisbea-Huskiesxx/gangs.txt";
	} else if($type == 4) { //Support Log
		$file = "logs/chapoisbea-Huskiesxx/support.txt";
	} else if($type == 5) { //Database/Other Log
		$file = "logs/chapoisbea-Huskiesxx/other.txt";
	}
	$current = file_get_contents($file);
	file_put_contents($file,"".$log."\r\n" . $current);	
}

$tables = array();
function backup_tables($DBH, $tables, $svname) {
	$DBH->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL );
	$BACKUP_PATH = "backups/";
	$nowtimename = time();
	$handle = fopen($BACKUP_PATH.$nowtimename.' - '.$svname.'.sql','a+');
	$numtypes=array('tinyint','smallint','mediumint','int','bigint','float','double','decimal','real');
	if(empty($tables)) {
		$pstm1 = $DBH->query('SHOW TABLES');
		while ($row = $pstm1->fetch(PDO::FETCH_NUM)) {
			$tables[] = $row[0];
		}
	} else {
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	foreach($tables as $table) {
		$result = $DBH->query("SELECT * FROM $table");
		$num_fields = $result->columnCount();
		$num_rows = $result->rowCount();
		$return="";
		$pstm2 = $DBH->query("SHOW CREATE TABLE $table");
		$row2 = $pstm2->fetch(PDO::FETCH_NUM);
		$ifnotexists = str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $row2[1]);
		$return.= "\n\n".$ifnotexists.";\n\n";
		fwrite($handle,$return);
		$return = "";
		if ($num_rows){
			$return= 'INSERT INTO `'."$table"."` (";
			$pstm3 = $DBH->query("SHOW COLUMNS FROM $table");
			$count = 0;
			$type = array();
			while ($rows = $pstm3->fetch(PDO::FETCH_NUM)) {
				if (stripos($rows[1], '(')) {$type[$table][] = stristr($rows[1], '(', true);
				} else $type[$table][] = $rows[1];
				$return.= "`".$rows[0]."`";
				$count++;
				if ($count < ($pstm3->rowCount())) {
					$return.= ", ";
				}
			}
			$return.= ")".' VALUES';
			fwrite($handle,$return);
			$return = "";
		}
		$count =0;
		while($row = $result->fetch(PDO::FETCH_NUM)) {
			$return= "\n\t(";

			for($j=0; $j<$num_fields; $j++) {
				if (isset($row[$j])) {
					if ((in_array($type[$table][$j], $numtypes)) && (!empty($row[$j]))) $return.= $row[$j] ; else $return.= $DBH->quote($row[$j]); 
				} else {
					$return.= 'NULL';
				}
				if ($j<($num_fields-1)) {
					$return.= ',';
				}
			}
			$count++;
			if ($count < ($result->rowCount())) {
				$return.= "),";
			} else {
				$return.= ");";
			}
			fwrite($handle,$return);
			$return = "";
		}
		$return="\n\n-- ------------------------------------------------ \n\n";
		fwrite($handle,$return);
		$return = "";
	}
	fclose($handle);
}

if(isset($_COOKIE['steamID'])){
	if($cVar_Staffname == "" || $cVar_Staffname == "null") { 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (!empty($_POST["staffname"])) {
				$staffid=$_POST['staffid'];
				$staffname=$_POST['staffname'];
				
				try {
					$cVar_second_db_nfasd8 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');
					$cVar_second_db_nfasd8->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$cVar_second_db_nfasd8->exec("SET CHARACTER SET utf8");
				}
				catch(PDOException $err) {
					echo "Connection failed!". $err->getMessage();
					die();
				}
				$sta86sd=$cVar_second_db_nfasd8->prepare("UPDATE accounts SET staffname='$staffname' WHERE pid='$staffid'");
				$sta86sd->execute();
				$cVar_second_db_nfasd8 = null;
				?>
				<div class="alert_suc alert alert-dismissable alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						×
					</button>
					<h4>Staff Name Successfully Set!</h4> 
					<i>NOTE: All actions are logged!</i>
				</div>
			<?php
				echo "<meta http-equiv='refresh' content='0;url=https://localhost/index.php' />";
			}
		}
		$staffaid=decryptCookie($_COOKIE["steamID"]);
		try {
			$cVar_second_db_nfasd8 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');
			$cVar_second_db_nfasd8->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$cVar_second_db_nfasd8->exec("SET CHARACTER SET utf8");
		}
		catch(PDOException $err) {
			echo "Connection failed!". $err->getMessage();
			die();
		}
		$sdgsdgsa12 = $cVar_second_db_nfasd8->prepare("SELECT staffname FROM accounts WHERE pid=$staffaid");
		$sdgsdgsa12->execute();
		if ($sdgsdgsa12->rowCount() > 0) {
			$sdgsdgsa12->setFetchMode(PDO::FETCH_ASSOC);
			$iterator = new IteratorIterator($sdgsdgsa12);
			foreach ($iterator as $row) {
				$staffn=$row['staffname'];
				if($staffn == "" || $staffn == "null") { ?>
					<div style="height:225px;width:500px;background-color:white;border:solid;border-radius:5px 5px 5px 5px;z-index:9999999;position:fixed;top:45%;left:40%;padding-right:10px;padding-left:10px;padding-top:15px;">
						<center>Please enter your staff name below!</center>
						<br>
						<center><label for="staffname">Staff Name</label></center>
						<form method="POST">
							<input type="hidden" required class="form-control" id="staffid" name="staffid" value=<?=$cVar_ID?>><br>
							<input type="text" required class="form-control" id="staffname" name="staffname"><br>
							<button type="submit" class="btn btn-block btn-primary" style="font-size:18px;">Submit</button>
						</form>
					</div>
			<?php
				}
			}
		}
		$cVar_second_db_nfasd8 = null;
	}
	// 2STEPVERIFICATION
	try {
		$cVar_second_db_nfasd8a = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');
		$cVar_second_db_nfasd8a->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$cVar_second_db_nfasd8a->exec("SET CHARACTER SET utf8");
	}
	catch(PDOException $err) {
		echo "Connection failed!". $err->getMessage();
		die();
	}
	$staffaida=decryptCookie($_COOKIE["steamID"]);
	$TWOSTEP_Q="SELECT ip FROM accounts WHERE pid='$staffaida'";
	$TWOSTEP_S=$cVar_second_db_nfasd8a->prepare($TWOSTEP_Q);
	$TWOSTEP_S->execute();
	$CLIENTDATA=$TWOSTEP_S->fetch();
	$CLIENTIP=$CLIENTDATA["ip"];
	if($CLIENTIP === "" || $_SERVER["REMOTE_ADDR"] != $CLIENTIP) {
		if($DATA != 3) {
			echo "<meta http-equiv='refresh' content='0;url=https://localhost/2step.php' />"; 
			exit;
		}
	}
	$cVar_second_db_nfasd8a=null;
	
}



?>