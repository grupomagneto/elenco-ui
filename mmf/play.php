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

        $id = $_SESSION['id'];

        $per_page=2;
        $vote_time_start = microtime(true);
        if (isset($_SESSION['game_ID'])) { $game_ID = $_SESSION['game_ID']; }
        else { header('location: choose_game.php'); exit(); }

        

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