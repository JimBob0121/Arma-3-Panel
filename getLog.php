<?php
$q = intval($_GET['q']);

if($q == 1) {
	$file = file("logs/chapoisbea-Huskiesxx/players.txt");
	$count = count($file);		
	echo "<textarea readonly class='form-control' style='height:800px;width:100%;font-size:16px;'>";
	for($i=0;$i < $count; ++$i) {
		echo $file[$i] . "\n";
	}
	echo "</textarea>";
} else if($q == 2) {
	$file = file("logs/chapoisbea-Huskiesxx/vehicles.txt");
	$count = count($file);		
	echo "<textarea readonly class='form-control' style='height:800px;width:100%;font-size:16px;'>";
	for($i=0;$i < $count; ++$i) {
		echo $file[$i] . "\n";
	}
	echo "</textarea>";
} else if($q == 3) {
	$file = file("logs/chapoisbea-Huskiesxx/gangs.txt");
	$count = count($file);		
	echo "<textarea readonly class='form-control' style='height:800px;width:100%;font-size:16px;'>";
	for($i=0;$i < $count; ++$i) {
		echo $file[$i] . "\n";
	}
	echo "</textarea>";
} else if($q == 4) {
	$file = file("logs/chapoisbea-Huskiesxx/support.txt");
	$count = count($file);		
	echo "<textarea readonly class='form-control' style='height:800px;width:100%;font-size:16px;'>";
	for($i=0;$i < $count; ++$i) {
		echo $file[$i] . "\n";
	}
	echo "</textarea>";
} else if($q == 5) {
	$file = file("logs/chapoisbea-Huskiesxx/other.txt");
	$count = count($file);		
	echo "<textarea readonly class='form-control' style='height:800px;width:100%;font-size:16px;'>";
	for($i=0;$i < $count; ++$i) {
		echo $file[$i] . "\n";
	}
	echo "</textarea>";
}

?>