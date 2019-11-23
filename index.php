<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////
ini_set('display_errors', 1);  
//error_reporting(E_ALL  & ~E_STRICT);
$page = 1;
include("./class/steamlogin.php");
include("./class/functions.php");
if(!isset($_COOKIE['steamID'])){
	include("login.php");
	exit;
}
$cfg_ = parse_ini_file("./config/config.ini",true);
include("./config/load_vars.php"); 

try {
	$cVar_main_db_c89712h = new PDO('mysql:host=localhost; dbname=armalife', 'panel', '4KZewb3nW8exhcFs'); 
	$cVar_main_db_c89712h->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_main_db_c89712h->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!1". $err->getMessage();
	die();
}

try {
	$cVar_second_db_nfasd8 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs');
	$cVar_second_db_nfasd8->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_second_db_nfasd8->exec("SET CHARACTER SET utf8");
}
catch(PDOException $err) {
	echo "Connection failed!". $err->getMessage();
	die();
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
	
	<title><?=$jVar_Panel_Name ?> - Dashboard</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
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

						<h2 class="page-title">Dashboard</h2>
						<?php
							$cVar_run_quer78hn = "SELECT * FROM players";	
							$cVar_r897stmt = $cVar_main_db_c89712h->prepare($cVar_run_quer78hn);
							$cVar_r897stmt->execute();
							$jVar_Total_Users=$cVar_r897stmt->rowCount();
							
							$cVar_run_q9872gd = "SELECT sum(TotalCases) as total FROM accounts";	
							$cVar_kj3254s32 = $cVar_second_db_nfasd8->prepare($cVar_run_q9872gd);
							$cVar_kj3254s32->execute();
							$jVar_Total_Cases=$cVar_kj3254s32->fetchColumn();
						
							$cVar_adfshad4342 = $cVar_main_db_c89712h->prepare("SELECT sum(cash + bankacc) FROM players");
							$cVar_adfshad4342->execute();
							for($i=0; $row = $cVar_adfshad4342->fetch(); $i++){
								$jVar_Total_Cash = number_format($row['sum(cash + bankacc)']);
							}
							
							$cVar_query_9879n_982 = "SELECT * FROM vehicles";	
							$cVar_run_978asdjo1 = $cVar_main_db_c89712h->prepare($cVar_query_9879n_982);
							$cVar_run_978asdjo1->execute();
							$jVar_Total_Bans=$cVar_run_978asdjo1->rowCount();
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?=$jVar_Total_Users ?></div>
													<div class="stat-panel-title text-uppercase">Total Users</div>
												</div>
											</div>
											<a href="players.php" class="block-anchor panel-footer text-center">See All <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?=$jVar_Total_Cases ?></div>
													<div class="stat-panel-title text-uppercase">Total Cases</div>
												</div>
											</div>
											<a href="support.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">$<?=$jVar_Total_Cash ?></div>
													<div class="stat-panel-title text-uppercase">Money in the Bank</div>
												</div>
											</div>
											<a href="players.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?=$jVar_Total_Bans ?></div>
													<div class="stat-panel-title text-uppercase">Total Vehicles</div>
												</div>
											</div>
											<a href="vehicles.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Top Staff</div>
										<div class="panel-body">
										<?php
										try {
											$cVar_asd_9adsj9total = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM players')->fetchColumn();
											$cVar_runquery81_9asf8 = $cVar_main_db_c89712h->prepare('SELECT * FROM players ORDER BY adminlevel  DESC LIMIT 10 ');
											$cVar_runquery81_9asf8->execute();
											if ($cVar_runquery81_9asf8->rowCount() > 0) {
												$cVar_runquery81_9asf8->setFetchMode(PDO::FETCH_ASSOC);
												$cVar_crypted_132iterator = new IteratorIterator($cVar_runquery81_9asf8); ?>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Playerid</th>
													<th>Name</th>
													<th>Admin Level</th>
												</tr>
											</thead>
											<tbody><?php
											foreach ($cVar_crypted_132iterator as $rowff213) { 
												if($rowff213['adminlevel'] > 0) {
												?>	
												<tr>
													<?php
													if($rowff213['adminlevel'] == 1) { $sRank="Admin Level 1";}
													if($rowff213['adminlevel'] == 2) { $sRank="Admin Level 2";}
													if($rowff213['adminlevel'] == 3) { $sRank="Admin Level 3";}
													if($rowff213['adminlevel'] == 4) { $sRank="Admin Level 4";}
													if($rowff213['adminlevel'] >= 5) { $sRank="Admin Level 5";}?>
													<td><a href="http://steamcommunity.com/profiles/<?=$rowff213['pid'] ?>"><?=$rowff213['pid'] ?></a></td>
													<td><a href="http://steamcommunity.com/profiles/<?=$rowff213['pid'] ?>"><?=$rowff213['name'] ?></a></td>
													<td><a href="http://steamcommunity.com/profiles/<?=$rowff213['pid'] ?>"><?=$sRank ?></a></td>
												</tr>
											<?php
												}
											} ?>
											</tbody>
										</table>
										<?php 
											}
										} 
										catch (Exception $e) {
											echo '<p>', $err->getMessage(), '</p>';
										}?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Richest Members</div>
										<div class="panel-body">
										<?php
										try {
											$cVar_sgop0total = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM players')->fetchColumn();
											$cVar_rquery812yni = $cVar_main_db_c89712h->prepare('SELECT *, sum(cash + bankacc) AS Total FROM players GROUP BY name ORDER BY Total DESC LIMIT 10');
											$cVar_rquery812yni->bindColumn('Total', $jVar_a54g_TOTAL);
											$cVar_rquery812yni->execute();
											if ($cVar_rquery812yni->rowCount() > 0) {
												$cVar_rquery812yni->setFetchMode(PDO::FETCH_ASSOC);
												$cVar_9ashdjaiterator = new IteratorIterator($cVar_rquery812yni);
										?>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Playerid</th>
													<th>Name</th>
													<th>Cash</th>
												</tr>
											</thead>
											<tbody><?php
											foreach ($cVar_9ashdjaiterator as $aasddas32row) { ?>
												<tr>
													<td><a href="http://steamcommunity.com/profiles/<?=$aasddas32row['pid'] ?>"><?=$aasddas32row['pid'] ?></a></td>
													<td><a href="http://steamcommunity.com/profiles/<?=$aasddas32row['pid'] ?>"><?=$aasddas32row['name'] ?></a></td>
													<td><a href="http://steamcommunity.com/profiles/<?=$aasddas32row['pid'] ?>">$<?= number_format($jVar_a54g_TOTAL) ?></a></td>
												</tr>
											<?php
											} ?>
											</tbody>
										</table>
										<?php 
											}
										} 
										catch (Exception $fsdae) {
											echo '<p>', $fsdae->getMessage(), '</p>';
										}?>
									</div>
								</div>
							</div>
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

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
</body>

</html>


