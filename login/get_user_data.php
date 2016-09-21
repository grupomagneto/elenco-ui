<?php

require 'bootstrap.php';

if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    try {
        $response = $fb->get('/me?fields=id,first_name,last_name,email,gender,link,friends,birthday');
        // $userNode = $response->getGraphUser();
        $userNode = $response->getGraphObject(GraphUser::className());
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    header('location: home.php');
} else {
    header('location: index.php');
}
?>
