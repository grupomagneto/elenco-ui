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
        if (!isset($_SESSION['answers'])) {
            $_SESSION['answers'] = 2;
        }

		// DETECTA SE O USUÁRIO JÁ COMPLETOU O CADASTRO E CASO NÃO, DIRECIONA PARA A PÁGINA INCOMPLETA
		$first  = 1;
		while ($first <= $max) {
			if ($first == $max) {
				// SE O GAME ESTA DEFINIDO AVANÇA
				if (isset($_SESSION['game_ID'])) {
					header('location: before_vote.php');
				    exit();
				}
				// SE O GAME NÃO ESTÁ DEFINIDO VAI PARA CHOOSE_GAME.PHP
				else {
					header('location: choose_game.php');
	                exit();
				}
			    
			} else {
				// DEFINE A PRÓXIMA PÁGINA E VAI PARA BEFORE_QUESTIONS.PHP
				if (${'question'.$first} == NULL || ${'question'.$first} == '') {
					$_SESSION['first_question'] = ${"page".$first}.".php";
				    header('location: before_questions.php');
				    exit();          
				} else {
			    $first++;
			  }
			}
		}
		// Fim da Function
mysqli_close($link2);
// Fim do cabecalho FB
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/mmf/index.php');
            header('location: '.$url.'');
            exit();
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>