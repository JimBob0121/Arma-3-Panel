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

if(!$cVar_View_Players == 1){KickBackNerd();exit;}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["w_id"])) {
		$pid=$_POST['w_id'];
		$w_name=$_POST['w_name'];
		$w_points=$_POST['w_points'];
		$w_amount=$_POST['w_issue'];
		$w_reason=$_POST['w_reason'];
		$staffname=$cVar_Staffname;
		$date=Date('Y-m-d');
		$date2=Date('l jS \of F Y h:i:s A');
		
		$qw8d2=$cVar_second_db_nfasd8->prepare("SELECT * FROM points WHERE pid='$pid'");
		$qw8d2->bindParam(1, $_GET['pid'], PDO::PARAM_INT);
		$qw8d2->execute();
		$list=$qw8d2->fetch(PDO::FETCH_ASSOC);
		if($list) {
			$q7233a="UPDATE points SET points = points+$w_amount WHERE pid=$pid";
			$qu6262ab=$cVar_second_db_nfasd8->prepare($q7233a);
			$qu6262ab->execute();
		} else {
			$q7233="INSERT INTO points (pid,name,points) VALUES ('$pid','$w_name','$w_amount')";
			$qu6262a=$cVar_second_db_nfasd8->prepare($q7233);
			$qu6262a->execute();
		}
		$q72="INSERT INTO points_logs (pid,creator,amount,reason,date,active) VALUES ('$pid','$staffname','$w_amount','$w_reason','$date','1')";
		$qu6262=$cVar_second_db_nfasd8->prepare($q72);
		$qu6262->execute();
		
		$log="[".$date2."] ".$staffname." has Issued ".$w_name."(".$pid.") ".$w_amount." Warning Points. Reason: ".$w_reason."";
		LogAction(1,$log,$date2);
		
		
		
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$w_name ?>'s</strong> Warning Points Added!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
	}
	if (!empty($_POST["dnoteid"])) {
		$did=$_POST['dnoteid'];
		$d_name=$_POST['dnotename'];
		$staffname=$cVar_Staffname;
		
		
		$q7231="DELETE FROM notes WHERE uid='$did'";
		$qu626231=$cVar_second_db_nfasd8->prepare($q7231);
		$qu626231->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$d_name ?>'s</strong> Note(<?=$did?>) Deleted!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has deleted ".$d_name." Note ID ".$did."";
		LogAction(1,$log,$date2);
	}
	if (!empty($_POST["d_id"])) {
		$did=$_POST['d_id'];
		$d_name=$_POST['d_name'];
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		
		$q723="DELETE FROM players WHERE pid='$did'";
		$qu62623=$cVar_main_db_c89712h->prepare($q723);
		$qu62623->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$d_name ?>'s</strong> Account Deleted!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has deleted ".$d_name."(".$did.") Account!";
		LogAction(1,$log,$date2);
	}
	if (!empty($_POST["n_id"])) {
		$pid=$_POST['n_id'];
		$n_name=$_POST['n_name'];
		$note=$_POST['note'];
		$staffname=$cVar_Staffname;
		$date=Date('d-m-Y');
		$q72="INSERT INTO notes (pid,creator,date,reason) VALUES ('$pid','$staffname','$date','$note')";
		$qu6262=$cVar_second_db_nfasd8->prepare($q72);
		$qu6262->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$n_name ?>'s</strong> Note Added!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has added a note to ".$n_name."(".$pid.") Account!";
		LogAction(1,$log,$date2);
	}
	if (!empty($_POST["p_id"])) {
		$staffname=$cVar_Staffname;
		$name=$_POST['p_name'];
		$pid=$_POST['p_id'];
		$cop=$_POST['p_cop'];
		$medic=$_POST['p_medic'];
		$coplic=$_POST['p_coplic'];
		$civlic=$_POST['p_civlic'];
		$adlevel=$_POST['p_admin'];
		$banklvl=$_POST['p_bank'];
		$cashlvl=$_POST['p_cash'];
		if(is_numeric($_POST['p_comp'])) {
			$comp=$_POST['p_comp'];
		} else {
			$comp=0;
		}
		require_once("licenses.php");
		
		if($cVar_Modify_AdminLevel == 1) {
			if($cVar_Modify_Cash == 1) {
				$testqa40122=$cVar_main_db_c89712h->prepare("UPDATE players SET cash='$cashlvl', bankacc='$banklvl'+'$comp', coplevel='$cop', mediclevel='$medic', adminlevel='$adlevel' WHERE pid='$pid'");
			} else {
				$testqa40122=$cVar_main_db_c89712h->prepare("UPDATE players SET bankacc=bankacc+'$comp', coplevel='$cop', mediclevel='$medic', adminlevel='$adlevel' WHERE pid='$pid'");
			}
		} else {
			$testqa40122=$cVar_main_db_c89712h->prepare("UPDATE players SET bankacc=bankacc+'$comp', coplevel='$cop', mediclevel='$medic' WHERE pid='$pid'");
		}
		$testqa40122->execute();

		?>
		
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$name ?>'s</strong> Stats Updated!</h4> 
			<i>NOTE: All actions are logged!
			   ONLY 1 GANG WHITELISTING AT THE TIME ALLOWED</i>
		</div>
		<?php
		$date2=Date('d-m-Y h:i:s A');
		$nbank=$banklvl+$comp;
		$obank=$_POST['obank'];
		$ocash=$_POST['ocash'];
		$ocop=$_POST['ocop'];
		$omedic=$_POST['omedic'];
		$oadmin=$_POST['oadmin'];
		if($pid == $cookieID) {
			$log="<b>[".$date2."] ".$staffname." has edited ".$name."(".$pid.") Stats! NEW - Bank: ".$nbank." | Cash: ".$cashlvl." | Medic: ".$medic." | Cop: ".$cop." | Admin: ".$adlevel."</b>";
			LogAction(1,$log,$date2);
			$log1="<b>[".$date2."] ".$staffname." has edited ".$name."(".$pid.") Stats! OLD - Bank: ".$obank." | Cash: ".$ocash." | Medic: ".$omedic." | Cop: ".$ocop." | Admin: ".$oadmin."</b>";
			LogAction(1,$log1,$date2);
		} else {
			$log="[".$date2."] ".$staffname." has edited ".$name."(".$pid.") Stats! NEW - Bank: ".$nbank." | Cash: ".$cashlvl." | Medic: ".$medic." | Cop: ".$cop." | Admin: ".$adlevel."";
			LogAction(1,$log,$date2);
			$log1="[".$date2."] ".$staffname." has edited ".$name."(".$pid.") Stats! OLD - Bank: ".$obank." | Cash: ".$ocash." | Medic: ".$omedic." | Cop: ".$ocop." | Admin: ".$oadmin."";
			LogAction(1,$log1,$date2);
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
	
	<title><?=$jVar_Panel_Name ?> - Players</title>

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
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Players <?php if($cVar_Whitelist == 1) {?><a href="#" data-toggle="modal" data-target="#licenses"><i style="font-size:24px;color:orange;" class="fa fa-info-circle"></i></a><?php } ?></h2>
						<form action="players.php" method="POST">
							<div class="input-group" style="width:300px;">
								<input type="text" id="lic_search" name="lic_search" class="form-control" placeholder="Search players license e.g .outsider..">
								<span class="input-group-btn"><button type="submit" style="height:46px;background-color:darkgrey;" class="btn btn-primary"><i style="font-size:18px;color:white;" class="fa fa-search"></i></button></span>
							</div>
							
						</form>
						<div class="panel panel-default">
							<div class="panel-heading">Players Table</div>
							<div class="panel-body">
							<?php
							//Check if exist
							$jVar_g3t_pl4y3rs="SELECT * FROM players";
							$jvar_runqq677=$cVar_main_db_c89712h->prepare($jVar_g3t_pl4y3rs);
							$jvar_runqq677->execute();
							if ($jvar_runqq677->rowCount() == 0) {
								echo "<center><h2>No players exist!</h2></center>";
								exit;
							}
							try {
								if(isset($_GET["search_id"]) == 1) { include ("search_results.php"); exit; }
								if(isset($_POST["lic_search"]) == 1) { include ("search_results.php"); exit;}
								
									
								$adasdasdsd = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM players')->fetchColumn();
								$limit = 20;
								$pages = ceil($adasdasdsd / $limit);
								$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
								$offset = ($page - 1)  * $limit;
								$start = $offset + 1;
								$end = min(($offset + $limit), $adasdasdsd);
								$ras89du9asj = $cVar_main_db_c89712h->prepare('SELECT * FROM players ORDER BY coplevel DESC LIMIT :limit OFFSET :offset');
							
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
											<th>Name</th>
											<th>Cash</th>
											<th>Bank</th>
											<th>Cop Level</th>
											<th>Medic Level</th>
											<th>Admin Level</th>
											<th>Warning Points</th>
											<th>Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($iterator as $row) {									
											if($row['adminlevel'] == 0) { $sRank="N/A";}
											if($row['adminlevel'] == 1) { $sRank="Admin Level 1";}
											if($row['adminlevel'] == 2) { $sRank="Admin Level 2";}
											if($row['adminlevel'] == 3) { $sRank="Admin Level 3";}
											if($row['adminlevel'] == 4) { $sRank="Admin Level 4";}
											if($row['adminlevel'] >= 5) { $sRank="Admin Level 5";}
											$n_name=$row['name'];
											$i3d=$row['pid'];
											$iname=$row['name'];
											$cop=$row['cop_licenses'];
											$civ=$row['civ_licenses'];
											$medlic=$row['med_licenses'];
											$alevel=$row['adminlevel'];
											echo "<tr class='active'>";
											echo "<td>";
											echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$i3d</a>";
											echo "</td>";
											
											echo "<td>";
											echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$n_name</a>";
											echo "</td>";
											
											echo "<td>";
											echo $row['cash'];
											echo "</td>";
											
											echo "<td>";
											echo $row['bankacc'];
											echo "</td>";
											
											echo "<td>";
											echo $row['coplevel'];
											echo "</td>";
											
											echo "<td>";
											echo $row['mediclevel'];
											echo "</td>";
											
											echo "<td>";
											echo $sRank;
											echo "</td>";
											
											echo "<td>";
											$runads97124=$cVar_second_db_nfasd8->prepare("SELECT * FROM points WHERE pid='$i3d'");
											$runads97124->execute();
											if($runads97124->rowCount() == 0) {
												echo "0";
											} else {
												while ($row32 = $runads97124->fetch()) {
													echo $row32['points'];
												}
											}
											echo "</td>";

											echo "<td>";
											?>
											<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$row['pid'] ?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
											<?php if($cVar_Delete_User == 1) { ?><button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$i3d?>"><i class="fa fa-trash" style="position:relative;top:1px;"></i></button>
											<?php } if($cVar_Issue_Points == 1) { ?><button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#warn<?=$i3d?>"><i class="fa fa-exclamation-triangle" style="position:relative;top:1px;"></i></button>
											<?php } ?>
											
											
											
											<div id="edit<?=$row['pid'] ?>" class="modal fade" role="dialog">
												<div class="modal-dialog" style="width:90%;">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Editing Player - <b><?=$row['name'] ?></b></h4>															
														</div>
														<div class="modal-body">
															<div class="col-md-6">
																<div class="panel panel-default">
																	<div class="panel-heading">Statistics</div>
																	<div class="panel-body">
																		<form id="<?=$row['pid'] ?>" name="<?=$row['pid'] ?>" method="POST" action="players.php">
																			<div class="col-md-4">
																				<input type="hidden" class="form-control" readonly id="obank" name="obank" value="<?=$row['bankacc'] ?>"><br>
																				<input type="hidden" class="form-control" readonly id="ocash" name="ocash" value="<?=$row['cash'] ?>"><br>
																				<input type="hidden" class="form-control" readonly id="omedic" name="omedic" value="<?=$row['mediclevel'] ?>"><br>
																				<input type="hidden" class="form-control" readonly id="ocop" name="ocop" value="<?=$row['coplevel'] ?>"><br>
																				<input type="hidden" class="form-control" readonly id="oadmin" name="oadmin" value="<?=$row['adminlevel'] ?>"><br>
																				<label for="p_name">Name</label>
																				<input type="text" class="form-control" readonly id="p_name" name="p_name" value="<?=$row['name'] ?>"><br>
																				<label for="p_id">Playerid</label>
																				<input type="text" class="form-control" readonly id="p_id" name="p_id" value="<?=$row['pid'] ?>"><br>
																				<label for="p_cash">Cash</label>
																				<input type="number" class="form-control" <?php if($cVar_Modify_Cash == 0) { ?> readonly <?php } ?> id="p_cash" name="p_cash" value="<?=$row['cash'] ?>"><br>
																				<label for="p_bank">Bank Account</label>
																				<input type="number" class="form-control" <?php if($cVar_Modify_Cash == 0) { ?> readonly <?php } ?> id="p_bank" name="p_bank" value="<?=$row['bankacc'] ?>"><br>
																				<?php if($cVar_Reset_User == 1) { ?>
																				<label for="p_resetgear">Reset Gear</label>
																				<div class="checkbox checkbox-danger">
																					<input id="p_resetgear" name="p_resetgear" type="checkbox"><label for="p_resetgear">Reset Gear</label>
																				</div>
																				<?php } 
																				if($cVar_Whitelist == 1) { ?>
																				<label for="p_natolicense">Cop Licenses</label>
																				<div class="checkbox checkbox-danger">
																					<textarea type="text" readonly style="display:none;" id="p_coplic" name="p_coplic"><?php echo $cop; ?></textarea>
																					<?php
																					if($row['cop_licenses'] == "") { echo "No Licenses can be loaded!"; } else {
																						$cop2=$row['cop_licenses'];
																						$query123 = $cVar_second_db_nfasd8->prepare("SELECT * FROM cop_licenses ORDER BY uid");
																						$query123->execute();
																						if (!$query123->rowCount() == 0) {
																							while ($row3 = $query123->fetch()) {
																								$uid=$row3['uid'];
																								$class=$row3['class'];
																								$name=$row3['name'];
																								$box=$row3['box_id'];
																								$cstring="[`".$class."`,1]";
																								if(strpos($cop2,$cstring) == true) { 
																									echo "<div class='col-md-4'><input id='".$box."' name='".$box."' checked type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>";
																								} else { echo "<div class='col-md-4'><input id='".$box."' name='".$box."' type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>"; } 
																							}
																						} else { echo "No Licenses Found"; }
																					}?>
																				</div>
																				
																				
																				
																				<?php } ?>
																			</div>
																			<div class="col-md-8">
																				<?php 
																				if($cVar_Compensate == 1) { ?>
																				<label for="p_comp">Compensate</label>
																				<?php if($row['jComp'] == 0) { ?>
																					<input type="number" class="form-control" id="p_comp" name="p_comp" min="0" value="0"><br>
																				<?php 
																					} else {?> 
																						<input type="text" class="form-control" readonly id="" name="" style="text-align:center;" value="COMPENSATION BLOCKED"><br>
																				<?php
																					}
																				} 
																				if($cVar_Whitelist == 1) { 
																				?>
																				<label for="p_cop">Cop Level</label><br>
																				
																				<?php
																				if($row['jCop'] == 0) {
																					?>
																					<select class="form-control" id="p_cop" name="p_cop">
																					<?php
																					if($row['coplevel'] == 0) { echo "<option value='0' selected='selected'>N/A (Selected)</option>"; } else { echo "<option value='0'>N/A</option>"; }
																					
																					$c_level=$row['coplevel'];
																					$query132 = $cVar_second_db_nfasd8->prepare("SELECT * FROM cop_ranks ORDER BY uid");
																					$query132->execute();
																					if (!$query132->rowCount() == 0) {
																						while ($row1 = $query132->fetch()) {
																							$uid=$row1['uid'];
																							$level=$row1['level'];
																							$name=$row1['name'];
																							if($c_level == $level) {
																								echo "<option value='".$level."' selected='selected'>".$name." (Selected)</option>";
																							} else {
																								echo "<option value='".$level."'>".$name."</option>";
																							}
																							
																						}
																					} else { echo "No Ranks found in the database!"; }
																					?>
																					</select>
																					<?php
																				} else {
																					?>
																					<select class="form-control" id="p_cop" name="p_cop">
																						<option value='0' selected='selected'>COP BLOCKED</option>
																					</select>
																					<?php
																				}
																				echo "<br>";?>
																				<label for="p_medic">Medic Level</label><br>
																				<?php
																				if($row['jMedic'] == 0) {
																					?>
																					<select class="form-control" id="p_medic" name="p_medic">
																					<?php
																					if($row['mediclevel'] == 0) { echo "<option value='0' selected='selected'>N/A (Selected)</option>"; } else { echo "<option value='0'>N/A</option>"; }
																					$m_level=$row['mediclevel'];
																					$query1132 = $cVar_second_db_nfasd8->prepare("SELECT * FROM medic_ranks ORDER BY uid");
																					$query1132->execute();
																					if (!$query1132->rowCount() == 0) {
																						while ($row1 = $query1132->fetch()) {
																							$uid=$row1['uid'];
																							$level=$row1['level'];
																							$name=$row1['name'];
																							if($m_level == $level) {
																								echo "<option value='".$level."' selected='selected'>".$name." (Selected)</option>";
																							} else {
																								echo "<option value='".$level."'>".$name."</option>";
																							}
																							
																						}
																					} else { echo "No Ranks found in the database!"; }
																					?>
																					</select>
																					<?php
																				} else {
																					?>
																					<select class="form-control" id="p_medic" name="p_medic">
																						<option value='0' selected='selected'>MEDIC BLOCKED</option>
																					</select>
																					<?php
																				}
																				echo "<br>";
																				if($cVar_Modify_AdminLevel == 1) {
																					?>
																					<label for="p_admin">Admin Level</label>
																					<select class="form-control" id="p_admin" name="p_admin">
																					<?php
																					
																					if($alevel == 0) { echo "<option selected='selected' value='0'>N/A (Selected)</option>"; } else { echo "<option value='0'>N/A</option>"; }
																					if($alevel == 1) { echo "<option selected='selected' value='1'>Trial Staff (Selected)</option>"; } else { echo "<option value='1'>Trial Staff</option>"; }
																					if($alevel == 2) { echo "<option selected='selected' value='2'>Moderator (Selected)</option>"; } else { echo "<option value='2'>Moderator</option>"; }
																					if($alevel == 3) { echo "<option selected='selected' value='3'>Administrator (Selected)</option>"; } else { echo "<option value='3'>Administrator</option>"; }
																					if($alevel == 4) { echo "<option selected='selected' value='4'>Senior Leadership Team (Selected)</option>"; } else { echo "<option value='4'>Senior Administration</option>"; }
																					if($alevel > 4) { echo "<option selected='selected' value='5'>Senior Management Team (Selected)</option>"; } else { echo "<option value='5'>Senior Management Team</option>"; }
																					
																					
																					?>
																					</select><br>
																					<?php
																				}
																				if($cVar_Comp_Ban == 1 || $cVar_Police_Ban == 1 || $cVar_Medic_Ban == 1) {?>
																				<label for="p_blocked">Blocked</label><br>
																				<div class="checkbox checkbox-success">
																					<?php
																					if($cVar_Comp_Ban == 1) {
																						if($row['jComp'] == 0) {
																							echo "<div class='col-md-4'><input id='b_comp' name='b_comp' type='checkbox' value='0'><label for='b_comp'>Comp</label></div>";
																						} else {
																							echo "<div class='col-md-4'><input id='b_comp' name='b_comp' type='checkbox' value='1' checked><label for='b_comp'>Compensation</label></div>";
																						}
																					}
																					if($cVar_Police_Ban == 1) {
																						if($row['jCop'] == 0) {
																							echo "<div class='col-md-4'><input id='b_cop' name='b_cop' type='checkbox' value='0'><label for='b_cop'>Cop</label></div>";
																						} else {
																							echo "<div class='col-md-4'><input id='b_cop' name='b_cop' type='checkbox' value='1' checked><label for='b_cop'>Cop</label></div>";
																						}
																					}
																					if($cVar_Medic_Ban == 1) {
																						if($row['jMedic'] == 0) {
																							echo "<div class='col-md-4'><input id='b_medic' name='b_medic' type='checkbox' value='0'><label for='b_medic'>Medic</label></div>";
																						} else {
																							echo "<div class='col-md-4'><input id='b_medic' name='b_medic' type='checkbox' value='1' checked><label for='b_medic'>Medic</label></div>";
																						}
																					}
																					?>
																					<br>
																					<br>
																				</div>
																				<?php 
																				} 
																				?>
																				<label for="p_medlicenses">Medic Licenses</label><br>
																				<textarea type="hidden" readonly id="p_medlic" style="display:none;" name="p_medlic"><?php echo $row['med_licenses']; ?></textarea>
																				<div class="checkbox checkbox-info">
																					<?php
																					if($medlic == "") { echo "No Licenses can be loaded!"; } else {
																						$med2=$row['med_licenses'];
																						$query12 = $cVar_second_db_nfasd8->prepare("SELECT * FROM med_licenses ORDER BY uid");
																						$query12->execute();
																						if (!$query12->rowCount() == 0) {
																							while ($row = $query12->fetch()) {
																								$uid=$row['uid'];
																								$class=$row['class'];
																								$name=$row['name'];
																								$box=$row['box_id'];
																								$cstring="[`".$class."`,1]";
																								if(strpos($med2,$cstring) == true) { 
																									echo "<div class='col-md-4'><input id='".$box."' name='".$box."' checked type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>";
																								} else { echo "<div class='col-md-4'><input id='".$box."' name='".$box."' type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>"; } 
																							}
																						} else { echo "No Licenses Found"; }
																					}?>
																				
																				</div>
																				
																				<?php 
																				} 
																				if($cVar_Whitelist == 1) {
																				?>
																				<div class="col-md-12"><br>
																					<label for="p_civlicenses">Civilian Licenses</label><br>
																					<textarea type="hidden" readonly id="p_civlic" style="display:none;" name="p_civlic"><?php echo $row['civ_licenses']; ?></textarea>
																					<div class="checkbox checkbox-info">
																						<?php
																						if($civ == "") { echo "No Licenses can be loaded!"; } else {
																							$query12 = $cVar_second_db_nfasd8->prepare("SELECT * FROM civ_licenses ORDER BY uid");
																							$query12->execute();
																							if (!$query12->rowCount() == 0) {
																								while ($row = $query12->fetch()) {
																									$uid=$row['uid'];
																									$class=$row['class'];
																									$name=$row['name'];
																									$box=$row['box_id'];
																									$cstring="[`".$class."`,1]";
																									if(strpos($civ,$cstring) == true) { 
																										echo "<div class='col-md-4'><input id='".$box."' name='".$box."' checked type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>";
																									} else { echo "<div class='col-md-4'><input id='".$box."' name='".$box."' type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>"; } 
																								}
																							} else { echo "No Licenses Found"; }
																						}?>
																					
																					</div>
																					
																				</div>
																				<?php } ?>
																			</div>
																			<div class="col-md-12"><br>
																				<button type="submit" class="btn btn-success btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-refresh"></span> Update</button>
																			</div>
																		</form>
																	</div>
																</div>	
															</div>
															<div class="col-md-6">
																<div class="panel panel-default">
																	<div class="panel-heading">Notes</div>
																	<div class="panel-body">
																		<?php 
																		if($cVar_View_Notes == 1) {
																			$runads9712=$cVar_second_db_nfasd8->prepare("SELECT * FROM notes WHERE pid='$i3d' ORDER BY UID DESC LIMIT 4");
																			$runads9712->execute();
																			if($runads9712->rowCount() == 0) {
																				echo "<center><i><h4>This user has no notes</h4></i></center>";
																			} else { ?>
																				<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="height: auto;overflow-y: auto;">
																					<thead>
																						<tr>
																							<th>Date</th>
																							<th>Reason</th>
																							<th>Creator</th>
																							<?php if($cVar_Remove_Notes == 1) { ?>
																							<th>Edit</th> 
																							<?php } ?>
																						</tr>
																					</thead>
																					<tfoot>
																						<?php while ($row2 = $runads9712->fetch()) { ?>
																						<tr>
																							<form action="players.php" method="post">
																								<th><?=$row2['date']?></th>
																								<th><?=$row2['reason']?></th>
																								<th><?=$row2['creator']?></th>
																								<?php if($cVar_Remove_Notes == 1) { ?>
																								<input type="hidden" name="dnotename" id="dnotename" required value="<?=$iname?>">
																								<input type="hidden" name="dnoteid" id="dnoteid" required value="<?=$row2['uid']?>">
																								<th><button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-times" style="position:relative;top:1px;"></i></button></th>
																								<?php } ?>
																								
																							</form>
																						</tr>
																						<?php
																						}
																						
																						?>
																					</tfoot>
																				</table>
																				<?php
																				if($runads9712->rowCount() > 3) { ?>
																					<button type="button" class="btn btn-primary btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;">View All</button>
																				<?php
																				} 																		
																			}
																			
																			if($cVar_Submit_Notes == 1) { ?>
																				<form id="n<?=$i3d ?>" name="n<?=$i3d ?>" method="POST" action="players.php">
																					
																					<input type="hidden" class="form-control" readonly id="n_id" name="n_id" value="<?=$i3d ?>"><br>
																					<input type="hidden" class="form-control" readonly id="n_name" name="n_name" value="<?php echo $n_name; ?>"><br>
																					<textarea required class="form-control" id="note" name="note" type="text" rows="2" placeholder="Enter note..."></textarea><br>
																					<button type="submit" class="btn btn-info btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-sticky-note"></span> Add Note</button>
																				</form>
																			<?php 
																			} 
																		} else { echo "<center><i><h4>You don't have permission to view notes</h4></i></center>"; }
																		?>
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
															<h4 class="modal-title">Deleting Account - <b><?=$iname?>(<?=$i3d?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="panel panel-default">
																<center>
																	<div class="panel-heading">Delete Account</div>
																	<div class="panel-body">
																		<form method="POST" action="players.php">
																			<h3>Confirmation</h3>
																			<p>Confirm that you want to delete the following account:</p>
																			<label for="d_id">Player ID</label>
																			<input type="text" name="d_id" readonly style="text-align:center;font-size:22px;" class="form-control" value="<?=$i3d?>"><br>
																			<label for="d_name">Player Name</label>
																			<input type="text" name="d_name" readonly style="text-align:center;font-size:22px;" class="form-control" value="<?=$iname?>"><br>
																			<button type="submit" class="btn btn-danger btn-block"><font size="4">Delete Account</font></button>
																		</form>
																	</div>
																</center>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="warn<?=$i3d?>" class="modal fade" role="dialog">
												<div class="modal-dialog" style="width:50%;">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Warning Points - <b><?=$iname?>(<?=$i3d?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="panel panel-default">
																<center>
																	<div class="panel-heading">Warn User</div>
																	<div class="panel-body">
																		<form method="POST" action="players.php">
																			<h3>Confirmation</h3>
																			<p>Confirm that you want to warn the following account:</p>
																			<div class="col-md-6">
																				<label for="w_id">Player ID</label>
																				<input type="text" readonly name="w_id" style="text-align:center;font-size:22px;" class="form-control" value="<?=$i3d?>"><br>
																			</div>
																			<div class="col-md-6">
																				<label for="w_name">Player Name</label>
																				<input type="text" readonly name="w_name" style="text-align:center;font-size:22px;" class="form-control" value="<?=$iname?>"><br>
																			</div>
																			<label for="w_points">Current Points</label>
																			<?php
																			$runads97124a=$cVar_second_db_nfasd8->prepare("SELECT * FROM points WHERE pid='$i3d'");
																			$runads97124a->execute();
																			if($runads97124a->rowCount() == 0) {
																				?>
																				<input type="number" readonly name="w_points" style="text-align:center;font-size:22px;" class="form-control" value="0"><br>
																				<?php
																			} else {
																				while ($row32 = $runads97124a->fetch()) {
																					$points=$row32['points'];
																					?>
																					<input type="number" readonly name="w_points" style="text-align:center;font-size:22px;" class="form-control" value="<?=$points?>"><br>
																					<?php
																				}
																			}
																			?>
																			
																			<hr>
																			<label for="w_issue">Issue Points</label>
																			<input type="number" required name="w_issue" style="text-align:center;font-size:22px;" class="form-control" value="0" max="30"><br>
																			
																			<label for="w_reason">Reason</label>
																			<textarea type="number" required name="w_reason" style="text-align:center;font-size:22px;" class="form-control"></textarea><br>
																			
																			
																			<button type="submit" class="btn btn-danger btn-block"><font size="4">Warn User</font></button>
																		</form>
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
						<div id="licenses" class="modal fade" role="dialog">
							<div class="modal-dialog" style="width:60%;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Player Licenses</b></h4>															
									</div>
									<div class="modal-body">
										<div class="col-md-12">
											<div class="panel panel-default" style="max-height:768px;overflow-y:scroll;">
												<div class="panel-heading">Licenses</div>
												<div class="panel-body">
													<center>NOTE: You can search for players licenses using the search function. The following licenses are valid:</center><br> 
													<div class="col-md-6">
														<?php
														$ras89du9asja = $cVar_second_db_nfasd8->prepare('SELECT * FROM civ_licenses ');												
														$ras89du9asja->execute();
														if ($ras89du9asja->rowCount() > 0) {
															$ras89du9asja->setFetchMode(PDO::FETCH_ASSOC);
															$iteratora = new IteratorIterator($ras89du9asja);
															?>
														<table id="" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<th>Civilian Licenses</th>
																</tr>
															</thead>
															<tbody>
															<?php
																foreach ($iteratora as $row) {	
																	$filter=str_replace("license_civ_","",$row['class']);
																	echo "<tr class='active'>";
																	echo "<td>".$filter."</td>";
																	echo "</tr>";
																}													
															?>
															</tbody>
														</table>
														<?php } ?>
													</div>
													<div class="col-md-6">
														<?php
														$ras89du9asja = $cVar_second_db_nfasd8->prepare('SELECT * FROM cop_licenses');												
														$ras89du9asja->execute();
														if ($ras89du9asja->rowCount() > 0) {
															$ras89du9asja->setFetchMode(PDO::FETCH_ASSOC);
															$iteratora = new IteratorIterator($ras89du9asja);
															?>
														<table id="" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<th>Cop Licenses</th>
																</tr>
															</thead>
															<tbody>
															<?php
																foreach ($iteratora as $row) {	
																	$filter=str_replace("license_cop_","",$row['class']);
																	echo "<tr class='active'>";
																	echo "<td>".$filter."</td>";
																	echo "</tr>";
																}													
															?>
															</tbody>
														</table>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer"></div>
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
</body>

</html>

<?php
	/* Close Database Connections one page has loaded */
	$cVar_main_db_c89712h = null;
	$cVar_second_db_nfasd8 = null;
?>