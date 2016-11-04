<?php
// 

$imagens = array(); 
$imagens[1] = "mmf/images/elenco_019589_20160913140545.jpg"; 
$imagens[2] = "https://dummyimage.com/60x60/ba58ba/fff";
$imagens[3] = "https://dummyimage.com/60x60/2339b8/fff";
$imagens[4] = "mmf/images/elenco_019589_20160913140545.jpg";
$imagens[5] = "mmf/images/elenco_019589_20160913140545.jpg";
$imagens[6] = "mmf/images/elenco_019589_20160913140545.jpg";

// $contaArray = count($imagens);

// $aleatorio = rand(1, $contaArray);

// echo  "<script>" ;
// echo  'var numImgCont ='  .  json_encode ($imagens)  .  ';' ;
// echo  'numImgCont[0] ='  .  json_encode ($imagens[1])  .  ';' ;
// echo  'numImgCont[1] ='  .  json_encode ($imagens[2])  .  ';' ;
// echo  'numImgCont[2] ='  .  json_encode ($imagens[3])  .  ';' ;

// echo  "var imagens = (function loop(){
//         var container = document.getElementById('img_front');

//     if (numImgCont.length) {
//         setTimeout(function(){ 
//            $('.flashcard').toggleClass('flipped');
           
//             container.src = numImgCont.shift();
//             loop();
//         }, 2000);
//     }
    
//     return loop;
// })();" ;

// echo  "</ script>" ;




?>

<!DOCTYPE html>
<html lang='pt-br'>
<head>
  <meta charset='UTF-8'>
  <title>Meu Modelo Favorito por Magneto Elenco</title>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
  <link rel='stylesheet' href='mmf/stylesheets/questions.css'>

<style>

  div.trigger {  -webkit-animation: squiggle 2s infinite;  }

@-webkit-keyframes squiggle {

    50% { 
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);    } 

}


</style>

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
  
<!--     <div class='box-outline_campaign longhand longhand__campaign'>
      <div class="trigger">
        <img width="60" height="60" src="<?php echo $imagem[$aleatorio]; ?>"/>
      </div>
</div> -->

    <div class='box-outline_campaign longhand longhand__campaign'>

        <div class="selection-item__campaign">
          <button class="font-family color-font bold">
            <div class="stage">
              <div class="flashcard">
                <div class="front">
                  <img id='img_front' src="mmf/images/elenco_019589_20160913140545.jpg" height="60" width="60" alt="" />
                </div>
              </div>  
            </div>                
            <h1 class="bold">Ô Lá em Casa...</h1>
            <p class="font-weight__100">02/10/2016 <span>Participantes: 08</span> </p>
          </button>
        </div>

<!--         <div class="selection-item__campaign">
          <button class="font-family color-font bold">
            <div class="stage">
              <div class="flashcard">
                <div class="front">
                  <img src="mmf/images/elenco_019589_20160913140545.jpg" alt="" />
                </div> 
              </div>  
            </div>   
            <h1 class="bold">Ô Lá em Casa...</h1>
            <p class="font-weight__100">02/10/2016 <span>Participantes: 08</span> </p>
          </button>
        </div> -->

       <!--  <div class="selection-item__campaign">
          <button class="font-family color-font bold">
            <div class="stage">
              <div class="flashcard">
                <div class="front">
                  <img src="mmf/images/elenco_019589_20160913140545.jpg" alt="" />
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
 -->

// <script>
// var numImgCont = <?php echo json_encode($imagens) ?> ;
// numImgCont[0] = <?php echo json_encode($imagens[1] = "mmf/images/elenco_019589_20160913140545.jpg") ?> ;
// numImgCont[1] =  <?php echo json_encode($imagens[2] = "https://dummyimage.com/60x60/ba58ba/fff") ?> ;
// numImgCont[2] = <?php echo json_encode($imagens[3] = "https://dummyimage.com/60x60/2339b8/fff") ?> ;

// var imagens = (function loop(){
//         var container = document.getElementById("img_front");

//     if (numImgCont.length) {
//         setTimeout(function(){ 
//            $(".flashcard").toggleClass("flipped");
           
//             container.src = numImgCont.shift();
//             loop();
//         }, 2000);
//     }
    
//     return loop;
// })(); 

// </script>


<script src='mmf/javascripts/jquery-1.12.1.min.js'></script>
<script src='mmf/javascripts/questions.js'></script>

</body>
</html>
