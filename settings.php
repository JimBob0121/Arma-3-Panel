<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////

$page = 1;
$cfg_ = parse_ini_file("./config/config.ini",true);
include("class/encryption.php");
include("class/steamlogin.php");
include("config/load_vars.php");

function updateperms($file, $type, $perm, $value) {
    $config_data = parse_ini_file($file, true);
    $config_data[$type][$perm] = $value;
    $new_content = '';
    foreach ($config_data as $type => $section_content) {
        $section_content = array_map(function($value, $perm) {
            return "$perm=$value";
        }, array_values($section_content), array_keys($section_content));
        $section_content = implode("\n", $section_content);
        $new_content .= "[$type]\n$section_content\n";
    }
    file_put_contents($file, $new_content);
}


if(!$jVar_MASTER_ADMIN === $cVar_ID) { exit; } //Add return to index function with permission error
if(strcmp($jVar_MASTER_ADMIN, $cVar_ID) !== 0) { exit; }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Admin level 1
	if (!empty($_POST['checkbox1'])) {
		updateperms("config/config.ini","AdminLevel1","View_Players","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Players","0");
	}
	if (!empty($_POST['checkbox2'])) {
		updateperms("config/config.ini","AdminLevel1","Whitelist","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Whitelist","0");
	}
	if (!empty($_POST['checkbox3'])) {
		updateperms("config/config.ini","AdminLevel1","Compensate","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Compensate","0");
	}
	if (!empty($_POST['checkbox4'])) {
		updateperms("config/config.ini","AdminLevel1","Reset_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Reset_User","0");
	}
	if (!empty($_POST['checkbox5'])) {
		updateperms("config/config.ini","AdminLevel1","Delete_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Delete_User","0");
	}
	if (!empty($_POST['checkbox6'])) {
		updateperms("config/config.ini","AdminLevel1","View_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Notes","0");
	}
	if (!empty($_POST['checkbox7'])) {
		updateperms("config/config.ini","AdminLevel1","Submit_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Submit_Notes","0");
	}
	if (!empty($_POST['checkbox8'])) {
		updateperms("config/config.ini","AdminLevel1","Remove_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Remove_Notes","0");
	}
	if (!empty($_POST['checkbox9'])) {
		updateperms("config/config.ini","AdminLevel1","View_AntiCheat","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_AntiCheat","0");
	}
	if (!empty($_POST['checkbox10'])) {
		updateperms("config/config.ini","AdminLevel1","Remove_Flagged","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Remove_Flagged","0");
	}
	if (!empty($_POST['checkbox11'])) {
		updateperms("config/config.ini","AdminLevel1","Comp_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Comp_Ban","0");
	}
	if (!empty($_POST['checkbox12'])) {
		updateperms("config/config.ini","AdminLevel1","Police_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Police_Ban","0");
	}
	if (!empty($_POST['checkbox13'])) {
		updateperms("config/config.ini","AdminLevel1","Medic_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Medic_Ban","0");
	}
	if (!empty($_POST['checkbox14'])) {
		updateperms("config/config.ini","AdminLevel1","View_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Points","0");
	}
	if (!empty($_POST['checkbox15'])) {
		updateperms("config/config.ini","AdminLevel1","Issue_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Issue_Points","0");
	}
	if (!empty($_POST['checkbox16'])) {
		updateperms("config/config.ini","AdminLevel1","Remove_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Remove_Points","0");
	}
	if (!empty($_POST['checkbox17'])) {
		updateperms("config/config.ini","AdminLevel1","Modify_Cash","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Modify_Cash","0");
	}
	if (!empty($_POST['checkbox1g'])) {
		updateperms("config/config.ini","AdminLevel1","View_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Gangs","0");
	}
	if (!empty($_POST['checkbox2g'])) {
		updateperms("config/config.ini","AdminLevel1","Edit_Gang_Name","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Edit_Gang_Name","0");
	}
	if (!empty($_POST['checkbox3g'])) {
		updateperms("config/config.ini","AdminLevel1","Edit_Gang_Max","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Edit_Gang_Max","0");
	}
	if (!empty($_POST['checkbox4g'])) {
		updateperms("config/config.ini","AdminLevel1","Edit_Gang_Members","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Edit_Gang_Members","0");
	}
	if (!empty($_POST['checkbox5g'])) {
		updateperms("config/config.ini","AdminLevel1","Delete_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Delete_Gangs","0");
	}
	if (!empty($_POST['checkbox1a'])) {
		updateperms("config/config.ini","AdminLevel1","View_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Vehicles","0");
	}
	if (!empty($_POST['checkbox2a'])) {
		updateperms("config/config.ini","AdminLevel1","Revive_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Revive_Vehicles","0");
	}
	if (!empty($_POST['checkbox3a'])) {
		updateperms("config/config.ini","AdminLevel1","Destroy_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Destroy_Vehicles","0");
	}
	if (!empty($_POST['checkbox4a'])) {
		updateperms("config/config.ini","AdminLevel1","Edit_NumberPlates","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Edit_NumberPlates","0");
	}
	if (!empty($_POST['checkbox4aa'])) {
		updateperms("config/config.ini","AdminLevel1","Vehicle_Inventory","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Vehicle_Inventory","0");
	}
	if (!empty($_POST['checkbox5a'])) {
		updateperms("config/config.ini","AdminLevel1","Delete_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Delete_Vehicles","0");
	}
	if (!empty($_POST['checkbox1b'])) {
		updateperms("config/config.ini","AdminLevel1","View_Rcon","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Rcon","0");
	}
	if (!empty($_POST['checkbox2b'])) {
		updateperms("config/config.ini","AdminLevel1","Connected_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Connected_Users","0");
	}
	if (!empty($_POST['checkbox3b'])) {
		updateperms("config/config.ini","AdminLevel1","Send_Messages","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Send_Messages","0");
	}
	if (!empty($_POST['checkbox4b'])) {
		updateperms("config/config.ini","AdminLevel1","Kick_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Kick_Users","0");
	}
	if (!empty($_POST['checkbox5b'])) {
		updateperms("config/config.ini","AdminLevel1","Ban_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Ban_Users","0");
	}
	if (!empty($_POST['checkbox1c'])) {
		updateperms("config/config.ini","AdminLevel1","Submit_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Submit_Cases","0");
	}
	if (!empty($_POST['checkbox2c'])) {
		updateperms("config/config.ini","AdminLevel1","View_AllCases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_AllCases","0");
	}
	if (!empty($_POST['checkbox3c'])) {
		updateperms("config/config.ini","AdminLevel1","Delete_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Delete_Cases","0");
	}
	if (!empty($_POST['checkbox4c'])) {
		updateperms("config/config.ini","AdminLevel1","Reset_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Reset_Cases","0");
	}
	if (!empty($_POST['checkbox1d'])) {
		updateperms("config/config.ini","AdminLevel1","Modify_AdminLevel","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Modify_AdminLevel","0");
	}
	if (!empty($_POST['checkbox2d'])) {
		updateperms("config/config.ini","AdminLevel1","Reset_AllPlayers","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Reset_AllPlayers","0");
	}
	if (!empty($_POST['checkbox3d'])) {
		updateperms("config/config.ini","AdminLevel1","Reset_AllVehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Reset_AllVehicles","0");
	}
	if (!empty($_POST['checkbox4d'])) {
		updateperms("config/config.ini","AdminLevel1","Reset_AllGangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Reset_AllGangs","0");
	}
	if (!empty($_POST['checkbox5d'])) {
		updateperms("config/config.ini","AdminLevel1","Modify_Permissions","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Modify_Permissions","0");
	}
	if (!empty($_POST['checkbox6d'])) {
		updateperms("config/config.ini","AdminLevel1","Backup_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Backup_Database","0");
	}
	if (!empty($_POST['checkbox6dx'])) {
		updateperms("config/config.ini","AdminLevel1","View_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","View_Database","0");
	}
	if (!empty($_POST['checkbox6dxx'])) {
		updateperms("config/config.ini","AdminLevel1","Create_Entry","1");
	} else { 
		updateperms("config/config.ini","AdminLevel1","Create_Entry","0");
	}
	//Admin level 2
	if (!empty($_POST['a_checkbox1'])) {
		updateperms("config/config.ini","AdminLevel2","View_Players","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Players","0");
	}
	if (!empty($_POST['a_checkbox2'])) {
		updateperms("config/config.ini","AdminLevel2","Whitelist","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Whitelist","0");
	}
	if (!empty($_POST['a_checkbox3'])) {
		updateperms("config/config.ini","AdminLevel2","Compensate","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Compensate","0");
	}
	if (!empty($_POST['a_checkbox4'])) {
		updateperms("config/config.ini","AdminLevel2","Reset_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Reset_User","0");
	}
	if (!empty($_POST['a_checkbox5'])) {
		updateperms("config/config.ini","AdminLevel2","Delete_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Delete_User","0");
	}
	if (!empty($_POST['a_checkbox6'])) {
		updateperms("config/config.ini","AdminLevel2","View_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Notes","0");
	}
	if (!empty($_POST['a_checkbox7'])) {
		updateperms("config/config.ini","AdminLevel2","Submit_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Submit_Notes","0");
	}
	if (!empty($_POST['a_checkbox8'])) {
		updateperms("config/config.ini","AdminLevel2","Remove_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Remove_Notes","0");
	}
	if (!empty($_POST['a_checkbox9'])) {
		updateperms("config/config.ini","AdminLevel2","View_AntiCheat","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_AntiCheat","0");
	}
	if (!empty($_POST['a_checkbox10'])) {
		updateperms("config/config.ini","AdminLevel2","Remove_Flagged","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Remove_Flagged","0");
	}
	if (!empty($_POST['a_checkbox11'])) {
		updateperms("config/config.ini","AdminLevel2","Comp_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Comp_Ban","0");
	}
	if (!empty($_POST['a_checkbox12'])) {
		updateperms("config/config.ini","AdminLevel2","Police_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Police_Ban","0");
	}
	if (!empty($_POST['a_checkbox13'])) {
		updateperms("config/config.ini","AdminLevel2","Medic_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Medic_Ban","0");
	}
	if (!empty($_POST['a_checkbox14'])) {
		updateperms("config/config.ini","AdminLevel2","View_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Points","0");
	}
	if (!empty($_POST['a_checkbox15'])) {
		updateperms("config/config.ini","AdminLevel2","Issue_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Issue_Points","0");
	}
	if (!empty($_POST['a_checkbox16'])) {
		updateperms("config/config.ini","AdminLevel2","Remove_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Remove_Points","0");
	}
	if (!empty($_POST['a_checkbox17'])) {
		updateperms("config/config.ini","AdminLevel2","Modify_Cash","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Modify_Cash","0");
	}
	if (!empty($_POST['a_checkbox1g'])) {
		updateperms("config/config.ini","AdminLevel2","View_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Gangs","0");
	}
	if (!empty($_POST['a_checkbox2g'])) {
		updateperms("config/config.ini","AdminLevel2","Edit_Gang_Name","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Edit_Gang_Name","0");
	}
	if (!empty($_POST['a_checkbox3g'])) {
		updateperms("config/config.ini","AdminLevel2","Edit_Gang_Max","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Edit_Gang_Max","0");
	}
	if (!empty($_POST['a_checkbox4g'])) {
		updateperms("config/config.ini","AdminLevel2","Edit_Gang_Members","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Edit_Gang_Members","0");
	}
	if (!empty($_POST['a_checkbox5g'])) {
		updateperms("config/config.ini","AdminLevel2","Delete_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Delete_Gangs","0");
	}
	if (!empty($_POST['a_checkbox1a'])) {
		updateperms("config/config.ini","AdminLevel2","View_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Vehicles","0");
	}
	if (!empty($_POST['a_checkbox2a'])) {
		updateperms("config/config.ini","AdminLevel2","Revive_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Revive_Vehicles","0");
	}
	if (!empty($_POST['a_checkbox3a'])) {
		updateperms("config/config.ini","AdminLevel2","Destroy_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Destroy_Vehicles","0");
	}
	if (!empty($_POST['a_checkbox4a'])) {
		updateperms("config/config.ini","AdminLevel2","Edit_NumberPlates","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Edit_NumberPlates","0");
	}
	if (!empty($_POST['a_checkbox4aa'])) {
		updateperms("config/config.ini","AdminLevel2","Vehicle_Inventory","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Vehicle_Inventory","0");
	}
	if (!empty($_POST['a_checkbox5a'])) {
		updateperms("config/config.ini","AdminLevel2","Delete_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Delete_Vehicles","0");
	}
	if (!empty($_POST['a_checkbox1b'])) {
		updateperms("config/config.ini","AdminLevel2","View_Rcon","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Rcon","0");
	}
	if (!empty($_POST['a_checkbox2b'])) {
		updateperms("config/config.ini","AdminLevel2","Connected_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Connected_Users","0");
	}
	if (!empty($_POST['a_checkbox3b'])) {
		updateperms("config/config.ini","AdminLevel2","Send_Messages","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Send_Messages","0");
	}
	if (!empty($_POST['a_checkbox4b'])) {
		updateperms("config/config.ini","AdminLevel2","Kick_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Kick_Users","0");
	}
	if (!empty($_POST['a_checkbox5b'])) {
		updateperms("config/config.ini","AdminLevel2","Ban_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Ban_Users","0");
	}
	if (!empty($_POST['a_checkbox1c'])) {
		updateperms("config/config.ini","AdminLevel2","Submit_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Submit_Cases","0");
	}
	if (!empty($_POST['a_checkbox2c'])) {
		updateperms("config/config.ini","AdminLevel2","View_AllCases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_AllCases","0");
	}
	if (!empty($_POST['a_checkbox3c'])) {
		updateperms("config/config.ini","AdminLevel2","Delete_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Delete_Cases","0");
	}
	if (!empty($_POST['a_checkbox4c'])) {
		updateperms("config/config.ini","AdminLevel2","Reset_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Reset_Cases","0");
	}
	if (!empty($_POST['a_checkbox1d'])) {
		updateperms("config/config.ini","AdminLevel2","Modify_AdminLevel","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Modify_AdminLevel","0");
	}
	if (!empty($_POST['a_checkbox2d'])) {
		updateperms("config/config.ini","AdminLevel2","Reset_AllPlayers","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Reset_AllPlayers","0");
	}
	if (!empty($_POST['a_checkbox3d'])) {
		updateperms("config/config.ini","AdminLevel2","Reset_AllVehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Reset_AllVehicles","0");
	}
	if (!empty($_POST['a_checkbox4d'])) {
		updateperms("config/config.ini","AdminLevel2","Reset_AllGangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Reset_AllGangs","0");
	}
	if (!empty($_POST['a_checkbox5d'])) {
		updateperms("config/config.ini","AdminLevel2","Modify_Permissions","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Modify_Permissions","0");
	}	
	if (!empty($_POST['a_checkbox6d'])) {
		updateperms("config/config.ini","AdminLevel2","Backup_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Backup_Database","0");
	}
	if (!empty($_POST['a_checkbox6dx'])) {
		updateperms("config/config.ini","AdminLevel2","View_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","View_Database","0");
	}
	if (!empty($_POST['a_checkbox6dxx'])) {
		updateperms("config/config.ini","AdminLevel2","Create_Entry","1");
	} else { 
		updateperms("config/config.ini","AdminLevel2","Create_Entry","0");
	}
	//Admin level 3
	if (!empty($_POST['b_checkbox1'])) {
		updateperms("config/config.ini","AdminLevel3","View_Players","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Players","0");
	}
	if (!empty($_POST['b_checkbox2'])) {
		updateperms("config/config.ini","AdminLevel3","Whitelist","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Whitelist","0");
	}
	if (!empty($_POST['b_checkbox3'])) {
		updateperms("config/config.ini","AdminLevel3","Compensate","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Compensate","0");
	}
	if (!empty($_POST['b_checkbox4'])) {
		updateperms("config/config.ini","AdminLevel3","Reset_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Reset_User","0");
	}
	if (!empty($_POST['b_checkbox5'])) {
		updateperms("config/config.ini","AdminLevel3","Delete_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Delete_User","0");
	}
	if (!empty($_POST['b_checkbox6'])) {
		updateperms("config/config.ini","AdminLevel3","View_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Notes","0");
	}
	if (!empty($_POST['b_checkbox7'])) {
		updateperms("config/config.ini","AdminLevel3","Submit_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Submit_Notes","0");
	}
	if (!empty($_POST['b_checkbox8'])) {
		updateperms("config/config.ini","AdminLevel3","Remove_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Remove_Notes","0");
	}
	if (!empty($_POST['b_checkbox9'])) {
		updateperms("config/config.ini","AdminLevel3","View_AntiCheat","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_AntiCheat","0");
	}
	if (!empty($_POST['b_checkbox10'])) {
		updateperms("config/config.ini","AdminLevel3","Remove_Flagged","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Remove_Flagged","0");
	}
	if (!empty($_POST['b_checkbox11'])) {
		updateperms("config/config.ini","AdminLevel3","Comp_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Comp_Ban","0");
	}
	if (!empty($_POST['b_checkbox12'])) {
		updateperms("config/config.ini","AdminLevel3","Police_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Police_Ban","0");
	}
	if (!empty($_POST['b_checkbox13'])) {
		updateperms("config/config.ini","AdminLevel3","Medic_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Medic_Ban","0");
	}
	if (!empty($_POST['b_checkbox14'])) {
		updateperms("config/config.ini","AdminLevel3","View_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Points","0");
	}
	if (!empty($_POST['b_checkbox15'])) {
		updateperms("config/config.ini","AdminLevel3","Issue_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Issue_Points","0");
	}
	if (!empty($_POST['b_checkbox16'])) {
		updateperms("config/config.ini","AdminLevel3","Remove_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Remove_Points","0");
	}
	if (!empty($_POST['b_checkbox17'])) {
		updateperms("config/config.ini","AdminLevel3","Modify_Cash","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Modify_Cash","0");
	}
	if (!empty($_POST['b_checkbox1g'])) {
		updateperms("config/config.ini","AdminLevel3","View_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Gangs","0");
	}
	if (!empty($_POST['b_checkbox2g'])) {
		updateperms("config/config.ini","AdminLevel3","Edit_Gang_Name","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Edit_Gang_Name","0");
	}
	if (!empty($_POST['b_checkbox3g'])) {
		updateperms("config/config.ini","AdminLevel3","Edit_Gang_Max","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Edit_Gang_Max","0");
	}
	if (!empty($_POST['b_checkbox4g'])) {
		updateperms("config/config.ini","AdminLevel3","Edit_Gang_Members","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Edit_Gang_Members","0");
	}
	if (!empty($_POST['b_checkbox5g'])) {
		updateperms("config/config.ini","AdminLevel3","Delete_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Delete_Gangs","0");
	}
	if (!empty($_POST['b_checkbox1a'])) {
		updateperms("config/config.ini","AdminLevel3","View_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Vehicles","0");
	}
	if (!empty($_POST['b_checkbox2a'])) {
		updateperms("config/config.ini","AdminLevel3","Revive_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Revive_Vehicles","0");
	}
	if (!empty($_POST['b_checkbox3a'])) {
		updateperms("config/config.ini","AdminLevel3","Destroy_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Destroy_Vehicles","0");
	}
	if (!empty($_POST['b_checkbox4a'])) {
		updateperms("config/config.ini","AdminLevel3","Edit_NumberPlates","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Edit_NumberPlates","0");
	}
	if (!empty($_POST['b_checkbox4aa'])) {
		updateperms("config/config.ini","AdminLevel3","Vehicle_Inventory","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Vehicle_Inventory","0");
	}
	if (!empty($_POST['b_checkbox5a'])) {
		updateperms("config/config.ini","AdminLevel3","Delete_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Delete_Vehicles","0");
	}
	if (!empty($_POST['b_checkbox1b'])) {
		updateperms("config/config.ini","AdminLevel3","View_Rcon","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Rcon","0");
	}
	if (!empty($_POST['b_checkbox2b'])) {
		updateperms("config/config.ini","AdminLevel3","Connected_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Connected_Users","0");
	}
	if (!empty($_POST['b_checkbox3b'])) {
		updateperms("config/config.ini","AdminLevel3","Send_Messages","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Send_Messages","0");
	}
	if (!empty($_POST['b_checkbox4b'])) {
		updateperms("config/config.ini","AdminLevel3","Kick_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Kick_Users","0");
	}
	if (!empty($_POST['b_checkbox5b'])) {
		updateperms("config/config.ini","AdminLevel3","Ban_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Ban_Users","0");
	}
	if (!empty($_POST['b_checkbox1c'])) {
		updateperms("config/config.ini","AdminLevel3","Submit_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Submit_Cases","0");
	}
	if (!empty($_POST['b_checkbox2c'])) {
		updateperms("config/config.ini","AdminLevel3","View_AllCases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_AllCases","0");
	}
	if (!empty($_POST['b_checkbox3c'])) {
		updateperms("config/config.ini","AdminLevel3","Delete_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Delete_Cases","0");
	}
	if (!empty($_POST['b_checkbox4c'])) {
		updateperms("config/config.ini","AdminLevel3","Reset_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Reset_Cases","0");
	}
	if (!empty($_POST['b_checkbox1d'])) {
		updateperms("config/config.ini","AdminLevel3","Modify_AdminLevel","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Modify_AdminLevel","0");
	}
	if (!empty($_POST['b_checkbox2d'])) {
		updateperms("config/config.ini","AdminLevel3","Reset_AllPlayers","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Reset_AllPlayers","0");
	}
	if (!empty($_POST['b_checkbox3d'])) {
		updateperms("config/config.ini","AdminLevel3","Reset_AllVehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Reset_AllVehicles","0");
	}
	if (!empty($_POST['b_checkbox4d'])) {
		updateperms("config/config.ini","AdminLevel3","Reset_AllGangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Reset_AllGangs","0");
	}
	if (!empty($_POST['b_checkbox5d'])) {
		updateperms("config/config.ini","AdminLevel3","Modify_Permissions","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Modify_Permissions","0");
	}
	if (!empty($_POST['b_checkbox6d'])) {
		updateperms("config/config.ini","AdminLevel3","Backup_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Backup_Database","0");
	}
	if (!empty($_POST['b_checkbox6dx'])) {
		updateperms("config/config.ini","AdminLevel3","View_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","View_Database","0");
	}
	if (!empty($_POST['b_checkbox6dxx'])) {
		updateperms("config/config.ini","AdminLevel3","Create_Entry","1");
	} else { 
		updateperms("config/config.ini","AdminLevel3","Create_Entry","0");
	}
	//Admin level 4
	if (!empty($_POST['c_checkbox1'])) {
		updateperms("config/config.ini","AdminLevel4","View_Players","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Players","0");
	}
	if (!empty($_POST['c_checkbox2'])) {
		updateperms("config/config.ini","AdminLevel4","Whitelist","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Whitelist","0");
	}
	if (!empty($_POST['c_checkbox3'])) {
		updateperms("config/config.ini","AdminLevel4","Compensate","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Compensate","0");
	}
	if (!empty($_POST['c_checkbox4'])) {
		updateperms("config/config.ini","AdminLevel4","Reset_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Reset_User","0");
	}
	if (!empty($_POST['c_checkbox5'])) {
		updateperms("config/config.ini","AdminLevel4","Delete_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Delete_User","0");
	}
	if (!empty($_POST['c_checkbox6'])) {
		updateperms("config/config.ini","AdminLevel4","View_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Notes","0");
	}
	if (!empty($_POST['c_checkbox7'])) {
		updateperms("config/config.ini","AdminLevel4","Submit_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Submit_Notes","0");
	}
	if (!empty($_POST['c_checkbox8'])) {
		updateperms("config/config.ini","AdminLevel4","Remove_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Remove_Notes","0");
	}
	if (!empty($_POST['c_checkbox9'])) {
		updateperms("config/config.ini","AdminLevel4","View_AntiCheat","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_AntiCheat","0");
	}
	if (!empty($_POST['c_checkbox10'])) {
		updateperms("config/config.ini","AdminLevel4","Remove_Flagged","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Remove_Flagged","0");
	}
	if (!empty($_POST['c_checkbox11'])) {
		updateperms("config/config.ini","AdminLevel4","Comp_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Comp_Ban","0");
	}
	if (!empty($_POST['c_checkbox12'])) {
		updateperms("config/config.ini","AdminLevel4","Police_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Police_Ban","0");
	}
	if (!empty($_POST['c_checkbox13'])) {
		updateperms("config/config.ini","AdminLevel4","Medic_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Medic_Ban","0");
	}
	if (!empty($_POST['c_checkbox14'])) {
		updateperms("config/config.ini","AdminLevel4","View_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Points","0");
	}
	if (!empty($_POST['c_checkbox15'])) {
		updateperms("config/config.ini","AdminLevel4","Issue_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Issue_Points","0");
	}
	if (!empty($_POST['c_checkbox16'])) {
		updateperms("config/config.ini","AdminLevel4","Remove_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Remove_Points","0");
	}
	if (!empty($_POST['c_checkbox17'])) {
		updateperms("config/config.ini","AdminLevel4","Modify_Cash","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Modify_Cash","0");
	}
	if (!empty($_POST['c_checkbox1g'])) {
		updateperms("config/config.ini","AdminLevel4","View_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Gangs","0");
	}
	if (!empty($_POST['c_checkbox2g'])) {
		updateperms("config/config.ini","AdminLevel4","Edit_Gang_Name","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Edit_Gang_Name","0");
	}
	if (!empty($_POST['c_checkbox3g'])) {
		updateperms("config/config.ini","AdminLevel4","Edit_Gang_Max","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Edit_Gang_Max","0");
	}
	if (!empty($_POST['c_checkbox4g'])) {
		updateperms("config/config.ini","AdminLevel4","Edit_Gang_Members","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Edit_Gang_Members","0");
	}
	if (!empty($_POST['c_checkbox5g'])) {
		updateperms("config/config.ini","AdminLevel4","Delete_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Delete_Gangs","0");
	}
	if (!empty($_POST['c_checkbox1a'])) {
		updateperms("config/config.ini","AdminLevel4","View_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Vehicles","0");
	}
	if (!empty($_POST['c_checkbox2a'])) {
		updateperms("config/config.ini","AdminLevel4","Revive_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Revive_Vehicles","0");
	}
	if (!empty($_POST['c_checkbox3a'])) {
		updateperms("config/config.ini","AdminLevel4","Destroy_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Destroy_Vehicles","0");
	}
	if (!empty($_POST['c_checkbox4a'])) {
		updateperms("config/config.ini","AdminLevel4","Edit_NumberPlates","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Edit_NumberPlates","0");
	}
	if (!empty($_POST['c_checkbox4aa'])) {
		updateperms("config/config.ini","AdminLevel4","Vehicle_Inventory","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Vehicle_Inventory","0");
	}
	if (!empty($_POST['c_checkbox5a'])) {
		updateperms("config/config.ini","AdminLevel4","Delete_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Delete_Vehicles","0");
	}
	if (!empty($_POST['c_checkbox1b'])) {
		updateperms("config/config.ini","AdminLevel4","View_Rcon","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Rcon","0");
	}
	if (!empty($_POST['c_checkbox2b'])) {
		updateperms("config/config.ini","AdminLevel4","Connected_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Connected_Users","0");
	}
	if (!empty($_POST['c_checkbox3b'])) {
		updateperms("config/config.ini","AdminLevel4","Send_Messages","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Send_Messages","0");
	}
	if (!empty($_POST['c_checkbox4b'])) {
		updateperms("config/config.ini","AdminLevel4","Kick_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Kick_Users","0");
	}
	if (!empty($_POST['c_checkbox5b'])) {
		updateperms("config/config.ini","AdminLevel4","Ban_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Ban_Users","0");
	}
	if (!empty($_POST['c_checkbox1c'])) {
		updateperms("config/config.ini","AdminLevel4","Submit_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Submit_Cases","0");
	}
	if (!empty($_POST['c_checkbox2c'])) {
		updateperms("config/config.ini","AdminLevel4","View_AllCases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_AllCases","0");
	}
	if (!empty($_POST['c_checkbox3c'])) {
		updateperms("config/config.ini","AdminLevel4","Delete_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Delete_Cases","0");
	}
	if (!empty($_POST['c_checkbox4c'])) {
		updateperms("config/config.ini","AdminLevel4","Reset_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Reset_Cases","0");
	}
	if (!empty($_POST['c_checkbox1d'])) {
		updateperms("config/config.ini","AdminLevel4","Modify_AdminLevel","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Modify_AdminLevel","0");
	}
	if (!empty($_POST['c_checkbox2d'])) {
		updateperms("config/config.ini","AdminLevel4","Reset_AllPlayers","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Reset_AllPlayers","0");
	}
	if (!empty($_POST['c_checkbox3d'])) {
		updateperms("config/config.ini","AdminLevel4","Reset_AllVehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Reset_AllVehicles","0");
	}
	if (!empty($_POST['c_checkbox4d'])) {
		updateperms("config/config.ini","AdminLevel4","Reset_AllGangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Reset_AllGangs","0");
	}
	if (!empty($_POST['c_checkbox5d'])) {
		updateperms("config/config.ini","AdminLevel4","Modify_Permissions","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Modify_Permissions","0");
	}
	if (!empty($_POST['c_checkbox6d'])) {
		updateperms("config/config.ini","AdminLevel4","Backup_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Backup_Database","0");
	}
	if (!empty($_POST['c_checkbox6dx'])) {
		updateperms("config/config.ini","AdminLevel4","View_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","View_Database","0");
	}
	if (!empty($_POST['c_checkbox6dxx'])) {
		updateperms("config/config.ini","AdminLevel4","Create_Entry","1");
	} else { 
		updateperms("config/config.ini","AdminLevel4","Create_Entry","0");
	}
	//Admin level 5
	if (!empty($_POST['d_checkbox1'])) {
		updateperms("config/config.ini","AdminLevel5","View_Players","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Players","0");
	}
	if (!empty($_POST['d_checkbox2'])) {
		updateperms("config/config.ini","AdminLevel5","Whitelist","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Whitelist","0");
	}
	if (!empty($_POST['d_checkbox3'])) {
		updateperms("config/config.ini","AdminLevel5","Compensate","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Compensate","0");
	}
	if (!empty($_POST['d_checkbox4'])) {
		updateperms("config/config.ini","AdminLevel5","Reset_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Reset_User","0");
	}
	if (!empty($_POST['d_checkbox5'])) {
		updateperms("config/config.ini","AdminLevel5","Delete_User","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Delete_User","0");
	}
	if (!empty($_POST['d_checkbox6'])) {
		updateperms("config/config.ini","AdminLevel5","View_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Notes","0");
	}
	if (!empty($_POST['d_checkbox7'])) {
		updateperms("config/config.ini","AdminLevel5","Submit_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Submit_Notes","0");
	}
	if (!empty($_POST['d_checkbox8'])) {
		updateperms("config/config.ini","AdminLevel5","Remove_Notes","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Remove_Notes","0");
	}
	if (!empty($_POST['d_checkbox9'])) {
		updateperms("config/config.ini","AdminLevel5","View_AntiCheat","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_AntiCheat","0");
	}
	if (!empty($_POST['d_checkbox10'])) {
		updateperms("config/config.ini","AdminLevel5","Remove_Flagged","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Remove_Flagged","0");
	}
	if (!empty($_POST['d_checkbox11'])) {
		updateperms("config/config.ini","AdminLevel5","Comp_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Comp_Ban","0");
	}
	if (!empty($_POST['d_checkbox12'])) {
		updateperms("config/config.ini","AdminLevel5","Police_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Police_Ban","0");
	}
	if (!empty($_POST['d_checkbox13'])) {
		updateperms("config/config.ini","AdminLevel5","Medic_Ban","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Medic_Ban","0");
	}
	if (!empty($_POST['d_checkbox14'])) {
		updateperms("config/config.ini","AdminLevel5","View_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Points","0");
	}
	if (!empty($_POST['d_checkbox15'])) {
		updateperms("config/config.ini","AdminLevel5","Issue_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Issue_Points","0");
	}
	if (!empty($_POST['d_checkbox16'])) {
		updateperms("config/config.ini","AdminLevel5","Remove_Points","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Remove_Points","0");
	}
	if (!empty($_POST['d_checkbox17'])) {
		updateperms("config/config.ini","AdminLevel5","Modify_Cash","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Modify_Cash","0");
	}
	if (!empty($_POST['d_checkbox1g'])) {
		updateperms("config/config.ini","AdminLevel5","View_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Gangs","0");
	}
	if (!empty($_POST['d_checkbox2g'])) {
		updateperms("config/config.ini","AdminLevel5","Edit_Gang_Name","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Edit_Gang_Name","0");
	}
	if (!empty($_POST['d_checkbox3g'])) {
		updateperms("config/config.ini","AdminLevel5","Edit_Gang_Max","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Edit_Gang_Max","0");
	}
	if (!empty($_POST['d_checkbox4g'])) {
		updateperms("config/config.ini","AdminLevel5","Edit_Gang_Members","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Edit_Gang_Members","0");
	}
	if (!empty($_POST['d_checkbox5g'])) {
		updateperms("config/config.ini","AdminLevel5","Delete_Gangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Delete_Gangs","0");
	}
	if (!empty($_POST['d_checkbox1a'])) {
		updateperms("config/config.ini","AdminLevel5","View_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Vehicles","0");
	}
	if (!empty($_POST['d_checkbox2a'])) {
		updateperms("config/config.ini","AdminLevel5","Revive_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Revive_Vehicles","0");
	}
	if (!empty($_POST['d_checkbox3a'])) {
		updateperms("config/config.ini","AdminLevel5","Destroy_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Destroy_Vehicles","0");
	}
	if (!empty($_POST['d_checkbox4a'])) {
		updateperms("config/config.ini","AdminLevel5","Edit_NumberPlates","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Edit_NumberPlates","0");
	}
	if (!empty($_POST['d_checkbox4aa'])) {
		updateperms("config/config.ini","AdminLevel5","Vehicle_Inventory","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Vehicle_Inventory","0");
	}
	if (!empty($_POST['d_checkbox5a'])) {
		updateperms("config/config.ini","AdminLevel5","Delete_Vehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Delete_Vehicles","0");
	}
	if (!empty($_POST['d_checkbox1b'])) {
		updateperms("config/config.ini","AdminLevel5","View_Rcon","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Rcon","0");
	}
	if (!empty($_POST['d_checkbox2b'])) {
		updateperms("config/config.ini","AdminLevel5","Connected_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Connected_Users","0");
	}
	if (!empty($_POST['d_checkbox3b'])) {
		updateperms("config/config.ini","AdminLevel5","Send_Messages","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Send_Messages","0");
	}
	if (!empty($_POST['d_checkbox4b'])) {
		updateperms("config/config.ini","AdminLevel5","Kick_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Kick_Users","0");
	}
	if (!empty($_POST['d_checkbox5b'])) {
		updateperms("config/config.ini","AdminLevel5","Ban_Users","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Ban_Users","0");
	}
	if (!empty($_POST['d_checkbox1c'])) {
		updateperms("config/config.ini","AdminLevel5","Submit_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Submit_Cases","0");
	}
	if (!empty($_POST['d_checkbox2c'])) {
		updateperms("config/config.ini","AdminLevel5","View_AllCases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_AllCases","0");
	}
	if (!empty($_POST['d_checkbox3c'])) {
		updateperms("config/config.ini","AdminLevel5","Delete_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Delete_Cases","0");
	}
	if (!empty($_POST['d_checkbox4c'])) {
		updateperms("config/config.ini","AdminLevel5","Reset_Cases","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Reset_Cases","0");
	}
	if (!empty($_POST['d_checkbox1d'])) {
		updateperms("config/config.ini","AdminLevel5","Modify_AdminLevel","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Modify_AdminLevel","0");
	}
	if (!empty($_POST['d_checkbox2d'])) {
		updateperms("config/config.ini","AdminLevel5","Reset_AllPlayers","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Reset_AllPlayers","0");
	}
	if (!empty($_POST['d_checkbox3d'])) {
		updateperms("config/config.ini","AdminLevel5","Reset_AllVehicles","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Reset_AllVehicles","0");
	}
	if (!empty($_POST['d_checkbox4d'])) {
		updateperms("config/config.ini","AdminLevel5","Reset_AllGangs","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Reset_AllGangs","0");
	}
	if (!empty($_POST['d_checkbox5d'])) {
		updateperms("config/config.ini","AdminLevel5","Modify_Permissions","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Modify_Permissions","0");
	}
	if (!empty($_POST['d_checkbox6d'])) {
		updateperms("config/config.ini","AdminLevel5","Backup_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Backup_Database","0");
	}
	if (!empty($_POST['d_checkbox6dx'])) {
		updateperms("config/config.ini","AdminLevel5","View_Database","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","View_Database","0");
	}
	if (!empty($_POST['d_checkbox6dxx'])) {
		updateperms("config/config.ini","AdminLevel5","Create_Entry","1");
	} else { 
		updateperms("config/config.ini","AdminLevel5","Create_Entry","0");
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
	
	<title><?=$jVar_Panel_Name ?></title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="brand clearfix">
		<a href="index.php" class="logo"><img src="img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li><a href="#">Settings</a></li>
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Edit Account</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<?php
			include "./config/navigation.php";
		?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Settings</h2>
						
						<div class="row">
							<div class="col-md-12">
								<form action="./settings.php" method="post" class="form_delete">
									<h2 class="page-title">Group Permissions <input type="submit" style="font-size:18px;float:right;position:relative;right:20px;top:-10px;" class="btn btn-large btn-primary" name="submit" value="Save Settings"/></h2>							
									<div class="panel panel-default">
										<div class="panel-heading"><?=$jVar_ANAME1 ?></div>
										<div class="panel-body">
											<div class="checkbox checkbox-primary" style="font-size:18px;">
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Player Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Players == 1) {
														echo "<input name='checkbox1' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox1' type='checkbox'>";
													}
													?>
													<label for="checkbox1">
														View Player Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Whitelist == 1) {
														echo "<input name='checkbox2' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox2' type='checkbox'>";
													}
													?>
													<label for="checkbox2">
														Whitelist
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Compensate == 1) {
														echo "<input name='checkbox3' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox3' type='checkbox'>";
													}
													?>
													<label for="checkbox3">
														Compensate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_User == 1) {
														echo "<input name='checkbox4' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4' type='checkbox'>";
													}
													?>
													<label for="checkbox4">
														Reset User
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_User == 1) {
														echo "<input name='checkbox5' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox5' type='checkbox'>";
													}
													?>
													<label for="checkbox5">
														Delete User
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1"></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Notes == 1) {
														echo "<input name='checkbox6' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox6' type='checkbox'>";
													}
													?>
													<label for="checkbox6">
														View Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Notes == 1) {
														echo "<input name='checkbox7' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox7' type='checkbox'>";
													}
													?>
													<label for="checkbox7">
														Submit Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Notes == 1) {
														echo "<input name='checkbox8' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox8' type='checkbox'>";
													}
													?>
													<label for="checkbox8">
														Remove Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AntiCheat == 1) {
														echo "<input name='checkbox9' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox9' type='checkbox'>";
													}
													?>
													<label for="checkbox9">
														View Anti Cheat
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Flagged == 1) {
														echo "<input name='checkbox10' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox10' type='checkbox'>";
													}
													?>
													<label for="checkbox10">
														Remove Flagged Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Comp_Ban == 1) {
														echo "<input name='checkbox11' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox11' type='checkbox'>";
													}
													?>
													<label for="checkbox11">
														Compensation Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Police_Ban == 1) {
														echo "<input name='checkbox12' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox12' type='checkbox'>";
													}
													?>
													<label for="checkbox12">
														Police Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Medic_Ban == 1) {
														echo "<input name='checkbox13' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox13' type='checkbox'>";
													}
													?>
													<label for="checkbox13">
														Medic Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Points == 1) {
														echo "<input name='checkbox14' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox14' type='checkbox'>";
													}
													?>
													<label for="checkbox14">
														View Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Issue_Points == 1) {
														echo "<input name='checkbox15' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox15' type='checkbox'>";
													}
													?>
													<label for="checkbox16">
														Issue Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Points == 1) {
														echo "<input name='checkbox16' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox16' type='checkbox'>";
													}
													?>
													<label for="checkbox16">
														Remove Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Cash == 1) {
														echo "<input name='checkbox17' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox17' type='checkbox'>";
													}
													?>
													<label for="checkbox17">
														Manage Cash/Bank
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Gang Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Gangs == 1) {
														echo "<input name='checkbox1g' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox1g' type='checkbox'>";
													}
													?>
													<label for="checkbox1g">
														View Gang Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Name == 1) {
														echo "<input name='checkbox2g' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox2g' type='checkbox'>";
													}
													?>
													<label for="checkbox2g">
														Edit Name
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Max == 1) {
														echo "<input name='checkbox3g' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox3g' type='checkbox'>";
													}
													?>
													<label for="checkbox3g">
														Edit Maximum Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Members == 1) {
														echo "<input name='checkbox4g' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4g' type='checkbox'>";
													}
													?>
													<label for="checkbox4g">
														Add/Remove Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Gangs == 1) {
														echo "<input name='checkbox5g' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox5g' type='checkbox'>";
													}
													?>
													<label for="checkbox5">
														Delete Gangs
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Vehicle Options </h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Vehicles == 1) {
														echo "<input name='checkbox1a' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox1a' type='checkbox'>";
													}
													?>
													<label for="checkbox1a">
														View Vehicle Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Revive_Vehicles == 1) {
														echo "<input name='checkbox2a' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox2a' type='checkbox'>";
													}
													?>
													<label for="checkbox2a">
														Revive Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Destroy_Vehicles == 1) {
														echo "<input name='checkbox3a' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox3a' type='checkbox'>";
													}
													?>
													<label for="checkbox3a">
														Destroy Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_NumberPlates == 1) {
														echo "<input name='checkbox4a' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4a' type='checkbox'>";
													}
													?>
													<label for="checkbox4a">
														Edit Number Plate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Inventory == 1) {
														echo "<input name='checkbox4aa' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4aa' type='checkbox'>";
													}
													?>
													<label for="checkbox4aa">
														Edit Vehicle Inventory
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Vehicles == 1) {
														echo "<input name='checkbox5a' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox5a' type='checkbox'>";
													}
													?>
													<label for="checkbox5a">
														Delete Vehicle
													</label>
												</div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Rcon Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Rcon == 1) {
														echo "<input name='checkbox1b' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox1b' type='checkbox'>";
													}
													?>
													<label for="checkbox1b">
														View Rcon
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Connected_Users == 1) {
														echo "<input name='checkbox2b' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox2b' type='checkbox'>";
													}
													?>
													<label for="checkbox2b">
														View Connected Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Send_Messages == 1) {
														echo "<input name='checkbox3b' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox3b' type='checkbox'>";
													}
													?>
													<label for="checkbox3b">
														Send Messages
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Kick_Users == 1) {
														echo "<input name='checkbox4b' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4b' type='checkbox'>";
													}
													?>
													<label for="checkbox4b">
														Kick Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Ban_Users == 1) {
														echo "<input name='checkbox5b' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox5b' type='checkbox'>";
													}
													?>
													<label for="checkbox5b">
														Ban Users
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Support Cases</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Cases == 1) {
														echo "<input name='checkbox1c' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox1c' type='checkbox'>";
													}
													?>
													<label for="checkbox1c">
														Submit Support Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AllCases == 1) {
														echo "<input name='checkbox2c' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox2c' type='checkbox'>";
													}
													?>
													<label for="checkbox2c">
														View All Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Cases == 1) {
														echo "<input name='checkbox3c' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox3c' type='checkbox'>";
													}
													?>
													<label for="checkbox3c">
														Delete Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_Cases == 1) {
														echo "<input name='checkbox4c' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4c' type='checkbox'>";
													}
													?>
													<label for="checkbox4c">
														Reset Cases
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Master Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_AdminLevel == 1) {
														echo "<input name='checkbox1d' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox1d' type='checkbox'>";
													}
													?>
													<label for="checkbox1d">
														Modify Admin Level
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllPlayers == 1) {
														echo "<input name='checkbox2d' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox2d' type='checkbox'>";
													}
													?>
													<label for="checkbox2d">
														Reset All Players
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllVehicles == 1) {
														echo "<input name='checkbox3d' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox3d' type='checkbox'>";
													}
													?>
													<label for="checkbox3d">
														Reset All Vehicles
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllGangs == 1) {
														echo "<input name='checkbox4d' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox4d' type='checkbox'>";
													}
													?>
													<label for="checkbox4d">
														Reset All Gangs
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Permissions == 1) {
														echo "<input name='checkbox5d' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox5d' type='checkbox'>";
													}
													?>
													<label for="checkbox5d">
														Modify Permissions
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Database</h3></div>
												
												<div class="col-md-2">
													<?php
													if($jVar_Backup_Database == 1) {
														echo "<input name='checkbox6d' type='checkbox' checked>";
													} else {
														echo "<input name='checkbox6d' type='checkbox'>";
													}
													?>
													<label for="checkbox6d">
														Access Database
													</label>
												</div>
											</div>
										</div>
										
										<div class="panel-heading"><?=$jVar_ANAME2 ?></div>
										<div class="panel-body">
											<div class="checkbox checkbox-primary" style="font-size:18px;">
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Player Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Players2 == 1) {
														echo "<input name='a_checkbox1' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox1' type='checkbox'>";
													}
													?>
													<label for="a_checkbox1">
														View Player Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Whitelist2 == 1) {
														echo "<input name='a_checkbox2' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox2' type='checkbox'>";
													}
													?>
													<label for="a_checkbox2">
														Whitelist
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Compensate2 == 1) {
														echo "<input name='a_checkbox3' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox3' type='checkbox'>";
													}
													?>
													<label for="a_checkbox3">
														Compensate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_User2 == 1) {
														echo "<input name='a_checkbox4' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4">
														Reset User
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_User2 == 1) {
														echo "<input name='a_checkbox5' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox5' type='checkbox'>";
													}
													?>
													<label for="a_checkbox5">
														Delete User
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1"></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Notes2 == 1) {
														echo "<input name='a_checkbox6' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox6' type='checkbox'>";
													}
													?>
													<label for="a_checkbox6">
														View Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Notes2 == 1) {
														echo "<input name='a_checkbox7' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox7' type='checkbox'>";
													}
													?>
													<label for="a_checkbox7">
														Submit Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Notes2 == 1) {
														echo "<input name='a_checkbox8' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox8' type='checkbox'>";
													}
													?>
													<label for="a_checkbox8">
														Remove Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AntiCheat2 == 1) {
														echo "<input name='a_checkbox9' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox9' type='checkbox'>";
													}
													?>
													<label for="a_checkbox9">
														View Anti Cheat
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Flagged2 == 1) {
														echo "<input name='a_checkbox10' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox10' type='checkbox'>";
													}
													?>
													<label for="a_checkbox10">
														Remove Flagged Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Comp_Ban2 == 1) {
														echo "<input name='a_checkbox11' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox11' type='checkbox'>";
													}
													?>
													<label for="a_checkbox11">
														Compensation Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Police_Ban2 == 1) {
														echo "<input name='a_checkbox12' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox12' type='checkbox'>";
													}
													?>
													<label for="a_checkbox12">
														Police Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Medic_Ban2 == 1) {
														echo "<input name='a_checkbox13' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox13' type='checkbox'>";
													}
													?>
													<label for="a_checkbox13">
														Medic Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Points2 == 1) {
														echo "<input name='a_checkbox14' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox14' type='checkbox'>";
													}
													?>
													<label for="a_checkbox14">
														View Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Issue_Points2 == 1) {
														echo "<input name='a_checkbox15' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox15' type='checkbox'>";
													}
													?>
													<label for="a_checkbox15">
														Issue Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Points2 == 1) {
														echo "<input name='a_checkbox16' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox16' type='checkbox'>";
													}
													?>
													<label for="a_checkbox16">
														Remove Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Cash2 == 1) {
														echo "<input name='a_checkbox17' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox17' type='checkbox'>";
													}
													?>
													<label for="a_checkbox17">
														Manage Cash/Bank
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Gang Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Gangs2 == 1) {
														echo "<input name='a_checkbox1g' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox1g' type='checkbox'>";
													}
													?>
													<label for="a_checkbox1g">
														View Gang Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Name2 == 1) {
														echo "<input name='a_checkbox2g' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox2g' type='checkbox'>";
													}
													?>
													<label for="a_checkbox2g">
														Edit Name
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Max2 == 1) {
														echo "<input name='a_checkbox3g' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox3g' type='checkbox'>";
													}
													?>
													<label for="a_checkbox3g">
														Edit Maximum Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Members2 == 1) {
														echo "<input name='a_checkbox4g' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4g' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4g">
														Add/Remove Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Gangs2 == 1) {
														echo "<input name='a_checkbox5g' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox5g' type='checkbox'>";
													}
													?>
													<label for="a_checkbox5">
														Delete Gangs
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Vehicle Options </h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Vehicles2 == 1) {
														echo "<input name='a_checkbox1a' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox1a' type='checkbox'>";
													}
													?>
													<label for="a_checkbox1a">
														View Vehicle Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Revive_Vehicles2 == 1) {
														echo "<input name='a_checkbox2a' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox2a' type='checkbox'>";
													}
													?>
													<label for="a_checkbox2a">
														Revive Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Destroy_Vehicles2 == 1) {
														echo "<input name='a_checkbox3a' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox3a' type='checkbox'>";
													}
													?>
													<label for="a_checkbox3a">
														Destroy Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_NumberPlates2 == 1) {
														echo "<input name='a_checkbox4a' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4a' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4a">
														Edit Number Plate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Inventory2 == 1) {
														echo "<input name='a_checkbox4aa' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4aa' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4aa">
														Edit Vehicle Inventory
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Vehicles2 == 1) {
														echo "<input name='a_checkbox5a' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox5a' type='checkbox'>";
													}
													?>
													<label for="a_checkbox5a">
														Delete Vehicle
													</label>
												</div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Rcon Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Rcon2 == 1) {
														echo "<input name='a_checkbox1b' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox1b' type='checkbox'>";
													}
													?>
													<label for="a_checkbox1b">
														View Rcon
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Connected_Users2 == 1) {
														echo "<input name='a_checkbox2b' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox2b' type='checkbox'>";
													}
													?>
													<label for="a_checkbox2b">
														View Connected Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Send_Messages2 == 1) {
														echo "<input name='a_checkbox3b' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox3b' type='checkbox'>";
													}
													?>
													<label for="a_checkbox3b">
														Send Messages
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Kick_Users2 == 1) {
														echo "<input name='a_checkbox4b' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4b' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4b">
														Kick Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Ban_Users2 == 1) {
														echo "<input name='a_checkbox5b' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox5b' type='checkbox'>";
													}
													?>
													<label for="a_checkbox5b">
														Ban Users
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Support Cases</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Cases2 == 1) {
														echo "<input name='a_checkbox1c' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox1c' type='checkbox'>";
													}
													?>
													<label for="a_checkbox1c">
														Submit Support Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AllCases2 == 1) {
														echo "<input name='a_checkbox2c' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox2c' type='checkbox'>";
													}
													?>
													<label for="a_checkbox2c">
														View All Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Cases2 == 1) {
														echo "<input name='a_checkbox3c' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox3c' type='checkbox'>";
													}
													?>
													<label for="a_checkbox3c">
														Delete Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_Cases2 == 1) {
														echo "<input name='a_checkbox4c' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4c' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4c">
														Reset Cases
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Master Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_AdminLevel2 == 1) {
														echo "<input name='a_checkbox1d' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox1d' type='checkbox'>";
													}
													?>
													<label for="a_checkbox1d">
														Modify Admin Level
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllPlayers2 == 1) {
														echo "<input name='a_checkbox2d' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox2d' type='checkbox'>";
													}
													?>
													<label for="a_checkbox2d">
														Reset All Players
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllVehicles2 == 1) {
														echo "<input name='a_checkbox3d' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox3d' type='checkbox'>";
													}
													?>
													<label for="a_checkbox3d">
														Reset All Vehicles
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllGangs2 == 1) {
														echo "<input name='a_checkbox4d' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox4d' type='checkbox'>";
													}
													?>
													<label for="a_checkbox4d">
														Reset All Gangs
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Permissions2 == 1) {
														echo "<input name='a_checkbox5d' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox5d' type='checkbox'>";
													}
													?>
													<label for="a_checkbox5d">
														Modify Permissions
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Database</h3></div>
												
												<div class="col-md-2">
													<?php
													if($jVar_Backup_Database2 == 1) {
														echo "<input name='a_checkbox6d' type='checkbox' checked>";
													} else {
														echo "<input name='a_checkbox6d' type='checkbox'>";
													}
													?>
													<label for="a_checkbox6d">
														Access Database
													</label>
												</div>
											</div>
										</div>
										<div class="panel-heading"><?=$jVar_ANAME3 ?></div>
										<div class="panel-body">
											<div class="checkbox checkbox-primary" style="font-size:18px;">
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Player Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Players3 == 1) {
														echo "<input name='b_checkbox1' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox1' type='checkbox'>";
													}
													?>
													<label for="b_checkbox1">
														View Player Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Whitelist3 == 1) {
														echo "<input name='b_checkbox2' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox2' type='checkbox'>";
													}
													?>
													<label for="b_checkbox2">
														Whitelist
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Compensate3 == 1) {
														echo "<input name='b_checkbox3' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox3' type='checkbox'>";
													}
													?>
													<label for="b_checkbox3">
														Compensate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_User3 == 1) {
														echo "<input name='b_checkbox4' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4">
														Reset User
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_User3 == 1) {
														echo "<input name='b_checkbox5' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox5' type='checkbox'>";
													}
													?>
													<label for="b_checkbox5">
														Delete User
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1"></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Notes3 == 1) {
														echo "<input name='b_checkbox6' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox6' type='checkbox'>";
													}
													?>
													<label for="b_checkbox6">
														View Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Notes3 == 1) {
														echo "<input name='b_checkbox7' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox7' type='checkbox'>";
													}
													?>
													<label for="b_checkbox7">
														Submit Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Notes3 == 1) {
														echo "<input name='b_checkbox8' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox8' type='checkbox'>";
													}
													?>
													<label for="b_checkbox8">
														Remove Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AntiCheat3 == 1) {
														echo "<input name='b_checkbox9' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox9' type='checkbox'>";
													}
													?>
													<label for="b_checkbox9">
														View Anti Cheat
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Flagged3 == 1) {
														echo "<input name='b_checkbox10' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox10' type='checkbox'>";
													}
													?>
													<label for="b_checkbox10">
														Remove Flagged Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Comp_Ban3 == 1) {
														echo "<input name='b_checkbox11' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox11' type='checkbox'>";
													}
													?>
													<label for="b_checkbox11">
														Compensation Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Police_Ban3 == 1) {
														echo "<input name='b_checkbox12' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox12' type='checkbox'>";
													}
													?>
													<label for="b_checkbox12">
														Police Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Medic_Ban3 == 1) {
														echo "<input name='b_checkbox13' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox13' type='checkbox'>";
													}
													?>
													<label for="b_checkbox13">
														Medic Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Points3 == 1) {
														echo "<input name='b_checkbox14' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox14' type='checkbox'>";
													}
													?>
													<label for="b_checkbox14">
														View Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Issue_Points3 == 1) {
														echo "<input name='b_checkbox15' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox15' type='checkbox'>";
													}
													?>
													<label for="b_checkbox15">
														Issue Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Points3 == 1) {
														echo "<input name='b_checkbox16' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox16' type='checkbox'>";
													}
													?>
													<label for="b_checkbox16">
														Remove Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Cash3 == 1) {
														echo "<input name='b_checkbox17' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox17' type='checkbox'>";
													}
													?>
													<label for="b_checkbox17">
														Manage Cash/Bank
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Gang Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Gangs3 == 1) {
														echo "<input name='b_checkbox1g' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox1g' type='checkbox'>";
													}
													?>
													<label for="b_checkbox1g">
														View Gang Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Name3 == 1) {
														echo "<input name='b_checkbox2g' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox2g' type='checkbox'>";
													}
													?>
													<label for="b_checkbox2g">
														Edit Name
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Max3 == 1) {
														echo "<input name='b_checkbox3g' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox3g' type='checkbox'>";
													}
													?>
													<label for="b_checkbox3g">
														Edit Maximum Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Members3 == 1) {
														echo "<input name='b_checkbox4g' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4g' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4g">
														Add/Remove Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Gangs3 == 1) {
														echo "<input name='b_checkbox5g' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox5g' type='checkbox'>";
													}
													?>
													<label for="b_checkbox5">
														Delete Gangs
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Vehicle Options </h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Vehicles3 == 1) {
														echo "<input name='b_checkbox1a' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox1a' type='checkbox'>";
													}
													?>
													<label for="b_checkbox1a">
														View Vehicle Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Revive_Vehicles3 == 1) {
														echo "<input name='b_checkbox2a' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox2a' type='checkbox'>";
													}
													?>
													<label for="b_checkbox2a">
														Revive Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Destroy_Vehicles3 == 1) {
														echo "<input name='b_checkbox3a' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox3a' type='checkbox'>";
													}
													?>
													<label for="b_checkbox3a">
														Destroy Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_NumberPlates3 == 1) {
														echo "<input name='b_checkbox4a' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4a' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4a">
														Edit Number Plate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Inventory3 == 1) {
														echo "<input name='b_checkbox4aa' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4aa' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4aa">
														Edit Vehicle Inventory
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Vehicles3 == 1) {
														echo "<input name='b_checkbox5a' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox5a' type='checkbox'>";
													}
													?>
													<label for="b_checkbox5a">
														Delete Vehicle
													</label>
												</div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Rcon Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Rcon3 == 1) {
														echo "<input name='b_checkbox1b' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox1b' type='checkbox'>";
													}
													?>
													<label for="b_checkbox1b">
														View Rcon
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Connected_Users3 == 1) {
														echo "<input name='b_checkbox2b' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox2b' type='checkbox'>";
													}
													?>
													<label for="b_checkbox2b">
														View Connected Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Send_Messages3 == 1) {
														echo "<input name='b_checkbox3b' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox3b' type='checkbox'>";
													}
													?>
													<label for="b_checkbox3b">
														Send Messages
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Kick_Users3 == 1) {
														echo "<input name='b_checkbox4b' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4b' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4b">
														Kick Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Ban_Users3 == 1) {
														echo "<input name='b_checkbox5b' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox5b' type='checkbox'>";
													}
													?>
													<label for="b_checkbox5b">
														Ban Users
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Support Cases</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Cases3 == 1) {
														echo "<input name='b_checkbox1c' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox1c' type='checkbox'>";
													}
													?>
													<label for="b_checkbox1c">
														Submit Support Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AllCases3 == 1) {
														echo "<input name='b_checkbox2c' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox2c' type='checkbox'>";
													}
													?>
													<label for="b_checkbox2c">
														View All Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Cases3 == 1) {
														echo "<input name='b_checkbox3c' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox3c' type='checkbox'>";
													}
													?>
													<label for="b_checkbox3c">
														Delete Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_Cases3 == 1) {
														echo "<input name='b_checkbox4c' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4c' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4c">
														Reset Cases
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Master Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_AdminLevel3 == 1) {
														echo "<input name='b_checkbox1d' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox1d' type='checkbox'>";
													}
													?>
													<label for="b_checkbox1d">
														Modify Admin Level
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllPlayers3 == 1) {
														echo "<input name='b_checkbox2d' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox2d' type='checkbox'>";
													}
													?>
													<label for="b_checkbox2d">
														Reset All Players
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllVehicles3 == 1) {
														echo "<input name='b_checkbox3d' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox3d' type='checkbox'>";
													}
													?>
													<label for="b_checkbox3d">
														Reset All Vehicles
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllGangs3 == 1) {
														echo "<input name='b_checkbox4d' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox4d' type='checkbox'>";
													}
													?>
													<label for="b_checkbox4d">
														Reset All Gangs
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Permissions3 == 1) {
														echo "<input name='b_checkbox5d' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox5d' type='checkbox'>";
													}
													?>
													<label for="b_checkbox5d">
														Modify Permissions
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Database</h3></div>
												
												<div class="col-md-2">
													<?php
													if($jVar_Backup_Database3 == 1) {
														echo "<input name='b_checkbox6d' type='checkbox' checked>";
													} else {
														echo "<input name='b_checkbox6d' type='checkbox'>";
													}
													?>
													<label for="b_checkbox6d">
														Access Database
													</label>
												</div>
											</div>
										</div>	
										<div class="panel-heading"><?=$jVar_ANAME4 ?></div>
										<div class="panel-body">
											<div class="checkbox checkbox-primary" style="font-size:18px;">
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Player Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Players4 == 1) {
														echo "<input name='c_checkbox1' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox1' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1">
														View Player Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Whitelist4 == 1) {
														echo "<input name='c_checkbox2' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox2' type='checkbox'>";
													}
													?>
													<label for="c_checkbox2">
														Whitelist
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Compensate4 == 1) {
														echo "<input name='c_checkbox3' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox3' type='checkbox'>";
													}
													?>
													<label for="c_checkbox3">
														Compensate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_User4 == 1) {
														echo "<input name='c_checkbox4' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4">
														Reset User
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_User4 == 1) {
														echo "<input name='c_checkbox5' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox5' type='checkbox'>";
													}
													?>
													<label for="c_checkbox5">
														Delete User
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1"></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Notes4 == 1) {
														echo "<input name='c_checkbox6' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox6' type='checkbox'>";
													}
													?>
													<label for="c_checkbox6">
														View Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Notes4 == 1) {
														echo "<input name='c_checkbox7' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox7' type='checkbox'>";
													}
													?>
													<label for="c_checkbox7">
														Submit Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Notes4 == 1) {
														echo "<input name='c_checkbox8' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox8' type='checkbox'>";
													}
													?>
													<label for="c_checkbox8">
														Remove Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AntiCheat4 == 1) {
														echo "<input name='c_checkbox9' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox9' type='checkbox'>";
													}
													?>
													<label for="c_checkbox9">
														View Anti Cheat
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Flagged4 == 1) {
														echo "<input name='c_checkbox10' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox10' type='checkbox'>";
													}
													?>
													<label for="c_checkbox10">
														Remove Flagged Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Comp_Ban4 == 1) {
														echo "<input name='c_checkbox11' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox11' type='checkbox'>";
													}
													?>
													<label for="c_checkbox11">
														Compensation Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Police_Ban4 == 1) {
														echo "<input name='c_checkbox12' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox12' type='checkbox'>";
													}
													?>
													<label for="c_checkbox12">
														Police Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Medic_Ban4 == 1) {
														echo "<input name='c_checkbox13' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox13' type='checkbox'>";
													}
													?>
													<label for="c_checkbox13">
														Medic Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Points4 == 1) {
														echo "<input name='c_checkbox14' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox14' type='checkbox'>";
													}
													?>
													<label for="c_checkbox14">
														View Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Issue_Points4 == 1) {
														echo "<input name='c_checkbox15' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox15' type='checkbox'>";
													}
													?>
													<label for="c_checkbox16">
														Issue Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Points4 == 1) {
														echo "<input name='c_checkbox16' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox16' type='checkbox'>";
													}
													?>
													<label for="c_checkbox16">
														Remove Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Cash4 == 1) {
														echo "<input name='c_checkbox17' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox17' type='checkbox'>";
													}
													?>
													<label for="c_checkbox17">
														Manage Cash/Bank
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Gang Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Gangs4 == 1) {
														echo "<input name='c_checkbox1g' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox1g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1g">
														View Gang Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Name4 == 1) {
														echo "<input name='c_checkbox2g' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox2g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox2g">
														Edit Name
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Max4 == 1) {
														echo "<input name='c_checkbox3g' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox3g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox3g">
														Edit Maximum Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Members4 == 1) {
														echo "<input name='c_checkbox4g' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4g">
														Add/Remove Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Gangs4 == 1) {
														echo "<input name='c_checkbox5g' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox5g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox5">
														Delete Gangs
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Vehicle Options </h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Vehicles4 == 1) {
														echo "<input name='c_checkbox1a' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox1a' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1a">
														View Vehicle Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Revive_Vehicles4 == 1) {
														echo "<input name='c_checkbox2a' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox2a' type='checkbox'>";
													}
													?>
													<label for="c_checkbox2a">
														Revive Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Destroy_Vehicles4 == 1) {
														echo "<input name='c_checkbox3a' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox3a' type='checkbox'>";
													}
													?>
													<label for="c_checkbox3a">
														Destroy Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_NumberPlates4 == 1) {
														echo "<input name='c_checkbox4a' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4a' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4a">
														Edit Number Plate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Inventory4 == 1) {
														echo "<input name='c_checkbox4aa' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4aa' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4aa">
														Edit Vehicle Inventory
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Vehicles4 == 1) {
														echo "<input name='c_checkbox5a' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox5a' type='checkbox'>";
													}
													?>
													<label for="c_checkbox5a">
														Delete Vehicle
													</label>
												</div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Rcon Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Rcon4 == 1) {
														echo "<input name='c_checkbox1b' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox1b' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1b">
														View Rcon
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Connected_Users4 == 1) {
														echo "<input name='c_checkbox2b' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox2b' type='checkbox'>";
													}
													?>
													<label for="c_checkbox2b">
														View Connected Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Send_Messages4 == 1) {
														echo "<input name='c_checkbox3b' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox3b' type='checkbox'>";
													}
													?>
													<label for="c_checkbox3b">
														Send Messages
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Kick_Users4 == 1) {
														echo "<input name='c_checkbox4b' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4b' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4b">
														Kick Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Ban_Users4 == 1) {
														echo "<input name='c_checkbox5b' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox5b' type='checkbox'>";
													}
													?>
													<label for="c_checkbox5b">
														Ban Users
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Support Cases</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Cases4 == 1) {
														echo "<input name='c_checkbox1c' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox1c' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1c">
														Submit Support Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AllCases4 == 1) {
														echo "<input name='c_checkbox2c' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox2c' type='checkbox'>";
													}
													?>
													<label for="c_checkbox2c">
														View All Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Cases4 == 1) {
														echo "<input name='c_checkbox3c' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox3c' type='checkbox'>";
													}
													?>
													<label for="c_checkbox3c">
														Delete Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_Cases4 == 1) {
														echo "<input name='c_checkbox4c' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4c' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4c">
														Reset Cases
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Master Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_AdminLevel4 == 1) {
														echo "<input name='c_checkbox1d' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox1d' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1d">
														Modify Admin Level
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllPlayers4 == 1) {
														echo "<input name='c_checkbox2d' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox2d' type='checkbox'>";
													}
													?>
													<label for="c_checkbox2d">
														Reset All Players
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllVehicles4 == 1) {
														echo "<input name='c_checkbox3d' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox3d' type='checkbox'>";
													}
													?>
													<label for="c_checkbox3d">
														Reset All Vehicles
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllGangs4 == 1) {
														echo "<input name='c_checkbox4d' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox4d' type='checkbox'>";
													}
													?>
													<label for="c_checkbox4d">
														Reset All Gangs
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Permissions4 == 1) {
														echo "<input name='c_checkbox5d' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox5d' type='checkbox'>";
													}
													?>
													<label for="c_checkbox5d">
														Modify Permissions
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Database</h3></div>
												
												<div class="col-md-2">
													<?php
													if($jVar_Backup_Database4 == 1) {
														echo "<input name='c_checkbox6d' type='checkbox' checked>";
													} else {
														echo "<input name='c_checkbox6d' type='checkbox'>";
													}
													?>
													<label for="c_checkbox6d">
														Access Database
													</label>
												</div>
											</div>
										</div>	
										<div class="panel-heading"><?=$jVar_ANAME5 ?></div>
										<div class="panel-body">
											<div class="checkbox checkbox-primary" style="font-size:18px;">
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Player Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Players5 == 1) {
														echo "<input name='d_checkbox1' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox1' type='checkbox'>";
													}
													?>
													<label for="d_checkbox1">
														View Player Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Whitelist5 == 1) {
														echo "<input name='d_checkbox2' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox2' type='checkbox'>";
													}
													?>
													<label for="d_checkbox2">
														Whitelist
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Compensate5 == 1) {
														echo "<input name='d_checkbox3' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox3' type='checkbox'>";
													}
													?>
													<label for="d_checkbox3">
														Compensate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_User5 == 1) {
														echo "<input name='d_checkbox4' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4">
														Reset User
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_User5 == 1) {
														echo "<input name='d_checkbox5' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox5' type='checkbox'>";
													}
													?>
													<label for="d_checkbox5">
														Delete User
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1"></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Notes5 == 1) {
														echo "<input name='d_checkbox6' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox6' type='checkbox'>";
													}
													?>
													<label for="d_checkbox6">
														View Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Notes5 == 1) {
														echo "<input name='d_checkbox7' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox7' type='checkbox'>";
													}
													?>
													<label for="d_checkbox7">
														Submit Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Notes5 == 1) {
														echo "<input name='d_checkbox8' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox8' type='checkbox'>";
													}
													?>
													<label for="d_checkbox8">
														Remove Notes
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AntiCheat5 == 1) {
														echo "<input name='d_checkbox9' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox9' type='checkbox'>";
													}
													?>
													<label for="d_checkbox9">
														View Anti Cheat
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Flagged5 == 1) {
														echo "<input name='d_checkbox10' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox10' type='checkbox'>";
													}
													?>
													<label for="d_checkbox10">
														Remove Flagged Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Comp_Ban5 == 1) {
														echo "<input name='d_checkbox11' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox11' type='checkbox'>";
													}
													?>
													<label for="d_checkbox11">
														Compensation Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Police_Ban5 == 1) {
														echo "<input name='d_checkbox12' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox12' type='checkbox'>";
													}
													?>
													<label for="d_checkbox12">
														Police Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Medic_Ban5 == 1) {
														echo "<input name='d_checkbox13' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox13' type='checkbox'>";
													}
													?>
													<label for="d_checkbox13">
														Medic Ban
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Points5 == 1) {
														echo "<input name='d_checkbox14' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox14' type='checkbox'>";
													}
													?>
													<label for="d_checkbox14">
														View Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Issue_Points5 == 1) {
														echo "<input name='d_checkbox15' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox15' type='checkbox'>";
													}
													?>
													<label for="d_checkbox15">
														Issue Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Remove_Points5 == 1) {
														echo "<input name='d_checkbox16' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox16' type='checkbox'>";
													}
													?>
													<label for="d_checkbox16">
														Remove Points
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Cash5 == 1) {
														echo "<input name='d_checkbox17' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox17' type='checkbox'>";
													}
													?>
													<label for="d_checkbox17">
														Manage Cash/Bank
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Gang Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Gangs5 == 1) {
														echo "<input name='d_checkbox1g' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox1g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox1g">
														View Gang Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Name5 == 1) {
														echo "<input name='d_checkbox2g' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox2g' type='checkbox'>";
													}
													?>
													<label for="d_checkbox2g">
														Edit Name
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Max5 == 1) {
														echo "<input name='d_checkbox3g' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox3g' type='checkbox'>";
													}
													?>
													<label for="d_checkbox3g">
														Edit Maximum Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_Gang_Members5 == 1) {
														echo "<input name='d_checkbox4g' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4g' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4g">
														Add/Remove Members
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Gangs5 == 1) {
														echo "<input name='d_checkbox5g' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox5g' type='checkbox'>";
													}
													?>
													<label for="c_checkbox5">
														Delete Gangs
													</label>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Vehicle Options </h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Vehicles5 == 1) {
														echo "<input name='d_checkbox1a' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox1a' type='checkbox'>";
													}
													?>
													<label for="d_checkbox1a">
														View Vehicle Information
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Revive_Vehicles5 == 1) {
														echo "<input name='d_checkbox2a' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox2a' type='checkbox'>";
													}
													?>
													<label for="d_checkbox2a">
														Revive Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Destroy_Vehicles5 == 1) {
														echo "<input name='d_checkbox3a' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox3a' type='checkbox'>";
													}
													?>
													<label for="d_checkbox3a">
														Destroy Vehicle
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Edit_NumberPlates5 == 1) {
														echo "<input name='d_checkbox4a' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4a' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4a">
														Edit Number Plate
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Vehicle_Inventory5 == 1) {
														echo "<input name='d_checkbox4aa' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4aa' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4aa">
														Edit Vehicle Inventory
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Vehicles5 == 1) {
														echo "<input name='d_checkbox5a' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox5a' type='checkbox'>";
													}
													?>
													<label for="d_checkbox5a">
														Delete Vehicle
													</label>
												</div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Rcon Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_View_Rcon5 == 1) {
														echo "<input name='d_checkbox1b' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox1b' type='checkbox'>";
													}
													?>
													<label for="d_checkbox1b">
														View Rcon
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Connected_Users5 == 1) {
														echo "<input name='d_checkbox2b' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox2b' type='checkbox'>";
													}
													?>
													<label for="d_checkbox2b">
														View Connected Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Send_Messages5 == 1) {
														echo "<input name='d_checkbox3b' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox3b' type='checkbox'>";
													}
													?>
													<label for="d_checkbox3b">
														Send Messages
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Kick_Users5 == 1) {
														echo "<input name='d_checkbox4b' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4b' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4b">
														Kick Users
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Ban_Users5 == 1) {
														echo "<input name='d_checkbox5b' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox5b' type='checkbox'>";
													}
													?>
													<label for="d_checkbox5b">
														Ban Users
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Support Cases</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Submit_Cases5 == 1) {
														echo "<input name='d_checkbox1c' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox1c' type='checkbox'>";
													}
													?>
													<label for="d_checkbox1c">
														Submit Support Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_View_AllCases5 == 1) {
														echo "<input name='d_checkbox2c' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox2c' type='checkbox'>";
													}
													?>
													<label for="d_checkbox2c">
														View All Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Delete_Cases5 == 1) {
														echo "<input name='d_checkbox3c' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox3c' type='checkbox'>";
													}
													?>
													<label for="d_checkbox3c">
														Delete Cases
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_Cases5 == 1) {
														echo "<input name='d_checkbox4c' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4c' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4c">
														Reset Cases
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Master Options</h3></div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_AdminLevel5 == 1) {
														echo "<input name='d_checkbox1d' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox1d' type='checkbox'>";
													}
													?>
													<label for="d_checkbox1d">
														Modify Admin Level
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllPlayers5 == 1) {
														echo "<input name='d_checkbox2d' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox2d' type='checkbox'>";
													}
													?>
													<label for="d_checkbox2d">
														Reset All Players
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllVehicles5 == 1) {
														echo "<input name='d_checkbox3d' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox3d' type='checkbox'>";
													}
													?>
													<label for="d_checkbox3d">
														Reset All Vehicles
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Reset_AllGangs5 == 1) {
														echo "<input name='d_checkbox4d' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox4d' type='checkbox'>";
													}
													?>
													<label for="d_checkbox4d">
														Reset All Gangs
													</label>
												</div>
												<div class="col-md-2">
													<?php
													if($jVar_Modify_Permissions5 == 1) {
														echo "<input name='d_checkbox5d' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox5d' type='checkbox'>";
													}
													?>
													<label for="d_checkbox5d">
														Modify Permissions
													</label>
												</div>
												<div class="col-md-1"></div>
												<br><br>
												<div class="col-md-1"></div>
												<div class="col-md-12"><h3>Database</h3></div>
												
												<div class="col-md-2">
													<?php
													if($jVar_Backup_Database5 == 1) {
														echo "<input name='d_checkbox6d' type='checkbox' checked>";
													} else {
														echo "<input name='d_checkbox6d' type='checkbox'>";
													}
													?>
													<label for="d_checkbox6d">
														Access Database
													</label>
												</div>
											</div>
											<div class="col-md-12">
												<br>
												<input type="submit" style="font-size:18px;" class="btn btn-block btn-primary" name="submit" value="Save Settings"/>
											</div>
										</div>										
									</div>
								</form>
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
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>