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
		date_default_timezone_set('America/Sao_Paulo');
		$sex					= $_SESSION['gender'];
        $birthday				= $_SESSION['birthday'];
		$total_friends      	= $_SESSION['total_count'];
		$device             	= $_SESSION['device'];
		$os                 	= $_SESSION['os'];
		$browser            	= $_SESSION['browser'];
		$resolution         	= $_SESSION['resolution'];
		$viewport           	= $_SESSION['viewport'];
		$model              	= $_SESSION['model'];
		$user_agent         	= $_SESSION['user_agent'];
		$ip                 	= $_SESSION['ip'];
		$access_city        	= $_SESSION['access_city'];
		$access_uf          	= $_SESSION['access_uf'];
		$access_country     	= $_SESSION['access_country'];
		$access_loc         	= $_SESSION['access_loc'];
		$winner_candidate_ID 	= $_POST['candidate_elenco_ID'];
		$loser_candidate_ID 	= $_POST['loser_candidate_ID'];
		$game_ID 				= $_POST['game_ID'];
		$facebook_ID 			= $_POST['facebook_ID'];
		$vote_time_start 		= $_POST['vote_time_start'];
		$page 					= $_POST['page'];
		$total_pages 			= $_POST['total_pages'];
		$progress 				= $_POST['progress'];
		$write_level 			= $_POST['write_level'];
		$max_level 				= $_POST['max_level'];
		$view_level 			= $_POST['view_level'];
		$voter_winner_friends 	= $_POST['voter_winner_friends'];
		$voter_loser_friends 	= $_POST['voter_loser_friends'];
		$vote_date 				= date('Y-m-d');
		$vote_time 				= date('H:i:s');
		$vote_delay 			= microtime(true) - $vote_time_start;

		$nome_tabela = "tb_votes";
		$array_colunas = array('game_ID','voter_facebook_ID','level','winner_candidate_ID','voter_winner_friends','loser_candidate_ID','voter_loser_friends','vote_date','vote_time','vote_delay','birthday','sex','total_friends','device','os','browser','resolution','viewport','model','user_agent','ip','access_country','access_uf','access_city','access_loc');
		$array_valores = array("'$game_ID'","'$facebook_ID'","'$write_level'","'$winner_candidate_ID'","'$voter_winner_friends'","'$loser_candidate_ID'","'$voter_loser_friends'","'$vote_date'","'$vote_time'","'$vote_delay'","'$birthday'","'$sex'","'$total_friends'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_country'","'$access_uf'","'$access_city'","'$access_loc'");
		if (!empty($_SESSION['voter_elenco_ID'])) {
			$voter_elenco_ID = $_SESSION['voter_elenco_ID'];
			$coluna = "voter_elenco_ID";
			$valor = "'$voter_elenco_ID'";
			array_push($array_colunas,$coluna);
			array_push($array_valores,$valor);
		}
		// echo $game_ID."<BR />".$page."<BR />".$view_level."<BR />".$progress."<BR />".$total_pages;
		// echo "<pre>";
		// print_r($array_colunas);
		// print_r($array_valores);
		// exit;
		$vote_id = insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
		if ($page <= $total_pages) {
			$progress++;
			header("Location: vote.php?game_ID=$game_ID&page=$page&level=$view_level&progress=$progress");
		}
		else {
			if ($view_level == 0){
				$page=1;
				$view_level = $max_level;
				$progress++;
				header("Location: vote.php?game_ID=$game_ID&page=$page&level=$view_level&progress=$progress");
			}
			else {
				$page=1;
				$view_level = $view_level - 1;
				$progress++;
				header("Location: vote.php?game_ID=$game_ID&page=$page&level=$view_level&progress=$progress");
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