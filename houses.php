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

if(!$cVar_Compensate == 1){KickBackNerd();exit;}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["h_id"])) {
		$staffname=$cVar_Staffname;
		$name=$_POST['h_name'];
		$inv=$_POST['h_inv'];
		$uid=$_POST['h_uid'];
		$id=$_POST['h_id'];

		$testqa40122=$cVar_main_db_c89712h->prepare("UPDATE houses SET containers='$inv' WHERE id='$uid'");
		$testqa40122->execute();

		?>
		
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				�
			</button>
			<h4><strong><?=$name ?>'s</strong> House Updated!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('d-m-Y h:i:s A');
		$opid=$_POST['opid'];
		$oid=$_POST['h_uid'];
		$hoowned=$_POST['oowned'];
		$log="[".$date2."] ".$staffname." has edited ".$name."(".$pid.") House! NEW - HOUSE ID: ".$id." | HOUSE OWNER ID: ".$id."";
		LogAction(1,$log,$date2);
		$log1="[".$date2."] ".$staffname." has edited ".$name."(".$pid.") House! OLD - HOUSE ID: ".$oid." | HOUSE OWNER ID: ".$opid."";
		LogAction(1,$log1,$date2);
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
	
	<title><?=$jVar_Panel_Name ?> - Houses</title>

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
						<h2 class="page-title">Houses</h2>
						<form action="houses.php" method="POST">
							<div class="input-group" style="width:300px;">
								<input type="text" id="h_search" name="h_search" class="form-control" placeholder="Search playerid or item in the inventory...">
								<span class="input-group-btn"><button type="submit" style="height:46px;background-color:darkgrey;" class="btn btn-primary"><i style="font-size:18px;color:white;" class="fa fa-search"></i></button></span>
							</div>
						</form>
						<div class="panel panel-default">
							<div class="panel-heading">Houses Table</div>
							<div class="panel-body">
							<?php
							//Check if exist
							$jVar_g3t_pl4y3rs="SELECT * FROM houses";
							$jvar_runqq677=$cVar_main_db_c89712h->prepare($jVar_g3t_pl4y3rs);
							$jvar_runqq677->execute();
							if ($jvar_runqq677->rowCount() == 0) {
								echo "<center><h2>No houses exist!</h2></center>";
								exit;
							}
							try {
								if(!empty($_POST["h_search"]) == 1) { include ("search_results.php"); exit;}		
								
								$adasdasdsd = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM houses')->fetchColumn();
								$limit = 20;
								$pages = ceil($adasdasdsd / $limit);
								$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
								$offset = ($page - 1)  * $limit;
								$start = $offset + 1;
								$end = min(($offset + $limit), $adasdasdsd);
								$ras89du9asj = $cVar_main_db_c89712h->prepare('SELECT * FROM houses LIMIT :limit OFFSET :offset');
							
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
											<th>Owner ID</th>
											<th>Owner Name</th>
											<th>Owned</th>
											<th>Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($iterator as $row) {
											$howner=$row['pid'];
											$hinv=$row['inventory'];
											$hcontainer=$row['name'];
											$howned=$row['owned'];
											echo "<tr class='active'>";
											echo "<td>";
											echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$howner</a>";
											echo "</td>";
											
											$cun29="SELECT name, pid FROM players WHERE pid='$howner'";
											$rcun29=$cVar_main_db_c89712h->prepare($cun29);
											$rcun29->execute();
											$fcun29=$rcun29->fetch();
											echo "<td>";
											echo $fcun29['name'];
											echo "</td>";
											
											echo "<td>";
											echo $row['owned'];
											echo "</td>";
											
											echo "<td>";
											?>
											<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$row['pid'] ?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
											
											
											<div id="edit<?=$row['pid'] ?>" class="modal fade" role="dialog">
												<div class="modal-dialog" style="width:90%;">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Editing Houses - <b><?=$row['pid'] ?></b></h4>															
														</div>
														<div class="modal-body">
															<div class="col-md-12">
																<div class="panel panel-default">
																	<div class="panel-heading">House Data</div>
																	<div class="panel-body">
																		<form id="<?=$row['pid'] ?>" name="<?=$row['pid'] ?>" method="POST" action="houses.php">
																			<div class="col-md-12">
																				<input type="hidden" class="form-control" readonly id="opid" name="opid" value="<?=$row['pid'] ?>"><br>
																				<input type="hidden" class="form-control" readonly id="h_uid" name="h_uid" value="<?=$row['id'] ?>"><br>
																				<input type="hidden" class="form-control" readonly id="oowned" name="oowned" value="<?=$row['owned'] ?>"><br>
																				<label for="h_id">Owner ID</label>
																				<input type="text" class="form-control" readonly id="h_id" name="h_id" value="<?=$row['pid'] ?>"><br>
																				<label for="h_name">Owner Name</label>
																				<input type="text" class="form-control" readonly id="h_name" name="h_name" value="<?=$fcun29['name'] ?>"><br>
																				
																				<label for="h_inv">Inventory</label>
																				<textarea type="text" class="form-control" rows="7" id="h_inv" name="h_inv" ><?=$row['containers'] ?></textarea><br>
																				
																				</div>
																				<div class="col-md-12"><br>
																				<button type="submit" class="btn btn-success btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-refresh"></span> Update</button>
																			</div>
																		</form>
																	</div>	
																</div>	
															</div>
														</div>
														<div class="modal-footer">
															<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
														</div>
													</div>
												</div>
											</div>	
											
											<?php
											echo "</td>";
											echo "</tr>";
										}
										?>
									</tbody>
								</table>
								<?php 
								} ?>
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
							}?>
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