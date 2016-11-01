<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-type' content='text/html; charset=UTF-8' />
<title>Resultado Parcial Meu Modelo Favorito</title>
  <link rel='stylesheet' href='mmf/stylesheets/site.css'>
  <link rel='stylesheet' href='mmf/stylesheets/swiper.min.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
  </head>
<body>
  <div class='swiper-wrapper'>
    <div class='swiper-slide gradient'>
    <h1 class='font-family color-font large voto_registrado'>Voto registrado!</h1>
  <h1 class='pergunta font-family color-font medium '>
        Confira o resultado parcial e convide seus amigos para votar também:
      </h1>
  <div class='row result-one'>
  <img src='http://www.magnetoelenco.com.br/fotos/$winner_photo1' class='foto' width=120px height=120px>
    <div class='progress progress-result'>
      <progress id='progressbar98' value='$percent1' max='100'></progress>
    </div>
    <div class='percent'>
      <p>31%</p>
    </div>
  </div>

    <div class='row result-two'>
    <img src='http://www.magnetoelenco.com.br/fotos/$winner_photo2' class='foto' width=120px height=120px>
    <div class='progress  progress-result progress-result-two'>
      <progress id='progressbar99' value='$percent2' max='100'></progress>
    </div>
        <div class='percent percent-two'>
      <p>22%</p>
    </div>
    </div>

    <div class='row result-three'>
    <img src='http://www.magnetoelenco.com.br/fotos/$winner_photo3' class='foto' width=120px height=120px>

    <div class='progress  progress-result progress-result-three'>
      <progress id='progressbar97' value='$percent3' max='100'></progress>
    </div>
    <div class='percent percent-three'>
      <p>13%</p>
    </div>
  </div>

<!--   <div class='container-outline__button'>
    <a href='register_candidate.php' target='_blank'>
    <button class='button button-medium font-family color-font medium' onclick='showLoading()'>
    Quero me candidatar
    </button>
    </a>" -->

  <div class='container-outline__button'>
      <a href='http://cadastro.magnetoelenco.com.br' target='_blank'>
    <button class='button button-medium font-family color-font medium' onclick='showLoading()'>
    Quero me candidatar
    </button>
    </a>
    
    <a href='create_share_image.php' target='_blank'>  
    <button class=' button button-medium'>
          <div class='button-login_image'>
            <img src='mmf/images/fb.svg' />
          </div>
          <div class='button-login_content'>
            <p class='font-family color-font medium'>
             Convidar seus amigos
            </p>
          </div>
      </button>
    </a>

  </div>

   
    </div>

    </div>
 </div>
<script src='mmf/javascripts/jquery-1.12.1.min.js'></script>
<script src='mmf/javascripts/swiper.jquery.min.js'></script>
<script src='mmf/javascripts/swiper.min.js'></script>
<script src='mmf/javascripts/progressbar.min.js'></script>
<script src='mmf/javascripts/all.js'></script>
</body>
</html>
