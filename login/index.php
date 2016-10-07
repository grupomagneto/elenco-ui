<?php
include 'detect_share.php';

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
      header('location: home.php');
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();

            require 'bootstrap.php';
            $helper = $fb->getRedirectLoginHelper();
            $permissions = ['email,user_friends,user_birthday']; //permissões do usuario
            $loginUrl = $helper->getLoginUrl('http://www.meumodelofavorito.com.br/login-callback.php', $permissions);

            echo "
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Meu Modelo Favorito por Magneto Elenco</title>
  <!-- Latest compiled and minified CSS -->
  <link rel='stylesheet' href='stylesheets/site.css'>
  <link rel='stylesheet' href='stylesheets/swiper.min.css'>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
</head>
<body> 
<div class='swiper-container'>
  <div class='swiper-wrapper'>
    <div class='footer-index'>
      <div class='swiper-pagination'></div>
    </div>
    <div class='swiper-slide gradient-slide_first'>
      <div class='image-slide'>
        <div class='image-game'> <img src='images/image-1.svg' alt=''></div>
      </div> 
      <p class='content-slide bottom-image font-family color-font medium'>
       Ajude seus amigos a participarem de propagandas
      </p>

      <div class='jump font-family color-font medium'>
        <p><a href='#4'>Pular introdução</a></p>
      </div>
    </div>
    <div class='footer-index'>
      <div class='swiper-pagination'></div>
    </div>
    <div class='swiper-slide gradient-slide_second'>
      <div class='image-slide'>
        <div class='image-game'> <img src='images/image-1.svg' alt=''></div>
      </div> 
      <p class='content-slide font-family color-font medium'>
        Vote nos melhores perfis para campanhas em sua cidade
      </p>

      <div class='jump font-family color-font medium'>
        <p>Pular introdução</p>
      </div>
    </div>
    <div class='footer-index'>
      <div class='swiper-pagination'></div>
    </div>
    <div class='swiper-slide gradient-slide_third'>
      <div class='image-slide'>
        <div class='image-game'> <img src='images/image-1.svg' alt=''></div>
      </div> 
      <p class='content-slide font-family color-font medium'>
        Os perfis mais votados são apresentados aos anunciantes
      </p>

      <div class='jump font-family color-font medium'>
        <p>Pular introdução</p>
      </div>
    </div>
    <div id='4' class='swiper-slide gradient-slide_fourth'>
      <div class='image-slide'>
        <div class='image-game'> <img src='images/image-1.svg' alt=''></div>
      </div><a href=" . $loginUrl . "><button class='button-login button button-medium'>
        <div class='button-login_image'>
          <img src='images/fb.svg' />
        </div>
        <div class='button-login_content'>
          <p class='font-family color-font medium'>
            Entrar com Facebook
          </p>
        </div>
      </button></a>
     <a href='privacidade.html' target='_blank' class='content-slide privacy font-family color-font'>Política de Privacidade</a>
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

        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
