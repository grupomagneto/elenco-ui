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

$page_time_in  			= microtime(true);
$from_page				= $_SESSION['from_page'];
$page_from_time_in		= $_SESSION['page_from_time_in'];
$access_ID				= $_SESSION['access_ID'];
$facebook_ID			= $_SESSION['id'];
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
$time_spent				= $page_time_in - $page_from_time_in;

$nome_tabela = "tb_access";
$array_colunas = array("facebook_ID","page","from_page","device","os","browser","resolution","viewport","model","user_agent","ip","access_country","access_uf","access_city","access_loc");
$array_valores = array("'$facebook_ID'","'$page'","'$from_page'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_country'","'$access_uf'","'$access_city'","'$access_loc'");

$update1 = "UPDATE tb_access SET facebook_ID='{$facebook_ID}', time_spent='{$time_spent}' WHERE access_ID='{$access_ID}'";
mysqli_query($link2, $update1);

// insere os dados e retorna o id da linha
$access_ID = insereDados($link2, $nome_tabela, $array_colunas, $array_valores);

unset($_SESSION['from_page']);
unset($_SESSION['page_from_time_in']);
unset($_SESSION['access_ID']);
$_SESSION['from_page'] 			= $page;
$_SESSION['page_from_time_in']	= $page_time_in;
$_SESSION['access_ID']			= $access_ID;

} else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            // header('location: /home.php');
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
            exit();
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>