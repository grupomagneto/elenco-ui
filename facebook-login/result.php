<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-type' content='text/html; charset=UTF-8' />
<title>Resultado Parcial Meu Modelo Favorito</title>
<link rel="stylesheet" href="stylesheets/site.css">
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

<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Home</title>
	<link rel='stylesheet' href='stylesheets/site.css'>
	<link rel='stylesheet' href='stylesheets/swiper.min.css'>
</head>


<body>


  <div class='swiper-wrapper'>
    <div class='swiper-slide gradient'>
 	<h1 class='pergunta font-family color-font medium '>
        Obrigado por votar! <br /> Veja como está a classificação:
      </h1>
	<div class='row result-one'>

	<img src='http://www.magnetoelenco.com.br/fotos/$winner_photo1' class='foto' width=100px height=100px>
		<p>$winner_name1</p>

		<div class='progress progress-result'>
			<progress id='progressbar98' value='$percent1' max='100'></progress>
		</div>
	</div>


	<div class='row result-two'>
		<img src='http://www.magnetoelenco.com.br/fotos/$winner_photo2' class='foto' width=100px height=100px>
		<p>$winner_name2</p>

		<div class='progress  progress-result'>
			<progress id='progressbar99' value='$percent2' max='100'></progress>
		</div>

	</div>

  
     <button class='button-login button button-medium button-result'>
        <div class='button-login_image'>
          <img src='images/fb.svg' />
        </div>
        <div class='button-login_content'>
          <p class='font-family color-font medium'>
           Convidar seus amigos
          </p>
        </div>
      </button>
     
    </div>

    </div>
 </div>



</body>


<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/swiper.jquery.min.js'></script>
<script src='javascripts/swiper.min.js'></script>
<script src='javascripts/progressbar.min.js'></script>
<script src='javascripts/all.js'></script>;


";


mysqli_close($link2);
?>
</div>
</body>
</html>