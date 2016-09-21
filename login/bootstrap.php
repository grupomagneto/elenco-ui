<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';

$fb = new Facebook\Facebook([
  'app_id' => $app_id,
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.7',
  ]);

if(!session_id()) {
	session_start();
}
?>
