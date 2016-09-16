<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';
require 'autoload.php';
require 'Facebook/FacebookSession.php';
require 'Facebook/FacebookRedirectLoginHelper.php';
require 'Facebook/FacebookRequest.php';
require 'Facebook/FacebookResponse.php';
require 'Facebook/GraphObject.php';
require 'Facebook/GraphUser.php';
require 'Facebook/FacebookSDKException.php';


use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookSDKException;

FacebookSession::setDefaultApplication('908603925934775', '404a883e0f0f6dde4f134feeebec8e22');

$helper = new FacebookRedirectLoginHelper('http://localhost:8888/elenco-ui/facebook-login/');
  try {
      $session = $helper->getSessionFromRedirect();
   }catch( FacebookRequestException $ex ) {
    
   }catch( FacebookApiException $ex ) {
      
   }
   
   if ( isset( $session ) ) {
     
      $request = new FacebookRequest( $session, 'GET', '/me?fields=id,first_name,last_name,email,gender', '{access-token}');
      $response = $request->execute();
      
      	
      	$user = $response->getGraphObject(GraphUser::className());
      	$id = $user->getId();
   		$email = $user->getEmail();
   		$firstname = $user->getFirstName();
   		$lastname = $user->getLastName();
    		$gender = $user->getGender();


   }else { 


   
  $loginUrl = $helper->getLoginUrl(array(
    'scope'         => 'email'
    ));

    header("Location: ".$loginUrl);

   }
?>















