<?php
include_once 'bootstrap.php';
include_once 'functions.php';
// AVOID FACEBOOK RETURN DATA
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if (!empty($_SESSION['ip'])) {
    $_SESSION['ip'] = $ip;
}
// DETECTA A RESOLUÇÃO DA TELA
if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
    $width = $_SESSION['screen_width'];
    $height = $_SESSION['screen_height'];

    $viewport = "Undetected";
    $resolution = $width . 'x' . $height;
    
    $model = "Unknown";
    if ($width == 320 && $height == 480) {
        $model = "iPhone 4";
    }
    else if ($width == 375 && $height == 667) {
        $model = "iPhone 6+";
    }
    else if ($width == 414 && $height == 736) {
        $model = "iPhone 6+ Plus";
    }
    else if ($width == 320 && $height == 568) {
        $model = "iPhone 5";
    }
    else if ($height > 736) {
        $model = "Not mobile";
    }
} elseif(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
    $_SESSION['screen_width'] = $_REQUEST['width'];
    $_SESSION['screen_height'] = $_REQUEST['height'];
    header('Location: ' . $_SERVER['PHP_SELF']);
} else {
    echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
}
$ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$ip_check = $ip_details->org;
if (isset($_GET['from_share_ID'])) {
  if ($ip_check == "AS32934 Facebook, Inc.") {
    header('location:home.php');
    // IF THE USER IS COMING FROM A SHARED LINK
  } else {
  	// GENERIC SHARE
	$hoje = date('Y-m-d H:i:s', time());
	$from_share_ID = $_GET['from_share_ID'];
	$_SESSION['from_share_ID'] = $from_share_ID;
	$sql_share = "SELECT game_ID, candidate_ID, media, email_subject FROM tb_shares WHERE share_ID='$from_share_ID'";
	$result = mysqli_query($link2, $sql_share);
	$row = mysqli_fetch_array($result);
	$media = $row['media'];
	$email_subject = $row['email_subject'];
	$nome_tabela = "tb_shares";
	$array_colunas = array("type","from_share_ID","media","email_subject","timestamp","ip");
	$array_valores = array("'in'","'$from_share_ID'","'$media'","'$email_subject'","'$hoje'","'$ip'");
	// SHARE WITH SPECIFIED GAME AND FRIEND
	if ($row['candidate_ID'] != NULL && $row['game_ID'] != NULL) {
		$candidate_ID = $row['candidate_ID'];
		$game_ID = $row['game_ID'];
		array_push($array_colunas,"candidate_ID","game_ID");
		array_push($array_valores,"'$candidate_ID'","'$game_ID'");
		$_SESSION['game_ID'] = $game_ID;
		$_SESSION['candidate_ID'] = $candidate_ID;
	}
	// SHARE WITH SPECIFIED GAME ONLY
	if ($row['game_ID'] != NULL && $row['candidate_ID'] == NULL || $row['candidate_ID'] == '') {
		$game_ID = $row['game_ID'];
		array_push($array_colunas,"game_ID");
		array_push($array_valores,"'$game_ID'");
		$_SESSION['game_ID'] = $game_ID;
	}
	// INSERT SHARE DATA INTO TB_SHARES
	$_SESSION['share_ID'] = insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
	mysqli_close($link2);
  }
}
?>