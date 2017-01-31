<?php
	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
  if ($userRow['sexo'] == 'F') {
    $sexo = 'a';
  }
  elseif ($userRow['sexo'] == 'M') {
    $sexo = 'o';
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bem-vind<?php echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/jobs.css" type="text/css" />
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
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div id="wrapper">
<div class="gradient">
	<div class="container">
       <div class="row">
        <div class="col-lg-6 col-center">
        <?php
  // $result = mysqli_query($link, "SELECT id_elenco, nome_artistico, tipo_cadastro_vigente, data_contrato_vigente, data_1o_contrato, tl_celular, email, dt_insercao FROM tb_elenco WHERE data_contrato_vigente IS NULL OR TIMESTAMPDIFF(YEAR, data_contrato_vigente, CURDATE()) > '2' ORDER BY dt_insercao DESC LIMIT 0, 100");
        $id = '10377';
        // $id = $_SESSION['user'];
        $result = mysqli_query($link, "SELECT cliente_job, data_job, cache_liquido, status_pagamento, data_pagamento, liberado FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' ORDER BY data_job DESC LIMIT 0, 100");

    if (!$result) {
     die('Erro: ' . mysqli_error($link));
  }
?>

  <div class="container-outline__content">
    <div class="jobs-section">
      <div class="title-section">
        <img alt="jobs" src="images/jobs.svg" />
        <p class="font-family font-medium color-primary">
          meus trabalhos
        </p>
      </div>
      <div class="content_section">
        <div class="content__jobs">
          <div class="after-title__jobs">
            <h2 class="font-family font-medium color-primary">
              Total: 16 trabalho(s)
            </h2>
          </div>



<?php
  while ($row = mysqli_fetch_array($result)) {
    $cliente = $row['cliente_job'];
    $cliente = mb_convert_case($cliente,  MB_CASE_UPPER, "UTF-8");
    $cache = 'R$ '.$row['cache_liquido'];
    $data_job = date('d/m/y',strtotime($row['data_job']));
    $data_pagamento = date('d/m/y',strtotime($row['data_pagamento']));
    if ($row['status_pagamento'] == '0' && $row['liberado'] == '1') {
      $botao = "<button class='btn btn-sacar btn-block btn-primary'>RETIRAR DINHEIRO</button>";
    }
    if ($row['status_pagamento'] == '1') {
      $botao = "<p class='btn btn-block btn-pago'>PAGO EM $data_pagamento</p>";
    }
    if ($row['status_pagamento'] == '0' && $row['liberado'] == '0' || $row['liberado'] == NULL) {
      $botao = "<p class='btn btn-block btn-indisp'>INDISPONÍVEL</p>";
    }


    // if ($tipo_cadastro_vigente != NULL && $tipo_cadastro_vigente == 'Ator') {
    //   $tipo_cadastro_vigente = "<div id='ator'><strong>Ator</strong></div>";
    // } elseif ($tipo_cadastro_vigente != NULL && $tipo_cadastro_vigente == 'Premium') {
    //   $tipo_cadastro_vigente = "<div id='premium'><strong>Premium</strong></div>";
    // } elseif ($tipo_cadastro_vigente != NULL && $tipo_cadastro_vigente == 'Gratuito') {
    //   $tipo_cadastro_vigente = "<div id='gratuito'><strong>Gratuito</strong></div>";
    // }

    // if ($tipo_cadastro_vigente == NULL || $tipo_cadastro_vigente == '') {
    //   $tipo_cadastro_vigente = "<div id='premium'><strong>Preencher</strong></div>";
    // }
    // if ($data_contrato_vigente == NULL || $data_contrato_vigente == '') {
    //   $data_contrato_vigente = "<div id='premium'><strong>Preencher</strong></div>";
    // }
    // if ($data_1o_contrato == NULL || $data_1o_contrato == '') {
    //   $data_1o_contrato = "<div id='premium'><strong>Preencher</strong></div>";
    // }

    // $operacao = "<form id='checar".$id."' method='get' action='action_atualiza_contrato.php' target='resultado2".$id."'><input type='hidden' name='checar' value='$id'><button type='button' id='checa".$id."'>Atualizar</button></form>
    // <script type='text/javascript'>
    // document.getElementById('checa".$id."').addEventListener('click', function() {
    // window.open('action_checar.php', 'resultado2".$id."', 'toolbar=no,scrollbars=no,directories=no,titlebar=yes,resizable=no,location=no,status=no,menubar=no,top=100,left=700,width=400,height=300');
    // document.getElementById('checar".$id."').submit();
    // });
    // </script>";
echo "
<div class='my-jobs__box'>
<table class='table-menu-jobs'>
<tr>
  <td>
    <div class='title-jobs font-family color-primary'>
      <p>$cliente</p>
      <p>Data do trabalho</p>
    </div>
    <div class='values-jobs font-family color-primary'>
      <p class='bold'>$cache</p>
      <p>$data_job</p>
    </div>
  </td>
</tr>
</table>
</div>
<div>
$botao
</div>";

// echo "      <tr>";
// echo "          <td>".$data_job."</td>";
// echo "          <td>".$cliente."</td>";
// echo "          <td>".$cache."</td>";
// echo "          <td>".$liberado."</td>";
// echo "      </tr>";
}
?>

        </div>
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

</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>
