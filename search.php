<?php
$page = 1;include("class/encryption.php");
$cfg_ = parse_ini_file("./config/config.ini",true);
include("config/load_vars.php");

global $db_name;

$db_name = new mysqli();
$db_name->connect($jVar_DBHOST, $jVar_DBUSER, $jVar_DBPASS, $jVar_DBNAME);
$db_name->set_charset("utf8");

if ($db_name->connect_errno) {
    printf("Connect failed: %s\n", $db_name->connect_error);
    exit();
}
$j_layout = '';
$j_layout .= '<li class="result" style="z-index=99999;border-bottom: solid;">';
$j_layout .= '<a target="_blank" href="urlString">';
$j_layout .= '<h4>nameString</h3>';
$j_layout .= '<h4>functionString</h4>';
$j_layout .= '</a>';
$j_layout .= '</li>';

$str_search = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$str_search = $db_name->real_escape_string($str_search);

if (strlen($str_search) >= 1 && $str_search !== ' ') {
	$query3221 = 'SELECT * FROM players WHERE pid LIKE "%'.$str_search.'%" OR name LIKE "%'.$str_search.'%"';
	$result231 = $db_name->query($query3221);
	while($result2321 = $result231->fetch_array()) {
		$result_array[] = $result2321;
	}
	if (isset($result_array)) {
		foreach ($result_array as $result231) {
			$display_function = preg_replace("/".$str_search."/i", "<b class='highlight'>".$str_search."</b>", $result231['pid']);
			$display_name = preg_replace("/".$str_search."/i", "<b class='highlight'>".$str_search."</b>", $result231['name']);
			$display_url = './players.php?search_id='.urlencode($result231['pid']);
			$output = str_replace('nameString', $display_name, $j_layout);
			$output = str_replace('functionString', $display_function, $output);
			$output = str_replace('urlString', $display_url, $output);
			echo($output);
		}
	} else {
		$output = str_replace('urlString', 'javascript:void(0);', $j_layout);
		$output = str_replace('nameString', '<b>No Results Found.</b>', $output);
		$output = str_replace('functionString', '', $output);
		echo($output);
	}
}
?>