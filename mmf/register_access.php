<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';
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

        require_once 'colect_data.php';

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

        require_once("functions.php");

            // VERIFICA SE O USUARIO JÁ VOTOU ANTES PARA DEFINIR SE ATUALIZA OU INSERE
            $query_info = "SELECT facebook_ID FROM tb_voters WHERE facebook_ID = '$id'";
            $result = mysqli_query($link2, $query_info);
            $row = mysqli_fetch_array($result);
            $pre_id = $row['facebook_ID'];
            // SE O USUÁRIO JÁ VOTOU ANTES
            if ($pre_id == $id) {
                $nome_tabela = "tb_voters";
                $array_colunas = array("firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
                $array_valores = array("'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
                $condicao = "facebook_ID='$id'";
                atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
                // Atualiza ID do agenciado pelo email do facebook
                $id_query = "UPDATE tb_voters SET voter_elenco_ID = (SELECT tb_elenco.id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email LIMIT 1) WHERE EXISTS (SELECT id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email AND email != '' AND email != ' ' AND email IS NOT NULL)";
                mysqli_query($link2, $id_query);
                // Indica o player_facebook_ID se o usuário veio de um compartilhamento
                if (isset($_SESSION['share_ID'])) {
                    $share_ID = $_SESSION['share_ID'];
                    $nome_tabela = "tb_shares";
                    $array_colunas = array("player_facebook_ID");
                    $array_valores = array("'$pre_id'");
                    $condicao = "share_ID='$share_ID'";
                    atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
                }
            }
            // SE O USUÁRIO AINDA NÃO VOTOU
            elseif ($pre_id == NULL || $pre_id == '') {
                // INSERE DADOS NA TABELA TB_VOTERS
                $nome_tabela = "tb_voters";
                $array_colunas = array("facebook_ID","firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
                $array_valores = array("'$id'","'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
                insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
                // VERIFICA SE JÁ EXISTE E SE ENCONTROU MAIS DE UM E-MAIL IGUAL AO RECEBIDO PELO FACEBOOK EM TB_GAMES
                $sql_email = "SELECT ID, email, COUNT(email) AS total FROM tb_games WHERE email='$email'";
                $result = mysqli_query($link2, $sql_email);
                $row = mysqli_fetch_array($result);
                $total = $row['total'];
                if ($total > 1) {
                    $facebook_name = $firstname." ".$lastname;
                    $sql_email2 = "SELECT ID FROM tb_games WHERE email='$email' AND stagename='$facebook_name'";
                    $result2 = mysqli_query($link2, $sql_email2);
                    $row2 = mysqli_fetch_array($result2);
                    // UPDATE OS DADOS DO CANDIDATO NA TABELA TB_GAMES
                    if ($row2['ID']) {
                        $tb_games_ID = $row2['ID'];
                        $nome_tabela = "tb_games";
                        $array_colunas = array("candidate_facebook_ID","firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
                        $array_valores = array("'$id'","'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
                        $condicao = "ID='$tb_games_ID'";
                        atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
                    } else {
                        echo "Erro. Mais de um usuário cadastrado com o mesmo e-mail. Por favor entre em contato pelo telefone: (61) 99311-0767.";
                    }
                }
                // UPDATE OS DADOS DO CANDIDATO NA TABELA TB_GAMES
                elseif ($total == 1) {
                    $tb_games_ID = $row['ID'];
                    $nome_tabela = "tb_games";
                    $array_colunas = array("candidate_facebook_ID","firstname","lastname","email","sex","total_friends","birthday","device","os","browser","resolution","viewport","model","user_agent","ip","access_city","access_uf","access_country","access_loc");
                    $array_valores = array("'$id'","'$firstname'","'$lastname'","'$email'","'$sex'","'$total_friends'","'$birthday'","'$device'","'$os'","'$browser'","'$resolution'","'$viewport'","'$model'","'$user_agent'","'$ip'","'$access_city'","'$access_uf'","'$access_country'","'$access_loc'");
                    $condicao = "ID='$tb_games_ID'";
                    atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
                }
                // ATUALIZA O ID_ELENCO DO CANDIDATO EM TB_VOTERS SE O E-MAIL CADASTRADO FOR O MESMO DO FACEBOOK
                $id_query = "UPDATE tb_voters SET voter_elenco_ID = (SELECT tb_elenco.id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email LIMIT 1) WHERE EXISTS (SELECT id_elenco FROM tb_elenco WHERE tb_elenco.email = tb_voters.email AND email != '' AND email != ' ' AND email IS NOT NULL)";
                mysqli_query($link2, $id_query);
                // ATUALIZA O PLAYER_FACEBOOK_ID SE O USUÁRIO VEIO DE UM COMPARTILHAMENTO
                if (isset($_SESSION['share_ID'])) {
                    $share_ID = $_SESSION['share_ID'];
                    $nome_tabela = "tb_shares";
                    $array_colunas = array("player_facebook_ID");
                    $array_valores = array("'$pre_id'");
                    $condicao = "share_ID='$share_ID'";
                    atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
                }
            }
            else {
                $msg = mysqli_error($link2);
                echo $msg;
            }
        mysqli_close($link2);
        // ACESSO REGISTRADO, SEGUE PARA PRÓXIMA ETAPA
        header('location: game.php');
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            header('location: game.php');
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/mmf/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>