<?php
include 'detect_share.php';

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);

    if (!empty($_SESSION['facebook_access_token'])) {
      header('location: register_access.php');
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            header('location: register_access.php');
        } else {

            require 'bootstrap.php';
            $helper = $fb->getRedirectLoginHelper();
            $permissions = ['email,user_friends,user_birthday']; //permissões do usuario
            $loginUrl = $helper->getLoginUrl('http://www.meumodelofavorito.com.br/mmf/login-callback.php', $permissions);

            echo "
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Meu Modelo Favorito por Magneto Elenco</title>
  <!-- Latest compiled and minified CSS -->
  <link rel='stylesheet' href='stylesheets/site.css'>
  <link rel='stylesheet' href='stylesheets/swiper.min.css'>
  <link rel='stylesheet' href='stylesheets/loading.css'>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
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
      </div><a href=" . $loginUrl . "><button class='button-login button button-medium' onclick='showLoading()'>
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
<script>
function showLoading() {
   document.getElementById('loading').style.display = 'block';
}
</script>

</body>
</html>";

        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
