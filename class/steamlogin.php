<?php
////////////////////////////////////////////
//				 DynamicPanel		      //
//  			by James Cross			  //
//				Web Developer			  //
////////////////////////////////////////////

require_once("encryption.php");

if($page == 0) {
	include("../config/load_vars.php");
} else {
	include("config/load_vars.php");
}

error_reporting(E_ERROR | E_PARSE | E_WARNING);

$player = new player;
$player->apikey = $jVar_Steam_API;
$player->weburl = $jVar_Return_URL;


class player{
    public static $apikey;
    public static $weburl;

    public function GetPlayerSummaries ($steamid) {
        $response = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $this->apikey . '&steamids=' . $steamid);
        $json = json_decode($response);
        return $json->response->players[0];
    }

    public function signIn (){
        require_once 'class/openid.php';
        $openid = new LightOpenID($this->weburl);
        if(!$openid->mode) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
        elseif($openid->mode == 'cancel'){
            print ('User has canceled authentication!');
        }
        else{
            if($openid->validate()){
                preg_match("/^https:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/", $openid->identity, $matches);
                $cookie = encryptCookie($matches[1]);
                setcookie('steamID', $cookie, time()+(60*60*24*7), '/'); // Stores login info for 1 week
                setcookie('update', "UpdateSteamAccount()", time() + (86400 * 30), "/"); // Update Account every day
                header('Location: /');
                exit;
            } else {
                print ('fail');
            }
        }
    }
}

if(isset($_GET['login'])){
    $player->signIn();
}

if (array_key_exists( '<b>Logout</b>', $_POST )){
    setcookie('steamID', '', -1, '/');
    header('Location: /');
}

try {
	$cVar_connect_e72 = new PDO('mysql:host=localhost; dbname=steam', 'panel', '4KZewb3nW8exhcFs'); 
	$cVar_connect_e72->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$cVar_connect_e72->exec("SET CHARACTER SET utf8");
}
catch(PDOException $eraar) {
	echo "PENIS". $eraar->getMessage();
	die();
}

if(!$_COOKIE['steamID']) { 
} else {
	$cookieID=decryptCookie($_COOKIE["steamID"]);
	$cVar_Query_Run="SELECT * FROM accounts WHERE pid='$cookieID'";
	$cVar_call_sql_0=$cVar_connect_e72->prepare($cVar_Query_Run);
	$cVar_call_sql_0->execute();
	if( $row = $cVar_call_sql_0->fetch() ){
		if(isset($_COOKIE['update'])){ } else {
			$SteamID = $player->GetPlayerSummaries($cookieID)->steamid;
			$SteamName = $player->GetPlayerSummaries($cookieID)->personaname;
			$AvatarURL = $player->GetPlayerSummaries($cookieID)->avatarmedium;
			$ProfileURL = $player->GetPlayerSummaries($cookieID)->profileurl;
			$BigAvatar = $player->GetPlayerSummaries($cookieID)->avatarfull;
			$cVar_Query_Run_1="UPDATE accounts SET name='$SteamName', userurl='$ProfileURL', avatarurl='$AvatarURL', bigavatarurl='$BigAvatar' WHERE pid='$cookieID'";
			$cVar_call_sql=$cVar_connect_e72->prepare($cVar_Query_Run_1);
			$cVar_call_sql->execute();
		}
	} else {
		$SteamID = $player->GetPlayerSummaries($cookieID)->steamid;
		$SteamName = $player->GetPlayerSummaries($cookieID)->personaname;
		$AvatarURL = $player->GetPlayerSummaries($cookieID)->avatarmedium;
		$ProfileURL = $player->GetPlayerSummaries($cookieID)->profileurl;
		$BigAvatar = $player->GetPlayerSummaries($cookieID)->avatarfull;
		$cVar_Query_Run_1="INSERT INTO accounts (pid,name,userurl,avatarurl,bigavatarurl,staffname,TotalCases,WeeklyCases,FormalWarnings) VALUES ('$SteamID','$SteamName', '$ProfileURL', '$AvatarURL', '$BigAvatar', 'null', '0', '0', '0')";
		$cVar_call_sql=$cVar_connect_e72->prepare($cVar_Query_Run_1);
		$cVar_call_sql->execute();
	}
}
?>