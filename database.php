<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////

$page = 1;
include("class/steamlogin.php");
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

if(!$cVar_Backup_Database == 1){KickBackNerd();exit;}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["l_class"])) {
		$lclass=$_POST['l_class'];
		$lname=$_POST['l_name'];
		$ltype=$_POST['l_type'];
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		if($ltype == 1) {
			$cVar_query_9879n_982 = "SELECT * FROM cop_licenses";	
			$cVar_run_978asdjo1 = $cVar_second_db_nfasd8->prepare($cVar_query_9879n_982);
			$cVar_run_978asdjo1->execute();
			$coplics=$cVar_run_978asdjo1->rowCount();
			$boxid=$coplics+1;
			
			$testqa401232=$cVar_second_db_nfasd8->prepare("INSERT INTO cop_licenses (class,name,box_id) VALUES ('$lclass','$lname','$boxid')");
			$testqa401232->execute();
		} else if($ltype == 2) {
			$cVar_query_9879n_982 = "SELECT * FROM civ_licenses";	
			$cVar_run_978asdjo1 = $cVar_second_db_nfasd8->prepare($cVar_query_9879n_982);
			$cVar_run_978asdjo1->execute();
			$civlics=$cVar_run_978asdjo1->rowCount();
			$boxid=$civlics+1;
			
			$testqa401232=$cVar_second_db_nfasd8->prepare("INSERT INTO civ_licenses (class,name,box_id) VALUES ('$lclass','$lname','$boxid')");
			$testqa401232->execute();
		}
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has created license type ".$ltype." | License Name: ".$lname."!";
		LogAction(5,$log,$date2);
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$lname ?>(<?=$lclass?>) - </strong>License Created!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
	}
	if (!empty($_POST["g_name"])) {
		$gname=$_POST['g_name'];
		$gowner=$_POST['g_owner'];
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_second_db_nfasd8->prepare("INSERT INTO A3LGangs (gName,gOwner,gStrikes) VALUES ('$gname','$gowner','0')");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$gname ?>(<?=$gowner?>) - </strong>Gang Created!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has created gang ".$gname."!";
		LogAction(5,$log,$date2);
	}
	if (!empty($_POST["c_id"])) {
		$id=$_POST['c_id'];
		$name=$_POST['c_name'];
		$cash=$_POST['c_cash'];
		$bank=$_POST['c_bank'];
		$admin=$_POST['c_admin'];
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_main_db_c89712h->prepare("INSERT INTO players (pid,name,aliases,cash,bankacc,coplevel,mediclevel,civ_licenses,med_licenses,cop_licenses,civ_gear,cop_gear,med_gear,adminlevel) VALUES ('$id','$name','$name','$cash','$bank','0','0','0','','','','','','$admin')");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$name ?>'s(<?=$id?>)</strong> Account Created!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has created account ".$name." | Player ID: ".$id." | Cash: ".$cash." | Bank: ".$bank." | Admin: ".$admin."!";
		LogAction(5,$log,$date2);
	}
	if (!empty($_POST["g_amount"])) {
		$gift=$_POST['g_amount'];
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_main_db_c89712h->prepare("UPDATE players SET bankacc=bankacc+$gift");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong>$<?=$gift?></strong> has been successfully gifted!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has given everyone $".$gift."!";
		LogAction(5,$log,$date2);
	}
	if (!empty($_POST["r_cops"])) {
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_main_db_c89712h->prepare("UPDATE players SET coplevel=0");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong>Cops</strong> have successfully been wiped!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has reset all cops!";
		LogAction(5,$log,$date2);
	}
	if (!empty($_POST["r_medics"])) {
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_main_db_c89712h->prepare("UPDATE players SET mediclevel=0");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong>Medics</strong> have successfully been wiped!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has reset all medics!";
		LogAction(5,$log,$date2);
	}
	if (!empty($_POST["r_vehicles"])) {
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_main_db_c89712h->prepare("DELETE * FROM vehicles");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong>Vehicles</strong> have successfully been wiped!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has reset all vehicles!";
		LogAction(5,$log,$date2);
	}
	if (!empty($_POST["r_all"])) {
		
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$testqa401232=$cVar_main_db_c89712h->prepare("DELETE * FROM vehicles");
		$testqa401232->execute();
		$testqa401232=$cVar_main_db_c89712h->prepare("DELETE * FROM players");
		$testqa401232->execute();
		$testqa401232=$cVar_main_db_c89712h->prepare("DELETE * FROM gangs");
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong>All</strong> data has been successfully wiped!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has reset all data!";
		LogAction(5,$log,$date2);
	}
}
if(isset($_GET['backup'])) {
	$tableX = array();
	backup_tables($cVar_main_db_c89712h, $tableX, $jVar_DBNAME);
	$tableZ = array();
	$tableY = array();
	backup_tables($cVar_second_db_nfasd8, $tableZ, $jVar_Steam_DB);
	backup_tables($cVar_main_db_c89712h, $tableY, "test");
	?>
	<div class="alert_suc alert alert-dismissable alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			×
		</button>
		<h4><strong>Database</strong> Successfully Backed Up!</h4> 
		<i>NOTE: All actions are logged!</i>
	</div>
	<?php
	$staffname=$cVar_Staffname;
	$date2=Date('l jS \of F Y h:i:s A');
	$log="[".$date2."] ".$staffname." has backed up the database!";
	LogAction(5,$log,$date2);
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
	
	<title><?=$jVar_Panel_Name ?> - Database</title>

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
</head>

<body style="overflow-x:hidden;">
	<div class="ts-main-content">
	
		<?php
			include "./config/navigation.php";
		?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Database Management</h2>		
						<p><i></i></p>
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">License Management</div>
								<div class="panel-body">
									<form action="database.php" method="POST">
										<h2 style="text-align:center;">Create License</h2>
										<label for="l_name">License Name</label>
										<input class="form-control" id="l_name" name="l_name" type="text" required placeholder="Enter license name (e.g Special Forces)..."><br>
										<label for="l_class">License Classname</label>
										<input class="form-control" id="l_class" name="l_class" type="text" required placeholder="Enter classname (e.g sf_civ_license)..."><br>
										<label for="l_type">License Type</label>
										<select name="l_type" class="form-control">
											<option value="1">Cop License</option>
											<option value="2">Civ License</option>
										</select>
										<div class="col-md-12">
											<button type="submit" class="btn btn-block btn-primary" style="font-size:24px;margin-top:20px;" value="Submit">Create License</button>
										</div>
									</form>
								</div>
							</div>	
						</div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">Whitelisted Gangs</div>
								<div class="panel-body">
									<form action="database.php" method="POST">
										<h2 style="text-align:center;">Create Whitelisted Gang</h2>
										<label for="g_name">Gang Name</label>
										<input class="form-control" id="g_name" name="g_name" type="text" required placeholder="Enter gang name..."><br>
										<label for="c_id">Gang Owner Playerid</label>
										<input class="form-control" id="g_owner" name="g_owner" type="number" required placeholder="Enter gang owners playerid..."><br>
										<div class="col-md-12">
											<button type="submit" class="btn btn-block btn-primary" style="font-size:24px;margin-top:20px;" value="Submit">Create Gang</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">Create User</div>
								<div class="panel-body">
									<form action="database.php" method="POST">
										<h2 style="text-align:center;">Create Player</h2>
										<div class="col-md-6">
											<label for="c_name">Name</label>
											<input class="form-control" id="c_name" name="c_name" type="text" required placeholder="Enter players name..."><br>
										</div>
										<div class="col-md-6">
											<label for="c_id">Player ID</label>
											<input class="form-control" id="c_id" name="c_id" type="number" required placeholder="Enter players id..."><br>
										</div>
										<div class="col-md-6">
											<label for="c_cash">Cash</label>
											<input class="form-control" id="c_cash" name="c_cash" type="number" value="0" required placeholder="Enter players cash..."><br>
										</div>
										<div class="col-md-6">
											<label for="c_bank">Bank</label>
											<input class="form-control" id="c_bank" name="c_bank" type="number" value="0" required placeholder="Enter players bank..."><br>
										</div>
										<div class="col-md-12">
											<label for="c_admin">Admin Level</label>
											<input class="form-control" id="c_admin" name="c_admin" type="number" value="0" required placeholder="Enter players admin level..."><br>
										</div>
										<div class="col-md-12">
											<button type="submit" class="btn btn-block btn-primary" style="font-size:24px;margin-top:20px;" value="Submit">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Database Management</div>
							<div class="panel-body">
								<a href="?backup=1" class="btn btn-block btn-primary" style="font-size:24px">Backup Database</a><br>
								<a href="#" class="btn btn-block btn-success" style="font-size:24px" data-toggle="modal" data-target="#gift">Gift Players</a><br><br>
								<?php if($cVar_Reset_AllGangs == 1){?><a href="#" class="btn btn-block btn-danger" style="font-size:24px" data-toggle="modal" data-target="#rcops">Reset Cops</a><br><?php } ?>
								<?php if($cVar_Reset_AllGangs == 1){?><a href="#" class="btn btn-block btn-danger" style="font-size:24px" data-toggle="modal" data-target="#rmedics">Reset Medics</a><br><?php } ?>
								<?php if($cVar_Reset_AllVehicles == 1){?><a href="#" class="btn btn-block btn-danger" style="font-size:24px" data-toggle="modal" data-target="#rvehicles">Reset Vehicles</a><br><?php } ?>
								<?php if($cVar_Reset_AllPlayers == 1){?><a href="#" class="btn btn-block btn-danger" style="font-size:24px" data-toggle="modal" data-target="#rall">Reset Everything</a><br><?php } ?>
								
								<div id="gift" class="modal fade" role="dialog">
									<div class="modal-dialog" style="width:50%;">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Gift All Players</b></h4>															
											</div>
											<div class="modal-body">
												<div class="col-md-12" style="text-align:center;">
													<i>Please confirm the amount you want to add to everyones bank account!</i>
												</div>
												<div class="col-md-12">
													<form action="database.php" method="POST"><br>
														<label for="g_amount">Gift Amount</label>
														<input type="number" max="999999" min="0" id="g_amount" name="g_amount" placeholder="Enter the amount you want to gift..." class="form-control">
														<br>
														<button type="submit" class="btn btn-block btn-primary" style="font-size:24px" value="Submit">Submit</button>
													</form>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
									</div>
								</div>
								<div id="rcops" class="modal fade" role="dialog">
									<div class="modal-dialog" style="width:50%;">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Reset All Cops</b></h4>															
											</div>
											<div class="modal-body">
												<div class="col-md-12" style="text-align:center;">
													<i>Please confirm that you want to reset everyones cop level!</i>
												</div>
												<div class="col-md-12">
													<form action="database.php" method="POST"><br>
														<input type="hidden" id="r_cops" name="r_cops" value="Yes">
														<button type="submit" class="btn btn-block btn-primary" style="font-size:24px" value="Submit">Submit</button>
													</form>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
									</div>
								</div>
								<div id="rmedics" class="modal fade" role="dialog">
									<div class="modal-dialog" style="width:50%;">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Reset All Medics</b></h4>															
											</div>
											<div class="modal-body">
												<div class="col-md-12" style="text-align:center;">
													<i>Please confirm that you want to reset everyones medic level!</i>
												</div>
												<div class="col-md-12">
													<form action="database.php" method="POST"><br>
														<input type="hidden" id="r_medics" name="r_cops" value="Yes">
														<button type="submit" class="btn btn-block btn-primary" style="font-size:24px" value="Submit">Submit</button>
													</form>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
									</div>
								</div>
								<div id="rvehicles" class="modal fade" role="dialog">
									<div class="modal-dialog" style="width:50%;">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Delete All Vehicles</b></h4>															
											</div>
											<div class="modal-body">
												<div class="col-md-12" style="text-align:center;">
													<i>Please confirm that you want to delete everyones vehicles!</i>
												</div>
												<div class="col-md-12">
													<form action="database.php" method="POST"><br>
														<input type="hidden" id="r_vehicles" name="r_vehicles" value="Yes">
														<button type="submit" class="btn btn-block btn-primary" style="font-size:24px" value="Submit">Submit</button>
													</form>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
									</div>
								</div>
								<div id="rall" class="modal fade" role="dialog">
									<div class="modal-dialog" style="width:50%;">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Delete All Data</b></h4>															
											</div>
											<div class="modal-body">
												<div class="col-md-12" style="text-align:center;">
													<i>Please confirm that you want to delete everyones data (Players,Vehicles,Gangs)!</i>
												</div>
												<div class="col-md-12">
													<form action="database.php" method="POST"><br>
														<input type="hidden" id="r_all" name="r_all" value="Yes">
														<button type="submit" class="btn btn-block btn-primary" style="font-size:24px" value="Submit">Submit</button>
													</form>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12">
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
		</div>
	</div>
</body>

</html>

<?php
	/* Close Database Connections one page has loaded */
	$cVar_main_db_c89712h = null;
	$cVar_second_db_nfasd8 = null;
	
	if($weekly < 15) { echo "<tr class='danger'>"; }
	else if($weekly > 14 && $weekly < 25) { echo "<tr class='warning'>"; }
	else if($weekly > 25) { echo "<tr class='success'>"; }

?>


