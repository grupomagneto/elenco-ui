<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';
include 'functions.php';
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

        // IF HE IS A CLIENT
        if(!empty($_SESSION['voter_elenco_ID'])) {
        	$voter_elenco_ID = $_SESSION['voter_elenco_ID'];
        	$facebook_ID = $_SESSION['id'];
			$nome_tabela = "tb_voters";
			$array_colunas = array("candidate");
			$array_valores = array("'yes'");
			$condicao = "facebook_ID='$facebook_ID'";
			atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
			header('location: success_candidate.php');
			exit();
        }
        // IF HE ISN'T A CLIENT
        if (empty($_SESSION['voter_elenco_ID'])) {
        	header('location: http://cadastro.magnetoelenco.com.br');
        	exit();
        }
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