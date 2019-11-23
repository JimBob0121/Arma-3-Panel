<?php
	if(isset($_POST["h_search"]) == 1) { 
		$searchid=$_POST['h_search'];
		$adasdasdsd = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM houses WHERE pid LIKE "%'.$searchid.'%" OR containers LIKE "%'.$searchid.'%"')->fetchColumn();
		$limit = 20;
		$pages = ceil($adasdasdsd / $limit);
		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
		$offset = ($page - 1)  * $limit;
		$start = $offset + 1;
		$end = min(($offset + $limit), $adasdasdsd);
		$ras89du9asj = $cVar_main_db_c89712h->prepare('SELECT * FROM houses WHERE pid LIKE "%'.$searchid.'%" OR containers LIKE "%'.$searchid.'%"');
	
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
		} 
	}

	if(isset($_POST["w_search"]) == 1) {
		$searchid=$_POST['w_search'];
		$urasunt2=$cVar_second_db_nfasd8->prepare("SELECT pid FROM points WHERE pid LIKE '%".$searchid."%'");
		$urasunt2->execute();
		if ($urasunt2->rowCount() == 0) {echo "<center><h2>This user has never had warning points</h2></center>";}
		if ($urasunt2->rowCount() > 0) {
			$urasunt2->setFetchMode(PDO::FETCH_ASSOC);
			$iterator3 = new IteratorIterator($urasunt2);
			foreach ($iterator3 as $rowa) {
				$file2=$rowa['pid'];
				$points2=$rowa['points'];
				$urasunt=$cVar_main_db_c89712h->prepare("SELECT * FROM players WHERE pid='$file2'");
				$urasunt->execute();
				if ($urasunt->rowCount() > 0) {
					$urasunt->setFetchMode(PDO::FETCH_ASSOC);
					$iterator = new IteratorIterator($urasunt);
					foreach ($iterator as $row) {	
						$n_name=$row['name'];
						$i3d=$row['pid'];
						$iname=$row['name'];
						$cop=$row['cop_licenses'];
						$civ=$row['civ_licenses'];
						$alevel=$row['adminlevel'];
						if($row['adminlevel'] == 0) { $sRank="N/A";}
						if($row['adminlevel'] == 1) { $sRank="Admin Level 1";}
						if($row['adminlevel'] == 2) { $sRank="Admin Level 2";}
						if($row['adminlevel'] == 3) { $sRank="Admin Level 3";}
						if($row['adminlevel'] == 4) { $sRank="Admin Level 4";}
						if($row['adminlevel'] >= 5) { $sRank="Admin Level 5";}
						echo "<tr class='active'>";
						echo "<td>";
						echo $row['pid'];
						echo "</td>";
						
						echo "<td>";
						echo $row['name'];
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

						echo "<td>"; ?>
						<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$row['pid'] ?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
						<?php if($cVar_Delete_User == 1) { ?><button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$i3d?>"><i class="fa fa-trash" style="position:relative;top:1px;"></i></button>
						<?php } if($cVar_Issue_Points == 1) { ?><button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#warn<?=$i3d?>"><i class="fa fa-exclamation-triangle" style="position:relative;top:1px;"></i></button>
						<?php } if($cVar_Remove_Points == 1) {?><button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#remove<?=$i3d?>"><i class="fa fa-close" style="position:relative;top:1px;"></i></button>
						<?php } ?> <a href="#" data-toggle="modal" data-target="#view<?=$i3d?>">View Log</a>
						
						<div id="remove<?=$i3d?>" class="modal fade" role="dialog">
							<div class="modal-dialog" style="width:90%;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Remove Points- <b><?=$iname?>(<?=$i3d?>)</b></h4>															
									</div>
									<div class="modal-body">
										<div class="panel panel-default">
											<center>
												<div class="panel-heading">Remove Points</div>
												<div class="panel-body">
													<form method="POST" action="warned.php">
														<h3>Select Points to Remove</h3>
														<p>Select from the table which points you would like to remove:</p>
														<?php
														if($cVar_View_Points == 1) {
															$runads9712=$cVar_second_db_nfasd8->prepare("SELECT * FROM points_logs WHERE pid='$i3d' ORDER BY UID");
															$runads9712->execute();
															if($runads9712->rowCount() == 0) {
																echo "<center><i><h4>This user has no points on record</h4></i></center>";
															} else { ?>
															<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="height: auto;overflow-y: auto;">
																<thead>
																	<tr>
																		<th>Date</th>
																		<th>Reason</th>
																		<th>Creator</th>
																		<th>Amount</th>
																		<?php if($cVar_Remove_Points == 1) { ?>
																		<th>Edit</th> 
																		<?php } ?>
																	</tr>
																</thead>
																<tfoot>
																	<?php 
																	while ($row2 = $runads9712->fetch()) { ?>
																	<tr>
																		<form action="warned.php" method="post">
																			<th><?=$row2['date']?></th>
																			<th><?=$row2['reason']?></th>
																			<th><?=$row2['creator']?></th>
																			<th><?=$row2['amount']?></th>
																			<?php if($cVar_Remove_Notes == 1) { ?>
																			<input type="hidden" name="rwname" id="rwname" required value="<?=$iname?>">
																			<input type="hidden" name="rwpid" id="rwpid" required value="<?=$i3d?>">
																			<input type="hidden" name="rwid" id="rwid" required value="<?=$row2['uid']?>">
																			<input type="hidden" name="rwr" id="rwr" required value="<?=$row2['amount']?>">
																			<th><?php if($row2['active'] == 1) {?><button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-times" style="position:relative;top:1px;"></i></button><?php } else { echo "Expired/Removed"; }?></th>
																			<?php } ?>
																			
																		</form>
																	</tr>
																	<?php
																	}																								
																	?>
																</tfoot>
															</table>
														<?php } }?>
													</form>
												</div>
											</center>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div id="view<?=$row['pid'] ?>" class="modal fade" role="dialog">
							<div class="modal-dialog" style="width:90%;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Warning Points - <b><?=$row['name'] ?></b></h4>															
									</div>
									<div class="modal-body">
										<div class="panel panel-default">
											<div class="panel-heading">Point Logs</div>
											<div class="panel-body">
												<?php
													if($cVar_View_Points == 1) {
														$runads9712=$cVar_second_db_nfasd8->prepare("SELECT * FROM points_logs WHERE pid='$i3d' ORDER BY UID");
														$runads9712->execute();
														if($runads9712->rowCount() == 0) {
															echo "<center><i><h4>This user has no points on record</h4></i></center>";
														} else { ?>
														<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="height: auto;overflow-y: auto;">
															<thead>
																<tr>
																	<th>Date</th>
																	<th>Reason</th>
																	<th>Creator</th>
																	<th>Amount</th>
																</tr>
															</thead>
															<tfoot>
																<?php 
																while ($row2 = $runads9712->fetch()) { ?>
																<tr>
																	<th><?=$row2['date']?></th>
																	<th><?=$row2['reason']?></th>
																	<th><?=$row2['creator']?></th>
																	<th><?=$row2['amount']?></th>
																</tr>
																<?php
																}																								
																?>
															</tfoot>
														</table>
													<?php } }?>
											</div>
										</div>
									</div>
									<div class="modal-footer">

									</div>
								</div>
							</div>
						</div>
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
													<form id="<?=$row['pid'] ?>" name="<?=$row['pid'] ?>" method="POST" action="warned.php">
														<div class="col-md-4">
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
																if($row['cop_licenses'] == "") { echo "No Licenses can be loaded! Try Syncing Data!"; } else {
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
																	} else { echo "No Licneses Found"; }
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
																if($alevel == 4) { echo "<option selected='selected' value='4'>Senior Administration (Selected)</option>"; } else { echo "<option value='4'>Senior Administrator</option>"; }
																if($alevel > 4) { echo "<option selected='selected' value='5'>Management (Selected)</option>"; } else { echo "<option value='5'>Management</option>"; }
																
																
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
																		echo "<div class='col-md-4'><input id='b_comp' name='b_comp' type='checkbox' value='0'><label for='b_comp'>Compensation</label></div>";
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
															<label for="p_civlicenses">Civilian Licenses</label><br>
															<textarea type="hidden" readonly id="p_civlic" style="display:none;" name="p_civlic"><?php echo $row['civ_licenses']; ?></textarea>
															<div class="checkbox checkbox-info">
																<?php
																if($row['civ_licenses'] == "") { echo "No Licenses can be loaded! Try Syncing Data!"; } else {
																	$civ2=$row['civ_licenses'];
																	$query12 = $cVar_second_db_nfasd8->prepare("SELECT * FROM civ_licenses ORDER BY uid");
																	$query12->execute();
																	if (!$query12->rowCount() == 0) {
																		while ($row = $query12->fetch()) {
																			$uid=$row['uid'];
																			$class=$row['class'];
																			$name=$row['name'];
																			$box=$row['box_id'];
																			$cstring="[`".$class."`,1]";
																			if(strpos($civ2,$cstring) == true) { 
																				echo "<div class='col-md-4'><input id='".$box."' name='".$box."' checked type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>";
																			} else { echo "<div class='col-md-4'><input id='".$box."' name='".$box."' type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>"; } 
																		}
																	} else { echo "No Licneses Found"; }
																}?>
															
															</div>
															<?php 
															}
															?>
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
																		<form action="warned.php" method="post">
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
															<form id="n<?=$i3d ?>" name="n<?=$i3d ?>" method="POST" action="warned.php">
																
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
													<form method="POST" action="warned.php">
														<h3>Confirmation</h3>
														<p>Confirm that you want to delete the following account:</p>
														<label for="d_id">Player ID</label>
														<input type="text" name="d_id" style="text-align:center;font-size:22px;" class="form-control" value="<?=$i3d?>"><br>
														<label for="d_name">Player Name</label>
														<input type="text" name="d_name" style="text-align:center;font-size:22px;" class="form-control" value="<?=$iname?>"><br>
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
													<form method="POST" action="warned.php">
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
														<input type="number" required name="w_issue" style="text-align:center;font-size:22px;" class="form-control" value="0"><br>
														
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
					}
					echo "</td>";
					echo "</tr>";
				}
			}
		}
	}
	if(isset($_POST["g_searchw"]) == 1) {
		$searchid=$_POST['g_searchw'];
		$adasdasdsd = $cVar_second_db_nfasd8->query('SELECT COUNT(*) FROM gangs WHERE gOwner LIKE "%'.$searchid.'%" OR gName LIKE "%'.$searchid.'%"')->fetchColumn();
		$limit = 20;
		$pages = ceil($adasdasdsd / $limit);
		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
		$offset = ($page - 1)  * $limit;
		$start = $offset + 1;
		$end = min(($offset + $limit), $adasdasdsd);
		$ras89du9asja = $cVar_second_db_nfasd8->prepare('SELECT * FROM gangs WHERE gOwner LIKE "%'.$searchid.'%" OR gName LIKE "%'.$searchid.'%"');

		$ras89du9asja->bindParam(':limit', $limit, PDO::PARAM_INT);
		$ras89du9asja->bindParam(':offset', $offset, PDO::PARAM_INT);
		$ras89du9asja->execute();
		if ($ras89du9asja->rowCount() > 0) {
			$ras89du9asja->setFetchMode(PDO::FETCH_ASSOC);
			$iteratora = new IteratorIterator($ras89du9asja);
			?>
		<table id="" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Gang Owner</th>
					<th>Gang Name</th>
					<th>Strikes</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($iteratora as $rowa) {
					$idz=$rowa['gOwner'];
					$i3d1=$rowa['uid'];
					$iname3=$rowa['gName'];
					$mem=$rowa['gStrikes'];
					echo "<tr class='active'>";
					
					echo "<td>";
					echo $rowa['gOwner'];
					echo "</td>";
					
					echo "<td>";
					echo $rowa['gName'];
					echo "</td>";
					
					echo "<td>";
					echo $rowa['gStrikes'];
					echo "</td>";

					echo "<td>";
					?>
					<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$i3d1?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
					<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$i3d1?>"><i class="fa fa-trash" style="position:relative;top:1px;"></i></button>
					
					<div id="edit<?=$i3d1 ?>" class="modal fade" role="dialog">
						<div class="modal-dialog" style="width:90%;">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Editing Gang - <b><?=$iname3 ?>(<?=$i3d1?>)</b></h4>															
								</div>
								<div class="modal-body">
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">Whitelisted Gang Statistics</div>
											<div class="panel-body">
												<form method="POST" action="gangs.php">
													<div class="col-md-12">
														<center>
														<div class="col-md-6">
															<label for="g_pidw">Gang Owner</label>
															<input type="text" class="form-control" readonly id="g_pidw" name="g_pidw" style="text-align:center;" value="<?=$idz ?>"><br>
															<input type="hidden" class="form-control" readonly id="g_uidw" name="g_uidw" style="text-align:center;" value="<?=$i3d1 ?>"><br>
														</div>
														<?php 
														if($cVar_Edit_Gang_Name == 1) { ?>
														<div class="col-md-6">
															<label for="g_namew">Gang Name</label>
															<input type="text" class="form-control" id="g_namew" name="g_namew" required style="text-align:center;" value="<?=$iname3 ?>"><br>
														</div>
														<?php } ?>
														</center>
													</div>
													<div class="col-md-12"><br>
														<button type="submit" class="btn btn-success btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-refresh"></span> Update</button>
													</div>
												</form>
												<div class="col-md-12">
													<div class="panel panel-default">
														<div class="panel-heading">Strikes</div>
														<div class="panel-body">
															<h4><center><?=$rowa['gStrikes']?> Strikes</center></h4>
															<?php 
															if($cVar_View_Notes == 1) {
																$runads9712=$cVar_second_db_nfasd8->prepare("SELECT * FROM gang_strikes WHERE gID='$i3d1' ORDER BY UID DESC LIMIT 10");
																$runads9712->execute();
																if($runads9712->rowCount() == 0) {
																	echo "<center><i><h4>This gang has no strikes on record</h4></i></center>";
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
																				<form action="gangs.php" method="post">
																					<th><?=$row2['gDate']?></th>
																					<th><?=$row2['gReason']?></th>
																					<th><?=$row2['gStaff']?></th>
																					<?php if($cVar_Remove_Notes == 1) { ?>
																					<input type="hidden" name="dstrikename" id="dstrikename" required value="<?=$rowa['gName']?>">
																					<input type="hidden" name="dstrikeid" id="dstrikeid" required value="<?=$row2['uid']?>">
																					<input type="hidden" name="dstrikegid" id="dstrikegid" required value="<?=$rowa['uid']?>">
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
																	<form method="POST" action="gangs.php">
																		
																		<input type="hidden" class="form-control" readonly id="g_ids" name="g_ids" value="<?=$i3d1 ?>"><br>
																		<input type="hidden" class="form-control" readonly id="g_names" name="g_names" value="<?=$rowa['gName'] ?>"><br>
																		<textarea class="form-control" id="g_reason" name="g_reason" type="text" required rows="2" placeholder="Enter strike reason..."></textarea><br>
																		<button type="submit" class="btn btn-danger btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-sticky-note"></span> Add Strike</button>
																	</form>
																<?php 
																} 
															} else { echo "<center><i><h4>You don't have permission to view gang strikes</h4></i></center>"; }
															?>
														</div>
													</div>	
												</div>
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
					<div id="delete<?=$i3d1?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Deleting Gang - <b><?=$rowa['gName']?>(<?=$rowa['uid']?>)</b></h4>															
								</div>
								<div class="modal-body">
									<div class="panel panel-default">
										<center>
											<div class="panel-heading">Delete Whitelisted Gang</div>
											<div class="panel-body">
												<?php 
												if($cVar_Delete_Gangs == 1) {?>
												<form method="POST" action="gangs.php">
													<h3>Confirmation</h3>
													<p>Confirm that you want to delete the following gang:</p>
													<label for="g_owner1w">Gang Owner</label>
													<input type="hidden" class="form-control" readonly id="g_uid1w" name="g_uid1w" style="text-align:center;" value="<?=$rowa['uid'] ?>"><br>
													<input type="text" name="g_owner1w" id="g_owner1w" style="text-align:center;font-size:22px;" class="form-control" value="<?=$rowa['gOwner'];?>"><br>
													<label for="g_name1w">Gang Name</label>
													<input type="text" name="g_name1w" id="g_name1w" style="text-align:center;font-size:22px;" class="form-control" value="<?=$rowa['gName']?>"><br>
													<button type="submit" class="btn btn-danger btn-block"><font size="4">Delete Gang</font></button>
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
		<?php } 
	}		
	if(isset($_POST["g_search"]) == 1) {
		$searchid=$_POST['g_search'];
		$adasdasdsda = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM gangs WHERE owner LIKE "%'.$searchid.'%" OR name LIKE "%'.$searchid.'%"')->fetchColumn();
		$limit = 20;
		$pages = ceil($adasdasdsda / $limit);
		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
		$offset = ($page - 1)  * $limit;
		$start = $offset + 1;
		$end = min(($offset + $limit), $adasdasdsda);
		$ras89du9asj2 = $cVar_main_db_c89712h->prepare('SELECT * FROM gangs WHERE owner LIKE "%'.$searchid.'%" OR name LIKE "%'.$searchid.'%"');
	
		$ras89du9asj2->bindParam(':limit', $limit, PDO::PARAM_INT);
		$ras89du9asj2->bindParam(':offset', $offset, PDO::PARAM_INT);
		$ras89du9asj2->execute();
		if ($ras89du9asj2->rowCount() > 0) {
			$ras89du9asj2->setFetchMode(PDO::FETCH_ASSOC);
			$iterator = new IteratorIterator($ras89du9asj2);
			?>
		<table id="" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Owner ID</th>
					<th>Gang Name</th>
					<th>Bank</th>
					<th>Max Members</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($iterator as $row) {
					$idz=$row['owner'];
					$i3d=$row['id'];
					$iname=$row['name'];
					$mem=$row['members'];
					echo "<tr class='active'>";
					
					echo "<td>";
					echo "<a target='_blank' href='http://steamcommunity.com/profiles/$idz'>$idz</a>";
					echo "</td>";
					
					echo "<td>";
					echo $row['name'];
					echo "</td>";
					
					echo "<td>";
					echo $row['bank'];
					echo "</td>";
					
					echo "<td>";
					echo $row['maxmembers'];
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
									<h4 class="modal-title">Editing Gang - <b><?=$row['name'] ?>(<?=$i3d?>)</b></h4>															
								</div>
								<div class="modal-body">
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">Gang Statistics</div>
											<div class="panel-body">
												<form method="POST" action="gangs.php">
													<div class="col-md-12">
														<center>
														<div class="col-md-4">
															<label for="g_pid">Gang Owner ID</label>
															<input type="text" class="form-control" readonly id="g_pid" name="g_pid" style="text-align:center;" value="<?=$row['owner'] ?>"><br>
															<input type="hidden" class="form-control" readonly id="g_uid" name="g_uid" style="text-align:center;" value="<?=$row['id'] ?>"><br>
														</div>
														<?php 
														if($cVar_Edit_Gang_Name == 1) { ?>
														<div class="col-md-4">
															<label for="g_name">Gang Name</label>
															<input type="text" class="form-control" id="g_name" name="g_name" style="text-align:center;" value="<?=$row['name'] ?>"><br>
														</div>
														<?php } 
														if($cVar_Edit_Gang_Max == 1) { ?>
														<div class="col-md-4">
															<label for="g_max">Maximum Members</label>
															<input type="number" class="form-control" id="g_max" name="g_max" style="text-align:center;" value="<?=$row['maxmembers'] ?>"><br>
														</div>
														<?php } 
														if($cVar_Edit_Gang_Members == 1) { ?>
														<div class="col-md-12">
															<label for="g_members">Current Members</label>
															<textarea type="text" rows="5" class="form-control" id="g_members" name="g_members" style="text-align:center;"><?=$row['members'] ?></textarea><br>
														</div>
														<?php } ?>
														
														
														</center>
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
									<h4 class="modal-title">Deleting Gang - <b><?=$row['name']?>(<?=$row['uid']?>)</b></h4>															
								</div>
								<div class="modal-body">
									<div class="panel panel-default">
										<center>
											<div class="panel-heading">Delete Gang</div>
											<div class="panel-body">
												<?php 
												if($cVar_Delete_Gangs == 1) {?>
												<form method="POST" action="gangs.php">
													<h3>Confirmation</h3>
													<p>Confirm that you want to delete the following gang:</p>
													<label for="g_owner1">Gang Owner</label>
													<input type="hidden" class="form-control" readonly id="g_uid1" name="g_uid1" style="text-align:center;" value="<?=$row['id'] ?>"><br>
													<input type="text" name="g_owner1" id="g_owner1" style="text-align:center;font-size:22px;" class="form-control" value="<?=$row['owner'];?>"><br>
													<label for="g_name1">Gang Name</label>
													<input type="text" name="g_name1" id="g_name1" style="text-align:center;font-size:22px;" class="form-control" value="<?=$row['name']?>"><br>
													<button type="submit" class="btn btn-danger btn-block"><font size="4">Delete Gang</font></button>
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
		<?php } 
	}
	
	if(isset($_POST["lic_search"]) == 1) {
		$searchid=$_POST['lic_search'];
		$adasdasdsd = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM players WHERE civ_licenses LIKE "%'.$searchid.'`,1]%" OR cop_licenses LIKE "%'.$searchid.'`,1]%"')->fetchColumn();
		$limit = 20;
		$pages = ceil($adasdasdsd / $limit);
		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
		$offset = ($page - 1)  * $limit;
		$start = $offset + 1;
		$end = min(($offset + $limit), $adasdasdsd);
		$ras89du9asj = $cVar_main_db_c89712h->prepare('SELECT * FROM players WHERE civ_licenses LIKE "%'.$searchid.'`,1]%" OR cop_licenses LIKE "%'.$searchid.'`,1]%"');
	
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
																if($alevel == 4) { echo "<option selected='selected' value='4'>Senior Administration (Selected)</option>"; } else { echo "<option value='4'>Senior Administration</option>"; }
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
															<label for="p_civlicenses">Civilian Licenses</label><br>
															<textarea type="hidden" readonly id="p_civlic" style="display:none;" name="p_civlic"><?php echo $row['civ_licenses']; ?></textarea>
															<div class="checkbox checkbox-info">
																<?php
																if($row['civ_licenses'] == "") { echo "No Licenses can be loaded!"; } else {
																	$civ2=$row['civ_licenses'];
																	$query12 = $cVar_second_db_nfasd8->prepare("SELECT * FROM civ_licenses ORDER BY uid");
																	$query12->execute();
																	if (!$query12->rowCount() == 0) {
																		while ($row = $query12->fetch()) {
																			$uid=$row['uid'];
																			$class=$row['class'];
																			$name=$row['name'];
																			$box=$row['box_id'];
																			$cstring="[`".$class."`,1]";
																			if(strpos($civ2,$cstring) == true) { 
																				echo "<div class='col-md-4'><input id='".$box."' name='".$box."' checked type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>";
																			} else { echo "<div class='col-md-4'><input id='".$box."' name='".$box."' type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>"; } 
																		}
																	} else { echo "No Licenses Found"; }
																}?>
															
															</div>
															<?php 
															}
															?>
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
					} ?>
				</tbody>
			</table><?php
		} 
		?>
		
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
										$ras89du9asja = $cVar_second_db_nfasd8->prepare('SELECT * FROM cop_licenses ');												
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
		<?php
	}
	
	if(isset($_POST["v_search"]) == 1) { 
		$searchid=$_POST['v_search'];
		$adasdasdsd = $cVar_main_db_c89712h->query('SELECT COUNT(*) FROM vehicles WHERE pid LIKE "%'.$searchid.'%" OR classname LIKE "%'.$searchid.'%"')->fetchColumn();
		$limit = 20;
		$pages = ceil($adasdasdsd / $limit);
		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array('options' => array('default'   => 1,'min_range' => 1,),)));
		$offset = ($page - 1)  * $limit;
		$start = $offset + 1;
		$end = min(($offset + $limit), $adasdasdsd);
		$ras89du9asj = $cVar_main_db_c89712h->prepare('SELECT * FROM vehicles WHERE pid LIKE "%'.$searchid.'%" OR classname LIKE "%'.$searchid.'%"');
	
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
						$alevel=$row['adminlevel'];
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
						<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#edit<?=$idz?>"><i class="fa fa-pencil-square-o" style="position:relative;top:1px;"></i></button>
						<button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete<?=$idz?>"><i class="fa fa-trash" style="position:relative;top:1px;"></i></button>
						
						
						
						
						<div id="edit<?=$idz ?>" class="modal fade" role="dialog">
							<div class="modal-dialog" style="width:90%;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Editing Vehicle - <b><?=$iname ?>(<?=$idz?>)</b></h4>															
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
															<?php if($cVar_Destroy_Vehicles == 1) { ?>
															<div class="col-md-12"><br></div>
															<div class="col-md-6">
																<label for="v_alive">Destroyed (0 = Not Destroyed, 1 = Destroyed)</label><br>
																<input id="v_alive" name="v_alive" class="form-control" style="text-align:center;" type="number" value="<?=$row['alive']?>">
															</div>
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
						<div id="delete<?=$idz?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Deleting Vehicle - <b><?=$iname?>(<?=$idz?>)</b></h4>															
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
			</table><?php
		} 
	}
	
if(isset($_GET["search_id"]) == 1) {
		$search_id=$_GET["search_id"];
		try {
			$cVar_connect_a12 = new PDO('mysql:host='.$jVar_DBHOST.'; dbname='.$jVar_DBNAME, $jVar_DBUSER, $jVar_DBPASS); 
			$cVar_connect_a12->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$cVar_connect_a12->exec("SET CHARACTER SET utf8");	
			$cVar_query_am8 = "SELECT * FROM players WHERE pid='$search_id'";	
			$cVar_run_ejc87 = $cVar_connect_a12->prepare($cVar_query_am8);
			$cVar_run_ejc87->bindValue(1, "%$search_id$". PDO::PARAM_STR);
			$cVar_run_ejc87->execute();
		
			if (!$cVar_run_ejc87->rowCount() == 0) {
				while ($row = $cVar_run_ejc87->fetch()) {
				$i3d=$row['pid'];	
				$iname=$row['name'];
				$medlic=$row['med_licenses'];
				$civlic=$row['civ_licenses'];
				$n_name=$row['name'];	?>
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
										if($row['cop_licenses'] == "") { echo "No Licenses can be loaded! Try Syncing Data!"; } else {
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
											} else { echo "No Licneses Found"; }
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
										
										if($row['adminlevel'] == 0) { echo "<option selected='selected' value='0'>N/A (Selected)</option>"; } else { echo "<option value='0'>N/A</option>"; }
										if($row['adminlevel'] == 1) { echo "<option selected='selected' value='1'>Trial Staff (Selected)</option>"; } else { echo "<option value='1'>Trial Staff</option>"; }
										if($row['adminlevel'] == 2) { echo "<option selected='selected' value='2'>Moderator (Selected)</option>"; } else { echo "<option value='2'>Moderator</option>"; }
										if($row['adminlevel'] == 3) { echo "<option selected='selected' value='3'>Administrator (Selected)</option>"; } else { echo "<option value='3'>Administrator</option>"; }
										if($row['adminlevel'] == 4) { echo "<option selected='selected' value='4'>Senior Administration (Selected)</option>"; } else { echo "<option value='4'>Senior Administrator</option>"; }
										if($row['adminlevel'] > 4) { echo "<option selected='selected' value='5'>Management (Selected)</option>"; } else { echo "<option value='5'>Management</option>"; }
										
										
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
									?>
									<?php 
									} if($cVar_Whitelist == 1) {
									?><br>
									<label for="p_civlic"><br>Civilian license allowed! Report multiple to SMT!</label><br>
									<textarea type="hidden" readonly id="p_civlic" style="display:none;" name="p_civlic"><?php echo $row['civ_licenses']; ?></textarea>
									<div class="checkbox checkbox-info">
										<?php
										if($civlic == "") { echo "No Licenses can be loaded! Try Syncing Data!"; } else {
											$civ2=$row['civ_licenses'];
											$query12 = $cVar_second_db_nfasd8->prepare("SELECT * FROM civ_licenses ORDER BY uid");
											$query12->execute();
											if (!$query12->rowCount() == 0) {
												while ($row = $query12->fetch()) {
													$uid=$row['uid'];
													$class=$row['class'];
													$name=$row['name'];
													$box=$row['box_id'];
													$cstring="[`".$class."`,1]";
													if(strpos($civlic,$cstring) == true) { 
														echo "<div class='col-md-4'><input id='".$box."' name='".$box."' checked type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>";
													} else { echo "<div class='col-md-4'><input id='".$box."' name='".$box."' type='checkbox' value='".$box."'><label for='".$box."'>".$name."</label></div>"; } 
												}
											} else { echo "No Licneses Found"; }
										}?>
									
									</div>
									<?php } ?>
								</div>
								<div class="col-md-12"><br>
									<button type="submit" class="btn btn-success btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-refresh"></span> Update</button>
								</div>
							</form>
							<form action="players.php" method="POST">
								<div class="col-md-12">
									<input type="hidden" name="d_id" value="<?=$i3d?>">
									<input type="hidden" name="d_name" value="<?=$iname?>">
									<?php if($cVar_Delete_User == 1) { ?>
									<button type="submit" class="btn btn-danger btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-refresh"></span> Delete Account</button>
									<?php } ?>
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
										<textarea class="form-control" id="note" name="note" type="text" rows="2" placeholder="Enter note..."></textarea><br>
										<button type="submit" class="btn btn-info btn-block" style="position:relative;top:-5px;margin-bottom:10px;font-size:18px;"><span class="fa fa-sticky-note"></span> Add Note</button>
									</form>
								<?php 
								} 
							} else { echo "<center><i><h4>You don't have permission to view notes</h4></i></center>"; }
							?>
						</div>
					</div>	
				</div>
				<?php if($cVar_Issue_Points == 1) {?>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align:center;">Warn User</div>
						<div class="panel-body"><center>
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
								<input type="number" required name="w_issue" style="text-align:center;font-size:22px;" class="form-control" value="0"><br>
								
								<label for="w_reason">Reason</label>
								<textarea type="number" required name="w_reason" style="text-align:center;font-size:22px;" class="form-control"></textarea><br>
								
								
								<button type="submit" class="btn btn-danger btn-block"><font size="4">Warn User</font></button>
							</form></center>
						</div>
					</div>
				</div>
				<?php
				}
			}
		} else { echo "<h3>No Users Exist!</h3>";exit; }
	}
	catch(PDOException $err) {
		echo "Connection failed!";
		$err->getMessage() . "<br/>";
		die();
	}
}
?>