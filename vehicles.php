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

if(!$cVar_View_Vehicles == 1){KickBackNerd();exit;}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["v_uidd"])) {
		$did=$_POST['v_id'];
		$d_name=$_POST['v_uidd'];
		$v_name=$_POST['v_name'];
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$xyz872="DELETE FROM vehicles WHERE id=$d_name";
		$testqa401232=$cVar_main_db_c89712h->prepare($xyz872);
		$testqa401232->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$did ?>'s(<?=$d_name?>)</strong> Vehicle Deleted!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has deleted ".$v_name."(".$did.")'s Vehicle!";
		LogAction(2,$log,$date2);
	}
	if (!empty($_POST["v_uid"])) {
		$class=$_POST['v_class'];
		$pid=$_POST['v_pid'];
		$id=$_POST['v_uid'];
		$alives=$_POST['v_alive'];
		$actives=$_POST['v_active'];
		$gears=$_POST['v_gear'];
		$inv=$_POST['v_inv'];

		$asdja89js8="UPDATE vehicles SET inventory='$inv', active='$actives', alive='$alives' WHERE id='$id'";
		$testqa4012x2=$cVar_main_db_c89712h->prepare($asdja89js8);
		$testqa4012x2->execute();

		?>
		
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$pid ?>'s</strong> Vehicle Updated!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has edited ".$pid."'s ".$class." - Alive: ".$alive." | Active: ".$active." | Gear: ".$gear." | Inventory: ".$inv."!";
		LogAction(2,$log,$date2);
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
	
	<title><?=$jVar_Panel_Name ?> - Vehicles</title>

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
						<h2 class="page-title">Vehicles</h2>		
						<form action="vehicles.php" method="POST">
							<div class="input-group" style="width:300px;">
								<input type="text" id="v_search" name="v_search" class="form-control" placeholder="Search playerid or classname...">
								<span class="input-group-btn"><button type="submit" style="height:46px;background-color:darkgrey;" class="btn btn-primary"><i style="font-size:18px;color:white;" class="fa fa-search"></i></button></span>
							</div>
						</form>
						<br>
						<div class="panel panel-default">
							<div class="panel-heading">Vehicles Table
							</div>
							<div class="panel-body">
							<?php
							//Check if exist
							$jVar_g3t_pl4y3rs="SELECT * FROM vehicles";
							$jvar_runqq677=$cVar_main_db_c89712h->prepare($jVar_g3t_pl4y3rs);
							$jvar_runqq677->execute();
							if ($jvar_runqq677->rowCount() == 0) {
								echo "<center><h2>No vehicles exist!</h2></center>";
								exit;
							}
							try {
								if(!empty($_POST["v_search"]) == 1) { include ("search_results.php"); exit;}
								$adasdasdsd = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM vehicles')->fetchColumn();
								$limit = 20;
								$pages = ceil($adasdasdsd / $limit);
								$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
								$offset = ($page - 1)  * $limit;
								$start = $offset + 1;
								$end = min(($offset + $limit), $adasdasdsd);
								$ras89du9asj = $cVar_main_db_c89712h->prepare('SELECT * FROM vehicles ORDER BY id ASC LIMIT :limit OFFSET :offset');
							
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
											<th>Class Name</th>
											<th>Type</th>
											<th>Faction</th>
											<th>Alive</th>
											<th>Active</th>
											<th>Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($iterator as $row) {
											$idz=$row['id'];
											$i3d=$row['pid'];
											$iname=$row['classname'];
											echo "<tr class='active'>";
											
											echo "<td>";
											echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$i3d</a>";
											echo "</td>";
											
											echo "<td>";
											echo $row['classname'];
											echo "</td>";
											
											echo "<td>";
											echo $row['type'];
											echo "</td>";
											
											echo "<td>";
											echo $row['side'];
											echo "</td>";
											
											echo "<td>";
											echo $row['alive'];
											echo "</td>";
											
											echo "<td>";
											echo $row['active'];
											echo "</td>";

											echo "<td>";
											?>
											<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$i3d?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
											<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$i3d?>"><i class="fa fa-trash" style="position:relative;top:1px;"></i></button>
											
											
											
											
											<div id="edit<?=$i3d ?>" class="modal fade" role="dialog">
												<div class="modal-dialog" style="width:90%;">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Editing Vehicle - <b><?=$row['classname'] ?>(<?=$i3d?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="col-md-12">
																<div class="panel panel-default">
																	<div class="panel-heading">Vehicle Statistics</div>
																	<div class="panel-body">
																		<form method="POST" action="vehicles.php">
																			<div class="col-md-12"><center>
																				<div class="col-md-6">
																					<label for="v_pid">Owner Playerid</label>
																					<input type="text" class="form-control" readonly id="v_pid" name="v_pid" style="text-align:center;" value="<?=$row['pid'] ?>"><br>
																					<input type="hidden" class="form-control" readonly id="v_uid" name="v_uid" style="text-align:center;" value="<?=$row['id'] ?>"><br>
																				</div>
																				<div class="col-md-6">
																					<label for="v_class">Class Name</label>
																					<input type="text" class="form-control" readonly id="v_class" name="v_class" style="text-align:center;" value="<?=$row['classname'] ?>"><br>
																				</div>
																				
																				<div class="col-md-12"><br></div>
																				<?php if($cVar_Destroy_Vehicles == 1) { ?>
																				<div class="col-md-6">
																					<label for="v_alive">Destroyed (0 = Not Destroyed, 1 = Destroyed)</label><br>
																					<input id="v_alive" name="v_alive" class="form-control" style="text-align:center;" type="number" value="<?=$row['alive']?>">
																				</div>
																				<?php } 
																				if($cVar_Revive_Vehicles == 1) {?>
																				<div class="col-md-6">
																					<label for="v_active">Equiped (0 = Stored, 1 = Currently Equiped)</label><br>
																					<input id="v_active" name="v_active" class="form-control" style="text-align:center;" type="number" value="<?=$row['active']?>">
																				</div>
																				<?php } 
																				if($cVar_Vehicle_Inventory == 1) { ?>
																				<div class="col-md-12"><br></div>
																				<div class="col-md-6">
																					<label for="v_inv">Vehicle Gear</label>
																					<textarea id="v_gear" name="v_gear" rows="5" cols="10" class="form-control" style="text-align:center;"><?=$row['gear']?></textarea><br>
																				</div>
																				<div class="col-md-6">
																					<label for="v_inv">Vehicle Inventory</label>
																					<textarea id="v_inv" name="v_inv" rows="5" cols="10" class="form-control" style="text-align:center;"><?=$row['inventory']?></textarea>
																				</div>
																				<?php } ?></center>
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
											<div id="delete<?=$i3d?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Deleting Vehicle - <b><?=$iname?>(<?=$i3d?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="panel panel-default">
																<center>
																	<div class="panel-heading">Delete Vehicle</div>
																	<div class="panel-body">
																		<?php 
																		if($cVar_Delete_Vehicles == 1) {?>
																		<form method="POST" action="vehicles.php">
																			<h3>Confirmation</h3>
																			<p>Confirm that you want to delete the following vehicle:</p>
																			<label for="v_id">Owner PlayerID</label>
																			<input type="hidden" class="form-control" readonly id="v_uidd" name="v_uidd" style="text-align:center;" value="<?=$row['id'] ?>"><br>
																			<input type="text" name="v_id" style="text-align:center;font-size:22px;" class="form-control" value="<?=$i3d?>"><br>
																			<label for="v_name">Player Name</label>
																			<input type="text" name="v_name" style="text-align:center;font-size:22px;" class="form-control" value="<?=$iname?>"><br>
																			<button type="submit" class="btn btn-danger btn-block"><font size="4">Delete Vehicle</font></button>
																		</form>
																		<?php
																		} else {
																			echo "<center><h4>Error: You don't have permission to do this!</h4></center>";
																		}?>
																	</div>
																</center>
															</div>
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


