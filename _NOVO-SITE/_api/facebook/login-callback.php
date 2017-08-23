<?php

require 'bootstrap.php';

  $helper = $fb->getRedirectLoginHelper();

  $_SESSION['FBRLH_state']=$_GET['state'];


  try {
      $accessToken = $helper->getAccessToken();
  } catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
  }

  if (isset($accessToken)) {
    // Logged in!
      $_SESSION['facebook_access_token'] = (string) $accessToken;

      header('location: get_user_data.php');
  }

?>
