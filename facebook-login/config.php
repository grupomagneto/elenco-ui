<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';
require 'face_login.php';
require 'facebook-php/autoload.php';


use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\GraphLocation;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication($config['app_id'], $config['app_secret']);
$helper = new FacebookRedirectLoginHelper('http://www.meumodelofavorito.com.br/');

try {

	$session = $helper->getSessionFromRedirect();
	if ($session):
		$_SESSION['facebook'] = $session->getToken();
		header('Location: redirect.php');

	endif;
	if (isset($_SESSION['facebook'])):
		$session = new FacebookSession($_SESSION['facebook']);
		$request = new FacebookRequest($session, 'GET', '/me?fields=id,first_name,last_name,email,gender');
		$response = $request->execute();
		$user = $response->getGraphObject(GraphUser::className());
		$facebook_user = $user;
		$id = $user->getId();
		$email = $user->getEmail();
		$firstname = $user->getFirstName();
		$lastname = $user->getLastName();
 		$gender = $user->getGender();

	endif;
	
} catch(FacebookRequestException $ex) {
  // Quando Facebook retorna um erro
} catch(\Exception $ex) {
  // Quando a validação falhar o login
}