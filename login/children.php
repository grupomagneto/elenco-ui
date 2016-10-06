<?php
  require __DIR__.'/vendor/autoload.php';
  require __DIR__.'/ids.php';
if(!session_id()) {
  session_start();
}
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
//se usuario está logado
    //exibo os dados desse usuário
//senão
    //se eu ja tenho $_GET['code'] e $_GET['state']
        //então eu armazeno o access token
    //se não eu crio o link de login
try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
    if (!empty($_SESSION['facebook_access_token'])) {
        $user = $fb->User()->get($_SESSION['facebook_access_token']);
        echo "

<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
	<meta charset='utf-8'>
	<meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no' name='viewport'>
	<title>Meu Modelo Favorito por Magneto Elenco</title>
	<link href='stylesheets/questions.css' rel='stylesheet'>
</head>
<body>";

$id         = $_SESSION['id'];
$pergunta 	= "Quantos filhos você tem?";
$input_id	  = "filhos";
$text_id    = "txt_filhos";
$name 		  = "children";
$extra 		  = ' ';

include "textfield.php";
include 'functions.php';
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
        header('location: before-vote.php');
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
