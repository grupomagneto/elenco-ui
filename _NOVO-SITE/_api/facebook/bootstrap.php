<?php
if(!session_id()) {
		session_start();
	}

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	date_default_timezone_set('America/Sao_Paulo');

	require 'vendor/autoload.php';
	require 'ids.php';

	// require 'vendor/autoload.php';
	// require 'ids.php';

	$fb = new Facebook\Facebook([
	  'app_id' => $app_id,
	  'app_secret' => $app_secret,
	  'default_graph_version' => 'v2.7',
	  ]);

	
?>
