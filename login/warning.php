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
<form action='register.php' method='post'>
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
    include 'db.php';
    include 'functions.php';
    echo '<div class="box-outline_selection longhand">';
    foreach ($friends as $f) {
        $array = selectFriends($link2, $f['id']);
        $friendID   = $array[0];
        $name       = $array[1];
        $photo      = $array[2];
        if ($name != '' && $name != NULL) {
            echo '<div class="selection-item">';
            echo '<button class="pointer" type="submit"><input type="hidden" name="friendID" value='.$friendID.'" /><img src="http://www.magnetoelenco.com.br/fotos/'.$photo.'" alt=" "></button>';
            echo '<div class="selection-item__text">';
            echo '<p class="font-family color-font">'.$name.'</p>';
            echo '</div>';
            echo '</div>';
        }
      }
    echo '</div>';
echo "
</div>
</form>

<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/questions.js'></script>
  
</body>
</html>";
?>
