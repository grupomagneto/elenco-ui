<?php
  require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Magneto Elenco - jogo</title>
  <link rel="stylesheet" href="stylesheets/site.css">
  <link rel="stylesheet" href="stylesheets/swiper.min.css">

</head>
<body> 
  <?php if (!isset($_SESSION['facebook'])): ?>

<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide gradient-slide_first">
      <div class="image-slide">
        <div class="image-game"></div>
      </div>
    </div>
    <div class="swiper-slide gradient-slide_second">
      <p class="content-slide font-family color-font medium">
        Ajude seus amigos a participarem de propagandas
      </p>
    </div>
    <div class="footer-index">
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-slide gradient-slide_third">
      <p class="content-slide font-family color-font medium">
        Os perfis mais votados são apresentados aos anunciantes
      </p>
    </div>
    <div class="swiper-slide gradient-slide_fourth">
      <div class="image-slide">
        <div class="image-game"></div>
      </div>
     <a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>"> <button class="button-login button button-medium">
        <div class="button-login_image">
          <img src="images/fb.svg" />
        </div>
        <div class="button-login_content">
          <p class="font-family color-font medium">
            Entrar com Facebook
          </p>
        </div>
      </button></a>
    </div>
  <?php else: ?>
 <div class="swiper-slide gradient">
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
          <button class="button button-medium font-family color-font medium">Completar meu perfil</button>
        </div>
      </div>
    </div>
    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual sua área de ocupação?
      </h1>
      <div class="box-outline_column">
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="agricultura" name="Agricultura" type="radio" value="agricultura" /><label class="radio-inline__label cursor" for="agricultura">Agricultura</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="atvdomestica" name="atvdomestica" type="radio" value="atvdomestica" /><label class="radio-inline__label cursor" for="atvdomestica">Atividade Doméstica</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="comercio" name="comercio" type="radio" value="comercio" /><label class="radio-inline__label cursor" for="comercio">Comercio</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="ensino" name="ensino" type="radio" value="ensino" /><label class="radio-inline__label cursor" for="ensino">Ensino</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="estudante" name="estudante" type="radio" value="estudante" /><label class="radio-inline__label cursor" for="estudante">Estudante</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="funcpublico" name="funcpublico" type="radio" value="funcpublico" /><label class="radio-inline__label cursor" for="funcpublico">Funcionalismo Público</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="inativo" name="inativo" type="radio" value="inativo" /><label class="radio-inline__label cursor" for="inativo">Inativo(a)</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="indouconstrucao" name="indouconstrucao" type="radio" value="indouconstrucao" /><label class="radio-inline__label cursor" for="indouconstrucao">Industria ou Construção</label>
        </div>
        <div class="column font-family color-font small">
          <input class="radio-inline__input" id="saude" name="saude" type="radio" value="saude" /><label class="radio-inline__label cursor" for="saude">Saúde</label>
        </div>
        <div class="column-two font-family color-font small">
          <input class="radio-inline__input" id="servicos" name="servicos" type="radio" value="servicos" /><label class="radio-inline__label cursor" for="servicos">Serviços</label>
        </div>
      </div>
    </div>
    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual sua renda familiar?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="880" name="880" type="radio" value="880" /><label class="radio-inline__label-full cursor" for="880">Até R$ 880</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="880-1760" name="880-1760" type="radio" value="880-1760" /><label class="radio-inline__label-full cursor" for="880-1760">De R$ 880 a R$ 1760</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="1760-4400" name="1760-4400" type="radio" value="1760-4400" /><label class="radio-inline__label-full cursor" for="1760-4400">De R$ 1760 a R$ 4400</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="4400-8800" name="4400-8800" type="radio" value="4400-8800" /><label class="radio-inline__label-full cursor" for="4400-8800">De R$  4400 a R$ 8800</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="8800" name="8800" type="radio" value="8800" /><label class="radio-inline__label-full cursor" for="8800">Mais de R$ 8800</label>
        </div>
      </div>
    </div>
    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual a cor da sua pele?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="amarela" name="amarela" type="radio" value="amarela" /><label class="radio-inline__label-full cursor" for="amarela">Amarela</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="branca" name="branca" type="radio" value="branca" /><label class="radio-inline__label-full cursor" for="branca">Branca</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="indigena" name="indigena" type="radio" value="indigena" /><label class="radio-inline__label-full cursor" for="indigena">Indígena</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="negra" name="negra" type="radio" value="negra" /><label class="radio-inline__label-full cursor" for="negra">Negra</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="parda" name="parda" type="radio" value="parda" /><label class="radio-inline__label-full cursor" for="parda">Parda</label>
        </div>
      </div>
    </div>
    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual seu nível de escolaridade?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="fundamental" name="ensinofundamental" type="radio" value="fundamental" /><label class="radio-inline__label-full cursor" for="fundamental">Ensino Fundamental</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="medio" name="ensinomedio" type="radio" value="medio" /><label class="radio-inline__label-full cursor" for="medio">Ensino Médio</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="superior" name="ensinosuperior" type="radio" value="superior" /><label class="radio-inline__label-full cursor" for="superior">Ensino Superior</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="posgraduacao" name="posgraduacao" type="radio" value="posgraduacao" /><label class="radio-inline__label-full cursor" for="posgraduacao">Pós-Graduação</label>
        </div>
      </div>
    </div>
    <div class="swiper-slide gradient">
      <h1 class="pergunta font-family color-font medium">
        Qual o seu estado civil?
      </h1>
      <div class="box-outline_column">
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="solteiro" name="solteiro" type="radio" value="solteiro" /><label class="radio-inline__label-full cursor" for="solteiro">Solteiro(a)</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="namorando" name="namorando" type="radio" value="namorando" /><label class="radio-inline__label-full cursor" for="namorando">Namorando(a)</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="casado" name="casado" type="radio" value="casado" /><label class="radio-inline__label-full cursor" for="casado">Casado(a)</label>
        </div>
        <div class="column-full font-family color-font small">
          <input class="radio-inline__input-full" id="divorciado" name="divorciado" type="radio" value="divorciado" /><label class="radio-inline__label-full cursor" for="divorciado">Divorciado(a)</label>
        </div>
      </div>
    </div>
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
        <a href="logout.php" class="btn btn-danger"><button class="button-login button button-medium">
          <div class="button-login_image">
            <img src="images/fb.svg" />
          </div>
          <div class="button-login_content">
            <p class="font-family color-font medium">
              Convidar seus amigos
            </p>
          </div>
        </button></a>
      </div>
    </div>

  <?php endif; ?>
  </div>
</div>

<script src="javascripts/jquery-1.12.1.min.js"></script>
<script src="javascripts/swiper.jquery.min.js"></script>
<script src="javascripts/swiper.min.js"></script>
<script src="javascripts/progressbar.min.js"></script>
<script src="javascripts/all.js"></script>


</body>
</html>