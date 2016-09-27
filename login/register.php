<?php
if(!session_id()) {
	session_start();
}
require_once("db.php");
require_once("functions.php");

	$id 				= $_SESSION['id'];
	$firstname 			= $_SESSION['firstname'];
	$lastname 			= $_SESSION['lastname'];
	$email 				= $_SESSION['email'];
	$gender 			= $_SESSION['gender'];
	$link 				= $_SESSION['link'];
	$birthday 			= $_SESSION['birthday'];

	$device 			= $_SESSION['device'];
	$os 				= $_SESSION['os'];
	$browser 			= $_SESSION['browser'];
	$resolution 		= $_SESSION['resolution'];
	$viewport 			= $_SESSION['viewport'];
	$model 				= $_SESSION['model'];
	$user_agent 		= $_SESSION['user_agent'];
	$ip 				= $_SESSION['ip'];
	$access_city 		= $_SESSION['access_city'];
	$access_uf 			= $_SESSION['access_uf'];
	$access_country 	= $_SESSION['access_country'];
	$access_loc 		= $_SESSION['access_loc'];

$script = '<script language="javascript">location.href="transporte.php";</script>';

if(isset($_POST['face'])){
	if(insert($link2, $id, $firstname, $lastname, $email, $gender, $birthday, $device, $os, $browser, $resolution, $viewport, $model, $user_agent, $ip, $access_city, $access_uf, $access_country, $access_loc)) { // INSERIR DADOS USER_AGENT
		echo $script;
	} else {
		$msg = mysqli_error($link2);
		echo $msg;
	}
}

$redirect = '<script language="javascript">location.href='.$next.'.php;</script>';

if(isset($_POST['$name'])){
	$insert = $_POST['$name'];
	if(update($link2, $id, $insert)) {
		echo $redirect;
	}else {
		$msg = mysqli_error($link2);
		echo $msg;
	}
}

// $redirect_income = '<script language="javascript">location.href="income.php";</script>';
// if(isset($_POST['occupation'])){
// 	$occupation = $_POST["occupation"];
// 	if(insert_occupation($link2, $id, $occupation)) {
// 		echo $redirect_income;
// 	}else {
// 		$msg = mysqli_error($link2);
// 		echo $msg;
// 	}
// }
 
// $redirect_skin = '<script language="javascript">location.href="skincolor.php";</script>';
// if(isset($_POST['income'])){
// 	$income = $_POST["income"];
// 	if(insert_income($link2, $id, $income)) {
// 		echo $redirect_skin;
// 	} else {
// 		$msg = mysqli_error($link2);
// 		echo $msg;
// 	}
// }

// $redirect_scholarity = '<script language="javascript">location.href="scholarity.php";</script>';
// if(isset($_POST['skincolor'])){
// 	$skincolor = $_POST["skincolor"];
// 	if(insert_skincolor($link2, $id, $skincolor)) {
// 		echo $redirect_scholarity;
// 	} else {
// 		$msg = mysqli_error($link2);
// 		echo $msg;
// 	}
// }

// $redirect_relationship_status = '<script language="javascript">location.href="relationship.php";</script>';
// if(isset($_POST['scholarity'])){
// 	$scholarity = $_POST["scholarity"];
// 	if(insert_scholarity($link2, $id, $scholarity)) {
// 		echo $redirect_relationship_status;
// 	} else {
// 		$msg = mysqli_error($link2);
// 		echo $msg;
// 	}
// }

// $redirect_before_vote = '<script language="javascript">location.href="before-vote.php";</script>';
// if(isset($_POST['relationship_status'])){
// 	$relationship_status = $_POST["relationship_status"];
// 	if(insert_relationship_status($link2, $id, $relationship_status)) {
// 		echo $redirect_before_vote;
// 	} else {
// 		$msg = mysqli_error($link2);
// 		echo $msg;
// 	}
// }
?>
