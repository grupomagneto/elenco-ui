<?php
  require __DIR__.'/vendor/autoload.php';
  require __DIR__.'/ids.php';
session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
    if (!empty($_SESSION['facebook_access_token'])) {
        $user = $fb->User()->get($_SESSION['facebook_access_token']);
        echo "
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Meu Modelo Favorito por Magneto Elenco</title>
	<link rel='stylesheet' href='stylesheets/site.css'>
	<link rel='stylesheet' href='stylesheets/swiper.min.css'>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
</head>
<body>
  <div class='swiper-wrapper'>
    <div class='swiper-slide gradient'>
      <div class='box  box-outline__content-after-login'>
        <div class='row'>
          <h1 class='content-slide_after-login font-family color-font medium style-font'>
            Pronto!
          </h1>
        </div>
        <div class='row'>
          <p class='content-slide_after-login font-family color-font medium'>
            Agora é só votar no perfil mais indicado para o papel.
          </p>
        </div>
        <div class='row'>
          <p class='content-slide_after-login font-family color-font medium'>
            Leia a pergunta e vote até o final para ajudar na escolha do seu(ua) amigo(a).
          </p>
        </div>
        <div class='row'>
          <a href='vote.php'><button class='button button-medium font-family color-font medium'>Começar a votação</button></a>
        </div>
      </div>
    </div>
 </div>
	<script src='javascripts/jquery-1.12.1.min.js'></script>
	<script src='javascripts/swiper.jquery.min.js'></script>
	<script src='javascripts/swiper.min.js'></script>
	<script src='javascripts/progressbar.min.js'></script>
	<script src='javascripts/all.js'></script>
<script>
	
var colors = new Array(
[165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
var colorIndices = [0,1,2,3];

var gradientSpeed = 0.001;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = 'rgb('+r1+','+g1+','+b1+')';

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = 'rgb('+r2+','+g2+','+b2+')';

  $(container).css({
    background: '-webkit-gradient(linear, left top, right top, from('+color1+'), to('+color2+'))'}).css({
    background: '-moz-linear-gradient(left, '+color1+' 0%, '+color2+' 100%)'});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient')},10);
	
</script>

</body>
</html>";
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