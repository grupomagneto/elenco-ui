<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
  <link rel="stylesheet" href="login/stylesheets/questions.css">
</head>
<body>

  
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id='form'>

  <div class="gradient container__warning">
            <div class="row">
              <a href="logout.php">logout</a>
            </div>

    <div class="box">
      <h1 class="pergunta__selection font-family color-font">
        Qual dos seus amigos você quer ajudar hoje?
      </h1>
    </div>
  
      <div class="box-outline_selection longhand">

        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Anelise</p>
          </div>
        </div>

        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
          <p class="font-family color-font">Fernando</p>
          </div>
        </div>

        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Vini</p>
          </div>
        </div>

        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Karina</p>
          </div>
        </div>

        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Carolina</p>
          </div>
        </div>
        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Carolina</p>
          </div>
        </div>
        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Carolina</p>
          </div>
        </div>
        <div class="selection-item">
          <img src="login/images/elenco_019589_20160913140545.jpg" alt="">
          <div class="selection-item__text">
            <p class="font-family color-font">Carolina</p>
          </div>
        </div>

      </div>
  
  </div>
</form>



<script src="login/javascripts/jquery-1.12.1.min.js"></script>

<script src="login/javascripts/questions.js"></script>
  
</body>
</html>
