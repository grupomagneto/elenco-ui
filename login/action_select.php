<?php
// header('Content-type: text/html; charset=ISO-8859-15');
include('db.php');
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
	$vote_date = date('Y-m-d');
	$vote_time = date('H:i:s');
	$vote_delay = microtime(true) - $vote_time_start;
	$sql2 = "INSERT INTO tb_votes (game_ID, voter_facebook_ID, level, winner_candidate_ID, loser_candidate_ID, vote_date, vote_time, vote_delay) VALUES ('$game_ID','$facebook_ID','$write_level','$winner_candidate_ID','$loser_candidate_ID','$vote_date','$vote_time','$vote_delay')";
	mysqli_query($link2, $sql2);
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