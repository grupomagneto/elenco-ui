<?php

require 'src/Instagram.php';
use MetzWeb\Instagram\Instagram;
// initialize class
$instagram = new Instagram(array(
  'apiKey'      => ' 9182b584aad34572afcb910b63878fac',
  'apiSecret'   => 'd5c976bbb0c144c295655aea6d2ab52a ',
  'apiCallback' => 'http://localhost/elenco-ui/_NOVO-SITE/_api/instagram/ig-callback.php'
));
session_start();
$token = false;
if (isset($_SESSION['access_token'])) {
  // user authenticated -> receive and set token
  $token = $_SESSION['access_token'];
} else {
  // receive OAuth code parameter
  $code = $_GET['code'];
  // authentication in progress?
  if (isset($code)) {
    // receive and store OAuth token
    $data = $instagram->getOAuthToken($code);
    $token = $data->access_token;
    $_SESSION['access_token'] = $token;
  } else {
    // check whether an error occurred
    if (isset($_GET['error'])) {
      echo 'An error occurred: ' . $_GET['error_description'];
    }
  }
}
// check authentication
if ($token === false) {
  // authentication failed -> redirect to login
  header('Location: http://localhost/elenco-ui/_NOVO-SITE/_api/instagram/ig-callback.php/');
} else {
  // store user access token
  $instagram->setAccessToken($token);
  
  // now we have access to all authenticated user methods
  $media = $instagram->getUserMedia();
}

echo 'Your username is: ' . $data->user->username;
?>
