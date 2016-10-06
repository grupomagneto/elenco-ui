<?php
require 'bootstrap.php';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$ip_check = $ip_details->org;
  if (isset($_GET['from_share_ID'])) {
    if ($ip_check == "AS32934 Facebook, Inc.") {
      header('location:home.php');
    } else {
      include 'db.php';
        $hoje = date('Y-m-d H:i:s', time());
        $from_share_ID = $_GET['from_share_ID'];
        $sql_share = "SELECT game_ID, candidate_ID, media FROM tb_shares WHERE share_ID='$from_share_ID'";
        $result = mysqli_query($link2, $sql_share);
        $row = mysqli_fetch_array($result);
        $media = $row['media'];
        $game_ID = $row['game_ID'];
        $candidate_ID = $row['candidate_ID'];
        $sql_in = "INSERT INTO tb_shares (type, from_share_ID, game_ID, candidate_ID, media, timestamp, ip) VALUES ('in','$from_share_ID','$game_ID','$candidate_ID','$media','$hoje','$ip')";
        mysqli_query($link2, $sql_in);
        $_SESSION['share_ID'] = mysqli_insert_id($link2);
        $_SESSION['game_ID'] = $game_ID;
        $_SESSION['candidate_ID'] = $candidate_ID;
        $_SESSION['from_share_ID'] = $from_share_ID;
        mysqli_close($link2);
      }
    }
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email,user_friends,user_birthday']; //permissões do usuario
$loginUrl = $helper->getLoginUrl('http://www.meumodelofavorito.com.br/login-callback.php', $permissions);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Meu Modelo Favorito por Magneto Elenco</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="stylesheets/site.css">
	<link rel="stylesheet" href="stylesheets/swiper.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body> 
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="footer-index">
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-slide gradient-slide_first">
      <div class="image-slide">
        <div class="image-game"> <img src="images/image-1.svg" alt=""></div>
      </div> 
      <p class="content-slide bottom-image font-family color-font medium">
       Ajude seus amigos a participarem de propagandas
      </p>

      <div class="jump font-family color-font medium">
        <p><a href="#4">Pular introdução</a></p>
      </div>
    </div>
    <div class="footer-index">
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-slide gradient-slide_second">
      <div class="image-slide">
        <div class="image-game"> <img src="images/image-1.svg" alt=""></div>
      </div> 
      <p class="content-slide font-family color-font medium">
        Vote nos melhores perfis para campanhas em sua cidade
      </p>

      <div class="jump font-family color-font medium">
        <p>Pular introdução</p>
      </div>
    </div>
    <div class="footer-index">
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-slide gradient-slide_third">
      <div class="image-slide">
        <div class="image-game"> <img src="images/image-1.svg" alt=""></div>
      </div> 
      <p class="content-slide font-family color-font medium">
        Os perfis mais votados são apresentados aos anunciantes
      </p>

      <div class="jump font-family color-font medium">
        <p>Pular introdução</p>
      </div>
    </div>
    <div id="4" class="swiper-slide gradient-slide_fourth">
      <div class="image-slide">
        <div class="image-game"> <img src="images/image-1.svg" alt=""></div>
      </div>
      
     <?php echo '<a href="' . $loginUrl . '">'; ?><button class="button-login button button-medium">
        <div class="button-login_image">
          <img src="images/fb.svg" />
        </div>
        <div class="button-login_content">
          <p class="font-family color-font medium">
            Entrar com Facebook
          </p>
        </div>
      </button></a>
     <a href="privacidade.html" target="_blank" class="content-slide privacy font-family color-font">Política de Privacidade</a>
    </div>
 </div>
</div>
	<script src="javascripts/jquery-1.12.1.min.js"></script>
	<script src="javascripts/swiper.jquery.min.js"></script>
	<script src="javascripts/swiper.min.js"></script>
	<script src="javascripts/progressbar.min.js"></script>
	<script src="javascripts/all.js"></script>

</body>
</html>
