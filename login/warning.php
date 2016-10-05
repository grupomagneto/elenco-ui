<?php
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
<form action='register.php' method='post' id='form'>
  <div class='gradient container'>
            <div class='row'>
              <a href='logout.php'>logout</a>
            </div>


    <div class='box'>
      <h1 class='pergunta__selection font-family color-font'>
        Qual dos seus amigos você quer ajudar hoje?
      </h1>
    </div>";

    $friends = $_SESSION['friends'];
    $friendlist = array();
    foreach ($friends as $f) {
      array_push($friendlist, $f['id']);
    }
    include 'db.php';
    foreach ($friendlist as $facebook_ID) {
      $sql_id = "SELECT id, firstname, arquivo photo FROM (SELECT firstname, voter_elenco_ID id FROM tb_voters WHERE facebook_ID='$facebook_ID') T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
      $result = mysqli_query($link2, $sql_id);
      $row = mysqli_fetch_array($result);
      $friend_ID = $row['id'];
      $photo = $row['photo'];
      $name = $row['firstname'];
        if ($row['firstname'] != '' && $row['firstname'] != NULL) {
          echo '<div class="">';
            echo '<div class="selection-item">';
            echo '<button name="friend_ID" value='.$friend_ID.'"><img src="http://www.magnetoelenco.com.br/fotos/'.$photo.'" alt=" "></button>';
            echo '<p>'. $name . '</p>';
            echo '</div>';
        echo '</div>';
        }
      }
    // mysqli_close($link2);
    // echo '<pre>';
    // print_r($friends);
    // print_r($friendlist);
    // echo '<pre>';
    // var_dump($user = $fb->User()->get($_SESSION['facebook_access_token']));
    // header('location:transportation.php');

echo " </div>
</form>

<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/questions.js'></script>
  
</body>
</html>";
?>