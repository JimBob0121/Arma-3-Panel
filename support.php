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
	if (!empty($_POST["resetcases"])) {
		$staffname=$cVar_Staffname;
		$ras89du9asjx = $cVar_second_db_nfasd8->prepare('SELECT * FROM accounts WHERE WeeklyCases > 24');
		$ras89du9asjx->execute();
		if ($ras89du9asjx->rowCount() > 0) {
			$ras89du9asjx->setFetchMode(PDO::FETCH_ASSOC);
			$iterators = new IteratorIterator($ras89du9asjx);
			foreach ($iterators as $row) {	
				$s_id=$row['pid'];
				$weekly=$row['WeeklyCases'];
				$reward=($weekly*500);
				
				$qys6s="UPDATE players SET bankacc=bankacc+$reward WHERE pid='$s_id'";
				$rq2222=$cVar_main_db_c89712h->prepare($qys6s);
				$rq2222->execute();
			}
		}
		$testqa4012322adxxxs=$cVar_second_db_nfasd8->prepare("UPDATE accounts SET WeeklyCases=0, TagsWhitelist=0");
		$testqa4012322adxxxs->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4>Support Cases Reset & Staff have been rewarded</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has reset ALL Weekly Support Cases.";
		LogAction(5,$log,$date2);
		echo "<meta http-equiv='refresh' content='1;url=http://".$jVar_Return_URL."/support.php' />";
	}
	if (!empty($_POST["cid"])) {
		$staffid=$cVar_ID;
		$staffname=$cVar_Staffname;
		$sid=$_POST['cid'];
		$sname=$_POST['cidname'];
		$staffid22=$_POST['cidsid'];
		$date=Date('d-m-Y');
		$testqa4012322adx=$cVar_second_db_nfasd8->prepare("DELETE FROM cases WHERE uid='$sid'");
		$testqa4012322adx->execute();
		$testqa4012322adxs=$cVar_second_db_nfasd8->prepare("UPDATE accounts SET TotalCases=TotalCases-1, WeeklyCases=WeeklyCases-1 WHERE pid='$staffid22'");
		$testqa4012322adxs->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$sname?>(<?=$staffid22?>)</strong> x1 Case Removed!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has removed 1 of ".$sname."(".$staffid22.")'s Support Cases.";
		LogAction(5,$log,$date2);
		echo "<meta http-equiv='refresh' content='1;url=http://".$jVar_Return_URL."/support.php' />";
	}if (!empty($_POST["f_id"])) {
		$staffid=$cVar_ID;
		$staffname=$cVar_Staffname;
		$sid=$_POST['f_id'];
		$sname=$_POST['f_name'];
		$sreason=$_POST['f_reason'];
		$date=Date('d-m-Y');
		$testqa4012322adx=$cVar_second_db_nfasd8->prepare("INSERT INTO fWarn (creator,reason,date) VALUES ('$staffname','$sreason','$date')");
		$testqa4012322adx->execute();
		$testqa4012322adxs=$cVar_second_db_nfasd8->prepare("UPDATE accounts SET FormalWarnings=FormalWarnings+1 WHERE pid='$sid'");
		$testqa4012322adxs->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$sname?>(<?=$sid?>)</strong> has been issued a formal warning!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has issued ".$sname."(".$sid.")'s a Formal Warning. Reason: ".$sreason."";
		LogAction(5,$log,$date2);
		echo "<meta http-equiv='refresh' content='1;url=http://".$jVar_Return_URL."/support.php' />";
	}
	if (!empty($_POST["cd_id"])) {
		$staffid=$cVar_ID;
		$staffname=$cVar_Staffname;
		$sid=$_POST['cd_id'];
		$sname=$_POST['cd_name'];
		$testqa4012322ad=$cVar_second_db_nfasd8->prepare("UPDATE accounts SET Overwatched=0, TotalCases=0, WeeklyCases=0, TagsWhitelist=0 WHERE pid='$sid'");
		$testqa4012322ad->execute();
		$testqa4012322adxx=$cVar_second_db_nfasd8->prepare("DELETE FROM cases WHERE pid='$sid'");
		$testqa4012322adxx->execute();
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4><strong><?=$sname?>(<?=$sid?>)</strong> Case's Deleted!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has deleted all of ".$sname."(".$sid.")'s Support Cases";
		LogAction(5,$log,$date2);
		echo "<meta http-equiv='refresh' content='1;url=http://".$jVar_Return_URL."/support.php' />";
	}
	if (!empty($_POST["suspect"])) {
		$suspect=$_POST['suspect'];
		$overwatch=$_POST['overwatch'];
		$anotes=$_POST['notes'];
		$outcome=$_POST['outcome'];
		$staffname=$cVar_Staffname;
		$staffid=$cVar_ID;
		$date=Date('d-m-Y');
		if($outcome == 1) { $tcase="N/A";}
		else if($outcome == 2) { $tcase="Compensation Issued";}
		else if($outcome == 3) { $tcase="Whitelist/Tags";}
		else if($outcome == 4) { $tcase="Verbal Warning";}
		else if($outcome == 5) { $tcase="Warning Points";}
		else if($outcome == 6) { $tcase="Temporary Ban";}
		else if($outcome == 7) { $tcase="Permanent Ban";}
		else if($outcome == 8) { $tcase="Technical Support";}
		else if($outcome == 9) { $tcase="Unban Appeal Dealt With";}
		$notes=str_replace("'","",$anotes);
		$urmom123="INSERT INTO cases (pid,punishment,suspect,notes,overwatch,date) VALUES ('$cVar_ID','$tcase','$suspect','$notes','$overwatch','$date')";
		$testqa401232=$cVar_second_db_nfasd8->prepare($urmom123);
		$testqa401232->execute();
		if($outcome == 5) {
			$pornhub69="UPDATE accounts SET TotalCases=TotalCases+1, WeeklyCases=WeeklyCases+1, TagsWhitelist=TagsWhitelist+1 WHERE pid='$cVar_ID'";
			$testqa4012322=$cVar_second_db_nfasd8->prepare($pornhub69);
			$testqa4012322->execute();
		} else {
			$brazzers123="UPDATE accounts SET TotalCases=TotalCases+1, WeeklyCases=WeeklyCases+1 WHERE pid='$cVar_ID'";
			$testqa4012322=$cVar_second_db_nfasd8->prepare($brazzers123);
			$testqa4012322->execute();
		}
		if(!empty($_POST['overwatch'])) {
			$youporn123="UPDATE accounts SET Overwatched=Overwatched+1 WHERE staffname='$overwatch'";
			$testqa4012322a=$cVar_second_db_nfasd8->prepare($youporn123);
			$testqa4012322a->execute();
		}
		?>
		<div class="alert_suc alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				×
			</button>
			<h4>Support Case Logged!</h4> 
			<i>NOTE: All actions are logged!</i>
		</div>
		<?php
		$date2=Date('l jS \of F Y h:i:s A');
		$log="[".$date2."] ".$staffname." has submitted a support case: Suspect: ".$suspect." | Punishment: ".$tcase." | Notes: ".$notes." | Overwatch: ".$overwatch."";
		LogAction(5,$log,$date2);
		echo "<meta http-equiv='refresh' content='1;url=http://".$jVar_Return_URL."/support.php' />";
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
	
	<title><?=$jVar_Panel_Name ?> - Support Case Logger</title>

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
							<h2 class="page-title">Support Case Logger</h2>
						</div>
						<?php if($cVar_Reset_Cases == 1) {
							
							?>
						<div class="col-md-2">
							<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#wcases" style="font-size:18px;"><i class="fa fa-warning" style="position:relative;top:-1px;"></i> Reset Weekly Cases</button>
							<div id="wcases" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content" style="width:1000px;">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Reset Cases</h4>
										</div>
										<div class="modal-body">
											<div class="panel panel-default">
												<div class="panel-heading">Reset Cases</div>
												<div class="panel-body">
													<form method="POST" action="support.php">
														<center><i>You are about to reset everyones weekly cases to 0 and reward staff members.</center><br>
														<input id="resetcases" name="resetcases" type="hidden" value="1"><br>
														<button type="submit" class="btn-danger btn btn-block" style="font-size:18px;">Submit</button>
													</form>
												</div>
											</div>
										</div>
										<div class="modal-footer"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
						<?php } else { echo "<div class='col-md-2'>"; }?>
							<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#subcase" style="font-size:18px;"><i class="fa fa-plus" style="position:relative;top:-1px;"></i> Submit Case</button>
							<div id="subcase" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content" style="width:1000px;">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Submit Case</h4>
										</div>
										<div class="modal-body">
											<div class="panel panel-default">
												<div class="panel-heading">Support Case</div>
												<div class="panel-body">
													<form method="POST" action="support.php">
														<label for="outcome">Outcome</label>
														<select class="form-control" name="outcome" id="outcome">
															<option value="1">N/A</option>
															<option value="2">Compensation Issued</option>
															<option value="3">Whitelist/Tags</option>
															<option value="4">Verbal Warning</option>
															<option value="5">Warning Points</option>
															<option value="6">Temporary Ban</option>
															<option value="7">Permanent Ban</option>
															<option value="8">Technical Support</option>
															<option value="9">Unban Appeal Dealt With</option>
														</select><br>
														<label for="suspect">Players Name</label>
														<input type="text" class="form-control" required id="suspect" name="suspect" placeholder="Enter the players name..."><br>
														<label for="overwatch">Overwatch</label>
														<input type="text" class="form-control" id="overwatch" name="overwatch" placeholder="Enter the staff members name who overwatched you.."><br>
														<label for="notes">Notes</label>
														<textarea class="form-control" style="width:100%;" id="notes" name="notes" required placeholder="Tell us what you did in the case (e.g Whitelisted John Doe for cop level 2)"></textarea>
														<br><button type="submit" class="btn btn-success btn-block"><font size="4">Submit Case</font></button>
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
								if($cVar_View_AllCases == 0) { echo "<center><h2>You don't have permission to view all support cases!</h2></center>"; }
								if($cVar_View_AllCases == 1) { ?>
								<div class="panel-heading">Support Cases</div>
								<div class="panel-body">
								<?php
								//Check if exist
								$jVar_g3t_pl4y3rs="SELECT * FROM accounts";
								$jvar_runqq677=$cVar_second_db_nfasd8->prepare($jVar_g3t_pl4y3rs);
								$jvar_runqq677->execute();
								if ($jvar_runqq677->rowCount() == 0) {
									echo "<center><h2>No cases exist!</h2></center>";
									exit;
								}
								try {
									if(isset($_GET["csearch_id"]) == 1) { include ("search_results.php"); exit;}
										
									$adasdasdsd = $cVar_second_db_nfasd8->query('SELECT COUNT(*) FROM accounts')->fetchColumn();
									$limit = 20;
									$pages = ceil($adasdasdsd / $limit);
									$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
									$offset = ($page - 1)  * $limit;
									$start = $offset + 1;
									$end = min(($offset + $limit), $adasdasdsd);
									$ras89du9asj = $cVar_second_db_nfasd8->prepare('SELECT * FROM accounts WHERE TotalCases > 0 ORDER BY WeeklyCases DESC LIMIT :limit OFFSET :offset');
								
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
												<th>Staff Name</th>
												<th>Total Cases</th>
												<th>Weekly Cases</th>
												<th>Overwatched</th>
												<th>Tags/Whitelist</th>
												<th>Warnings</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($iterator as $row) {	
												$i3d=$row['pid'];
												$staff=$row['staffname'];
												$week=$row['WeeklyCases'];
												if($week < 10) {
													echo "<tr class='danger'>";
												} else if($week > 9 && $week < 20) {
													echo "<tr class='warning'>";
												} else if($week > 20) {
													echo "<tr class='success'>";
												}
												
												echo "<td>";
												echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$i3d</a>";
												echo "</td>";
												
												echo "<td>";
												echo "<a target='_blank' href='http://steamcommunity.com/profiles/$i3d'>$staff</a>";
												echo "</td>";
												
												echo "<td>";
												echo $row['TotalCases'];
												echo "</td>";
												
												echo "<td>";
												echo $row['WeeklyCases'];
												echo "</td>";
												
												echo "<td>";
												echo $row['Overwatched'];
												echo "</td>";
												
												echo "<td>";
												echo $row['TagsWhitelist'];
												echo "</td>";
												
												echo "<td>";
												echo $row['FormalWarnings'];
												echo "</td>";

												echo "<td>";
												?>
												<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$row['pid'] ?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
												<?php if($cVar_Delete_Cases == 1) { ?>
													<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$row['pid'] ?>"><i class="fa fa-trash" style="position:relative;top:1px;"></i></button>
												<?php
												} if($cVar_Admin > 4) {?>
													<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#warn<?=$row['pid'] ?>"><i class="fa fa-warning" style="position:relative;top:1px;"></i></button>
												<?php
												}
												?>
												<div id="edit<?=$row['pid'] ?>" class="modal fade" role="dialog">
												<div class="modal-dialog"style="width:80%;height:90%;">
													<div class="modal-content" >
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Edit Cases - <b><?=$staff?>(<?=$row['pid']?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="panel panel-default">
																<center>
																	<div class="panel-heading">Edit Cases - <?=$staff?></div>
																	<div class="panel-body">
																		<form method="POST" action="support.php">
																			<?php 
																			$runads9712=$cVar_second_db_nfasd8->prepare("SELECT * FROM cases WHERE pid='$i3d' ORDER BY uid DESC");
																			$runads9712->execute();
																			if($runads9712->rowCount() == 0) {
																				echo "<center><i><h4>This user has no support cases logged</h4></i></center>";
																			} else { ?>
																				<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="height: auto;overflow-y: auto;">
																					<thead>
																						<tr>
																							<th>Date</th>
																							<th>Suspect</th>
																							<th>Punishment</th>
																							<th>Notes</th>
																							<th>Overwatch</th>
																							<?php if($cVar_Delete_Cases == 1) { ?>
																							<th>Edit</th> 
																							<?php } ?>
																						</tr>
																					</thead>
																					<tfoot>
																						<?php while ($row2 = $runads9712->fetch()) { ?>
																						<tr>
																							<form action="support.php" method="post">
																								<th><?=$row2['date']?></th>
																								<th><?=$row2['suspect']?></th>
																								<th><?=$row2['punishment']?></th>
																								<th><?=$row2['notes']?></th>
																								<th><?=$row2['overwatch']?></th>
																								<?php if($cVar_Delete_Cases == 1) { ?>
																								<input type="hidden" name="cidname" id="cidname" required value="<?=$staff?>">
																								<input type="hidden" name="cidsid" id="cidsid" required value="<?=$i3d?>">
																								<input type="hidden" name="cid" id="cid" required value="<?=$row2['uid']?>">
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
																			}?>
																		</form>
																	</div>
																</center>
															</div>
														</div>
													</div>
												</div>
											</div>
												<div id="warn<?=$row['pid'] ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Formal Warning - <b><?=$staff?>(<?=$row['pid']?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="panel panel-default">
																<center>
																	<div class="panel-heading">Issue <?=$staff?> a Formal Warning</div>
																	<div class="panel-body">
																		<form method="POST" action="support.php">
																			<h3>Confirmation</h3>
																			<p>Confirm that you want to give this staff member a formal warning:</p>
																			<label for="f_id">Staff ID</label>
																			<input type="text" name="f_id" readonly required style="text-align:center;font-size:22px;" class="form-control" value="<?=$row['pid']?>"><br>
																			<label for="f_name">Staff Name</label>
																			<input type="text" name="f_name" readonly required style="text-align:center;font-size:22px;" class="form-control" value="<?=$staff?>"><br>
																			<label for="f_reason">Reason</label>
																			<textarea type="text" name="f_reason" required rows="5" style="text-align:center;font-size:22px;" class="form-control"></textarea><br>
																			<button type="submit" class="btn btn-danger btn-block"><font size="4">Issue Warning</font></button>
																		</form>
																	</div>
																</center>
															</div>
														</div>
													</div>
												</div>
											</div>
												<div id="delete<?=$row['pid'] ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Deleting All Support Cases - <b><?=$staff?>(<?=$row['pid']?>)</b></h4>															
														</div>
														<div class="modal-body">
															<div class="panel panel-default">
																<center>
																	<div class="panel-heading">Delete <?=$staff?>'s Support Cases</div>
																	<div class="panel-body">
																		<form method="POST" action="support.php">
																			<h3>Confirmation</h3>
																			<p>Confirm that you want to delete all support cases on the following account:</p>
																			<label for="cd_id">Staff ID</label>
																			<input type="text" name="cd_id" required readonly style="text-align:center;font-size:22px;" class="form-control" value="<?=$row['pid']?>"><br>
																			<label for="cd_name">Staff Name</label>
																			<input type="text" name="cd_name" required readonly style="text-align:center;font-size:22px;" class="form-control" value="<?=$staff?>"><br>
																			<button type="submit" class="btn btn-danger btn-block"><font size="4">Delete Cases</font></button>
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