<?php
require '../_api/facebook/vendor/autoload.php';
require '../_api/facebook/ids.php';
require '../_api/instagram/vendor/autoload.php';
require '../_sys/conecta.php';

if(!session_id()) {
  session_start();
}

if (isset($_GET['email']) && isset($_GET['hash'])) {
  $email = $_GET['email'];
  $senha = $_GET['hash'];
  $sql = "SELECT id_elenco FROM tb_elenco WHERE email = '$email' AND senha = '$senha'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) == 1) {
    $id_elenco = $row['id_elenco'];
    $validacao_email = "OK";
  }
}

//Começo Login Instagram
$instagram = new Andreyco\Instagram\Client(array(
  'apiKey'      => '8c92de1fcb6247c09232d2033627ce96',
  'apiSecret'   => 'c9faee8401db43d9b676d2a15852164c',
  'apiCallback' => 'https://www.magnetoelenco.com.br/_api/instagram/ig-callback.php',
  // 'scope'      => array('basic', 'relationships', 'follower_list', 'public_content' ),
  'scope'      => array('basic'),
));
// cria login URL
$state = md5(time());
$loginUrlIg = $instagram->getLoginUrl(array('basic'), $state);

//Fim Login Instagram
//Começo Login Facebook

try {
   $fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret
    ]);


    if (!empty($_SESSION['facebook_access_token'])) {
      if (!empty($_SESSION['id_elenco'])) {
          header('location: cadastro.php');
      }
    }
    else {
      if (!empty($_GET['code']) and !empty($_GET['state'])) {
          $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
          header('location: https://www.magnetoelenco.com.br/_api/facebook/login-callback.php');
      } else {
        require '../_api/facebook/bootstrap.php';
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email,public_profile,user_friends,user_birthday']; //permissões do usuario
        $loginUrl = $helper->getLoginUrl('https://www.magnetoelenco.com.br/_api/facebook/login-callback.php', $permissions);
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no' name='viewport' >
<meta data-react-helmet='true' charset='utf-8'/>
<meta data-react-helmet='true' http-equiv='X-UA-Compatible' content='IE=edge'/>
<meta data-react-helmet='true' name='description' content='Cadastre-se gratuitamente e encontre os trabalhos de audiovisual da sua cidade.'/>
<meta data-react-helmet='true' name='viewport' content='width=device-width, initial-scale=1'/>
<meta name='description' content='Agência e Marketplace de atores, modelos e influenciadores.'>
<meta name='keywords' content='Agência, modelos, casting, elenco, cadastro, trabalhos, publicidade, propaganda, anúncio, ator, atriz, influenciador, digital, online, agência de modelos, agência de modelo, marketplace'>
<meta name='author' content='Magneto Elenco'>
<meta data-react-helmet='true' name='mobile-web-app-capable' content='yes'/>
<meta data-react-helmet='true' name='apple-mobile-web-app-capable' content='yes'/>
<meta data-react-helmet='true' name='apple-mobile-web-app-status-bar-style' content='black'/>
<meta data-react-helmet='true' name='apple-mobile-web-app-title' content='Magneto Elenco'/>
<meta data-react-helmet='true' name='msapplication-TileColor' content='#FFFFFF'/>
<meta data-react-helmet='true' property='og:site_name' content='Magneto Elenco'/>
<meta data-react-helmet='true' property='og:url' content='https://www.magnetoelenco.com.br/cadastro/cadastro'/>
<meta data-react-helmet='true' property='og:title' content='Agência e Marketplace de atores, modelos e influenciadores.'/>
<title>Magneto Elenco - Atores, modelos e influenciadores para a sua marca</title>
<link rel='apple-touch-icon' sizes='57x57' href='../_images/icon/apple-icon-57x57.png'>
<link rel='apple-touch-icon' sizes='60x60' href='../_images/icon/apple-icon-60x60.png'>
<link rel='apple-touch-icon' sizes='72x72' href='../_images/icon/apple-icon-72x72.png'>
<link rel='apple-touch-icon' sizes='76x76' href='../_images/icon/apple-icon-76x76.png'>
<link rel='apple-touch-icon' sizes='114x114' href='../_images/icon/apple-icon-114x114.png'>
<link rel='apple-touch-icon' sizes='120x120' href='../_images/icon/apple-icon-120x120.png'>
<link rel='apple-touch-icon' sizes='144x144' href='../_images/icon/apple-icon-144x144.png'>
<link rel='apple-touch-icon' sizes='152x152' href='../_images/icon/apple-icon-152x152.png'>
<link rel='apple-touch-icon' sizes='180x180' href='../_images/icon/apple-icon-180x180.png'>
<link rel='icon' type='image/png' sizes='192x192'  href='../_images/icon/android-icon-192x192.png'>
<link rel='icon' type='image/png' sizes='32x32' href='../_images/icon/favicon-32x32.png'>
<link rel='icon' type='image/png' sizes='96x96' href='../_images/icon/favicon-96x96.png'>
<link rel='icon' type='image/png' sizes='16x16' href='../_images/icon/favicon-16x16.png'>
<link rel='shortcut icon' type='image/png' sizes='192x192'  href='../_images/icon/android-icon-192x192.png'>
<link rel='shortcut icon' type='image/png' sizes='32x32' href='../_images/icon/favicon-32x32.png'>
<link rel='shortcut icon' type='image/png' sizes='96x96' href='../_images/icon/favicon-96x96.png'>
<link rel='shortcut icon' type='image/png' sizes='16x16' href='../_images/icon/favicon-16x16.png'>
<link rel='manifest' href='../_images/icon/manifest.json'>
<meta name='msapplication-TileColor' content='#ffffff'>
<meta name='msapplication-TileImage' content='../_images/icon/ms-icon-144x144.png'>
<meta name='theme-color' content='#ffffff'>
<link rel='stylesheet' href='../_css/normalize.css' type='text/css' />
<link rel='stylesheet' href='../_css/flexbox.css' type='text/css' />
<link rel='stylesheet' href='../_css/swiper.min.css' type='text/css' />
<link rel='stylesheet' href='../_css/style.css' type='text/css' />
<link rel='stylesheet' href='../_css/cadastro.css' type='text/css' />
<link rel='stylesheet' href='../_css/cadastro-index.css' type='text/css' />
<link rel='stylesheet' href='../_css/trumps-index.css' type='text/css' />
</head>
<body>
<div class='gradient'>
  <div class='container'>
    <div class='mancha flexbox absolute wrap'>
        <div class='menu align-items-center flexbox nowrap space-between-horizontal'>
            <img src='../_images/seta-voltar.svg' class='voltar' />
            <img class="logo" src='../_images/logo-horizontal.svg' />
            <img src='../_images/menu.svg' class='mini-menu' />
        </div>
          <?php if (!isset($validacao_email)) {
            echo "
          <div class='swiper-container swiper1'>
            <div class='swiper-wrapper'>
            <div class='swiper-slide' id='01-0-01_prazer-somos-uma-agencia-de-elenco'>";include 'perguntas/01-0-01.php';echo"</div>
            <div class='swiper-slide' id='01-0-02_para-atores-modelos-e-inflenciadores-de-todos-perfis'>";include 'perguntas/01-0-02.php';echo"</div>
            <div class='swiper-slide' id='01-0-03_conectando-pessoas-a-anunciantes'>";include 'perguntas/01-0-03.php';echo"</div>
            <div class='swiper-slide' id='01-0-04_faca-parte-do-nosso-elenco'>";include 'perguntas/01-0-04.php';echo"</div>
          </div>
        </div>";
          }?>
        <div class='swiper-container swiper2'>
          <div class='swiper-wrapper'>
          <?php
          if (!isset($validacao_email)) {
            echo "
            <div class='swiper-slide' id='02-0-01_cadastre-se-com-seu-e-mail'>";include 'perguntas/02-0-01.php';echo"</div>
            <div class='swiper-slide' id='02-0-02_cheque-seu-e-mail-e-siga-as-instrucoes'>";include 'perguntas/02-0-02.php';echo"</div>";
          }
          if (isset($validacao_email) && $validacao_email === "OK") {
            $sql = "UPDATE tb_elenco SET ativo = 'New' WHERE id_elenco = '$id_elenco'";
            mysqli_query($link, $sql);
            echo "
            <div class='swiper-slide' id='02-0-03_e-mail-confirmado'>";include 'perguntas/02-0-03.php';echo"</div>";
          }
          ?>
          </div>
        </div>
    </div>
    <div class='footer-intro cursor'>
      <div class='swiper-pagination'></div>
      <button class="pular-intro avenir white x-small cursor">
        Pular introdução
        <img src='../_images/arrow-right.svg' alt='Pular introdução' />
      </button>
    </div>
  </div>
</div>
<!-- <script src='https://code.jquery.com/jquery-2.2.4.min.js' integrity='sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=' crossorigin='anonymous'></script>
<script src='https://code.jquery.com/ui/1.9.2/jquery-ui.min.js' integrity='sha256-eEa1kEtgK9ZL6h60VXwDsJ2rxYCwfxi40VZ9E0XwoEA=' crossorigin='anonymous'></script> -->
<script src="../_js/jquery-2.2.4.min.js"></script>
<script src="../_js/jquery-ui.min.js"></script>
<script type='text/javascript' src='../_js/gradient.js'></script>
<script type='text/javascript' src='../_js/swiper.min.js'></script>
<script type='text/javascript' src='../_js/cadastro-index.js'></script>


<?php
if (isset($validacao_email) && $validacao_email === "OK") {
    echo "<script type='text/javascript' src='../_js/cadastro-index-email.js'></script>";
}
?>
<!-- <?php include '../_sys/analytics.php'; ?> -->
</body>
</html>
<?php
        }
    }
} catch (Exception $e) {
    echo 'Erro: '.$e->getMessage();
}
mysqli_close($link);
?>
