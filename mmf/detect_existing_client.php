<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';
require_once 'functions.php';
if(!session_id()) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
    if (!empty($_SESSION['facebook_access_token'])) {

$page = basename(__FILE__);
require_once 'register_page.php';
$email = $_SESSION['email'];

// ******************************
// ** DEFINE SE JÁ É AGENCIADO **
// ******************************
// IF USER EMAIL EXISTS IN TB_ELENCO
$sql_check = "SELECT id_elenco, COUNT(email) AS total FROM tb_elenco WHERE email='$email'";
$result = mysqli_query($link2, $sql_check);
$row = mysqli_fetch_array($result);
$email_TB_ELENCO = $row['total'];
if ($email_TB_ELENCO > 0) {
	// IF THERE IS ONLY ONE EMAIL IN TB_ELENCO
	if ($email_TB_ELENCO == 1) {
		// SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
		$_SESSION['voter_elenco_ID'] = $row['id_elenco'];
		// CHECKS IF EMAIL ALSO EXISTS IN TB_GAMES AND UPDATES IT IF POSITIVE
		include 'update_tb_games.php';
		// UPDATES VOTER_ELENCO_ID ON TB_VOTERS
		include 'update_tb_voters.php';
	}
	// ELSEIF THERE ARE TWO OR MORE E-MAILS IN TB_ELENCO
	elseif ($email_TB_ELENCO > 1) {
		$facebook_name = $firstname." ".$lastname;
		$sql_check = "SELECT candidate_elenco_ID FROM tb_games WHERE email='$email' AND stagename='$facebook_name' GROUP BY email";
		$result = mysqli_query($link2, $sql_check);
		$row = mysqli_fetch_array($result);
		// IF STAGENAME IS EQUAL TO THE FACEBOOK NAME
		if (!empty($row['candidate_elenco_ID']) && $row['candidate_elenco_ID'] != NULL && $row['candidate_elenco_ID'] != "" && $row['candidate_elenco_ID'] != " ") {
			// SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
	        $_SESSION['voter_elenco_ID'] = $row['candidate_elenco_ID'];
    		// CHECKS IF EMAIL ALSO EXISTS IN TB_GAMES AND UPDATES IT IF POSITIVE
			include 'update_tb_games.php';
			// UPDATES VOTER_ELENCO_ID ON TB_VOTERS
			include 'update_tb_voters.php';
	    }
	    // IF STAGENAME ISN'T EQUAL TO THE FACEBOOK NAME
	    else {
	    	// SHOW PAGE WITH ELENCO PROFILE PICTURES FOR THE USER TO CHOOSE FROM
	    	// to be done (SETS $_SESSION['voter_elenco_ID'])
	    	header('location: not_confirmed.php');
			exit();
			// $_SESSION['voter_elenco_ID'] = $row['candidate_elenco_ID'];
   //  		// IF EMAIL ALSO EXISTS IN TB_GAMES
			// $sql_check = "SELECT COUNT(email) AS total FROM tb_games WHERE email='$email'";
			// $result = mysqli_query($link2, $sql_check);
			// $row = mysqli_fetch_array($result);
			// $email_TB_GAMES = $row['total'];
			// if ($email_TB_GAMES > 0) {
			// 	// UPDATE TB_GAMES WITH FACEBOOK DATA (ALL GAMES WHERE THE USER IS LISTED)
			// 	$nome_tabela = "tb_games";
			// 	$array_colunas = array("candidate_facebook_ID","total_friends","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
			// 	$array_valores = array("'$id'","'$total_friends'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
			// 	$condicao = "email='$email'";
			// 	$last_ID = atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
	    }		
	}
}

// TRANSFORMS $_POSTS INTO $_SESSIONS
if (!empty($_SESSION['confirmation_prompt'])) {
		$confirmed = "sim";
}
if (!empty($_POST['confirm_identity'])) {
	$_SESSION['confirm_identity'] = $_POST['confirm_identity'];
}
if (!empty($_POST['prompt_stagename'])) {
	$_SESSION['prompt_stagename'] = $_POST['prompt_stagename'];
}

// IF USER EMAIL DOESN'T EXIST IN TB_ELENCO
if ($email_TB_ELENCO == 0) {
	if (empty($_SESSION['client_prompt'])) {
		// ASK USER IF HE IS ALREADY A CLIENT
		// require_once 'client_prompt.php';
		header('location: client_prompt.php');
		exit();
	}
	// IF THE USER ANSWERS YES
	if (!empty($_SESSION['client_prompt']) && $_SESSION['client_prompt'] == 'sim') {
		if (empty($_SESSION['email_prompt'])) {
			// ASK USER TO COMPLETE EMAIL
			// require_once 'email_prompt.php';
			header('location: email_prompt.php');
			exit();
		}
		// IF USER PROVIDED AN EMAIL 
		if (!empty($_SESSION['email_prompt'])) {
			$email = $_SESSION['email_prompt'];
			$sql_check = "SELECT id_elenco, COUNT(email) AS total FROM tb_elenco WHERE email='$email'";
			$result = mysqli_query($link2, $sql_check);
			$row = mysqli_fetch_array($result);
			$email_prompt_TB_ELENCO = $row['total'];
			// IF USER EMAIL EXISTS IN TB_ELENCO AMD IT'S UNIQUE
			if ($email_prompt_TB_ELENCO == 1) {
				// CHECK CODE SENT TO EMAIL
				if (empty($_SESSION['confirmation_prompt'])) {
					// ASK USER FOR CONFIRMATION CODE
					// require_once 'confirmation_prompt.php';
					header('location: confirmation_prompt.php');
					exit();
				}
				else {
					// IF CODE IS CONFIRMED
					if (isset($confirmed) && $confirmed = "sim") {
						// SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
						$_SESSION['voter_elenco_ID'] = $row['id_elenco'];
						// CHECKS IF EMAIL ALSO EXISTS IN TB_GAMES AND UPDATES IT IF POSITIVE
						include 'update_tb_games.php';
						// UPDATES VOTER_ELENCO_ID ON TB_VOTERS
						include 'update_tb_voters.php';
						// SHOWS SUCCESS PAGE
						header('location: game.php');
						exit();
					}
					// IF CODE ISN'T CONFIRMED
					if (isset($confirmed) && $confirmed = "nao") {
						// SHOWS ERROR PAGE
						header('location: not_confirmed.php');
						exit();
					}
				}
			}
			// IF EXISTS MORE THAN ONE EQUALS EMAILS IN TB_ELENCO
			if ($email_prompt_TB_ELENCO > 1) {
				// TRY TO MATCH FACEBOOK FULL NAME WITH STAGE NAME
				$facebook_name = $firstname." ".$lastname;
				$sql_check = "SELECT id_elenco, COUNT(email) AS total FROM tb_elenco WHERE email='$email' AND stagename='$facebook_name'";
				$result = mysqli_query($link2, $sql_check);
				$row = mysqli_fetch_array($result);
				$email_stagename = $row['total'];
				// IF FACEBOOK NAME IS EQUAL TO ONE STAGENAME AUTOMATICALLY FOUND
				if ($email_stagename == 1) {
					if (empty($_SESSION['confirm_identity'])) {
						// require_once 'confirm_identity.php';
						header('location: confirm_identity.php');
						exit();
					}
					// IF USER CONFIRMED IDENTITY
					elseif (!empty($_SESSION['confirm_identity']) && $_SESSION['confirm_identity'] == 'sim') {
		 					// CHECK CODE SENT TO EMAIL
		 					if (empty($_SESSION['confirmation_prompt'])) {
								// ASK USER FOR CONFIRMATION CODE
								// require_once 'confirmation_prompt.php';
								header('location: confirmation_prompt.php');
								exit();
							}
							else{
								// IF CODE IS CONFIRMED
								if (isset($confirmed) && $confirmed = "sim") {
									// SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
									$_SESSION['voter_elenco_ID'] = $row['id_elenco'];
									// CHECKS IF EMAIL ALSO EXISTS IN TB_GAMES AND UPDATES IT IF POSITIVE
									include 'update_tb_games.php';
									// UPDATES VOTER_ELENCO_ID ON TB_VOTERS
									include 'update_tb_voters.php';
									// SHOWS SUCCESS PAGE
									// header('location: game.php');
									// exit();
								}
								// IF CODE ISN'T CONFIRMED
								if (isset($confirmed) && $confirmed = "nao") {
									// SHOWS ERROR PAGE
									header('location: not_confirmed.php');
									exit();
								}
							}
					}
					// IF USER DIDN'T CONFIRM IDENTITY
					elseif (!empty($_SESSION['confirm_identity']) && $_SESSION['confirm_identity'] == 'nao') {
						// SHOWS ERROR PAGE
						header('location: not_confirmed.php');
						exit();
					}
				}
				// IF THERE ARE MORE THAN ONE STAGENAMES AND EMAILS EQUALS AUTOMATICALLY FOUND
				if ($email_stagename > 1) {
					// ->> IT'S POSSIBLE TO SHOW PHOTOS FROM CLIENTS WITH SAME EMAIL HERE!! <<-
					// SHOWS ERROR PAGE
					header('location: not_confirmed.php');
					exit();
				}
				// IF THERE ARE NO STAGENAMES AND EMAILS EQUALS AUTOMATICALLY FOUND
				if ($email_stagename == 0) {
					if (empty($_SESSION['prompt_stagename'])) {
						// ASK USER FOR STAGENAME
						// require_once 'prompt_stagename.php';
						header('location: prompt_stagename.php');
						exit();
					}
					if (!empty($_SESSION['prompt_stagename'])) {
						// TRY TO MATCH PROMPTED STAGENAME IN TB_ELENCO
						$stagename = $_SESSION['prompt_stagename'];
						$sql_check = "SELECT id_elenco, COUNT(email) AS total FROM tb_elenco WHERE email='$email_prompt' AND stagename='$stagename'";
						$result = mysqli_query($link2, $sql_check);
						$row = mysqli_fetch_array($result);
						$prompt_stagename = $row['total'];
						// IF STAGENAME IS FOUND IN TB_ELENCO
						if ($prompt_stagename == 1) {
							if (empty($_SESSION['confirm_identity'])) {
								// require_once 'prompt_stagename.php';
								header('location: prompt_stagename.php');
								exit();
							}
							// IF USER CONFIRMED IDENTITY
							elseif (!empty($_SESSION['confirm_identity']) && $_SESSION['confirm_identity'] == 'sim') {
				 					// CHECK CODE SENT TO EMAIL
				 					if (empty($_SESSION['confirmation_prompt'])) {
										// ASK USER FOR CONFIRMATION CODE
										// require_once 'confirmation_prompt.php';
										header('location: confirmation_prompt.php');
										exit();
									}
									else{
										// IF CODE IS CONFIRMED
										if (isset($confirmed) && $confirmed = "sim") {
											// SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
											$_SESSION['voter_elenco_ID'] = $row['id_elenco'];
											// CHECKS IF EMAIL ALSO EXISTS IN TB_GAMES AND UPDATES IT IF POSITIVE
											include 'update_tb_games.php';
											// UPDATES VOTER_ELENCO_ID ON TB_VOTERS
											include 'update_tb_voters.php';
											// SHOWS SUCCESS PAGE
											// header('location: game.php');
											// exit();
										}
										// IF CODE ISN'T CONFIRMED
										if (isset($confirmed) && $confirmed = "nao") {
											// SHOWS ERROR PAGE
											header('location: not_confirmed.php');
											exit();
										}
									}
							}
							// IF USER DIDN'T CONFIRM IDENTITY
							elseif (!empty($_SESSION['confirm_identity']) && $_SESSION['confirm_identity'] == 'nao') {
								// SHOWS ERROR PAGE
								header('location: not_confirmed.php');
								exit();
							}
						}
						// IF THERE ARE MORE THAN ONE STAGENAMES AND EMAILS EQUALS
						if ($prompt_stagename > 1) {
							// ->> IT'S POSSIBLE TO SHOW PHOTOS FROM CLIENTS WITH SAME EMAIL HERE!! <<-
							// SHOWS ERROR PAGE
							header('location: not_confirmed.php');
							exit();
						}
						// IF THERE ARE NO STAGENAMES AND EMAILS EQUALS
						if ($prompt_stagename == 0) {
							// SHOWS ERROR PAGE
							header('location: not_confirmed.php');
							exit();
						}
					}
				}
			}
			// IF NO VALID EMAIL IS FOUND ON TB_ELENCO
			if ($email_prompt_TB_ELENCO == 0) {
				// SHOWS ERROR PAGE
				header('location: not_confirmed.php');
				exit();
			}
		}
	}
	// IF THE USER ANSWERS NO
	if (!empty($_SESSION['client_prompt']) && $_SESSION['client_prompt'] == 'nao') {
		header('location: game.php');
		exit();
	}
}
mysqli_close($link2);
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            header('location: game.php');
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>