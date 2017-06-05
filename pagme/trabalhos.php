<?php
require_once 'dbconnect.php';
require_once 'functions.php';
setlocale(LC_MONETARY, 'pt_BR');
$year = date('Y', time());
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
if (isset($_GET['new_id'])) {
  $_SESSION['user'] = $_GET['new_id'];
}
// select loggedin users detail
$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
$cpf = $userRow['cpf'];
$email = $userRow['email'];
if ($userRow['sexo'] == 'F') {
  $sexo = 'a';
}
elseif ($userRow['sexo'] == 'M') {
  $sexo = 'o';
}
// cria o menu de nome artístico se existirem mais de um agenciado no mesmo cpf e email
$result = mysqli_query($link, "SELECT nome_artistico, id_elenco FROM tb_elenco WHERE email='$email' AND cpf='$cpf' ORDER BY dt_nascimento ASC");
$count = mysqli_num_rows($result);
$n = 1;
if ($n <= $count) {
  while ($row = mysqli_fetch_array($result)) {
    $id_temp = $row['id_elenco'];
    if ($id_temp != $_SESSION['user']) {
      ${'nome_artistico_dependente'.$n} = $row['nome_artistico'];
      $n++;
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Bem-vind<?php echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/jobs.css" type="text/css" />
<link rel="stylesheet" href="assets/css/caches.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.magnetoelenco.com.br"><img src="images/logo.svg"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Como funciona</a></li>
            <li class="active"><a href="trabalhos.php">Meus trabalhos</a></li>
            <li><a href="dbancarios.php">Meus dados bancários</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['nome_artistico']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php
              $result = mysqli_query($link, "SELECT nome_artistico, id_elenco FROM tb_elenco WHERE email='$email' AND cpf='$cpf'");
                $n = 1;
                if ($n <= $count) {
                  while ($row = mysqli_fetch_array($result)) {
                    $id_temp = $row['id_elenco'];
                    if ($id_temp != $_SESSION['user']) {
                        echo "<li><a href='home.php?new_id=$id_temp'><span class='glyphicon glyphicon-user'></span>&nbsp;";
                        echo ${'nome_artistico_dependente'.$n};
                        echo "&nbsp;</a></li>";
                      $n++;
                    }
                  }
                }
              ?>
                <li><a href='mailto:vini@grupomagneto.com.br'><span class='glyphicon glyphicon-envelope'></span>&nbsp;Contato</a></li>

                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div id="wrapper">
<div class="gradient inicio_login">
	<div class="container">
       <div class="row">
        <div class="col-lg-6 col-center">
        <div id="top"></div>
<?php
$id = $_SESSION['user'];
$result = mysqli_query($link, "SELECT id, tipo_entrada, cliente_job, data_job, (cache_liquido - ifnull(abatimento_cache, 0) - ifnull(valor_pago, 0)) as cache, cache_liquido, valor_pago, abatimento_cache, data_abatimento, produto_abatimento, status_pagamento, data_pagamento, liberado, request_timestamp FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' ORDER BY data_job DESC LIMIT 0, 100");

$primeiro_contrato = mysqli_query($link, "SELECT tipo_cadastro_vigente, data_1o_contrato as primeiro_contrato FROM tb_elenco WHERE id_elenco='$id'");
$row = mysqli_fetch_array($primeiro_contrato);
$primeiro_contrato = date('d/m/y',strtotime($row['primeiro_contrato']));
$tipo_cadastro = $row['tipo_cadastro_vigente'];

$doze_meses = mysqli_query($link, "SELECT SUM(cache_liquido) as doze_meses FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND data_job >= CURDATE() - INTERVAL 12 MONTH");
$row = mysqli_fetch_array($doze_meses);
$doze_meses = $row['doze_meses'];
$doze_meses = number_format($doze_meses,2,",",".");
$doze_meses_pieces = explode(",", $doze_meses);
$doze_meses = $doze_meses_pieces[0];
$doze_meses_cents = $doze_meses_pieces[1];

$total_gerado = mysqli_query($link, "SELECT SUM(cache_liquido) as liquido FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache'");
$row = mysqli_fetch_array($total_gerado);
$total_gerado = $row['liquido'];
$total_gerado = number_format($total_gerado,2,",",".");
$total_gerado_pieces = explode(",", $total_gerado);
$total_gerado = $total_gerado_pieces[0];
$total_gerado_cents = $total_gerado_pieces[1];

$n_jobs = mysqli_query($link, "SELECT COUNT(cache_liquido) as qtd FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache'");
$row = mysqli_fetch_array($n_jobs);
$n_jobs = $row['qtd'];

$indisponivel = mysqli_query($link, "SELECT SUM(cache_liquido - ifnull(abatimento_cache, 0) - ifnull(valor_pago, 0)) as indisponivel FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND status_pagamento<>'1' AND (liberado IS NULL OR liberado='0')");
$row = mysqli_fetch_array($indisponivel);
$indisponivel = $row['indisponivel'];
$indisponivel = number_format($indisponivel,2,",",".");
$indisponivel_pieces = explode(",", $indisponivel);
$indisponivel = $indisponivel_pieces[0];
$indisponivel_cents = $indisponivel_pieces[1];

$recebivel = mysqli_query($link, "SELECT SUM(cache_liquido - ifnull(abatimento_cache, 0) - ifnull(valor_pago, 0)) as receber FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND status_pagamento<>'1' AND liberado='1'");
$row = mysqli_fetch_array($recebivel);
$recebivel = $row['receber'];
$recebivel = number_format($recebivel,2,",",".");
$recebivel_pieces = explode(",", $recebivel);
$recebivel = $recebivel_pieces[0];
$recebivel_cents = $recebivel_pieces[1];
?>
  <div class="container-outline__content">
    <div class="jobs-section">
      <div class="title-section">
        <img src="images/jobs.svg" />
        <p class="font-family font-medium color-primary">
          meus trabalhos
          <!-- <?php if(!empty($tipo_cadastro)){echo "<span class='btn-cadastro color-primary'>Cadastro ".$tipo_cadastro."</span><BR />";}?> -->
        </p>
      </div>
      <div class="content_section">
        <div class="content__jobs">
          <div class="after-title__jobs">
          <h2 class="font-family font-medium color-primary">
            Total em cachês
          </h2>
          <div class="total-cache">
            <div class="total-cache__box">
              <p class="font-family font-small color-primary">
                último ano
              </p>
              <p class="font-family font-medium color-primary">
                <span>R$</span> <?php if(!empty($doze_meses)){echo $doze_meses;}else{echo "0";}?>,<sup><?php if(!empty($doze_meses_cents)){echo $doze_meses_cents;}else{echo "00";}?></sup>
              </p>
            </div>
            <div class="total-cache__box">
              <p class="font-family font-small color-primary">
                desde <?php if(!empty($primeiro_contrato)){echo $primeiro_contrato;}else{echo "0";}?>
              </p>
              <p class="font-family font-medium color-primary">
                <span>R$</span> <?php if(!empty($total_gerado)){echo $total_gerado;}else{echo "0";}?>,<sup><?php if(!empty($total_gerado_cents)){echo $total_gerado_cents;}else{echo "00";}?></sup>
              </p>
            </div>
          </div>
          <h2 class="font-family font-medium color-primary">
            A receber
          </h2>
          <div class="areceber-cache">
            <div class="areceber__box">
              <p class="font-family font-small color-primary">
                liberado
              </p>
              <p class="font-family font-medium color-primary">
                <span>R$</span> <?php if(!empty($recebivel)){echo $recebivel;}else{echo "0";}?>,<sup><?php if(!empty($recebivel_cents)){echo $recebivel_cents;}else{echo "00";}?></sup>
              </p>
            </div>
            <div class="areceber__box">
              <p class="font-family font-small color-primary">
                não disponível
              </p>
              <p class="font-family font-medium color-disable">
                <span>R$</span> <?php if(!empty($indisponivel)){echo $indisponivel;}else{echo "0";}?>,<sup><?php if(!empty($indisponivel_cents)){echo $indisponivel_cents;}else{echo "00";}?></sup>
              </p>
            </div>
          </div>
          <h2 class="font-family font-medium color-primary">
            Trabalhos já realizados: <?php if(!empty($n_jobs)){echo $n_jobs;}else{echo "0";}?>
          </h2>
<!--           <div class="button-cache">
            <button class="button button__medium" type="button">Retirar dinheiro</button>
          </div> -->
<!--         </div>
      </div>
    </div>
  </div>
</div> -->
          </div>
<?php
  while ($row = mysqli_fetch_array($result)) {
    $cliente = $row['cliente_job'];
    $id_cache = $row['id'];
    $cliente = mb_convert_case($cliente,  MB_CASE_UPPER, "UTF-8");
    $cache = number_format($row['cache'],2,",",".");
    if ($cache == 0) {
      $cache = number_format($row['valor_pago'],2,",",".");
    }
    $cache = 'R$ '.$cache;
    $cache_liquido = number_format($row['cache_liquido'],2,",",".");
    $data_job = date('d/m/y',strtotime($row['data_job']));
    $data_pagamento = date('d/m/y',strtotime($row['data_pagamento']));
    if ($row['status_pagamento'] <> '1' && $row['liberado'] == '1' && $row['request_timestamp'] == NULL) {
      $botao = "<button type='submit' class='btn-sacar botao'>Retirar dinheiro</button>";
    }
    if ($row['status_pagamento'] <> '1' && $row['liberado'] == '1' && $row['request_timestamp'] != NULL) {
      $botao = "<p class='btn-pago'>Transferindo em até 3 dias úteis...</p>";
    }
    if ($row['status_pagamento'] == '1') {
      $botao = "<p class='btn-pago'>Pago em $data_pagamento</p>";
    }
    if ($row['status_pagamento'] <> '1' && $row['liberado'] == '0' || $row['liberado'] == NULL) {
      $botao = "<p class='btn-indisp'>Ainda não disponível</p>";
    }
    if ($row['abatimento_cache'] != NULL && $row['abatimento_cache'] > 0) {
      $asterisco = "*";
      $valor_abatimento = number_format($row['abatimento_cache'],2,",",".");
      $produto_abatimento = $row['produto_abatimento'];
      $data_abatimento = date('d/m/y',strtotime($row['data_abatimento']));
      $explicacao = "* Saldo do cachê subtraido o valor utilizado para $produto_abatimento em $data_abatimento.";
    }
    else {
      $asterisco = "";
      $explicacao = "";
    }
    // $operacao = "<form id='checar".$id."' method='get' action='action_atualiza_contrato.php' target='resultado2".$id."'><input type='hidden' name='checar' value='$id'><button type='button' id='checa".$id."'>Atualizar</button></form>
    // <script type='text/javascript'>
    // document.getElementById('checa".$id."').addEventListener('click', function() {
    // window.open('action_checar.php', 'resultado2".$id."', 'toolbar=no,scrollbars=no,directories=no,titlebar=yes,resizable=no,location=no,status=no,menubar=no,top=100,left=700,width=400,height=300');
    // document.getElementById('checar".$id."').submit();
    // });
    // </script>";
echo "
<div class='my-jobs__box'>
<form id='form_$id_cache' name='form_$id_cache' method='post' action='request_transfer.php'>
<table class='table-menu-jobs'>
<tr>
  <td>
    <div class='title-jobs font-family color-primary'>
      <p>$cliente</p>
      <p>Data do trabalho</p>
    </div>
    <div class='values-jobs font-family color-primary'>
      <p class='bold'>$cache$asterisco</p>
      <p>$data_job</p>
    </div>
  </td>
</tr>
</table>
</div>
<input type='hidden' name='id_cache' id='$id_cache' value='$id_cache'>
<div>
$botao
</form>
</div>
<center><p class='x-small'>$explicacao</p></center>";
}
?>

        </div>
        <center>
        <div class='footer__section'>
          <a href='#top'>
            <img src='images/scroll_up.svg' alt='arrow-to-top' class="scroll_up" />
            <!-- <p class='font-family color-primary'>Voltar ao topo</p> -->
          </a>
          <hr>
          <p class='font-family color-primary'>Magneto Elenco © 2009-<?php echo $year; ?></p>
          </div>
          </center>
        </div>
    </div>
  </div>

  </div>
  </div>
  </div>
  </div>
  </div>

<script src='//code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src='assets/js/gradient.js'></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-22229864-1', 'auto');
ga('send', 'pageview');
</script>

</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>
