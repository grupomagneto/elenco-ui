<?php
  require __DIR__.'/vendor/autoload.php';
  require __DIR__.'/ids.php';
if(!session_id()) {
  session_start();
}
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
    if (!empty($_SESSION['facebook_access_token'])) { 

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
	$total_friends		= $_SESSION['total_count'];

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
$question12	= $row['travel_motive'];
$question13	= $row['gastronomy'];
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
$page12	= "travel_motive";
$page13	= "gastronomy";
$page14 = "occupation";
$page15 = "relationship_status";

$max 	 = 15;

if (!isset($_SESSION['answers'])) {
	$_SESSION['answers'] = 2;
}

if(isset($_POST['friend_ID'])){
	$_SESSION['friend_ID'] = $_POST['friend_ID'];
	$query_info = "SELECT facebook_ID FROM tb_voters WHERE facebook_ID = '$id'";
	$result = mysqli_query($link2, $query_info);
	$row = mysqli_fetch_array($result);
	$pre_id = $row['facebook_ID'];
	if ($pre_id == $id) {
		$nome_tabela = "tb_voters";
		$array_colunas = array("firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
		$array_valores = array("'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
		$condicao = "facebook_ID='$id'";
		atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
		// Atualiza ID do agenciado pelo email do facebook
		$id_query = "UPDATE tb_voters SET voter_elenco_ID = (SELECT tb_elenco.id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email LIMIT 1) WHERE EXISTS (SELECT id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email AND email != '' AND email != ' ' AND email IS NOT NULL)";
		mysqli_query($link2, $id_query);
		// Indica o player_facebook_ID se o usuário veio de um compartilhamento
		if (isset($_SESSION['share_ID'])) {
			$share_ID = $_SESSION['share_ID'];
			$nome_tabela = "tb_shares";
			$array_colunas = array("player_facebook_ID");
			$array_valores = array("'$pre_id'");
			$condicao = "share_ID='$share_ID'";
			atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
		}
		


		// Começo da Function

	      $first  = 1;
	      while ($first <= $max) {
	        if ($first == $max) {
	              header('location: before-vote.php');
	              exit();
	        } else {
	          if (${'question'.$first} == NULL || ${'question'.$first} == '') {
	            
	            header('location: ' . ${"page".$first} . '.php');
	            exit();          
	          } else {
	            $first++;
	          }
	        }
	      }

	    // Fim da Function

	}
	elseif ($pre_id == NULL || $pre_id == '') {
		$nome_tabela = "tb_voters";
		$array_colunas = array("facebook_ID","firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
		$array_valores = array("'$id'","'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
		insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
		// Atualiza ID do agenciado pelo email do facebook
		$id_query = "UPDATE tb_voters SET voter_elenco_ID = (SELECT tb_elenco.id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email LIMIT 1) WHERE EXISTS (SELECT id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email AND email != '' AND email != ' ' AND email IS NOT NULL)";
		mysqli_query($link2, $id_query);
		// Indica o player_facebook_ID se o usuário veio de um compartilhamento
		if (isset($_SESSION['share_ID'])) {
			$share_ID = $_SESSION['share_ID'];
			$nome_tabela = "tb_shares";
			$array_colunas = array("player_facebook_ID");
			$array_valores = array("'$pre_id'");
			$condicao = "share_ID='$share_ID'";
			atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
		}
		

		// Começo da Function

	      $first  = 1;
	      while ($first < $max) {
	        if (${'question'.$first} == NULL || ${'question'.$first} == '') {
	          
	          header('location: ' . ${'page'.$first} . '.php');
	          exit();
	        } else {
	          $first++;
	          if ($first > $max) {
		          header('location: before-vote.php');
		          exit();
	          }
	        }
	      }

	    // Fim da Function

	}
	else {
		$msg = mysqli_error($link2);
		echo $msg;
	}
}
mysqli_close($link2);
} else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            // header('location: /home.php');
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>
