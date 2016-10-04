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
        $friends = $user->getProperty('friends');
        echo "

<!DOCTYPE html>
<html lang='pt-br'>
<head>
  <meta charset='UTF-8'>
  <title>Document</title>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
  <link rel='stylesheet' href='stylesheets/questions.css'>
</head>
<body>
";
?>

<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id='form'>

<?php 


echo "  <div class='gradient container'>
            <div class='row'>
              <a href='logout.php'>logout</a>
            </div>


    <div class='box'>
      <h1 class='pergunta__selection font-family color-font'>
        Qual dos seus amigos você quer ajudar hoje?
      </h1>
    </div>
";
?>
<?php

    foreach ($friends as $f) {
        echo '<div class="">';
            echo '<div class="selection-item">';
            echo '<img src="http://graph.facebook.com/'. $f['id'] . '/picture" alt=" ">';
            echo '<p>'. $f['id'] . '</p>';
            echo '</div>';
        echo '</div>';
    }

    // <!--       <div class='box-outline_selection longhand'>

//         <div class='selection-item'>
//           <img src='login/images/elenco_019589_20160913140545.jpg' alt='>
//           <p class='font-family color-font'>Ana</p>
//         </div>
//  -->

echo 
" 
  


      </div>
  
  </div>
</form>



<script src='javascripts/jquery-1.12.1.min.js'></script>

<script src='javascripts/questions.js'></script>
  
</body>
</html>

";
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
