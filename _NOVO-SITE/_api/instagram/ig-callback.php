<?
ini_set('display_errors', 'off');

require 'vendor/autoload.php';
require '../../_sys/conecta.php';

if(!session_id()) {
      session_start();
  }
date_default_timezone_set('America/Sao_Paulo');
// initialize class
$instagram = new Andreyco\Instagram\Client(array(
  'apiKey'      => '8c92de1fcb6247c09232d2033627ce96',
  'apiSecret'   => 'c9faee8401db43d9b676d2a15852164c',
  'apiCallback' => 'http://localhost:8888/elenco-ui/_NOVO-SITE/_api/instagram/ig-callback.php'
));
// receive OAuth code parameter
$code = $_GET['code'];
// check whether the user has granted access
if (isset($code)) {
  // receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  $username = $username = $data->user->username;
  // $ig_ig = $data->user->id;
  // $fullname = $data->user->full_name;
  // store user access token
  $instagram->setAccessToken($data);
  // now you have access to all authenticated user methods
  
  $result = $instagram->getUserMedia();

} else {
  // check whether an error occurred
  if (isset($_GET['error'])) {
    echo 'An error occurred: ' . $_GET['error_description'];
  }
}
$ig_token = $data->access_token;
$ig_id = $data->user->id;

// $ig = "https://api.instagram.com/v1/users/".$ig_id."/?access_token=".$ig_token;
$ig = "https://api.instagram.com/v1/users/self/?access_token=".$ig_token;
$ig_username = json_decode(file_get_contents($ig))->data->username;
$ig_full_name = json_decode(file_get_contents($ig))->data->full_name;
$ig_followers = json_decode(file_get_contents($ig))->data->counts->followed_by;
$ig_follows = json_decode(file_get_contents($ig))->data->counts->follows;
$ig_media = json_decode(file_get_contents($ig))->data->counts->media;

$_SESSION['ig_id'] = $ig_id;
$_SESSION['ig_username'] = $username;
$_SESSION['ig_full_name'] = $ig_full_name;
$_SESSION['ig_media'] = $ig_media;
$_SESSION['ig_followers'] = $ig_followers;
$_SESSION['ig_follows'] = $ig_follows;
$_SESSION['instagram_access_token'] = $ig_token;

// $temp = json_decode(file_get_contents($ig));
// echo "<pre>" . print_r($temp);
mysqli_close($link);
header('Location: ig-pulldata.php');
exit();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram - photo stream</title>
    <link href="https://vjs.zencdn.net/4.2/video-js.css" rel="stylesheet">
    <!-- <link href="assets/style.css" rel="stylesheet"> -->
    <script src="https://vjs.zencdn.net/4.2/video.js"></script>
  </head>
  <body>
    <div class="container">
      <header class="clearfix">
        <p>ID: <span> <? echo $data->user->id; ?></span></p>
        <p>Username: <span> <? echo $username; ?></span></p>
        <p>Nome Completo: <span> <? echo $data->user->full_name; ?></span></p>
        <p>Seguidores: <span> <? echo $ig_followers ?></span></p>
        <p>Seguindo: <span> <? echo $ig_follows ?></span></p>
        <p>Total de fotos: <span> <? echo $ig_media ?></span></p>
        <p>Foto do perfil:  <img src="<?php echo $data->user->profile_picture; ?>" /> </p>
        <?php
          // $temp = json_decode(file_get_contents($data));
          echo "<pre>";
          print_r($data);
        ?>

      </header>
      <div class="main">
        <ul class="grid">
        <?php
          foreach ($result->data as $media) {
            $content = "<li>";
            // output media
            if ($media->type === 'video') {
              // video
              $poster = $media->images->standard_resolution->url;
              $source = $media->videos->standard_resolution->url;
              $content .= "<video class=\"media video-js vjs-default-skin\" width=\"461\" height=\"461\" poster=\"{$poster}\"
                           data-setup='{\"controls\":true, \"preload\": \"auto\"}'>
                             <source src=\"{$source}\" type=\"video/mp4\" />
                           </video>";
            } else {
              // image
              $image = $media->images->standard_resolution->url;
              $content .= "<img class=\"media\" src=\"{$image}\" width=\"461\" />";
            }
            // create meta section
            $avatar = $media->user->profile_picture;
            $content .= "<div class=\"content\">
                           <div class=\"avatar\" style=\"background-image: url({$avatar})\"></div>
                         </div>";
            // output media
            echo $content . "</li>";
          }
        ?>
        </ul>
        
      </div>
    </div>
    <!-- javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        // rollover effect
        $('li').hover(
          function() {
            var $image = $(this).find('.image');
            var height = $image.height();
            $image.stop().animate({ marginTop: -(height - 82) }, 1000);
          }, function() {
            var $image = $(this).find('.image');
            var height = $image.height();
            $image.stop().animate({ marginTop: '0px' }, 1000);
          }
        );
      });
    </script>
  </body>
</html>
