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
  <div class='gradient container__overflow '>
    <div class='row'>
      <a href='logout.php'>logout</a>
    </div>
    <div class='box'>
      <h1 class='pergunta__selection font-family color-font'>
        Escolha uma campanha para votar:
      </h1>
    </div>

<!--   <div class="stage">
    <div class="flashcard">
      <div class="front">
        <p>Primeira</p>
      </div>
      <div class="back">
        <p>Segunda</p>
      </div>
    </div>  
  </div> -->

    <div class='box-outline_campaign longhand longhand__campaign'>

        <div class="selection-item__campaign">
          <button class="font-family color-font bold">
            <div class="stage">
              <div class="flashcard">
                <div class="front">
                  <img id='img_front' src='images/elenco_019589_20160913140545.jpg'/>
                </div> 
              </div>  
            </div>                
            <h1 class="bold">Ô Lá em Casa...</h1>
            <p class="font-weight__100">02/10/2016 <span>Participantes: 08</span> </p>
          </button>
        </div>

        <div class="selection-item__campaign">
          <button class="font-family color-font bold">
            <div class="stage">
              <div class="flashcard">
                <div class="front">
                  <img src="images/elenco_019589_20160913140545.jpg" alt="" />
                </div> 
              </div>  
            </div>   
            <h1 class="bold">Ô Lá em Casa...</h1>
            <p class="font-weight__100">02/10/2016 <span>Participantes: 08</span> </p>
          </button>
        </div>

        <div class="selection-item__campaign">
          <button class="font-family color-font bold">
            <div class="stage">
              <div class="flashcard">
                <div class="front">
                  <img src="images/elenco_019589_20160913140545.jpg" alt="" />
                </div>   
              </div>  
            </div>   
            <h1 class="bold">Ô Lá em Casa...</h1>
            <p class="font-weight__100">02/10/2016 <span>Participantes: 08</span> </p>
          </button>
        </div>

      </div>



</div>
</form>

<?php


    $photoAreas = array("images/elenco_019589_20160913140545.jpg", "images/Copia-de-elenco_019589_20160913140545.jpg");

    // $randomNumber =  print_r(array_count_values($photoAreas));
    // $randomImage = $photoAreas[$randomNumber];
    // sleep(2);

  // <?php echo "<img src=\"$randomImage\" width=\"60\" height=\"60\">";


?>

<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/questions.js'></script>
  <script>
    
var numImgCont =  [];
numImgCont[0] = "https://dummyimage.com/60x60";
numImgCont[1] = "images/Copia-de-elenco_019589_20160913140545.jpg";
numImgCont[2] = "https://dummyimage.com/100x60";


var imagens = (function loop(){
    var container = document.getElementById("img_front");
    
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
</html>
