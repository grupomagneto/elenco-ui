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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 

</head>
<body>
<form action="register.php" method="post" id="form">


<div class="swiper-wrapper">

    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual a cor da sua pele?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font medium">
          <input class="radio-inline__input-full" id="amarela" name="skincolor" type="submit" value="amarela" /><label class="radio-inline__label-full cursor" for="amarela">Amarela</label>
        </div>
        <div class="column-full font-family color-font medium">
          <input class="radio-inline__input-full" id="branca" name="skincolor" type="submit" value="branca" /><label class="radio-inline__label-full cursor" for="branca">Branca</label>
        </div>
        <div class="column-full font-family color-font medium">
          <input class="radio-inline__input-full" id="indigena" name="skincolor" type="submit" value="indigena" /><label class="radio-inline__label-full cursor" for="indigena">Indígena</label>
        </div>
        <div class="column-full font-family color-font medium">
          <input class="radio-inline__input-full" id="negra" name="skincolor" type="submit" value="negra" /><label class="radio-inline__label-full cursor" for="negra">Negra</label>
        </div>
        <div class="column-full font-family color-font medium">
          <input class="radio-inline__input-full" id="parda" name="skincolor" type="submit" value="parda" /><label class="radio-inline__label-full cursor" for="parda">Parda</label>
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