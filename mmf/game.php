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
        // $page = basename(__FILE__);
        // require_once 'register_page.php';

// SE JÁ ESTÁ DEFINIDO O GAME
if (isset($_SESSION['game_ID'])) {
    $game_ID = $_SESSION['game_ID'];
    $id = $_SESSION['id'];
    // DETECTA SE O USUÁRIO JÁ DEU ALGUM VOTO NO GAME
    $sql_id = "SELECT voter_facebook_ID FROM tb_votes WHERE game_ID = '$game_ID' AND voter_facebook_ID = '$id' LIMIT 1";
    $result_id = mysqli_query($link2, $sql_id);
    $row_id = mysqli_fetch_array($result_id);
    $registered_vote = $row_id['voter_facebook_ID'];
    if ($registered_vote == $id) {
        header('location: result.php');
        exit();
    } else {
        // SE JÁ ESTÁ DEFINIDO O FRIEND => PROFILE.PHP
        if (isset($_SESSION['candidate_ID'])) {
            header('location: profile.php');
            exit();
        }
        // SE NÃO ESTÁ DEFINIDO O FRIEND
        else {
            // VERIFICA SE EXISTEM AMIGOS E CONSTROI UM ARRAY
            $friends = $_SESSION['friends'];
            $array_friends = array();
            foreach ($friends as $f) {
                $array = selectFriends($link2, $f['id']);
                // RECONSTROI O ARRAY LIMPO
                if ($array[0] > 1) {
                    $friend_ID = $array[0];
                    array_push($array_friends, $array);
                }
            }
            if ($friend_ID != '' && $friend_ID != NULL) {
                $_SESSION['array_friends'] = $array_friends;
                header('location: choose_candidate.php');
                exit();
            }
            // SE NÃO TEM AMIGOS CADASTRADOS
            else {
                header('location: choose_game.php');
                exit();
            }            
        }
    }
}
// SE NÃO ESTÁ DEFINIDO O GAME
elseif (!isset($_SESSION['game_ID'])) {
    // VERIFICA SE EXISTEM AMIGOS E CONSTROI UM ARRAY
    $friends = $_SESSION['friends'];
    $array_friends = array();
    foreach ($friends as $f) {
        $array = selectFriends($link2, $f['id']);
        if ($array[0] > 1) {
            $friend_ID = $array[0];
            array_push($array_friends, $array);
        }
    }
    // SE TEM AMIGOS CADASTRADOS
    if ($friend_ID != '' && $friend_ID != NULL) {
        $_SESSION['array_friends'] = $array_friends;
        header('location: choose_candidate.php');
        exit();
    }
    // SE NÃO TEM AMIGOS CADASTRADOS
    else {
        header('location: choose_game.php');
        exit();
    }   
}
mysqli_close($link2);
// Fim do cabecalho FB
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
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