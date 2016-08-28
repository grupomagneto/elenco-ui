<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-type' content='text/html; charset=UTF-8' />
<title>Resultado Parcial Meu Modelo Favorito</title>
</head><body>
<?php
include('conecta.php');
$sql_winners = "SELECT winner_candidate_ID, COUNT(*) AS times FROM tb_votes WHERE game_ID = '$game_ID' AND level = '1' GROUP BY winner_candidate_ID ORDER BY times DESC";
$result_winners = mysqli_query($link2, $sql_winners);
$n = 1;
	while ($row_winners = mysqli_fetch_array($result_winners)) {
		${"winners_ID".$n} = $row_winners['winner_candidate_ID'];
		$winner = ${"winners_ID".$n};
		$sql = "SELECT COUNT(*) AS total_wins FROM tb_votes WHERE game_ID = '$game_ID' AND level = '1' AND winner_candidate_ID = '$winner'";
		$result = mysqli_query($link2, $sql);
		$row = mysqli_fetch_array($result);
		${"total_wins".$n} = $row['total_wins'];
		$sql = "SELECT tb_votes.winner_candidate_ID, tb_elenco.nome_artistico winner_name, tb_foto.arquivo winner_photo FROM tb_votes INNER JOIN tb_elenco ON tb_votes.winner_candidate_ID = tb_elenco.id_elenco INNER JOIN tb_foto ON tb_votes.winner_candidate_ID = tb_foto.cd_elenco WHERE game_ID = '$game_ID' AND winner_candidate_ID = '$winner' ORDER BY dh_cadastro ASC LIMIT 0, 1";
		$result = mysqli_query($link2, $sql);
		$row = mysqli_fetch_array($result);
		${'winner_name'.$n} = $row['winner_name'];
		${'winner_photo'.$n} = $row['winner_photo'];
		$n++;
	}
$sql_total = "SELECT COUNT(*) AS total FROM tb_votes WHERE game_ID = '$game_ID' AND level = '1'";
$result_total = mysqli_query($link2, $sql_total);
$row_total = mysqli_fetch_array($result_total);
$total = $row_total['total'];

$percent1 = $total_wins1 / $total * 100;
$percent2 = $total_wins2 / $total * 100;

echo "
<div><center><img src='http://www.magnetoelenco.com.br/fotos/$winner_photo1' class='foto' width=100px height=100px>
<p>$winner_name1</p></center>

<div class='progress'>
<progress id='progressbar98' value='$percent1' max='100'></progress></div>


<center><img src='http://www.magnetoelenco.com.br/fotos/$winner_photo2' class='foto' width=100px height=100px>
<p>$winner_name2</p></center>

<div class='progress'>
<progress id='progressbar99' value='$percent2' max='100'></progress></div></div>
";
mysqli_close($link2);
?>
</div>
</body>
</html>