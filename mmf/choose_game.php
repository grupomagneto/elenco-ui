<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';
require_once 'functions.php';
if(!session_id()) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
   if (!empty($_SESSION['facebook_access_token'])) {
      $page = basename(__FILE__);
      require_once 'register_page.php';
      if (empty($_SESSION['friend_ID']) && empty($_SESSION['candidate_ID'])) {
        $sql = "SELECT game_name, insert_date, game_ID, total FROM (SELECT game_name, insert_date, game_ID FROM tb_games GROUP BY game_ID) AS tab_1, (SELECT game_ID AS id, COUNT(candidate_elenco_ID) AS total FROM tb_games GROUP BY game_ID) AS tab_2 WHERE tab_1.game_ID = tab_2.id";
        $result = mysqli_query($link2, $sql);
        $games = array();
        while($row = mysqli_fetch_array($result)){
          $game = array();
          array_push($game, $row['game_ID']);
          array_push($game, $row['game_name']);
          array_push($game, $row['insert_date']);
          array_push($game, $row['total']);
          array_push($games, $game);
        }
        $games_n = count($games);
      }
      if (!empty($_SESSION['friend_ID']) || !empty($_SESSION['candidate_ID'])) {
        if (!empty($_SESSION['friend_ID'])) {
          $friend_ID = $_SESSION['friend_ID'];
        } else {
          $friend_ID = $_SESSION['candidate_ID'];
        }
        $sql = "SELECT game_name, insert_date, game_ID, total FROM (SELECT game_name, insert_date, game_ID FROM tb_games WHERE candidate_elenco_ID='$friend_ID' GROUP BY game_ID) AS tab_1, (SELECT game_ID AS id, COUNT(candidate_elenco_ID) AS total FROM tb_games GROUP BY game_ID) AS tab_2 WHERE tab_1.game_ID = tab_2.id";
        $result = mysqli_query($link2, $sql);
        $games = array();
        while($row = mysqli_fetch_array($result)){
          $game = array();
          array_push($game, $row['game_ID']);
          array_push($game, $row['game_name']);
          array_push($game, $row['insert_date']);
          array_push($game, $row['total']);
          array_push($games, $game);
        }
        $games_n = count($games);
      }

echo "
<!DOCTYPE html>
<html lang='pt-br'>
<head>
  <meta charset='UTF-8'>
  <title>Meu Modelo Favorito por Magneto Elenco</title>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
<link rel='stylesheet' href='stylesheets/questions.css'>
</head>
<body>
<form action='before_questions.php' method='post'>
  <div class='gradient container__overflow '>
    <div class='box'>
      <h1 class='pergunta__selection font-family color-font'>
        Escolha uma campanha para votar:
      </h1>
    </div>
   <div class='box-outline_campaign longhand longhand__campaign'>";
   $photoAreas = array();
    foreach ($games as $array) {
        $game_ID      = $array[0];
        $game_name    = $array[1];
        $insert_date = date("d/m/y", strtotime($array[2]));
        $total        = $array[3];
        $sql_photos = "SELECT game_ID, arquivo AS photo FROM (SELECT game_ID, candidate_elenco_ID id FROM tb_games WHERE game_ID = '$game_ID') T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) GROUP BY id";
        $result = mysqli_query($link2, $sql_photos);
        ${'photo_array_'.$game_ID} = array();
        while ($row = mysqli_fetch_array($result)) {
          $photo = "http://www.magnetoelenco.com.br/fotos/".$row['photo'];
          array_push(${'photo_array_'.$game_ID}, $photo);
        }
        array_push($photoAreas, ${'photo_array_'.$game_ID});
        shuffle($photoAreas);
        foreach ($photoAreas as $value) {
          // $v = rand(1,8);
          $first_photo = $value[0];
        }
        $n = $games_n;
        echo"
        <div class='selection-item__campaign'>
          <button class='font-family color-font bold' name='game_ID' value='$game_ID' type='submit'>
            <div class='stage'>
              <div class='flashcard'>
                <div class='front'>";
                  // <img id='img_front".$n."' src='$first_photo'/>
                  echo "<img src='$first_photo'/>
                </div> 
              </div>  
            </div>                
            <h1 class='bold'>$game_name</h1>
            <p class='font-weight__100'>$insert_date <span>Participantes: $total</span> </p>
          </button>
        </div>";
        $n--;
      }
      // echo $games_n;
      // echo "<pre>";
      // echo "games: ";
      //   print_r($games);
      //   echo "photos: ";
      //   print_r($photoAreas);
      
      // echo "game_ID: ".$game_ID."<br />";
      // echo "game_name: ".$game_name."<br />";
      // echo "date: ".$insert_date."<br />";
      // echo "total: ".$total."<br />";
      //   exit();
echo "
     </div>
</div>
</form>

<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/questions.js'></script>
<script>

var numImgCont =  [];
numImgCont[0] = 'http://www.magnetoelenco.com.br/fotos/elenco_013221_20131212162440.jpg';
numImgCont[1] = 'http://www.magnetoelenco.com.br/fotos/elenco_015648_20160513161656.jpg';
numImgCont[2] = 'http://www.magnetoelenco.com.br/fotos/elenco_019094_20160308115054.jpg';
numImgCont[3] = 'http://www.magnetoelenco.com.br/fotos/elenco_019206_20160322120616.jpg';
numImgCont[4] = 'http://www.magnetoelenco.com.br/fotos/elenco_019407_20160524150935.jpg';
numImgCont[5] = 'http://www.magnetoelenco.com.br/fotos/elenco_019442_20160715103517.jpg';
numImgCont[6] = 'http://www.magnetoelenco.com.br/fotos/elenco_019508_20160715172557.jpg';

var imagens = (function loop(){
    var container = document.getElementById('img_front2');
    
    if (numImgCont.length) {
        setTimeout(function(){ 
          $('.flashcard').toggleClass('flipped');
           
            container.src = numImgCont.shift();
            loop();
        }, 2000);
    }
    return loop;
})();
// $(document).ready(function() {
 // setTimeout(function(){
 //     $('.front').css('display' ,'none');
  //       $('.flashcard').toggleClass('flipped');
  // }, 2000);
 // });
 // $(document).ready(function() {
 // setTimeout(function(){
 //     $('.front').css('display' ,'block');
  //       $('.flashcard').toggleClass('flipped');
  // }, 4000);
 // });
 </script>
</body>
</html>";
// Fim do cabecalho FB
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>