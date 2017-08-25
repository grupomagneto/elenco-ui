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

        $user = $fb->User()->get($_SESSION['facebook_access_token']);
        $_SESSION['id'] = $user->getId();
        $_SESSION['firstname'] = $user->getFirstName();
        $_SESSION['lastname'] = $user->getLastName();
        $_SESSION['gender'] = $user->getGender();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['link'] = $user->getLink();
        $_SESSION['birthday'] = $user->getProperty('birthday')->format('Y-m-d');
        $_SESSION['friends'] = $user->getProperty('friends');
        $_SESSION['total_count'] = $user->getProperty('friends')->getTotalCount();
        // echo "<pre>";
        // print_r($_SESSION['friends']);
        // exit();

        require_once('colect_data.php');

        $id                 = $_SESSION['id'];
        $firstname          = $_SESSION['firstname'];
        $lastname           = $_SESSION['lastname'];
        $email              = $_SESSION['email'];
        $sex                = $_SESSION['gender'];
        $link               = $_SESSION['link'];
        $birthday           = $_SESSION['birthday'];
        $device             = $_SESSION['device'];
        $os                 = $_SESSION['os'];
        $browser            = $_SESSION['browser'];
        $resolution         = $_SESSION['resolution'];
        $viewport           = $_SESSION['viewport'];
        $model              = $_SESSION['model'];
        $user_agent         = $_SESSION['user_agent'];
        $ip                 = $_SESSION['ip'];
        $access_city        = $_SESSION['access_city'];
        $access_uf          = $_SESSION['access_uf'];
        $access_country     = $_SESSION['access_country'];
        $access_loc         = $_SESSION['access_loc'];
        $total_friends      = $_SESSION['total_count'];

        $page = basename(__FILE__);
        require_once 'register_page.php';

        $hoje = date('Y-m-d H:i:s', time());

// *******************************
// ** ATUALIZA COMPARTILHAMENTO **
// *******************************
// UPDATES FACEBOOK_ID INTO TB_SHARES
if (!empty($_SESSION['share_ID'])) {
    $share_ID = $_SESSION['share_ID'];
    $nome_tabela = "tb_shares";
    $array_colunas = array("player_facebook_ID");
    $array_valores = array("'$id'");
    $condicao = "share_ID='$share_ID'";
    atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
}
// ***************
// ** TB_VOTERS **
// ***************
$sql = "SELECT facebook_ID, voter_elenco_ID FROM tb_voters WHERE facebook_ID='$id'";
$result = mysqli_query($link2, $sql);
$row = mysqli_fetch_array($result);
// IF USER HAS VOTED BEFORE
if (!empty($row['facebook_ID']) && $row['facebook_ID'] != NULL && $row['facebook_ID'] != '' && $row['facebook_ID'] != ' ') {
    //UPDATES DATA IN TB_VOTERS
    $nome_tabela = "tb_voters";
    $array_colunas = array("firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc","insert_date");
    $array_valores = array("'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'","'$hoje'");
    $condicao = "facebook_ID='$id'";
    atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
    // IF USER IS ALREADY A CLIENT
    if ($row['voter_elenco_ID']) {
        // SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
        $_SESSION['voter_elenco_ID'] = $row['voter_elenco_ID'];
    }
    // CHECKS IF EMAIL ALSO EXISTS IN TB_GAMES AND UPDATES IT IF POSITIVE
    include 'update_tb_games.php';
}
// IF USER HAS NEVER VOTED BEFORE
else {
    // INSERTS DATA IN TB_VOTERS
    $nome_tabela = "tb_voters";
    $array_colunas = array("facebook_ID","firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
    $array_valores = array("'$id'","'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
    insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
    // CHECKS IF USER IS ALREADY A CLIENT
    $id_query = "UPDATE tb_voters SET voter_elenco_ID = (SELECT tb_elenco.id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email LIMIT 1) WHERE EXISTS (SELECT id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email AND email != '' AND email != ' ' AND email IS NOT NULL)";
    mysqli_query($link2, $id_query);
    $sql_elenco_ID = "SELECT voter_elenco_ID FROM tb_voters WHERE facebook_ID = '$id'";
    $result_ID = mysqli_query($link2, $sql_elenco_ID);
    if ($row_ID = mysqli_fetch_array($result_ID)) {
        // SETS VOTER AS A PRE-EXISTING AGENCY CLIENT
        $_SESSION['voter_elenco_ID'] = $row_ID['voter_elenco_ID'];
    }
    // IF EMAIL NOT FOUND ON TB_ELENCO, ASKS IF THE USER IS ALREADY A CLIENT
    if (empty($_SESSION['voter_elenco_ID'])) {
        require_once 'detect_existing_client.php';
        // UPDATES VOTER_ELENCO_ID ON TB_VOTERS
        if (!empty($_SESSION['voter_elenco_ID'])) {
            $voter_elenco_ID = $_SESSION['voter_elenco_ID'];
            $array_colunas = array("voter_elenco_ID");
            $array_valores = array("'$voter_elenco_ID'");
            $condicao = "facebook_ID='$id'";
            atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
        }
    }
}
mysqli_close($link2);
// ACESSO REGISTRADO, SEGUE PARA PRÓXIMA ETAPA
header('location: game.php');
} else {
    if (!empty($_GET['code']) and !empty($_GET['state'])) {
        $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
        header('location: game.php');
    } else {
        $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
        header('location: '.$url.'');
    }
}
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>
