<?php
// IF EMAIL ALSO EXISTS IN TB_GAMES
$sql_check = "SELECT COUNT(email) AS total FROM tb_games WHERE email='$email'";
$result = mysqli_query($link2, $sql_check);
$row = mysqli_fetch_array($result);
$email_TB_GAMES = $row['total'];
if ($email_TB_GAMES > 0) {
	// UPDATE TB_GAMES WITH FACEBOOK DATA (ALL GAMES WHERE THE USER IS LISTED)
	$nome_tabela = "tb_games";
	$array_colunas = array("candidate_facebook_ID","total_friends","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
	$array_valores = array("'$id'","'$total_friends'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
	$condicao = "email='$email'";
	$last_ID = atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
}
?>