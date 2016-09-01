<?php
  require_once 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="stylesheets/site.css">
	<link rel="stylesheet" href="stylesheets/swiper.min.css">

</head>
<body>
<form action="register.php" method="post" id="form">

<div class="swiper-container">

  <div class="swiper-wrapper">


   <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual sua área de ocupação?
      </h1>
      <div class="box-outline_column occupation">
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="agricultura" name="occupation" type="submit" value="agricultura"  /><label class="radio-inline__label cursor" for="agricultura">Agricultura</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="atvdomestica" name="occupation" type="submit" value="atvdomestica" /><label class="radio-inline__label cursor" for="atvdomestica">Atividade Doméstica</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="comercio" name="occupation" type="submit" value="comercio" /><label class="radio-inline__label cursor" for="comercio">Comercio</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="ensino" name="occupation" type="submit" value="ensino" /><label class="radio-inline__label cursor" for="ensino">Ensino</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="estudante" name="occupation" type="submit" value="estudante" /><label class="radio-inline__label cursor" for="estudante">Estudante</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="funcpublico" name="occupation" type="submit" value="funcpublico" /><label class="radio-inline__label cursor" for="funcpublico">Funcionalismo Público</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="inativo" name="occupation" type="submit" value="inativo" /><label class="radio-inline__label cursor" for="inativo">Inativo(a)</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="indouconstrucao" name="occupation" type="submit" value="indouconstrucao" /><label class="radio-inline__label cursor" for="indouconstrucao">Industria ou Construção</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="saude" name="occupation" type="submit" value="saude" /><label class="radio-inline__label cursor" for="saude">Saúde</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="servicos" name="occupation" type="submit" value="servicos" /><label class="radio-inline__label cursor" for="servicos">Serviços</label>
        </div>
      </div>
    </div>


 </div>
 </div>

</form>



 

	<script src="javascripts/jquery-1.12.1.min.js"></script>
	<script src="javascripts/swiper.jquery.min.js"></script>
	<script src="javascripts/swiper.min.js"></script>
	<script src="javascripts/progressbar.min.js"></script>
	<script src="javascripts/all.js"></script>

<script>
	
var colors = new Array(
[165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
var colorIndices = [0,1,2,3];

var gradientSpeed = 0.001;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient')},10);
	
</script>

</body>
</html>