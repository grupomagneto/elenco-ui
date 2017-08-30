<?php

require 'vendor/cosenary/instagram/src/Instagram.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram(array(
  'apiKey'      => '9182b584aad34572afcb910b63878fac',
  'apiSecret'   => 'd5c976bbb0c144c295655aea6d2ab52a',
  'apiCallback' => 'http://localhost:8888/elenco-ui/_NOVO-SITE/_api/instagram/ig-callback.php'
));

session_start();

$token = false;

if (isset($_SESSION['access_token'])) {
  // user autenticado -> recebe e seta token
  $token = $_SESSION['access_token'];
} else {
  // recebe o parâmetro de código OAuth
  $code = $_GET['code'];
  // autenticação em andamento
  if (isset($code)) {
    // recebe e armazena OAuth token
    $data = $instagram->getOAuthToken($code);

    $token = $data->access_token;

    $_SESSION['access_token'] = $token;

  } else {
    // verifica se ocorreu um erro
    if (isset($_GET['error'])) {
      echo 'An error occurred: ' . $_GET['error_description'];
    }
  }
}
// checa autenticação
if ($token === false) {
  // autenticação falhou -> redireciona para login
  header('Location: http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro');
} else {
  // armazena token de acesso ao usuário
  $instagram->setAccessToken($token);

  $feed = $instagram->getUserFeed();
  
  echo $data->user->id;
  echo '<br />';
  echo $data->user->username;
  echo '<br />';
  echo $data->user->full_name;
  echo '<br />';
  echo $data->user->profile_picture;


  echo '<br />';

  echo '<pre>';
  print_r($feed);
  echo '<pre>';

  // Now you can call all authenticated user methods
  // Get the most recent media published by a user
  $media = $instagram->getUserMedia();
  foreach ($media->data as $entry) {
    echo "<img src=\"{$entry->images->thumbnail->url}\">";
  }

}



?>
