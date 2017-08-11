<?php
require_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" >
<meta data-react-helmet="true" charset="utf-8"/>
<meta data-react-helmet="true" http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta data-react-helmet="true" name="description" content="Cadastre-se gratuitamente e encontre os trabalhos de audiovisual da sua cidade."/>
<meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1"/>
<meta data-react-helmet="true" name="mobile-web-app-capable" content="yes"/>
<meta data-react-helmet="true" name="apple-mobile-web-app-capable" content="yes"/>
<meta data-react-helmet="true" name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta data-react-helmet="true" name="apple-mobile-web-app-title" content="Magneto Elenco"/>
<meta data-react-helmet="true" name="msapplication-TileColor" content="#FFFFFF"/>
<meta data-react-helmet="true" property="og:site_name" content="Magneto Elenco"/>
<meta data-react-helmet="true" property="og:url" content="https://www.magnetoelenco.com.br"/>
<meta data-react-helmet="true" property="og:title" content="Agência e Marketplace de atores, modelos e talentos."/>
<title>Magneto Elenco</title>
<link rel="apple-touch-icon" sizes="57x57" href="images/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
<link rel="manifest" href="images/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheets/site.css">
</head>
<body>
	<section class="gradient" id="intro">

	  <header class="site-header cf">
	    <div class="container">
	      <div class="site-logo">
	        <img alt="" class="cursor" src="images/logo.svg" />
	      </div>
	      <nav class="site-nav">
	        <ul id="std-menu">
	          <li>
	            <a class="active line-right font-family font-normal color-primary cursor" href="">Entrar</a>
	          </li>
	          <li>
	            <a class="font-family font-normal color-primary cursor" href="">Cadastrar</a>
	          </li>
	        </ul>
	        <a href="" id="menu-trigger"><i class="fa fa-bars fa-lg"></i></a>
	      </nav>
	    </div>
	  </header>

	  <ul id="responsive-menu">
	    <li>
	      <a class="active font-family font-normal color-primary cursor" href="">Entrar</a>
	    </li>
	    <li>
	      <a class="font-family font-normal color-primary cursor" href="">Cadastrar</a>
	    </li>
	  </ul>
	  <div class="font-xlarge font-family color-primary bold" id="log"></div>
	  <div class="container-outline__button">
	    <button class="button button__medium"><img alt="busca" src="images/busca.svg" /><a class="font-family color-primary" href="">Procuro um perfil</a></button><button class="button button__medium"><img alt="job" src="images/job.svg" /><a class="font-family color-primary" href="">Quero trabalhar</a></button>
	  </div>
	  <a class="font-family color-primary font-small text-after" href="">Como funciona?</a><a class="scroll-down cursor" href="#after_gradient"><img alt="" class="cursor animated pulse infinite" src="images/scroll-down.svg" /></a>
	</section>

	<section id="after_gradient">
	  <div class="after_gradient">
	    <p class="font-family font-large color-primary">
	      Agência e Marketplace de atores, modelos e influenciadores
	    </p>
	  </div>
	</section>
<?php
// TOTAL DE AGENCIADOS CADASTRADOS
$result=mysqli_query($link, "SELECT COUNT(*) AS total FROM tb_elenco WHERE ativo<>'Não'");
$row=mysqli_fetch_array($result);
$n_agenciados = $row['total'];
// TOTAL DE CACHES PAGOS E JOBS
$result=mysqli_query($link, "SELECT SUM(cache_liquido) AS caches, COUNT(*) AS jobs FROM financeiro WHERE tipo_entrada = 'cache'");
$row=mysqli_fetch_array($result);
$caches_pagos = $row['caches'];
$caches_pagos_pieces = explode(".", $caches_pagos);
$caches_pagos = $caches_pagos_pieces[0];
$caches_pagos_cents = $caches_pagos_pieces[1];
$jobs = $row['jobs'];
?>
	<section id="numbers">
	  <h1 class="font-family font-xlarge color-secondary bold">
	    Nossos números
	  </h1>
	  <div class="numbers">
	    <div class="number-item">
	      <img alt="perfil" src="images/img_perfil.svg" />
	      <p class="number-title font-family font-xlarge color-secondary">
	        <span class="count"><?php echo $n_agenciados; ?></span><br /><span class="number-subtitle font-family color-secondary font-small">perfis ativos</span>
	      </p>
	    </div>
	    <div class="number-item">
	      <img alt="cache" src="images/img_cache.svg" />
	      <p class="number-title number-title__cache font-family font-xlarge color-secondary">
	        <span class="font-medium">R$</span><span class="count"><?php echo $caches_pagos; ?></span><span class="font-medium">,<?php echo $caches_pagos_cents; ?></span><br /><span class="number-subtitle number-subtitle__cache font-family color-secondary font-small">em cachês pagos desde 2009</span>
	      </p>
	    </div>
	    <div class="number-item">
	      <img alt="job" src="images/img_job.svg" />
	      <p class="number-title font-family font-xlarge color-secondary">
	        <span class="count"><?php echo $jobs; ?></span><br /><span class="number-subtitle font-family color-secondary font-small">trabalhos realizados</span>
	      </p>
	    </div>
	  </div>
	</section>

	<section id="registration_mode">
	  <div class="registration_mode">
	    <h1 class="font-family font-xlarge color-primary bold">
	      Modalidades de cadastro
	    </h1>
	    <p class="font-family font-medium">
	      Escolha o plano ideal para o seu perfil e comece a trabalhar
	    </p>
	    <div class="botoes_modalidades">
	      <button class="button-border_none gratuito"><img src="images/botao-gratuito.svg" /></button><button class="button-border_none premium"><img src="images/botao-premium.svg" /></button><button class="button-border_none profissional"><img src="images/botao-profissional.svg" /></button>
	    </div>
	  </div>
	</section>

	<section id="testimony">
	  <div class="testimony">

	    <section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fcleo.diaz.96%2Fposts%2F1131334576960368%3A0&width=350&show_text=false&appId=1267791739920152&height=387" width="350" height="387" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>

	    <section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FSenhorilMoura%2Fposts%2F135843056860640%3A0&width=350&show_text=false&appId=1267791739920152&height=387" width="350" height="387" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>

		<section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fluckaslimma2.0%2Fposts%2F752438704890508%3A0&width=350&show_text=false&appId=1267791739920152&height=349" width="350" height="349" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>

	    <section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fcleber.saniz%2Fposts%2F1018937208174037%3A0&width=350&show_text=false&appId=1267791739920152&height=349" width="350" height="349" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>
	    
	     <section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fgabefariasoficial%2Fposts%2F10202300406446291%3A1&width=350&show_text=false&appId=1267791739920152&height=330" width="350" height="330" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>

		<section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fjanainaquaseperfect%2Fposts%2F1687266828187733%3A0&width=350&show_text=false&appId=1267791739920152&height=330" width="350" height="330" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>

		<section class="regular slider">
	      <div>
	        <div class="testimony-content">
	          <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbricio.weitz%2Fposts%2F1437562983130253%3A0&width=350&show_text=false&appId=1267791739920152&height=330" width="350" height="330" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	        </div>
	      </div>
	    </section>

	  </div>
	</section>

	<section id="how">
	  <div class="how">
	    <div class="how-title">
	      <h1 class="color-primary font-xlarge bold">
	        Como funciona?<br /><span class="how-subtitle color-primary font-normal">para atores, modelos e influenciadores</span>
	      </h1>
	    </div>
	    <div class="how-detail">
	      <div class="how-detail_item">
	        <img alt="user" src="images/user.svg" />
	        <p class="font-family font-small color-primary">
	          Cadastre-se
	        </p>
	      </div>
	      <div class="how-detail_item">
	        <img alt="user" class="arrow-right" src="images/arrow-right.svg" />
	      </div>
	      <div class="how-detail_item">
	        <img alt="job" src="images/job-large.svg" />
	        <p class="font-family font-small color-primary">
	          Aceite trabalhos
	        </p>
	      </div>
	      <div class="how-detail_item">
	        <img alt="user" class="arrow-right" src="images/arrow-right.svg" />
	      </div>
	      <div class="how-detail_item">
	        <img alt="cache" src="images/cache-large.svg" />
	        <p class="font-family font-small color-primary">
	          Receba via Magneto
	        </p>
	      </div>
	    </div>
	    <div class="how-footer">
	      <h3 class="color-primary font-normal">
	        Agência e marketplace de atores e modelos, num só lugar.
	      </h3>
	    </div>
	  </div>
	</section>

	<section id="footer">
	  <div class="footer-social">
	    <p class="footer-social__title color-primary font-small">
	      Redes Sociais
	    </p>
	    <nav class="footer-social__img">
	      <ul>
	        <li>
	          <a href="#"><img alt="" src="images/social.svg" /></a>
	        </li>
	        <li>
	          <a href="#"><img alt="" src="images/social.svg" /></a>
	        </li>
	        <li>
	          <a href="#"><img alt="" src="images/social.svg" /></a>
	        </li>
	        <li>
	          <a href="#"><img alt="" src="images/social.svg" /></a>
	        </li>
	        <li>
	          <a href="#"><img alt="" src="images/social.svg" /></a>
	        </li>
	      </ul>
	    </nav>
	  </div>
	  <div class="footer-social">
	    <p class="footer-social__title color-primary font-small">
	      Agência e Marketplace
	    </p>
	    <nav class="footer-social__img footer-sitemap__img">
	      <ul>
	        <li>
	          <a class="color-primary font-small" href="#">Quem somos</a>
	        </li>
	        <li>
	          <a class="color-primary font-small" href="#">Mídia e imprensa</a>
	        </li>
	      </ul>
	    </nav>
	  </div>
	  <div class="footer-social">
	    <p class="footer-social__title color-primary font-small">
	      Mais informações
	    </p>
	    <nav class="footer-social__img footer-info__img">
	      <ul>
	        <li>
	          <a class="color-primary font-small" href="#">Perguntas frequentes / FAQ</a>
	        </li>
	        <li>
	          <a class="color-primary font-small" href="#">Contato</a>
	        </li>
	      </ul>
	    </nav>
	  </div>
	</section>

	<div class="last-footer">
	  <p class="color-primary font-small">
	    2009-2017 © Magneto Elenco - CNPJ: 10.880.184/0001-85 - SIA Trecho 17 Rua 3 Lote 600 3º andar, Brasília-DF - Termos e Serviços - Política de privacidade
	  </p>
	</div>

	<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
	<script src="javascripts/all.js"></script>
</body>
</html>
