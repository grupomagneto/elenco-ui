<?php
include('functions.php');
date_default_timezone_set('America/Sao_Paulo');
	$winner_candidate_ID = $_POST['candidate_elenco_ID'];
	$loser_candidate_ID = $_POST['loser_candidate_ID'];
	$game_ID = $_POST['game_ID'];
	$facebook_ID = $_POST['facebook_ID'];
	$vote_time_start = $_POST['vote_time_start'];
	$page = $_POST['page'];
	$total_pages = $_POST['total_pages'];
	$progress = $_POST['progress'];
	$write_level = $_POST['write_level'];
	$max_level = $_POST['max_level'];
	$view_level = $_POST['view_level'];
	$voter_winner_friends = $_POST['voter_winner_friends'];
	$voter_loser_friends = $_POST['voter_loser_friends'];
	$hoje = date('Y-m-d H:i:s', time());
	$vote_delay = microtime(true) - $vote_time_start;
	$nome_tabela = "tb_votes";
	$array_colunas = array('game_ID','voter_facebook_ID','level','winner_candidate_ID','voter_winner_friends','loser_candidate_ID','voter_loser_friends','timestamp','vote_delay');
	$array_valores = array("'$game_ID'","'$facebook_ID'","'$write_level'","'$winner_candidate_ID'","'$voter_winner_friends'","'$loser_candidate_ID'","'$voter_loser_friends'","'$hoje'","'$vote_delay'");
	insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
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
?>