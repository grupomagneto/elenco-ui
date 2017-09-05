<?php
if(!session_id()) {
  session_start();
}
if (empty($_SESSION['id_elenco'])) {
  header('location: index.php');  
}
if (!empty($_SESSION['id_elenco'])) {
  require '../_sys/conecta.php';
  $id_elenco = $_SESSION['id_elenco'];
  date_default_timezone_set('America/Sao_Paulo');
  $hoje = date('Y-m-d', time());
  $timestamp = date('Y-m-d H:i:s', time());
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ip = $_SERVER['REMOTE_ADDR'];
  }
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
<link rel="stylesheet" href="../_css/style.css" type="text/css" />
<link rel="stylesheet" href="../_css/swiper.min.css" type="text/css" />
<link rel="stylesheet" href="../_css/cropper.css" type="text/css" />
<link rel="stylesheet" href="../_css/drum.css" type="text/css" />
<link rel="stylesheet" href="../_css/cadastro.css" type="text/css" />
</head>
<body>
<?php $data_desconto = "Sáb 5 de ago às 11:00"; ?>
<div class="gradient">
  <div class="container">
    <div class="mancha flexbox relative wrap">
        <div class="menu align-items-center flexbox nowrap space-between-horizontal">
            <img src="../_images/seta-voltar.svg" class="voltar" />
            <div class="barra_progresso">
              <span class="barra_progresso_porcentagem"></span>
            </div>
            <img src="../_images/menu.svg" class="mini-menu" />
        </div>
      <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php
        // Checa o que já está no DB
        $sql = "SELECT * FROM tb_elenco WHERE id_elenco = '$id_elenco'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1) {
          $_SESSION['dt_nascimento']  = $row['dt_nascimento'];
          $_SESSION['email']          = $row['email'];
          $_SESSION['sexo']           = $row['sexo'];
          $_SESSION['cpf']            = $row['cpf'];
          $_SESSION['celular']        = $row['tl_celular'];
          $_SESSION['cep']            = $row['cep'];
          $_SESSION['pele']           = $row['pele'];
        }
        // CHECA SE O FACEBOOK ENTREGOU UMA DATA DE NASCIMENTO
        if (empty($_SESSION['dt_nascimento']) || $_SESSION['dt_nascimento'] == "0000-00-00") {
          echo"<div class='swiper-slide' id='03-0-01_qual-a-sua-data-de-nascimento'>";include "perguntas/03-0-01.php";echo"</div>";
        }
        // SE EXISTE UMA DATA, SE É MAIOR DE IDADE
        if (!empty($_SESSION['dt_nascimento']) && $_SESSION['dt_nascimento'] != "0000-00-00") {
          $age = date_diff(date_create($_SESSION['dt_nascimento']), date_create('today'))->y;
          if ($age < 18) {
            echo"<div class='swiper-slide' id='03-0-02_voce-e-menor-de-idade'>";include "perguntas/03-0-02.php";echo"</div>";
          }
        }
        // CHECA SE O E-MAIL NÃO VEIO VAZIO
        if (empty($_SESSION['email']) || $_SESSION['email'] == "") {
          echo"<div class='swiper-slide' id='03-0-04_qual-o-seu-email'>";include "perguntas/03-0-04.php";echo"</div>";
        }
        // CHECA O GENERO
        if (empty($_SESSION['sexo']) || $_SESSION['sexo'] == "") {
          echo"<div class='swiper-slide' id='03-0-03_qual-o-seu-sexo'>";include "perguntas/03-0-03.php";echo"</div>";
        }
        ?>
        <!-- QUEM VOCÊ DESEJA CADASTRAR -->
          <div class="swiper-slide" id="03-1-01_quem-voce-deseja-cadastrar">            <?php include "perguntas/03-1-01.php"; ?></div>
        <?php
        // CHECA O CPF
        if (empty($_SESSION['cpf']) || $_SESSION['cpf'] == "") {
          echo"<div class='swiper-slide' id='03-1-02_qual-o-seu-cpf'>";include 'perguntas/03-1-02.php';echo"</div>";
        }
        // CHECA O CELULAR
        if (empty($_SESSION['celular']) || $_SESSION['celular'] == "") {
          echo"<div class='swiper-slide' id='03-1-03_qual-o-seu-telefone-celular'>";include 'perguntas/03-1-03.php';echo"</div>";
        }
        // CHECA O CEP
        if (empty($_SESSION['cep']) || $_SESSION['cep'] == "") {
          echo"<div class='swiper-slide' id='03-1-04_qual-o-cep-da-sua-residencia'>";include 'perguntas/03-1-04.php';echo"</div>";
        }
        // CHECA A COR DA PELE
        if (empty($_SESSION['pele']) || $_SESSION['pele'] == "") {
          echo"<div class='swiper-slide' id='04-1-01_qual-a-cor-da-sua-pele'>";include 'perguntas/04-1-01.php';echo"</div>";
        }
        ?>
          <div class='swiper-slide' id='04-1-02_voce-tem-registro-drt'>                 <?php include 'perguntas/04-1-02.php'; ?></div>
          <div class='swiper-slide' id='04-1-03_envie-uma-foto-do-seu-registro-drt'>    <?php include 'perguntas/04-1-03.php'; ?></div>
          <div class='swiper-slide' id='04-2-01_qual-o-sexo-do-menor'>                  <?php include 'perguntas/04-2-01.php'; ?></div>
          <div class='swiper-slide' id='04-2-02_o-menor-tem-cpf-proprio'>               <?php include 'perguntas/04-2-02.php'; ?></div>
          <div class='swiper-slide' id='04-2-03_qual-o-cpf-do-menor'>                   <?php include 'perguntas/04-2-03.php'; ?></div>
          <div class='swiper-slide' id='04-2-04_qual-o-nome-completo-dele'>             <?php include 'perguntas/04-2-04.php'; ?></div>
          <div class='swiper-slide' id='04-2-05_qual-a-data-de-nascimento-dele'>        <?php include 'perguntas/04-2-05.php'; ?></div>
          <div class='swiper-slide' id='04-2-06_qual-a-cor-da-pele-dele'>               <?php include 'perguntas/04-2-06.php'; ?></div>
          <div class='swiper-slide' id='05-0-01_clique-e-conheca-nossos-planos'>        <?php include 'perguntas/05-0-01.php'; ?></div>
          <div class='swiper-slide' id='05-0-02_clique-e-conheca-nossos-planos_drt'>    <?php include 'perguntas/05-0-02.php'; ?></div>
          <div class='swiper-slide' id='05-1-01_perfeito-para-comecar'>                 <?php include 'perguntas/05-1-01.php'; ?></div>
          <div class='swiper-slide' id='05-1-02_perfeito-para-quem-tem-drt'>            <?php include 'perguntas/05-1-02.php'; ?></div>
          <div class='swiper-slide' id='05-1-03_assista-ao-video'>                      <?php include 'perguntas/05-1-03.php'; ?></div>
          <div class='swiper-slide' id='05-1-04_envie-uma-foto-sorrindo'>               <?php include 'perguntas/05-1-04.php'; ?></div>
          <div class='swiper-slide' id='05-1-05_agora-uma-foto-sem-sorrir'>             <?php include 'perguntas/05-1-05.php'; ?></div>
          <div class='swiper-slide' id='05-1-06_cadastro-concluido-gratuito'>           <?php include 'perguntas/05-1-06.php'; ?></div>
          <div class='swiper-slide' id='05-2-01_mais-chances-de-trabalhar'>             <?php include 'perguntas/05-2-01.php'; ?></div>
          <div class='swiper-slide' id='05-2-02_ideal-para-quem-trabalha-muito'>        <?php include 'perguntas/05-2-02.php'; ?></div>
          <div class='swiper-slide' id='05-2-03_desconto-para-horario-pre-fixado'>      <?php include 'perguntas/05-2-03.php'; ?></div>
          <div class='swiper-slide' id='05-2-04_escolha-o-horario-da-sessao-de-fotos'>  <?php include 'perguntas/05-2-04.php'; ?></div>
          <div class='swiper-slide' id='05-2-05_complete-o-seu-endereco'>               <?php include 'perguntas/05-2-05.php'; ?></div>
          <div class='swiper-slide' id='05-2-06_qual-a-forma-de-pagamento'>             <?php include 'perguntas/05-2-06.php'; ?></div>
          <div class='swiper-slide' id='05-2-07_voce-e-o-titular-do-carta-de-credito'>  <?php include 'perguntas/05-2-07.php'; ?></div>
          <div class='swiper-slide' id='05-2-08_pagamento-via-boleto-bancario'>         <?php include 'perguntas/05-2-08.php'; ?></div>
          <div class='swiper-slide' id='05-2-09_dados-do-titular-do-cartao'>            <?php include 'perguntas/05-2-09.php'; ?></div>
          <div class='swiper-slide' id='05-2-10_endereco-da-fatura-do-cartao'>          <?php include 'perguntas/05-2-10.php'; ?></div>
          <div class='swiper-slide' id='05-2-11_dados-do-cartao-de-credito'>            <?php include 'perguntas/05-2-11.php'; ?></div>
          <div class='swiper-slide' id='05-2-12_cadastro-agendado'>                     <?php include 'perguntas/05-2-12.php'; ?></div>
          <div class='swiper-slide' id='05-2-13_prepare-se-para-suas-fotos'>            <?php include 'perguntas/05-2-13.php'; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.min.js" integrity="sha256-eEa1kEtgK9ZL6h60VXwDsJ2rxYCwfxi40VZ9E0XwoEA=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../_js/gradient.js"></script>
<script type="text/javascript" src="../_js/swiper.min.js"></script>
<script type="text/javascript" src="../_js/functions.js"></script>
<script type="text/javascript" src="../_js/exif.js"></script>
<script type="text/javascript" src="../_js/cropper.js"></script>
<script type="text/javascript" src="../_js/upload.js"></script>
<script type="text/javascript" src="../_js/drum.js"></script>
<script type="text/javascript" src="../_js/drum-config.js"></script>
<script type="text/javascript" src="../_js/cadastro_navegacao.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.js"></script>
<script type="text/javascript" src="//irql.bipbop.com.br/js/jquery.bipbop.min.js"></script>
<script type="text/javascript" src="../_js/progressbar.js"></script>
<!-- <?php include "../_sys/analytics.php"; ?> -->
</body>
</html>

<?php
}
mysqli_close($link);
?>
