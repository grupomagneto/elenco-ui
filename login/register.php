<?php
if(!session_id()) {
	session_start();
}

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

	$id 				= $_SESSION['id'];
	$firstname 			= $_SESSION['firstname'];
	$lastname 			= $_SESSION['lastname'];
	$email 				= $_SESSION['email'];
	$sex 				= $_SESSION['gender'];
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

require_once("db.php");
require_once("functions.php");

$query_info = "SELECT * FROM tb_voters WHERE facebook_ID = '$id'";
$result = mysqli_query($link2, $query_info);
$row = mysqli_fetch_array($result);

$question1	= $row['transportation'];
$question2 	= $row['scholarity'];
$question3	= $row['cep'];
$question4	= $row['pet'];
$question5 	= $row['physical_activity'];
$question6 	= $row['tech_level'];
$question7	= $row['social_network'];
$question8 	= $row['music'];
$question9 	= $row['children'];
$question10 = $row['diet'];
$question11	= $row['traveling'];
$question12	= $row['destinations'];
$question13	= $row['grastronomy'];
$question14 = $row['occupation'];
$question15 = $row['relationship_status'];

$page1	= "transportation";
$page2 	= "scholarity";
$page3	= "cep";
$page4	= "pet";
$page5 	= "physical_activity";
$page6 	= "tech_level";
$page7	= "social_network";
$page8 	= "music";
$page9 	= "children";
$page10 = "diet";
$page11	= "traveling";
$page12	= "destinations";
$page13	= "grastronomy";
$page14 = "occupation";
$page15 = "relationship_status";

$max 	 = 15;

if (!isset($_SESSION['answers'])) {
	$_SESSION['answers'] = 2;
}

if(isset($_POST['face'])){
	$query_info = "SELECT facebook_ID FROM tb_voters WHERE facebook_ID = '$id'";
	$result = mysqli_query($link2, $query_info);
	$row = mysqli_fetch_array($result);
	$pre_id = $row['facebook_ID'];
	if ($pre_id == $id) {
		$nome_tabela = "tb_voters";
		$array_colunas = array("firstname","lastname","email","sex","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
		$array_valores = array("'$firstname'","'$lastname'","'$email'","'$sex'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
		$condicao = "facebook_ID='$id'";
		atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
		mysqli_close($link2);


		// Começo da Function

	      $first  = 1;
	      while ($first < $max) {
	        if (${'question'.$first} == NULL || ${'question'.$first} == '') {
	          mysqli_close($link2);
	          header('location: ' . ${'page'.$first} . '.php');
	          exit();
	        } else {
	          $first++;
	        }
	      }

	    // Fim da Function

	}
	elseif ($pre_id == NULL || $pre_id == '') {
		$nome_tabela = "tb_voters";
		$array_colunas = array("facebook_ID","firstname","lastname","email","sex","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
		$array_valores = array("'$id'","'$firstname'","'$lastname'","'$email'","'$sex'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
		insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
		mysqli_close($link2);

		// Começo da Function

	      $first  = 1;
	      while ($first < $max) {
	        if (${'question'.$first} == NULL || ${'question'.$first} == '') {
	          mysqli_close($link2);
	          header('location: ' . ${'page'.$first} . '.php');
	          exit();
	        } else {
	          $first++;
	        }
	      }

	    // Fim da Function

	}
	// elseif (insert($link2, $id, $firstname, $lastname, $email, $sex, $birthday, $device, $os, $browser, $resolution, $viewport, $model, $user_agent, $ip, $access_city, $access_uf, $access_country, $access_loc)) { 
	// 		$query_email = "SELECT mail FROM (SELECT email mail FROM tb_voters) T1 INNER JOIN (SELECT email mail FROM tb_elenco) T2 USING (mail)";
	// 		if (!empty(mysqli_query($link2, $query_email))) {
	// 		$id_query = "UPDATE tb_voters SET voter_elenco_ID = (SELECT tb_elenco.id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email LIMIT 1) WHERE EXISTS (SELECT id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email)";
	// 		mysqli_query($link2, $id_query);
	// 		mysqli_close($link2);
	// 		}
	// 		header('location: transportation.php');
	// 		exit();
	// }
	else {
		$msg = mysqli_error($link2);
		echo $msg;
	}
}
?>
