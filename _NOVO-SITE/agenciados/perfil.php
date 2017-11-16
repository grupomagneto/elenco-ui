<?php
if(!session_id()) {
  session_start();
}
if (empty($_SESSION['id_elenco'])) {
  header('location: ../cadastro/index.php');  
}
if (!empty($_SESSION['id_elenco'])) {
  require '../_sys/conecta.php';
  $id_elenco = $_SESSION['id_elenco'];
  $sql = "SELECT * FROM tb_elenco WHERE id_elenco = '$id_elenco'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  $nome = $row['nome'];
  if (!empty($row['nome_artistico']) && $row['nome_artistico'] != "") {
  	$nome_artistico = $row['nome_artistico'];
  }
  else {
  	$nome_partes = explode(" ", $nome);
  	$nome_artistico = $nome_partes[0]." ".$nome_partes[1];
  }
  
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" >
	<meta data-react-helmet="true" charset="utf-8"/>
	<meta data-react-helmet="true" http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta data-react-helmet="true" name="description" content="Cadastre-se gratuitamente e encontre os trabalhos de audiovisual da sua cidade."/>
	<meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Agência e Marketplace de atores, modelos e influenciadores.">
	<meta name="keywords" content="Agência, modelos, casting, elenco, cadastro, trabalhos, publicidade, propaganda, anúncio, ator, atriz, influenciador, digital, online, agência de modelos, agência de modelo, marketplace">
	<meta name="author" content="Magneto Elenco">
	<meta data-react-helmet="true" name="mobile-web-app-capable" content="yes"/>
	<meta data-react-helmet="true" name="apple-mobile-web-app-capable" content="yes"/>
	<meta data-react-helmet="true" name="apple-mobile-web-app-status-bar-style" content="black"/>
	<meta data-react-helmet="true" name="apple-mobile-web-app-title" content="Magneto Elenco"/>
	<meta data-react-helmet="true" name="msapplication-TileColor" content="#FFFFFF"/>
	<meta data-react-helmet="true" property="og:site_name" content="Magneto Elenco"/>
	<meta data-react-helmet="true" property="og:url" content="https://www.magnetoelenco.com.br"/>
	<meta data-react-helmet="true" property="og:title" content="Agência e Marketplace de atores, modelos e influenciadores."/>
	<title>Magneto Elenco - Atores, modelos e influenciadores para a sua marca</title>
	<link rel="apple-touch-icon" sizes="57x57" href="../_images/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../_images/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../_images/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../_images/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../_images/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../_images/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../_images/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../_images/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../_images/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../_images/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../_images/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../_images/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../_images/icon/favicon-16x16.png">
	<link rel="shortcut icon" type="image/png" sizes="192x192"  href="../_images/icon/android-icon-192x192.png">
	<link rel="shortcut icon" type="image/png" sizes="32x32" href="../_images/icon/favicon-32x32.png">
	<link rel="shortcut icon" type="image/png" sizes="96x96" href="../_images/icon/favicon-96x96.png">
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="../_images/icon/favicon-16x16.png">
	<link rel="manifest" href="../_images/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../_images/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="../_css/normalize.css" type="text/css" />
	<link rel="stylesheet" href="../_css/flexbox.css" type="text/css" />
	<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.3.8/slick.css">
	<link rel="stylesheet" href="../_css/style.css" type="text/css" />
	<link rel="stylesheet" href="../_css/agenciados.css" type="text/css" />
</head>
<body>

<div class="gradient">
  <div class="container">    
  	<div class="mancha flexbox relative wrap justify-center">
        <div class="menu align-items-center flexbox nowrap space-between-horizontal">
			
		<div id="toggle">
			<img src="../_images/notificacao.svg" class="notificação" />
			<span class="numero avenir x-small white">1</span>
		</div>

		<div id="menu-note">
			<ul>
				<li><a class="avenir white small" href="#">Notificação</a></li>
			</ul>
		</div>
            <!-- fim menu notificação  -->

        <div class="logo absolute align-items-center flexbox nowrap space-between-horizontal  justify-center ">
          <img src="../_images/logo-horizontal.svg" alt="logo" />
        </div>

    	<nav class="menu-trigger">
			<ul id="ul-menu-trigger">
				<li><a class="avenir white small" href="#">Entrar</a></li>
				<li><a class="avenir white small" href="#">Cadastrar</a></li>
			</ul>
		</nav>

        </div>

        <div class="conteudo conteudo-perfil relative align-items-center flexbox nowrap space-between-horizontal">
        	<div class="profile absolute flexbox text-align-center column justify-center nowrap ">
        		<p class="avenir white medium bold text-align-left"><?php echo $nome_artistico; ?></p>
        		<p class="avenir white small text-align-left">Plano Gratuito</p>

            <div class="barra_progresso">
              <span class="barra_progresso_porcentagem"></span>
            </div>

        	</div>
					<div class="img-profile absolute">
        			<img class="img-circle" src="../_images/elenco_019589_20160913140545.jpg" alt="agenciado">
	
					</div>
					<div class="depois-profile absolute align-items-center flexbox nowrap space-between-horizontal text-align-center justify-center center-horizontal">
							<p class="avenir white x-small">25% do perfil completado</p>
					</div>

<!-- inicio accordion -->
<div class="accordions absolute flexbox text-align-center column justify-center nowrap">
	<button class="accordion avenir white small " id="accordion1">
		<img src="../_images/upgrade.svg" alt="Upgrade Grátis">
		<p class="avenir white medium ">Upgrade grátis</p>
	</button>
		<div class="panel avenir white " id="panel1">
			<div class="conteudo_panel">
		  		<h1 class="avenir color_87 large text-align-left">Quer virar Premium sem pagar nada?</h1>
		  		<p class="avenir white small text-align-left">Compartilhe o link abaixo para seus amigos se cadastrarem na Magneto Elenco. Seu plano será promovido
para Premium quando 3 pessoas se inscreverem através desse link.</p>
		  		<p class="avenir white small text-align-left">E se um deles optar pelo Premium, você poderá vir junto com ele ao nosso estúdio e fazer também suas fotos de cadastro com um fotógrafo profissional. </p>

		  		<p class="avenir color_87 small bold text-align-left">Copie e compartilhe o seu link:</p>

		  		<div class="textbox relative">
		  			<input type="text" value="http://magnetoelenco.com.br/Xy47H8" class="avenir white small relative">
		  		</div>
				
			</div>
		</div>

	<button class="accordion avenir white small" id="accordion2">
		<img src="../_images/meuperfil.svg" alt="Meu perfil">
		<p class="avenir white medium ">Meu perfil</p>
	</button>
		<div class="panel avenir white " id="panel2">
			<div class="conteudo_panel">
		  		<?php include "fisicos.php"; ?>
			</div>
		</div>

	<button class="accordion avenir white small" id="accordion3">
		<img src="../_images/meucache.svg" alt="Meus cachês">
		<p class="avenir white medium ">Meus cachês</p>
	</button>
		<div class="panel avenir white" id="panel3">
			<div class="conteudo_panel">
		  		<?php include "caches.php"; ?>
			</div>
		</div>

	<button class="accordion avenir white small" id="accordion4">
		<img src="../_images/fotosvideos.svg" alt="Fotos / vídeos">
		<p class="avenir white medium ">Fotos / vídeos</p>
	</button>
		<div class="panel avenir white " id="panel4">
			<div class="conteudo_panel">
		  		<?php include "fotosevideos.php"; ?>
			</div>
		</div>

	<button class="accordion avenir white small" id="accordion5">
		<img src="../_images/meuscontatos.svg" alt="Meus contatos">
		<p class="avenir white medium ">Meus contatos</p>
	</button>
		<div class="panel avenir white " id="panel5">
			<div class="conteudo_panel">
		  		<?php include "contato.php"; ?>
			</div>
		</div>
	
</div>
<!-- fim accordion 	 -->

        </div>
	
		</div>

<footer class="seta footer-perfil relative align-items-center flexbox nowrap space-between-horizontal text-align-center justify-center center-horizonta">
	<p class="avenir white x-small ">Magneto Elenco © 2009- <?php echo date('Y'); ?></p>
</footer>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js"></script>
<script type="text/javascript" src="../_js/gradient.js"></script>
<script type="text/javascript" src="../_js/progressbar.js"></script>
<script type="text/javascript" src="../_js/agenciados.js"></script>

</body>
</html>
<?php
}
mysqli_close($link);
?>
