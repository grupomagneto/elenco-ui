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
            Pronto! Agora é só votar respondendo à pergunta:
          </h1>
        </div>
        <div class='row'>
          <div class='content-slide_after-login content-slide_after-login_question font-family color-font medium'>
              <p>
                Se você estivesse que pegar um empréstimo num banco, quem seria um(a) melhor gerente?
              </p>
          </div>
        </div>
        <div class='row'>
          <a href='vote.php'>
            <button class='button button-medium font-family color-font medium'>
              Começar a votação
            </button>
          </a>
        </div>
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

