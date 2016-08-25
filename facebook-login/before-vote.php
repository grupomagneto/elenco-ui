<?php
  require_once 'config.php';

session_start();

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


  <div class="swiper-wrapper">

<!-- <div class="swiper-slide gradient">
      <div class="box">
        <div class="row">
          <p class="content-slide_after-login font-family color-font medium">
            Conhecer o perfil de quem vota é essencial na escolha do(a) modelo para uma propaganda.
          </p>
        </div>
        <div class="row">
          <p class="content-slide_after-login font-family color-font medium">
            Ajude seu(ua) amigo(a) respondendo 5 perguntas:
          </p>
        </div>
        <div class="row">
          <input class="button button-medium font-family color-font medium" value="Completar meu perfil" type="submit"></input>
        </div>
      </div>
    </div>

   <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual sua área de ocupação?
      </h1>
      <div class="box-outline_column">
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

    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual sua renda familiar?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="880" name="income" type="submit" value="880" /><label class="radio-inline__label-full cursor" for="880">Até R$ 880</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="880-1760" name="income" type="submit" value="880-1760" /><label class="radio-inline__label-full cursor" for="880-1760">De R$ 880 a R$ 1760</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="1760-4400" name="income" type="submit" value="1760-4400" /><label class="radio-inline__label-full cursor" for="1760-4400">De R$ 1760 a R$ 4400</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="4400-8800" name="income" type="submit" value="4400-8800" /><label class="radio-inline__label-full cursor" for="4400-8800">De R$  4400 a R$ 8800</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="8800" name="income" type="submit" value="8800" /><label class="radio-inline__label-full cursor" for="8800">Mais de R$ 8800</label>
        </div>
      </div>
    </div>
  
    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual a cor da sua pele?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="amarela" name="skincolor" type="radio" value="amarela" /><label class="radio-inline__label-full cursor" for="amarela">Amarela</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="branca" name="skincolor" type="radio" value="branca" /><label class="radio-inline__label-full cursor" for="branca">Branca</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="indigena" name="skincolor" type="radio" value="indigena" /><label class="radio-inline__label-full cursor" for="indigena">Indígena</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="negra" name="skincolor" type="radio" value="negra" /><label class="radio-inline__label-full cursor" for="negra">Negra</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="parda" name="skincolor" type="radio" value="parda" /><label class="radio-inline__label-full cursor" for="parda">Parda</label>
        </div>
      </div>
    </div>

    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual seu nível de escolaridade?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="fundamental" name="scholarity" type="submit" value="fundamental" /><label class="radio-inline__label-full cursor" for="fundamental">Ensino Fundamental</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="medio" name="scholarity" type="submit" value="medio" /><label class="radio-inline__label-full cursor" for="medio">Ensino Médio</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="superior" name="scholarity" type="submit" value="superior" /><label class="radio-inline__label-full cursor" for="superior">Ensino Superior</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="posgraduacao" name="scholarity" type="submit" value="posgraduacao" /><label class="radio-inline__label-full cursor" for="posgraduacao">Pós-Graduação</label>
        </div>
      </div>
    </div>

    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual o seu estado civil?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="solteiro" name="relationship_status" type="submit" value="solteiro" /><label class="radio-inline__label-full cursor" for="solteiro">Solteiro(a)</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="namorando" name="relationship_status" type="submit" value="namorando" /><label class="radio-inline__label-full cursor" for="namorando">Namorando(a)</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="casado" name="relationship_status" type="submit" value="casado" /><label class="radio-inline__label-full cursor" for="casado">Casado(a)</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="divorciado" name="relationship_status" type="submit" value="divorciado" /><label class="radio-inline__label-full cursor" for="divorciado">Divorciado(a)</label>
        </div>
      </div>
    </div>-->

    <div class="swiper-slide gradient">
      <div class="box">
        <div class="row">
          <h1 class="content-slide_after-login font-family color-font medium style-font">
            Pronto!
          </h1>
        </div>
        <div class="row">
          <p class="content-slide_after-login font-family color-font medium">
            Agora é só votar no perfil mais indicado para o papel.
          </p>
        </div>
        <div class="row">
          <p class="content-slide_after-login font-family color-font medium">
            Leia a pergunta e vote até o final par ajudar na escolha do seu amigo
          </p>
        </div>
        <div class="row">
          <button class="button button-medium font-family color-font medium">Começar a votação</button>
        </div>
      </div>
    </div>
<!--
    <div class="swiper-slide gradient">
      <div class="pergunta">
        <img src="images/p1.svg" />
      </div>
      <div class="box">
        <div class="row">
          <h1 class="pergunta font-family color-font medium">
            Pergunta:
          </h1>
        </div>
        <div class="row">
          <p class="content-slide_after-login font-family color-font medium">
            Se você tivesse que pegar um empréstimo num banco, quem seria um(a) melhor gerente?
          </p>
        </div>
      </div>
    </div>

    <div class="swiper-slide gradient">
      <div class="pergunta font-family color-font medium">
        Se tivesse que pegar um empréstimo num banco, quem seria um(a) melhor gerente?
      </div>
      <div class="box-outline_compare">
        <div class="column-compare">
          <div class="box-compare box-compare_style"></div>
        </div>
        <div class="box">
          <img class="or" src="images/or.svg" />
        </div>
        <div class="column-compare_two">
          <div class="box-compare box-compare_style"></div>
        </div>
      </div>
      <div class="box-outline__counter-compare">
        <img src="images/counter-compare.svg" />
      </div>
      <div class="box-outline__counter-compare">
        <div id="line" value="10"></div>
      </div>
    </div>

    <div class="swiper-slide gradient">
      <div class="pergunta font-family color-font medium">
        Estes são os perfis que você escolheu para a fase final:
      </div>
      <div class="box-outline-choose">
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-choose"></div>
        <div class="box-outline__counter-compare">
          <button class="button button-medium font-family color-font medium">Avançar para a final</button>
        </div>
      </div>
    </div>

    <div class="swiper-slide gradient">
      <div class="pergunta font-family color-font medium">
        Obrigada por votar<br />Veja como está a classificação:
      </div>
      <div class="box-outline-choose box-outline-choose__rating">
        <div class="box-choose__rating">
          <div class="line__rating-one"></div>
        </div>
        <div class="box-choose__rating">
          <div class="line__rating-two"></div>
        </div>
        <div class="box-choose__rating">
          <div class="line__rating-third"></div>
        </div>


        	<button class="button-login button button-medium" type="submit">
            <div class="button-login_image">
              <img src="images/fb.svg" />
            </div>
            <div class="button-login_content">
              <p class="font-family color-font medium">
                Convidar seus amigos
              </p>
            </div>
          </button>

      </div>
    </div> -->


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