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
        echo "

<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
	<meta charset='utf-8'>
	<meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no' name='viewport'>
	<title>Meu Modelo Favorito por Magneto Elenco</title>
	<link href='stylesheets/questions.css' rel='stylesheet'>
  <link rel='stylesheet' href='stylesheets/loading.css'>
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
</div>";

$id         = $_SESSION['id'];
$pergunta 	= "Quantos filhos você tem?";
$input_id	  = "filhos";
$text_id    = "txt_filhos";
$name 		  = "children";
$extra 		  = ' ';

include "textfield.php";
include 'missing_info.php';

if(isset($_POST[$name])){
  $value = $_POST[$name];
  if(update($link2, $id, $value, $name)) {
    if ($_SESSION['answers'] > 0) {

      $start  = 1;
      while ($start < $max) {
        if (${'question'.$start} == NULL || ${'question'.$start} == '') {
          mysqli_close($link2);
          $next = $start + 1;
          $next = ${'page'.$next};
          $_SESSION['answers'] = $_SESSION['answers'] - 1;
          header('location: ' . $next . '.php');
          exit();
        } else {
          $start++;
        }
      }

    }
    elseif ($_SESSION['answers'] == 0) {
        unset($_SESSION['answers']);
        header('location: before_vote.php');
        exit();
    }
  } else {
    $msg = mysqli_error($link2);
    echo $msg;
    mysqli_close($link2);
  }
}

echo "

  <script src='javascripts/jquery-1.12.1.min.js'></script>
  <script src='javascripts/questions.js'></script>

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
