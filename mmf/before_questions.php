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
        // IF GAME'S AND FRIEND'S ID ARE SET FROM SHARE
        if (!empty($_SESSION['candidate_ID']) && !empty($_SESSION['game_ID'])) {
			$game_ID = $_SESSION['game_ID'];
			$friend_ID = $_SESSION['candidate_ID'];
        }
        // IF FRIEND WAS SET FROM CHOICE
    	if (!empty($_POST['friend_ID'])) {
			$_SESSION['friend_ID'] = $_POST['friend_ID'];
			$friend_ID = $_POST['friend_ID'];
			$sql_game = "SELECT COUNT(game_ID) AS total FROM tb_games WHERE candidate_elenco_ID='$friend_ID'";
	        $result = mysqli_query($link2, $sql_game);
	        $row = mysqli_fetch_array($result);
	        $total  = $row['total'];
	        if ($total == 1) {
	        	$sql_ID = "SELECT game_ID FROM tb_games WHERE candidate_elenco_ID='$friend_ID'";
		        $result = mysqli_query($link2, $sql_ID);
		        $row = mysqli_fetch_array($result);
	        	$_SESSION['game_ID'] = $row['game_ID'];
	        }
	   //      if ($total > 1) {
	   //      	header('location:choose_game.php');
				// exit();
	   //      }
		}
		// IF GAME WAS SET FROM CHOICE
		if (!empty($_POST['game_ID'])) {
			$_SESSION['game_ID'] = $_POST['game_ID'];
			// header('location:before_vote.php');
			// exit();
		}
		// ASKS TO FUFILL PROFILE
	    if (empty($_SESSION['first_question'])) {
		    $id = $_SESSION['id'];
			$query_info = "SELECT * FROM tb_voters WHERE facebook_ID = '$id'";
	        $result = mysqli_query($link2, $query_info);
	        $row = mysqli_fetch_array($result);

	        $question1  = $row['transportation'];
	        $question2  = $row['scholarity'];
	        $question3  = $row['cep'];
	        $question4  = $row['pet'];
	        $question5  = $row['physical_activity'];
	        $question6  = $row['tech_level'];
	        $question7  = $row['social_network'];
	        $question8  = $row['music'];
	        $question9  = $row['children'];
	        $question10 = $row['diet'];
	        $question11 = $row['traveling'];
	        $question12 = $row['travel_motive'];
	        $question13 = $row['gastronomy'];
	        $question14 = $row['occupation'];
	        $question15 = $row['relationship_status'];

	        $page1  = "transportation";
	        $page2  = "scholarity";
	        $page3  = "cep";
	        $page4  = "pet";
	        $page5  = "physical_activity";
	        $page6  = "tech_level";
	        $page7  = "social_network";
	        $page8  = "music";
	        $page9  = "children";
	        $page10 = "diet";
	        $page11 = "traveling";
	        $page12 = "travel_motive";
	        $page13 = "gastronomy";
	        $page14 = "occupation";
	        $page15 = "relationship_status";

	        $max     = 15;

	        // DEFINE O NÚMERO DE PERGUNTAS A SEREM RESPONDIDAS POR ACESSO
	        if (empty($_SESSION['answers'])) {
	            $_SESSION['answers'] = 2;
	        }

			// DETECTA SE O USUÁRIO JÁ COMPLETOU O CADASTRO E CASO NÃO, DIRECIONA PARA A PÁGINA INCOMPLETA
			$first  = 1;
			while ($first <= $max) {
				if ($first == $max) {
					// SE O GAME ESTA DEFINIDO AVANÇA
					if (!empty($_SESSION['game_ID'])) {
						header('location: before_vote.php');
					    exit();
					}
					// SE O GAME NÃO ESTÁ DEFINIDO VAI PARA CHOOSE_GAME.PHP
					else {
						header('location: choose_game.php');
		                exit();
					}  
				}
				else {
					// DEFINE A PRÓXIMA PÁGINA E VAI PARA BEFORE_QUESTIONS.PHP
					if (${'question'.$first} == NULL || ${'question'.$first} == '') {
						$first_question = ${"page".$first}.".php";
						$_SESSION['first_question'] = ${"page".$first}.".php";
						goto a;     
					}
					else {
					    $first++;
					}
				}
			}
	    }
	    a:
	    $first_question = $_SESSION['first_question'];
	    $ballon = "";
	    $photo = "";
        // IF USER IS A CLIENT
        if (!empty($_SESSION['voter_elenco_ID'])) {
        	$voter_elenco_ID = $_SESSION['voter_elenco_ID'];
			// IF USER IS VOTING FOR HIMSELF
			if ($friend_ID == $voter_elenco_ID) {
				$sql_photo = "SELECT arquivo photo FROM tb_foto WHERE cd_elenco='$voter_elenco_ID' ORDER BY dh_cadastro ASC LIMIT 0, 1";
				$result = mysqli_query($link2, $sql_photo);
		        $row = mysqli_fetch_array($result);
		        $photo  = $row['photo'];
		        $photo = "<div class='box-before__question'><img src='http://www.magnetoelenco.com.br/fotos/$photo' alt='' /></div>";
				// IF USER IS VOTING FOR HIMSELF AFTER DECLARING HE'S A CLIENT
				if (!empty($_SESSION['client_prompt']) && $_SESSION['client_prompt'] == 'sim') {
					$text = "Cadastro localizado! ";
				}
				// IF USER IS VOTING FOR HIMSELF AUTOMATICALLY DETECTED
				else {
					$firstname = $_SESSION['firstname'];
					$text = "Oi $firstname! ";
				}
				$text .= "Antes de votar, responda a estas 3 perguntas sobre você:";
			}
			// IF USER IS VOTING FOR A FRIEND
			if ($friend_ID != $voter_elenco_ID) {
				$sql_photo = "SELECT id, firstname, arquivo photo, sex FROM (SELECT firstname, candidate_elenco_ID id, sex FROM tb_games WHERE candidate_elenco_ID='$friend_ID') T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
				$result = mysqli_query($link2, $sql_photo);
		        $row = mysqli_fetch_array($result);
		        $photo  = $row['photo'];
		        $photo = "<div class='box-before__question'><img src='http://www.magnetoelenco.com.br/fotos/$photo' alt='' /></div>";
		        $firstname  = $row['firstname'];
		        $sex  = $row['sex'];
				if ($sex == 'f' || $sex == 'F') {
					$article = 'a';
				}
				elseif ($sex == 'm' || $sex == 'M') {
					$article = 'o';
				}
	    		$text = "Antes de ajudar ".$article." ".$firstname.", responda a 3 perguntas sobre você:";
	    		$ballon = "<div class='box-before__question-valeu'><img src='images/valeu.svg' alt='' class='animated zoomIn' /></div>";
			}
			// IF USER IS VOTING FOR NO FRIEND
			if (empty($_SESSION['friend_ID']) && empty($_SESSION['candidate_ID']) && empty($friend_ID)) {
				$text = "Antes de votar, responda a estas 3 perguntas sobre você:";
			}
        }
        // IF USER ISN'T A CLIENT
        if (empty($_SESSION['voter_elenco_ID'])) {
			// IF USER IS VOTING FOR A FRIEND
			if (isset($friend_ID)) {
				$sql_photo = "SELECT id, firstname, arquivo photo, sex FROM (SELECT firstname, candidate_elenco_ID id, sex FROM tb_games WHERE candidate_elenco_ID='$friend_ID') T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
				$result = mysqli_query($link2, $sql_photo);
		        $row = mysqli_fetch_array($result);
		        $photo  = $row['photo'];
		        $photo = "<div class='box-before__question'><img src='http://www.magnetoelenco.com.br/fotos/$photo' alt='' /></div>";
		        $firstname  = $row['firstname'];
		        $sex  = $row['sex'];
				if ($sex == 'f' || $sex == 'F') {
					$article = 'a';
				}
				elseif ($sex == 'm' || $sex == 'M') {
					$article = 'o';
				}
	    		$text = "Antes de ajudar ".$article." ".$firstname.", responda a 3 perguntas sobre você:";
	    		$ballon = "<div class='box-before__question-valeu'><img src='images/valeu.svg' alt='' class='animated zoomIn' /></div>";
			}
			// IF USER IS VOTING FOR NO FRIEND
			if (empty($_SESSION['friend_ID']) && empty($_SESSION['candidate_ID']) && empty($friend_ID)) {
				$text = "Antes de votar, responda a estas 3 perguntas sobre você:";
			}
        }       
echo "
<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>Meu Modelo Favorito por Magneto Elenco</title>
  	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  	<link rel='stylesheet' href='stylesheets/animate.css'>
	<link rel='stylesheet' href='stylesheets/site.css'>
	<link rel='stylesheet' href='stylesheets/swiper.min.css'>
	<link rel='stylesheet' href='stylesheets/loading.css'>
</head>
<body>
<div id='loading' style='display: none' class='overlay'>
<div class='loader loader--style1' title='0'>
  <svg version='1.1' id='loader-1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
   width='40px' height='40px' viewBox='0 0 40 40' enable-background='new 0 0 40 40' xml:space='preserve'>
  <path opacity='0.2' fill='#000' d='M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z'/>
  <path fill='#000' d='M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
    C22.32,8.481,24.301,9.057,26.013,10.047z'>
    <animateTransform attributeType='xml'
      attributeName='transform'
      type='rotate'
      from='0 20 20'
      to='360 20 20'
      dur='0.5s'
      repeatCount='indefinite'/>
    </path>
  </svg>
  </div>
</div>
<form action='$first_question' method='post' id='form'>
	<div class='swiper-container'>
		<div class='swiper-wrapper'>
			<div class='swiper-slide gradient'>

			      <div class='box box-outline__content-after-login'>

			        <div class='row'>
			        	$photo
			        	$ballon
			        </div>

			        <div class='row'>
			          <p class='content-slide_after-login before_questions font-family color-font'>
			            $text
			          </p>
			        </div>

			        <div class='row'>
			          <input class='button button-medium font-family color-font medium' value='Responder' name='face' type='submit' onclick='showLoading()' />
			        </div>

			      </div>
			</div>
		</div>
	</div>
</form>
	<script src='javascripts/jquery-1.12.1.min.js'></script>
	<script src='javascripts/swiper.jquery.min.js'></script>
	<script src='javascripts/swiper.min.js'></script>
	<script src='javascripts/progressbar.min.js'></script>
	<script src='javascripts/all.js'></script>	
<script>
function showLoading() {
   document.getElementById('loading').style.display = 'block';
}
</script>
</body>
</html>";
mysqli_close($link2);
// Fim do cabecalho FB
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>