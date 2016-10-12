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
      $user_firstname = $_SESSION['firstname'];
echo "
<!DOCTYPE html>
<html lang='pt-br'>
<head>
  <meta charset='UTF-8'>
  <title>Meu Modelo Favorito por Magneto Elenco</title>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
  <link rel='stylesheet' href='stylesheets/questions.css'>
</head>
<body>
<form action='before_questions.php' method='post'>
  <div class='gradient container'>
    <div class='box'>
      <h1 class='pergunta__selection font-family color-font'>
        Olá $user_firstname, qual dos seus amigos você gostaria de ajudar hoje?
      </h1>
    </div>";
    $friends = $_SESSION['array_friends'];
    echo '<div class="box-outline_selection longhand">';
    foreach ($friends as $array) {
        $friend_ID    = $array[0];
        $name         = $array[1];
        $photo        = $array[2];
            echo '<div class="selection-item">';
            echo '<button class="pointer" type="submit" name="friend_ID" value="'.$friend_ID.'"><img src="http://www.magnetoelenco.com.br/fotos/'.$photo.'" alt=" "></button>';
            echo '<div class="selection-item__text">';
            echo '<p class="font-family color-font">'.$name.'</p>';
            echo '</div>';
            echo '</div>';
      }
    echo '</div>';
echo "
</div>
</form>

<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/questions.js'></script>
  
</body>
</html>";
// Fim do cabecalho FB
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/mmf/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>