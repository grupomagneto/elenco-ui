<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';
// include 'functions.php';
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
        include 'register_page.php';
        
// include('db.php');
if (isset($_SESSION['game_ID'])) { $game_ID = $_SESSION['game_ID']; }
$sql_winners = "SELECT winner_candidate_ID, COUNT(*) AS times FROM tb_votes WHERE game_ID = '$game_ID' AND level = '1' GROUP BY winner_candidate_ID ORDER BY times DESC";
$result_winners = mysqli_query($link2, $sql_winners);
$n = 1;
while ($row_winners = mysqli_fetch_array($result_winners)) {
	${"winners_ID".$n} = $row_winners['winner_candidate_ID'];
	$winner = ${"winners_ID".$n};
	${"total_wins".$n} = $row_winners['times'];
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
$percent1 = number_format((float)$percent1, 1, '.', '');

if (isset($total_wins2)) {
	$percent2 = $total_wins2 / $total * 100;
	$percent2 = number_format((float)$percent2, 1, '.', '');
}
if (isset($total_wins3)) {
	$percent3 = $total_wins3 / $total * 100;
	$percent3 = number_format((float)$percent3, 1, '.', '');
}
mysqli_close($link2);

echo "
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-type' content='text/html; charset=UTF-8' />
<title>Resultado Parcial Meu Modelo Favorito</title>
<link rel='stylesheet' href='stylesheets/site.css'>
</head><body>
	<link rel='stylesheet' href='stylesheets/site.css'>
	<link rel='stylesheet' href='stylesheets/swiper.min.css'>
  	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
	</head>
<body>
  <div class='swiper-wrapper'>
    <div class='swiper-slide gradient'>
    <h1 class='font-family color-font large voto_registrado'>Voto registrado!</h1>
 	<h1 class='pergunta font-family color-font medium '>
        Confira o resultado parcial e convide seus amigos para votar também:
      </h1>
	<div class='row result-one'>
	<img src='http://www.magnetoelenco.com.br/fotos/$winner_photo1' class='foto' width=120px height=120px>
		<div class='progress progress-result'>
			<progress id='progressbar98' value='$percent1' max='100'></progress>
		</div>
				<div class='percent'>
			<p>$percent1%</p>
		</div>
	</div>";
	if (isset($winner_photo2)) {
		echo "
		<div class='row result-two'>
		<img src='http://www.magnetoelenco.com.br/fotos/$winner_photo2' class='foto' width=120px height=120px>
		<div class='progress  progress-result'>
			<progress id='progressbar99' value='$percent2' max='100'></progress>
		</div>
				<div class='percent'>
			<p>$percent2%</p>
		</div>
		</div>";
	}
	if (isset($winner_photo3)) {
		echo "
		<div class='row result-three'>
		<img src='http://www.magnetoelenco.com.br/fotos/$winner_photo3' class='foto' width=120px height=120px>

		<div class='progress  progress-result'>
			<progress id='progressbar97' value='$percent3' max='100'></progress>
		</div>
		<div class='percent'>
			<p>$percent3%</p>
		</div>";
	}
	echo "
	</div>
  <a href='create_share_image.php' target='_blank'>  

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
  </a>
   
    </div>

    </div>
 </div>
<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/swiper.jquery.min.js'></script>
<script src='javascripts/swiper.min.js'></script>
<script src='javascripts/progressbar.min.js'></script>
<script src='javascripts/all.js'></script>
</body>
</html>";
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