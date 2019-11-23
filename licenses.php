<?php
$querasda1y = $cVar_second_db_nfasd8->prepare("SELECT * FROM med_licenses");
$querasda1y->execute();
if (!$querasda1y->rowCount() == 0) {
	$pid = $_POST['p_id'];
	while ($row = $querasda1y->fetch()) {
		$asd1 = $cVar_main_db_c89712h->prepare("SELECT med_licenses FROM players WHERE pid = '$pid'");
		$asd1->execute();
		$asd1->bindColumn('med_licenses', $str);
		while($row1=$asd1->fetch(PDO::FETCH_BOUND)) {
			$bid=$row['box_id'];
			$class=$row['class'];
			if(isset($_POST[$bid])) {
				if (strpos($str,''.$class.'') !== false) {
					$update=str_replace('[`'.$class.'`,0]','[`'.$class.'`,1]',$str);
				} else { 
					$update=str_replace(']"',',[`'.$class.'`,1]]"',$str);
				}
				$ud81_sql="UPDATE players SET med_licenses = '$update' WHERE pid = '$pid'";
				$upd_ex27=$cVar_main_db_c89712h->prepare($ud81_sql);
				$upd_ex27->execute();
			} else {
				if (strpos($str,''.$class.'') !== false) {
					$update=str_replace('[`'.$class.'`,1]','[`'.$class.'`,0]',$str);
				} else { 
					$update=str_replace(']"',',[`'.$class.'`,0]]"',$str);
				}
				$ud81_sql="UPDATE players SET med_licenses = '$update' WHERE pid = '$pid'";
				$upd_ex27=$cVar_main_db_c89712h->prepare($ud81_sql);
				$upd_ex27->execute();
			}
		}
	}
}

$querasda1y = $cVar_second_db_nfasd8->prepare("SELECT * FROM civ_licenses");
$querasda1y->execute();
if (!$querasda1y->rowCount() == 0) {
	$pid = $_POST['p_id'];
	while ($row = $querasda1y->fetch()) {
		$asd1 = $cVar_main_db_c89712h->prepare("SELECT civ_licenses FROM players WHERE pid = '$pid'");
		$asd1->execute();
		$asd1->bindColumn('civ_licenses', $str);
		while($row1=$asd1->fetch(PDO::FETCH_BOUND)) {
			$bid=$row['box_id'];
			$class=$row['class'];
			if(isset($_POST[$bid])) {
				if (strpos($str,''.$class.'') !== false) {
					$update=str_replace('[`'.$class.'`,0]','[`'.$class.'`,1]',$str);
				} else { 
					$update=str_replace(']"',',[`'.$class.'`,1]]"',$str);
				}
				$ud81_sql="UPDATE players SET civ_licenses = '$update' WHERE pid = '$pid'";
				$upd_ex27=$cVar_main_db_c89712h->prepare($ud81_sql);
				$upd_ex27->execute();
			} else {
				if (strpos($str,''.$class.'') !== false) {
					$update=str_replace('[`'.$class.'`,1]','[`'.$class.'`,0]',$str);
				} else { 
					$update=str_replace(']"',',[`'.$class.'`,0]]"',$str);
				}
				$ud81_sql="UPDATE players SET civ_licenses = '$update' WHERE pid = '$pid'";
				$upd_ex27=$cVar_main_db_c89712h->prepare($ud81_sql);
				$upd_ex27->execute();
			}
		}
	}
}

$querasda1y = $cVar_second_db_nfasd8->prepare("SELECT * FROM cop_licenses");
$querasda1y->execute();
if (!$querasda1y->rowCount() == 0) {
	$pid = $_POST['p_id'];
	while ($row = $querasda1y->fetch()) {
		$asd1 = $cVar_main_db_c89712h->prepare("SELECT cop_licenses FROM players WHERE pid = '$pid'");
		$asd1->execute();
		$asd1->bindColumn('cop_licenses', $str);
		while($row1=$asd1->fetch(PDO::FETCH_BOUND)) {
			$bid=$row['box_id'];
			$class=$row['class'];
			if(isset($_POST[$bid])) {
				if (strpos($str,''.$class.'') !== false) {
					$update=str_replace('[`'.$class.'`,0]','[`'.$class.'`,1]',$str);
				} else { 
					$update=str_replace(']"',',[`'.$class.'`,1]]"',$str);
				}
				$ud81_sql="UPDATE players SET cop_licenses = '$update' WHERE pid = '$pid'";
				$upd_ex27=$cVar_main_db_c89712h->prepare($ud81_sql);
				$upd_ex27->execute();
			} else {
				if (strpos($str,''.$class.'') !== false) {
					$update=str_replace('[`'.$class.'`,1]','[`'.$class.'`,0]',$str);
				} else { 
					$update=str_replace(']"',',[`'.$class.'`,0]]"',$str);
				}
				$ud81_sql="UPDATE players SET cop_licenses = '$update' WHERE pid = '$pid'";
				$upd_ex27=$cVar_main_db_c89712h->prepare($ud81_sql);
				$upd_ex27->execute();
			}
		}
	}
}

if(isset($_POST['p_resetgear'])) {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET civ_gear = '' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
	$date2=Date('l jS \of F Y h:i:s A');
	$log="[".$date2."] ".$staffname." has reset ".$pid."'s Gear!";
	LogAction(1,$log,$date2);
}

if(isset($_POST['b_comp'])) {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET jComp = '1' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
} else {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET jComp = '0' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
}
if(isset($_POST['b_cop'])) {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET jCop = '1' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
} else {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET jCop = '0' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
}
if(isset($_POST['b_medic'])) {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET jMedic = '1' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
} else {
	$pid = $_POST['p_id'];
	$ud81_sql3="UPDATE players SET jMedic = '0' WHERE pid = '$pid'";
	$upd_ex273=$cVar_main_db_c89712h->prepare($ud81_sql3);
	$upd_ex273->execute();
}
?>