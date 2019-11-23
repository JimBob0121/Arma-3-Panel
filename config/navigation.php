<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/custom.js"></script>
</head>

<div class="brand clearfix">
	<a href="index.php" class="logo"><?=$jVar_Panel_Name ?></a>
	<span class="menu-btn"><i class="fa fa-bars"></i></span>
	<ul class="ts-profile-nav">
		<li class="ts-account">
			<a href="#"><?php echo "Total Cases: ".$cVar_TotalCases; ?></a>
		</li>
		<li class="ts-account">
			<a href="#"><?php echo "Weekly Cases: ".$cVar_WeeklyCases; ?></a>
		</li>
		<li class="ts-account">
			<a href="#"><?php echo "Formal Warnings: ".$cVar_FormalWarnings; ?></a>
		</li>
		<li class="ts-account">
			<a href="#"><img src="<?=$cVar_Steam_Avatar ?>" class="ts-avatar hidden-side" alt="" style="height:40px;width:40px;"> <?php echo $cVar_Staffname; ?> <i class="fa fa-angle-down hidden-side"></i></a>
			<ul>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li>
	</ul>
</div>
<?php if($cVar_Admin == 0) { 
	header( 'Location: index.php');
	setcookie('steamID', '', -1, '/'); 
} 
?>
<nav class="ts-sidebar">
	<ul class="ts-sidebar-menu">
		<li class="ts-label">Search</li>
		<li>
			<input type="text" class="ts-sidebar-search search" autocomplete="off" id="search" placeholder="Search here...">
		</li>
		<ul id="results" style="position:absolute;background-color:#262626;z-index:9999999;width:100%;max-height:200px;overflow:scroll;overflow-x:hidden;"></ul>
		
		<li class="ts-label"><?=$jVar_DBMASTER ?></li>
		<?php if($cVar_View_Players == 1) { ?>
		<li><a href="players.php"><i class="fa fa-dashboard"></i> Players</a></li>
		<?php 
		} if($cVar_View_Vehicles == 1) {?>
		<li><a href="vehicles.php"><i class="fa fa-car"></i> Vehicles</a></li>
		<?php 
		} if($cVar_Compensate == 1) {?>
		<li><a href="houses.php"><i class="fa fa-home"></i> Houses</a></li>
		<?php 
		} if($cVar_Backup_Database == 1) { ?>
		<li><a href="database.php"><i class="fa fa-database"></i> Database</a></li>
		<?php
		} if($cVar_View_Rcon == 1) { ?>
		<!--<li><a href="#"><i class="fa fa-gavel"></i> Rcon</a></li>-->
		<?php
		} if($cVar_Admin > 4) { ?>
		<li><a href="logs.php"><i class="fa fa-table"></i> Logs</a></li>
		<!--<li><a href="#"><i class="fa fa-edit"></i> Staff Roster</a></li>-->
		<?php } if($cVar_View_Points == 1) {?><li><a href="warned.php"><i class="fa fa-pie-chart"></i> Warned Users</a></li>
		<?php } ?>
		<li><a href="support.php"><i class="fa fa-files-o"></i> Support Cases</a></li>
		<!--Master Check Here -->
		<?php if($jVar_MASTER_ADMIN == $cVar_ID) { ?>
		<li><a href="settings.php"><i class="fa fa-cogs"></i> Master Settings</a></li>
		<?php } ?>
	</ul>
</nav>

<style type="text/css">
::-webkit-scrollbar {
	width: 7px;
	height: 7px;
}
::-webkit-scrollbar-button {
	width: 0px;
	height: 0px;
}
::-webkit-scrollbar-thumb {
	background: #6c6c6c;
	border: 40px none #ffffff;
	border-radius: 100px;
}
::-webkit-scrollbar-thumb:hover {
	background: #6c6c6c;
}
::-webkit-scrollbar-thumb:active {
	background: #6c6c6c;
}
::-webkit-scrollbar-track {
	background: #adadad;
	border: 0px none #ffffff;
	border-radius: 0px;
}
::-webkit-scrollbar-track:hover {
	background: #adadad;
}
::-webkit-scrollbar-track:active {
	background: #adadad;
}
::-webkit-scrollbar-corner {
	background: transparent;
}
</style>