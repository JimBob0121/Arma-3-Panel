<?php
if($page == 1) {
	include("config/databasevars.php");
} else if($page==0) {
	include("databasevars.php");
} else if($page==3) {
	include("../config/databasevars.php");
}

if(isset($_COOKIE['steamID'])){
	if($cVar_Admin == 0) { 
		setcookie('steamID', '', -1, '/'); exit; 
	}
}

$jVar_Panel_Name = $cfg_['Main']['PANEL_NAME'];
$jVar_ANAME1 = $cfg_['Main']['ADMIN_1'];
$jVar_ANAME2 = $cfg_['Main']['ADMIN_2'];
$jVar_ANAME3 = $cfg_['Main']['ADMIN_3'];
$jVar_ANAME4 = $cfg_['Main']['ADMIN_4'];
$jVar_ANAME5 = $cfg_['Main']['ADMIN_5'];
$jVar_Steam_API = $cfg_['Main']['STEAM_API'];
$jVar_Return_URL = $cfg_['Main']['RETURN_URL'];
$jVar_MASTER_ADMIN = $cfg_['Main']['MASTER_ADMIN'];
$jVar_LOCKDOWN = $cfg_['Main']['LOCKDOWN'];

$jVar_Steam_HOST = $cfg_['SteamDatabase']['DB_HOST'];
/*$jVar_Steam_DB = $cfg_['SteamDatabase']['DB_NAME'];
$jVar_Steam_USER = $cfg_['SteamDatabase']['DB_USER'];
$jVar_Steam_PASS = $cfg_['SteamDatabase']['DB_PASS'];*/

$jVar_DBMASTER = $cfg_['Database']['DB_MASTER'];
/*$jVar_DBHOST = $cfg_['Database']['DB_HOST'];
$jVar_DBNAME = $cfg_['Database']['DB_NAME'];
$jVar_DBUSER = $cfg_['Database']['DB_USER'];
$jVar_DBPASS = $cfg_['Database']['DB_PASS'];*/



/* Permissions */
if(isset($_COOKIE['steamID'])){
	if($cVar_Admin == 1) { $cfg_level = "AdminLevel1"; }
	else if($cVar_Admin == 2) { $cfg_level = "AdminLevel2"; }
	else if($cVar_Admin == 3) { $cfg_level = "AdminLevel3"; }
	else if($cVar_Admin == 4) { $cfg_level = "AdminLevel4"; }
	else if($cVar_Admin == 5) { $cfg_level = "AdminLevel5"; }
	else if($cVar_Admin == 6) { $cfg_level = "AdminLevel5"; }

	$cVar_View_Players = $cfg_[$cfg_level]['View_Players'];
	$cVar_Whitelist = $cfg_[$cfg_level]['Whitelist'];
	$cVar_Compensate = $cfg_[$cfg_level]['Compensate'];
	$cVar_Reset_User = $cfg_[$cfg_level]['Reset_User'];
	$cVar_Delete_User = $cfg_[$cfg_level]['Delete_User'];
	$cVar_View_Notes = $cfg_[$cfg_level]['View_Notes'];
	$cVar_Submit_Notes = $cfg_[$cfg_level]['Submit_Notes'];
	$cVar_Remove_Notes = $cfg_[$cfg_level]['Remove_Notes'];
	$cVar_View_Anticheat = $cfg_[$cfg_level]['View_AntiCheat'];
	$cVar_Remove_Flagged = $cfg_[$cfg_level]['Remove_Flagged'];
	$cVar_Comp_Ban = $cfg_[$cfg_level]['Comp_Ban'];
	$cVar_Police_Ban = $cfg_[$cfg_level]['Police_Ban'];
	$cVar_Medic_Ban = $cfg_[$cfg_level]['Medic_Ban'];
	$cVar_Modify_Cash = $cfg_[$cfg_level]['Modify_Cash'];
	$cVar_View_Vehicles = $cfg_[$cfg_level]['View_Vehicles'];
	$cVar_Revive_Vehicles = $cfg_[$cfg_level]['Revive_Vehicles'];
	$cVar_Destroy_Vehicles = $cfg_[$cfg_level]['Destroy_Vehicles'];
	$cVar_Edit_NumberPlates = $cfg_[$cfg_level]['Edit_NumberPlates'];
	$cVar_Delete_Vehicles = $cfg_[$cfg_level]['Delete_Vehicles'];
	$cVar_View_Rcon = $cfg_[$cfg_level]['View_Rcon'];
	$cVar_Connected_Users = $cfg_[$cfg_level]['Connected_Users'];
	$cVar_Send_Messages = $cfg_[$cfg_level]['Send_Messages'];
	$cVar_Kick_Users = $cfg_[$cfg_level]['Kick_Users'];
	$cVar_Ban_Users = $cfg_[$cfg_level]['Ban_Users'];
	$cVar_Submit_Cases = $cfg_[$cfg_level]['Submit_Cases'];
	$cVar_View_AllCases = $cfg_[$cfg_level]['View_AllCases'];
	$cVar_Delete_Cases = $cfg_[$cfg_level]['Delete_Cases'];
	$cVar_Reset_Cases = $cfg_[$cfg_level]['Reset_Cases'];
	$cVar_Modify_AdminLevel = $cfg_[$cfg_level]['Modify_AdminLevel'];
	$cVar_Reset_AllPlayers = $cfg_[$cfg_level]['Reset_AllPlayers'];
	$cVar_Reset_AllVehicles = $cfg_[$cfg_level]['Reset_AllVehicles'];
	$cVar_Reset_AllGangs = $cfg_[$cfg_level]['Reset_AllGangs'];
	$cVar_Modify_Permissions = $cfg_[$cfg_level]['Modify_Permissions'];
	$cVar_View_Gangs = $cfg_[$cfg_level]['View_Gangs'];
	$cVar_Edit_Gang_Name = $cfg_[$cfg_level]['Edit_Gang_Name'];
	$cVar_Edit_Gang_Max = $cfg_[$cfg_level]['Edit_Gang_Max'];
	$cVar_Edit_Gang_Members = $cfg_[$cfg_level]['Edit_Gang_Members'];
	$cVar_Delete_Gangs = $cfg_[$cfg_level]['Delete_Gangs'];
	$cVar_Backup_Database = $cfg_[$cfg_level]['Backup_Database'];
	$cVar_Vehicle_Inventory = $cfg_[$cfg_level]['Vehicle_Inventory'];
	$cVar_View_Points = $cfg_[$cfg_level]['View_Points'];
	$cVar_Issue_Points = $cfg_[$cfg_level]['Issue_Points'];
	$cVar_Remove_Points = $cfg_[$cfg_level]['Remove_Points'];

	//Admin Level 1
	$jVar_View_Players = $cfg_['AdminLevel1']['View_Players'];
	$jVar_Whitelist = $cfg_['AdminLevel1']['Whitelist'];
	$jVar_Compensate = $cfg_['AdminLevel1']['Compensate'];
	$jVar_Reset_User = $cfg_['AdminLevel1']['Reset_User'];
	$jVar_Delete_User = $cfg_['AdminLevel1']['Delete_User'];
	$jVar_View_Notes = $cfg_['AdminLevel1']['View_Notes'];
	$jVar_Submit_Notes = $cfg_['AdminLevel1']['Submit_Notes'];
	$jVar_Remove_Notes = $cfg_['AdminLevel1']['Remove_Notes'];
	$jVar_View_AntiCheat = $cfg_['AdminLevel1']['View_AntiCheat'];
	$jVar_Remove_Flagged = $cfg_['AdminLevel1']['Remove_Flagged'];
	$jVar_Comp_Ban = $cfg_['AdminLevel1']['Comp_Ban'];
	$jVar_Police_Ban = $cfg_['AdminLevel1']['Police_Ban'];
	$jVar_Medic_Ban = $cfg_['AdminLevel1']['Medic_Ban'];
	$jVar_Modify_Cash = $cfg_['AdminLevel1']['Modify_Cash'];
	$jVar_View_Points = $cfg_['AdminLevel1']['View_Points'];
	$jVar_Issue_Points = $cfg_['AdminLevel1']['Issue_Points'];
	$jVar_Remove_Points = $cfg_['AdminLevel1']['Remove_Points'];
	$jVar_View_Vehicles = $cfg_['AdminLevel1']['View_Vehicles'];
	$jVar_Revive_Vehicles = $cfg_['AdminLevel1']['Revive_Vehicles'];
	$jVar_Destroy_Vehicles = $cfg_['AdminLevel1']['Destroy_Vehicles'];
	$jVar_Edit_NumberPlates = $cfg_['AdminLevel1']['Edit_NumberPlates'];
	$jVar_Vehicle_Inventory = $cfg_['AdminLevel1']['Vehicle_Inventory'];
	$jVar_Delete_Vehicles = $cfg_['AdminLevel1']['Delete_Vehicles'];
	$jVar_View_Rcon = $cfg_['AdminLevel1']['View_Rcon'];
	$jVar_Connected_Users = $cfg_['AdminLevel1']['Connected_Users'];
	$jVar_Send_Messages = $cfg_['AdminLevel1']['Send_Messages'];
	$jVar_Kick_Users = $cfg_['AdminLevel1']['Kick_Users'];
	$jVar_Ban_Users = $cfg_['AdminLevel1']['Ban_Users'];
	$jVar_Submit_Cases = $cfg_['AdminLevel1']['Submit_Cases'];
	$jVar_View_AllCases = $cfg_['AdminLevel1']['View_AllCases'];
	$jVar_Delete_Cases = $cfg_['AdminLevel1']['Delete_Cases'];
	$jVar_Reset_Cases = $cfg_['AdminLevel1']['Reset_Cases'];
	$jVar_Modify_AdminLevel = $cfg_['AdminLevel1']['Modify_AdminLevel'];
	$jVar_Reset_AllPlayers = $cfg_['AdminLevel1']['Reset_AllPlayers'];
	$jVar_Reset_AllVehicles = $cfg_['AdminLevel1']['Reset_AllVehicles'];
	$jVar_Reset_AllGangs = $cfg_['AdminLevel1']['Reset_AllGangs'];
	$jVar_Modify_Permissions = $cfg_['AdminLevel1']['Modify_Permissions'];
	$jVar_View_Gangs = $cfg_['AdminLevel1']['View_Gangs'];
	$jVar_Edit_Gang_Name = $cfg_['AdminLevel1']['Edit_Gang_Name'];
	$jVar_Edit_Gang_Max = $cfg_['AdminLevel1']['Edit_Gang_Max'];
	$jVar_Edit_Gang_Members = $cfg_['AdminLevel1']['Edit_Gang_Members'];
	$jVar_Delete_Gangs = $cfg_['AdminLevel1']['Delete_Gangs'];
	$jVar_Backup_Database = $cfg_['AdminLevel1']['Backup_Database'];

	//Admin Level 2
	$jVar_View_Players2 = $cfg_['AdminLevel2']['View_Players'];
	$jVar_Whitelist2 = $cfg_['AdminLevel2']['Whitelist'];
	$jVar_Compensate2 = $cfg_['AdminLevel2']['Compensate'];
	$jVar_Reset_User2 = $cfg_['AdminLevel2']['Reset_User'];
	$jVar_Delete_User2 = $cfg_['AdminLevel2']['Delete_User'];
	$jVar_View_Notes2 = $cfg_['AdminLevel2']['View_Notes'];
	$jVar_Submit_Notes2 = $cfg_['AdminLevel2']['Submit_Notes'];
	$jVar_Remove_Notes2 = $cfg_['AdminLevel2']['Remove_Notes'];
	$jVar_View_AntiCheat2 = $cfg_['AdminLevel2']['View_AntiCheat'];
	$jVar_Remove_Flagged2 = $cfg_['AdminLevel2']['Remove_Flagged'];
	$jVar_Comp_Ban2 = $cfg_['AdminLevel2']['Comp_Ban'];
	$jVar_Police_Ban2 = $cfg_['AdminLevel2']['Police_Ban'];
	$jVar_Medic_Ban2 = $cfg_['AdminLevel2']['Medic_Ban'];
	$jVar_Modify_Cash2 = $cfg_['AdminLevel2']['Modify_Cash'];
	$jVar_View_Points2 = $cfg_['AdminLevel2']['View_Points'];
	$jVar_Issue_Points2 = $cfg_['AdminLevel2']['Issue_Points'];
	$jVar_Remove_Points2 = $cfg_['AdminLevel2']['Remove_Points'];
	$jVar_View_Vehicles2 = $cfg_['AdminLevel2']['View_Vehicles'];
	$jVar_Revive_Vehicles2 = $cfg_['AdminLevel2']['Revive_Vehicles'];
	$jVar_Destroy_Vehicles2 = $cfg_['AdminLevel2']['Destroy_Vehicles'];
	$jVar_Edit_NumberPlates2 = $cfg_['AdminLevel2']['Edit_NumberPlates'];
	$jVar_Vehicle_Inventory2 = $cfg_['AdminLevel2']['Vehicle_Inventory'];
	$jVar_Delete_Vehicles2 = $cfg_['AdminLevel2']['Delete_Vehicles'];
	$jVar_View_Rcon2 = $cfg_['AdminLevel2']['View_Rcon'];
	$jVar_Connected_Users2 = $cfg_['AdminLevel2']['Connected_Users'];
	$jVar_Send_Messages2 = $cfg_['AdminLevel2']['Send_Messages'];
	$jVar_Kick_Users2 = $cfg_['AdminLevel2']['Kick_Users'];
	$jVar_Ban_Users2 = $cfg_['AdminLevel2']['Ban_Users'];
	$jVar_Submit_Cases2 = $cfg_['AdminLevel2']['Submit_Cases'];
	$jVar_View_AllCases2 = $cfg_['AdminLevel2']['View_AllCases'];
	$jVar_Delete_Cases2 = $cfg_['AdminLevel2']['Delete_Cases'];
	$jVar_Reset_Cases2 = $cfg_['AdminLevel2']['Reset_Cases'];
	$jVar_Modify_AdminLevel2 = $cfg_['AdminLevel2']['Modify_AdminLevel'];
	$jVar_Reset_AllPlayers2 = $cfg_['AdminLevel2']['Reset_AllPlayers'];
	$jVar_Reset_AllVehicles2 = $cfg_['AdminLevel2']['Reset_AllVehicles'];
	$jVar_Reset_AllGangs2 = $cfg_['AdminLevel2']['Reset_AllGangs'];
	$jVar_Modify_Permissions2 = $cfg_['AdminLevel2']['Modify_Permissions'];
	$jVar_View_Gangs2 = $cfg_['AdminLevel2']['View_Gangs'];
	$jVar_Edit_Gang_Name2 = $cfg_['AdminLevel2']['Edit_Gang_Name'];
	$jVar_Edit_Gang_Max2 = $cfg_['AdminLevel2']['Edit_Gang_Max'];
	$jVar_Edit_Gang_Members2 = $cfg_['AdminLevel2']['Edit_Gang_Members'];
	$jVar_Delete_Gangs2 = $cfg_['AdminLevel2']['Delete_Gangs'];
	$jVar_Backup_Database2 = $cfg_['AdminLevel2']['Backup_Database'];

	//Admin Level 3
	$jVar_View_Players3 = $cfg_['AdminLevel3']['View_Players'];
	$jVar_Whitelist3 = $cfg_['AdminLevel3']['Whitelist'];
	$jVar_Compensate3 = $cfg_['AdminLevel3']['Compensate'];
	$jVar_Reset_User3 = $cfg_['AdminLevel3']['Reset_User'];
	$jVar_Delete_User3 = $cfg_['AdminLevel3']['Delete_User'];
	$jVar_View_Notes3 = $cfg_['AdminLevel3']['View_Notes'];
	$jVar_Submit_Notes3 = $cfg_['AdminLevel3']['Submit_Notes'];
	$jVar_Remove_Notes3 = $cfg_['AdminLevel3']['Remove_Notes'];
	$jVar_View_AntiCheat3 = $cfg_['AdminLevel3']['View_AntiCheat'];
	$jVar_Remove_Flagged3 = $cfg_['AdminLevel3']['Remove_Flagged'];
	$jVar_Comp_Ban3 = $cfg_['AdminLevel3']['Comp_Ban'];
	$jVar_Police_Ban3 = $cfg_['AdminLevel3']['Police_Ban'];
	$jVar_Medic_Ban3 = $cfg_['AdminLevel3']['Medic_Ban'];
	$jVar_Modify_Cash3 = $cfg_['AdminLevel3']['Modify_Cash'];
	$jVar_View_Points3 = $cfg_['AdminLevel3']['View_Points'];
	$jVar_Issue_Points3 = $cfg_['AdminLevel3']['Issue_Points'];
	$jVar_Remove_Points3 = $cfg_['AdminLevel3']['Remove_Points'];
	$jVar_View_Vehicles3 = $cfg_['AdminLevel3']['View_Vehicles'];
	$jVar_Revive_Vehicles3 = $cfg_['AdminLevel3']['Revive_Vehicles'];
	$jVar_Destroy_Vehicles3 = $cfg_['AdminLevel3']['Destroy_Vehicles'];
	$jVar_Edit_NumberPlates3 = $cfg_['AdminLevel3']['Edit_NumberPlates'];
	$jVar_Vehicle_Inventory3 = $cfg_['AdminLevel3']['Vehicle_Inventory'];
	$jVar_Delete_Vehicles3 = $cfg_['AdminLevel3']['Delete_Vehicles'];
	$jVar_View_Rcon3 = $cfg_['AdminLevel3']['View_Rcon'];
	$jVar_Connected_Users3 = $cfg_['AdminLevel3']['Connected_Users'];
	$jVar_Send_Messages3 = $cfg_['AdminLevel3']['Send_Messages'];
	$jVar_Kick_Users3 = $cfg_['AdminLevel3']['Kick_Users'];
	$jVar_Ban_Users3 = $cfg_['AdminLevel3']['Ban_Users'];
	$jVar_Submit_Cases3 = $cfg_['AdminLevel3']['Submit_Cases'];
	$jVar_View_AllCases3 = $cfg_['AdminLevel3']['View_AllCases'];
	$jVar_Delete_Cases3 = $cfg_['AdminLevel3']['Delete_Cases'];
	$jVar_Reset_Cases3 = $cfg_['AdminLevel3']['Reset_Cases'];
	$jVar_Modify_AdminLevel3 = $cfg_['AdminLevel3']['Modify_AdminLevel'];
	$jVar_Reset_AllPlayers3 = $cfg_['AdminLevel3']['Reset_AllPlayers'];
	$jVar_Reset_AllVehicles3 = $cfg_['AdminLevel3']['Reset_AllVehicles'];
	$jVar_Reset_AllGangs3 = $cfg_['AdminLevel3']['Reset_AllGangs'];
	$jVar_Modify_Permissions3 = $cfg_['AdminLevel3']['Modify_Permissions'];
	$jVar_View_Gangs3 = $cfg_['AdminLevel3']['View_Gangs'];
	$jVar_Edit_Gang_Name3 = $cfg_['AdminLevel3']['Edit_Gang_Name'];
	$jVar_Edit_Gang_Max3 = $cfg_['AdminLevel3']['Edit_Gang_Max'];
	$jVar_Edit_Gang_Members3 = $cfg_['AdminLevel3']['Edit_Gang_Members'];
	$jVar_Delete_Gangs3 = $cfg_['AdminLevel3']['Delete_Gangs'];
	$jVar_Backup_Database3 = $cfg_['AdminLevel3']['Backup_Database'];

	//Admin Level 4
	$jVar_View_Players4 = $cfg_['AdminLevel4']['View_Players'];
	$jVar_Whitelist4 = $cfg_['AdminLevel4']['Whitelist'];
	$jVar_Compensate4 = $cfg_['AdminLevel4']['Compensate'];
	$jVar_Reset_User4 = $cfg_['AdminLevel4']['Reset_User'];
	$jVar_Delete_User4 = $cfg_['AdminLevel4']['Delete_User'];
	$jVar_View_Notes4 = $cfg_['AdminLevel4']['View_Notes'];
	$jVar_Submit_Notes4 = $cfg_['AdminLevel4']['Submit_Notes'];
	$jVar_Remove_Notes4 = $cfg_['AdminLevel4']['Remove_Notes'];
	$jVar_View_AntiCheat4 = $cfg_['AdminLevel4']['View_AntiCheat'];
	$jVar_Remove_Flagged4 = $cfg_['AdminLevel4']['Remove_Flagged'];
	$jVar_Comp_Ban4 = $cfg_['AdminLevel4']['Comp_Ban'];
	$jVar_Police_Ban4 = $cfg_['AdminLevel4']['Police_Ban'];
	$jVar_Medic_Ban4 = $cfg_['AdminLevel4']['Medic_Ban'];
	$jVar_Modify_Cash4 = $cfg_['AdminLevel4']['Modify_Cash'];
	$jVar_View_Points4 = $cfg_['AdminLevel4']['View_Points'];
	$jVar_Issue_Points4 = $cfg_['AdminLevel4']['Issue_Points'];
	$jVar_Remove_Points4 = $cfg_['AdminLevel4']['Remove_Points'];
	$jVar_View_Vehicles4 = $cfg_['AdminLevel4']['View_Vehicles'];
	$jVar_Revive_Vehicles4 = $cfg_['AdminLevel4']['Revive_Vehicles'];
	$jVar_Destroy_Vehicles4 = $cfg_['AdminLevel4']['Destroy_Vehicles'];
	$jVar_Edit_NumberPlates4 = $cfg_['AdminLevel4']['Edit_NumberPlates'];
	$jVar_Vehicle_Inventory4 = $cfg_['AdminLevel4']['Vehicle_Inventory'];
	$jVar_Delete_Vehicles4 = $cfg_['AdminLevel4']['Delete_Vehicles'];
	$jVar_View_Rcon4 = $cfg_['AdminLevel4']['View_Rcon'];
	$jVar_Connected_Users4 = $cfg_['AdminLevel4']['Connected_Users'];
	$jVar_Send_Messages4 = $cfg_['AdminLevel4']['Send_Messages'];
	$jVar_Kick_Users4 = $cfg_['AdminLevel4']['Kick_Users'];
	$jVar_Ban_Users4 = $cfg_['AdminLevel4']['Ban_Users'];
	$jVar_Submit_Cases4 = $cfg_['AdminLevel4']['Submit_Cases'];
	$jVar_View_AllCases4 = $cfg_['AdminLevel4']['View_AllCases'];
	$jVar_Delete_Cases4 = $cfg_['AdminLevel4']['Delete_Cases'];
	$jVar_Reset_Cases4 = $cfg_['AdminLevel4']['Reset_Cases'];
	$jVar_Modify_AdminLevel4 = $cfg_['AdminLevel4']['Modify_AdminLevel'];
	$jVar_Reset_AllPlayers4 = $cfg_['AdminLevel4']['Reset_AllPlayers'];
	$jVar_Reset_AllVehicles4 = $cfg_['AdminLevel4']['Reset_AllVehicles'];
	$jVar_Reset_AllGangs4 = $cfg_['AdminLevel4']['Reset_AllGangs'];
	$jVar_Modify_Permissions4 = $cfg_['AdminLevel4']['Modify_Permissions'];
	$jVar_View_Gangs4 = $cfg_['AdminLevel4']['View_Gangs'];
	$jVar_Edit_Gang_Name4 = $cfg_['AdminLevel4']['Edit_Gang_Name'];
	$jVar_Edit_Gang_Max4 = $cfg_['AdminLevel4']['Edit_Gang_Max'];
	$jVar_Edit_Gang_Members4 = $cfg_['AdminLevel4']['Edit_Gang_Members'];
	$jVar_Delete_Gangs4 = $cfg_['AdminLevel4']['Delete_Gangs'];
	$jVar_Backup_Database4 = $cfg_['AdminLevel4']['Backup_Database'];

	//Admin Level 5
	$jVar_View_Players5 = $cfg_['AdminLevel5']['View_Players'];
	$jVar_Whitelist5 = $cfg_['AdminLevel5']['Whitelist'];
	$jVar_Compensate5 = $cfg_['AdminLevel5']['Compensate'];
	$jVar_Reset_User5 = $cfg_['AdminLevel5']['Reset_User'];
	$jVar_Delete_User5 = $cfg_['AdminLevel5']['Delete_User'];
	$jVar_View_Notes5 = $cfg_['AdminLevel5']['View_Notes'];
	$jVar_Submit_Notes5 = $cfg_['AdminLevel5']['Submit_Notes'];
	$jVar_Remove_Notes5 = $cfg_['AdminLevel5']['Remove_Notes'];
	$jVar_View_AntiCheat5 = $cfg_['AdminLevel5']['View_AntiCheat'];
	$jVar_Remove_Flagged5 = $cfg_['AdminLevel5']['Remove_Flagged'];
	$jVar_Comp_Ban5 = $cfg_['AdminLevel5']['Comp_Ban'];
	$jVar_Police_Ban5 = $cfg_['AdminLevel5']['Police_Ban'];
	$jVar_Medic_Ban5 = $cfg_['AdminLevel5']['Medic_Ban'];
	$jVar_Modify_Cash5 = $cfg_['AdminLevel5']['Modify_Cash'];
	$jVar_View_Points5 = $cfg_['AdminLevel5']['View_Points'];
	$jVar_Issue_Points5 = $cfg_['AdminLevel5']['Issue_Points'];
	$jVar_Remove_Points5 = $cfg_['AdminLevel5']['Remove_Points'];
	$jVar_View_Vehicles5 = $cfg_['AdminLevel5']['View_Vehicles'];
	$jVar_Revive_Vehicles5 = $cfg_['AdminLevel5']['Revive_Vehicles'];
	$jVar_Destroy_Vehicles5 = $cfg_['AdminLevel5']['Destroy_Vehicles'];
	$jVar_Edit_NumberPlates5 = $cfg_['AdminLevel5']['Edit_NumberPlates'];
	$jVar_Vehicle_Inventory5 = $cfg_['AdminLevel5']['Vehicle_Inventory'];
	$jVar_Delete_Vehicles5 = $cfg_['AdminLevel5']['Delete_Vehicles'];
	$jVar_View_Rcon5 = $cfg_['AdminLevel5']['View_Rcon'];
	$jVar_Connected_Users5 = $cfg_['AdminLevel5']['Connected_Users'];
	$jVar_Send_Messages5 = $cfg_['AdminLevel5']['Send_Messages'];
	$jVar_Kick_Users5 = $cfg_['AdminLevel5']['Kick_Users'];
	$jVar_Ban_Users5 = $cfg_['AdminLevel5']['Ban_Users'];
	$jVar_Submit_Cases5 = $cfg_['AdminLevel5']['Submit_Cases'];
	$jVar_View_AllCases5 = $cfg_['AdminLevel5']['View_AllCases'];
	$jVar_Delete_Cases5 = $cfg_['AdminLevel5']['Delete_Cases'];
	$jVar_Reset_Cases5 = $cfg_['AdminLevel5']['Reset_Cases'];
	$jVar_Modify_AdminLevel5 = $cfg_['AdminLevel5']['Modify_AdminLevel'];
	$jVar_Reset_AllPlayers5 = $cfg_['AdminLevel5']['Reset_AllPlayers'];
	$jVar_Reset_AllVehicles5 = $cfg_['AdminLevel5']['Reset_AllVehicles'];
	$jVar_Reset_AllGangs5 = $cfg_['AdminLevel5']['Reset_AllGangs'];
	$jVar_Modify_Permissions5 = $cfg_['AdminLevel5']['Modify_Permissions'];
	$jVar_View_Gangs5 = $cfg_['AdminLevel5']['View_Gangs'];
	$jVar_Edit_Gang_Name5 = $cfg_['AdminLevel5']['Edit_Gang_Name'];
	$jVar_Edit_Gang_Max5 = $cfg_['AdminLevel5']['Edit_Gang_Max'];
	$jVar_Edit_Gang_Members5 = $cfg_['AdminLevel5']['Edit_Gang_Members'];
	$jVar_Delete_Gangs5 = $cfg_['AdminLevel5']['Delete_Gangs'];
	$jVar_Backup_Database5 = $cfg_['AdminLevel5']['Backup_Database'];
}
?>