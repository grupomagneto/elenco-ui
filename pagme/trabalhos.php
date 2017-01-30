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
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:300,300italic,900,900italic,400,400italic' />
<!-- <link rel='stylesheet' type='text/css' href='DataTables/datatables.min.css'/>
<link rel='stylesheet' type='text/css' href='DataTables/style.css'/> -->
<style type='text/css'>
  h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
  p { font-family: 'Roboto', sans-serif; font-weight: 300; }
  .set-width {
    width: 85px;
  }
  #premium {
    color: red;
  }
  #gratuito {
    color: orange;
  }
  #ator {
    color: green;
  }
    input[type='number'] {
    width:50px;
  }
  </style>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<!-- <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script> -->
<!-- <script type='text/javascript' src='DataTables/datatables.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
    $('#resultado').DataTable( {
    "aaSorting": [[6,'desc'], [0,'asc']]
    } );
} );
</script> -->
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

	<div class="container">
    
    	<div class="page-header">
    	<h3>Meus trabalhos</h3>
    	</div>
        
        <div class="row">
        <div class="col-lg-12">
        <?php
  // $result = mysqli_query($link, "SELECT id_elenco, nome_artistico, tipo_cadastro_vigente, data_contrato_vigente, data_1o_contrato, tl_celular, email, dt_insercao FROM tb_elenco WHERE data_contrato_vigente IS NULL OR TIMESTAMPDIFF(YEAR, data_contrato_vigente, CURDATE()) > '2' ORDER BY dt_insercao DESC LIMIT 0, 100");
        $id = '10377';
        // $id = $_SESSION['user'];
        $result = mysqli_query($link, "SELECT cliente_job, data_job, cache_liquido, status_pagamento, liberado FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' ORDER BY data_job DESC LIMIT 0, 100");

    if (!$result) {
     die('Erro: ' . mysqli_error($link));
  }
?>
        <table id='resultado' class='compact nowrap stripe hover row-border order-column' cellspacing='0' width='100%'>
    <thead>
      <tr>
        <th>Data do trabalho</th>
        <th>Cliente</th>
        <th>Cachê Líquido</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
  while ($row = mysqli_fetch_array($result)) {
    $cliente = $row['cliente_job'];
    $cache = 'R$ '.$row['cache_liquido'];
    $data_job = date('d/m/y',strtotime($row['data_job']));
    $liberado = $row['liberado'];

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
echo "      <tr>";
echo "          <td>".$data_job."</td>";
echo "          <td>".$cliente."</td>";
echo "          <td>".$cache."</td>";
echo "          <td>".$liberado."</td>";
echo "      </tr>";
}
?>
    </tbody>
  </table>
</div></center>
        </div>
        </div>
    
    </div>
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>