<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////

$page = 1;
include("class/steamlogin.php");
$DATA=3;
include("class/functions.php");
if(!isset($_COOKIE['steamID'])){
	header( 'Location: index.php');
	echo "<form action='?login' method='post'>";
	echo "<input href='?login' type='image' src='https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_large_noborder.png'>";
	echo "</form>";
	exit;
}
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
	$cVar_second_db_nfasd8 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');  
	$cVar_second_db_nfasd8->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_second_db_nfasd8->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!";
	$err->getMessage() . "<br/>";
	die();
}
$staffida=decryptCookie($_COOKIE["steamID"]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (!empty($_POST["password"])) {
		$staffname=$cVar_Staffname;
		$pass=encryptCookie($_POST["password"]);
		$p=$_POST["password"];
		$p2=$_POST["password2"];
		if($p != $p2 || strlen($p2) < 7) { echo "<meta http-equiv='refresh' content='0;url=https://localhost/2step.php?invalid=1' />"; exit;}
		$q7231="UPDATE accounts SET pass='$pass' WHERE pid='$staffida'";
		$qu626231=$cVar_second_db_nfasd8->prepare($q7231);
		$qu626231->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4>Your Password has been set!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
	}
	if (!empty($_POST["login"])) {
		$staffname=$cVar_Staffname;
		
		$TWOSTEP_Q="SELECT ip,pass FROM accounts WHERE pid='$staffida'";
		$TWOSTEP_S=$cVar_second_db_nfasd8->prepare($TWOSTEP_Q);
		$TWOSTEP_S->execute();
		$CLIENTDATA=$TWOSTEP_S->fetch();
		$CONFIRM=decryptCookie($CLIENTDATA["pass"]);
		$TYPED=$_POST["login"];
		
		if($TYPED === $CONFIRM) {
			$UP_IP=$_SERVER["REMOTE_ADDR"];
			$UIP_Q="UPDATE accounts SET ip='$UP_IP', blocked=0 WHERE pid='$staffida'";
			$UIP_S=$cVar_second_db_nfasd8->prepare($UIP_Q);
			$UIP_S->execute();
			?>
			<div class="alert_suc alert alert-dismissable alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>You have successfully Logged in.</h4> 
				<i>NOTE: All actions are logged!</i>
			</div>
		<?php
		
		
		} else {
			$UIP_Qa="UPDATE accounts SET blocked=blocked+1 WHERE pid='$staffida'";
			$UIP_Sa=$cVar_second_db_nfasd8->prepare($UIP_Qa);
			$UIP_Sa->execute();
			
			////
			
			$TWOSTEP_Qa="SELECT blocked FROM accounts WHERE pid='$staffida'";
			$TWOSTEP_Sa=$cVar_second_db_nfasd8->prepare($TWOSTEP_Qa);
			$TWOSTEP_Sa->execute();
			$CLIENTDATA=$TWOSTEP_Sa->fetch();
			if($CLIENTDATA["blocked"] > 3) {
				$TWOSTEP_Saa=$cVar_main_db_c89712h->prepare("UPDATE players SET adminlevel=0 WHERE pid='$staffida'");
				$TWOSTEP_Saa->execute();
				setcookie('steamID', '', -1, '/'); 
			}
			echo "<meta http-equiv='refresh' content='0;url=https://localhost/2step.php?rip=2' />"; 
			
		}
	}
}
?>

<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title><?=$jVar_Panel_Name ?> - 2Step</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove(); 
			});
		}, 10000);
	</script>
	<script>
	$(document).ready(function() {
		$("body").tooltip({ selector: '[data-toggle=tooltip]' });
	});
	</script>
</head>

<body style="overflow-x:hidden;">
	<div class="ts-main-content">
	
		<?php
			include "./config/navigation.php";
		?>
		<div class="content-wrapper">
			<div class="col-md-12">
				<center>					
					
					<?php
					
					$TWOSTEP_Q="SELECT ip,pass FROM accounts WHERE pid='$staffida'";
					$TWOSTEP_S=$cVar_second_db_nfasd8->prepare($TWOSTEP_Q);
					$TWOSTEP_S->execute();
					$CLIENTDATA=$TWOSTEP_S->fetch();
					$CLIENTIP=$CLIENTDATA["ip"];
					if($CLIENTIP === "" || $_SERVER["REMOTE_ADDR"] != $CLIENTIP) {
						if($CLIENTDATA["pass"] === "" || $CLIENTDATA["pass"] === "null") {
							if(isset($_GET["invalid"])) { echo "<hr><br><b><i style='color:red'>PASSWORDS DO NOT MATCH OR YOUR PASSWORD IS TOO SHORT - 7 CHARACTERS AND ABOVE</i></b>"; } ?>
							
								<form method="POST" style="width:40%;">
									<label for="password">Password</label>
									<input type="password" required class="form-control" id="password" name="password" required><br>
									<label for="password2">Confirm Password</label>
									<input type="password" required class="form-control" id="password2" name="password2" required><br>
									<button type="submit" class="btn btn-block btn-primary" style="font-size:18px;">CREATE PASSWORD</button>
								</form>
							<?php 
							
						} else { ?><br>
							<?php
							if(isset($_GET["rip"])) { echo "<hr><br><b><i style='color:red'>INCORRECT PASSWORD! <Br>SYSTEM: TOO MANY ATTEMPTS TO LOGIN WILL DISABLE YOUR ACCOUNT!</i></b><br>"; }							
							?>
							Enter the Password you created!
							<form method="POST" style="width:40%;">
								<label for="login">Password</label>
								<input type="password" required class="form-control" id="login" name="login" required><br>
								<button type="submit" class="btn btn-block btn-primary" style="font-size:18px;">LOGIN</button>
							</form>
							<?php
						}
						
					} else {
						echo "<meta http-equiv='refresh' content='0;url=https://localhost/index.php' />"; 
					}
					
					?>
				</center>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="visualization" style="width: 800px; height: 600px;"></div>
					<script type="text/javascript" src="http://www.google.com/jsapi"></script>
					<script type="text/javascript"> google.load('visualization', '1', {packages: ['corechart']}); </script>
					<script type="text/javascript">
						function drawVisualization() {
							var data = google.visualization.arrayToDataTable([
								['PL', 'Ratings'],
								<?php
								while( $row = $result->fetch_assoc() ){
									extract($row);
									echo "['{$name}', {$ratings}],";
								}
								?>
							]);
						}

						google.setOnLoadCallback(drawVisualization);
					</script>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
	/* Close Database Connections one page has loaded */
	$cVar_main_db_c89712h = null;
	$cVar_second_db_nfasd8 = null;
?>