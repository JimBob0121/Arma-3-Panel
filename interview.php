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
	header( 'Location: https://localhost/index.php');
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

if(!$cVar_Submit_Cases == 1){KickBackNerd();exit;}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["interviewer"])) {
		$interviewer=$_POST['interviewer'];
		$interviewerid=$_POST['interviewerid'];
		$ioutcome=$_POST['ioutcome'];
		$staffname=$cVar_Staffname;
		$staffid=$cVar_ID;
		$idate=Date('d-m-Y');
		$itime=Date('h:i:s');
		if($ioutcome == 1) { $itxt="Failed";}
		else if($ioutcome == 2) { $itxt="Passed";}
		$urmom123="INSERT INTO applicants (interviewerid,interviewer,ioutcome,istaff,idate,itime) VALUES ('$interviewerid','$interviewer','$ioutcome','$staffname','$idate','$itime')";
		$testqa401232=$cVar_second_db_nfasd8->prepare($urmom123);
		$testqa401232->execute();

		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4>Interview Logged!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has submitted an interview: Player Name: ".$interviewer."(".$interviewerid.") | Outcome: ".$itxt."";
		LogAction(5,$log,$date2);
		echo "<meta http-equiv='refresh' content='1;url=http://".$jVar_Return_URL."/interview.php' />";
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
	
	<title><?=$jVar_Panel_Name ?> - Interviews</title>

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
						<?php if($cVar_Reset_Cases == 1) {?>
							<div class="col-md-8">
						<?php } else { echo '<div class="col-md-10">'; } ?>
							<h2 class="page-title">Interview Logger</h2>
						</div>
						<?php if($cVar_Reset_Cases == 1) {
							
							?>
						<div class="col-md-2">
						
						</div>
						<div class="col-md-2">
						<?php } else { echo "<div class='col-md-2'>"; }?>
							<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#subcase" style="font-size:18px;"><i class="fa fa-plus" style="position:relative;top:-1px;"></i> Submit Review</button>
							<div id="subcase" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content" style="width:1000px;">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Submit Review</h4>
										</div>
										<div class="modal-body">
											<div class="panel panel-default">
												<div class="panel-heading">Interview Details</div>
												<div class="panel-body">
													<form method="POST" action="interview.php">
														<label for="ioutcome">Outcome</label>
														<select class="form-control" name="ioutcome" id="ioutcome">
															<option value="1">Failed</option>
															<option value="2">Passed</option>
														</select><br>
														<label for="interviewer">Players Name</label>
														<input type="text" class="form-control" required id="interviewer" name="interviewer" placeholder="Enter the players name..."><br>
														<label for="interviewerid">Players ID</label>
														<input type="text" class="form-control" required id="interviewerid" name="interviewerid" placeholder="Enter the players id..."><br>
														<br><button type="submit" class="btn btn-success btn-block"><font size="4">Submit Review</font></button>
													</form>
												</div>
											</div>
										</div>
										<div class="modal-footer"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<?php 
								if($cVar_View_AllCases == 0) { echo "<center><h2>You don't have permission to view all interviews!</h2></center>"; }
								if($cVar_View_AllCases == 1) { ?>
								<div class="panel-heading">Interviews</div>
								<div class="panel-body">
								<?php
								//Check if exist
								$jVar_g3t_pl4y3rs="SELECT * FROM applicants";
								$jvar_runqq677=$cVar_second_db_nfasd8->prepare($jVar_g3t_pl4y3rs);
								$jvar_runqq677->execute();
								if ($jvar_runqq677->rowCount() == 0) {
									echo "<center><h2>No interviews exist!</h2></center>";
									exit;
								}
								try {
									if(isset($_GET["isearch_id"]) == 1) { include ("search_results.php"); exit;}
										
									$adasdasdsd = $cVar_second_db_nfasd8->query('SELECT COUNT(*) FROM applicants')->fetchColumn();
									$limit = 20;
									$pages = ceil($adasdasdsd / $limit);
									$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
									$offset = ($page - 1)  * $limit;
									$start = $offset + 1;
									$end = min(($offset + $limit), $adasdasdsd);
									$ras89du9asj = $cVar_second_db_nfasd8->prepare('SELECT * FROM applicants ORDER BY uid DESC LIMIT :limit OFFSET :offset');
								
									$ras89du9asj->bindParam(':limit', $limit, PDO::PARAM_INT);
									$ras89du9asj->bindParam(':offset', $offset, PDO::PARAM_INT);
									$ras89du9asj->execute();
									if ($ras89du9asj->rowCount() > 0) {
										$ras89du9asj->setFetchMode(PDO::FETCH_ASSOC);
										$iterator = new IteratorIterator($ras89du9asj);
										?>
									<table id="" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Playerid</th>
												<th>Player Name</th>
												<th>Result</th>
												<th>Date</th>
												<th>Time</th>
												<th>Interviewed By</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($iterator as $row) {	
												$i3d=$row['interviewerid'];
												$staff=$row['istaff'];
												$playername=$row['interviewer'];
												$outcome=$row['ioutcome'];
												if($outcome == 1) {
													echo "<tr class='danger'>";
													$otext="Failed";
												} else if($outcome == 2) {
													echo "<tr class='success'>";
													$otext="Passed";
												}
												
												echo "<td>";
												echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$i3d</a>";
												echo "</td>";
												
												echo "<td>";
												echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$playername</a>";
												echo "</td>";
												
												echo "<td>";
												echo $otext;
												echo "</td>";
												
												echo "<td>";
												echo $row['idate'];
												echo "</td>";
												
												echo "<td>";
												echo $row['itime'];
												echo "</td>";
												
												echo "<td>";
												echo $row['istaff'];
												echo "</td>";
												
												echo "</tr>";
											}
											?>
										</tbody>
									</table>
									<?php } ?>
								</div>
								<?php 	echo "<center>";
								$prevlink = ($page > 1) ? '<a href="?page=1" title="First page"><span class="glyphicon glyphicon-backward"></span></a> <a href="?page=' . ($page - 1) . '" title="Previous page"><span class="glyphicon glyphicon-chevron-left"></span></a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
								$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page"><span class="glyphicon glyphicon-chevron-right"></span></a> <a href="?page=' . $pages . '" title="Last page"><span class="glyphicon glyphicon-forward"></span></a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
								echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' ', $nextlink, ' </p></div></center>';
								} 
								catch(PDOException $err) {
									echo "Connection failed!";
									$err->getMessage() . "<br/>";
									die();
								}
								}?>
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
</body>

</html>

<?php
	/* Close Database Connections one page has loaded */
	$cVar_main_db_c89712h = null;
	$cVar_second_db_nfasd8 = null;
?>