<?php
	require_once 'dbconnect.php';
  $hoje = date('Y-m-d', time());
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
  if (isset($_GET['new_id'])) {
    $_SESSION['user'] = $_GET['new_id'];
  }
  $user_id = $_SESSION['user'];
	// select loggedin users detail
  $sql = "SELECT * FROM tb_elenco WHERE id_elenco='$user_id'";
	$res=mysqli_query($link, $sql) or die (mysqli_error($link));
	if ($userRow = mysqli_fetch_array($res)) {
    if (!empty($userRow['nome_responsavel'])) {
       $_SESSION['nome_responsavel'] = $userRow['nome_responsavel'];
    }
    $cpf = $userRow['cpf'];
    $_SESSION['cpf'] = $cpf;
    $email = $userRow['email'];
    if ($userRow['sexo'] == 'F') {
      $sexo = 'a';
    }
    elseif ($userRow['sexo'] == 'M') {
      $sexo = 'o';
    }
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
<title>Bem-vind<? echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
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
            <li class="active"><a href="home.php">Como funciona</a></li>
            <li><a href="trabalhos.php">Meus trabalhos</a></li>
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
<div class="gradient ">
	<div class="container">
    <div class='page-header'>
      <h2>Sistema PAGME</h2>
      <p>Pagamento de Agenciados Magneto Elenco (versão ßeta)</p>
    </div>
    <div class='row'>
      <div class='col-lg-12'>
      <p>O PAGME é o novo sistema de pagamentos da Magneto Elenco. Ainda em sua primeira versão de teste, o PAGME vai substituir o pagamento de cachês em cheques nominais e cruzados por tranferências para a conta bancária de cada agenciado.</p>
      <p>Cada pedido de transferência levará até 3 dias úteis para ser concluído e terá um custo de R$ 10,00 por transferência, descontado do saldo a ser transferido. É possível transferir mais de um cachê na mesma transferência e pagar a taxa apenas uma vez.</p>
      <p>As transferências apenas poderão ser feitas para contas bancárias vinculadas ao CPF do agenciado ou, no caso de menores de idade, para contas vinculadas ao CPF do responsável.</p>
      <p>Os pagamentos em cheque continuarão a ser feitos na nova sede da agência até o dia 31/03/2017, quando serão completamente substituídos pelo PAGME.</p>
      <p>Como estamos em fase de testes, pedimos desculpas antecipadas por qualquer erro e colocamos um número para suporte via whatsapp: 61 99311-0767.</p>
      <p>Obrigado e sucesso!</p>
      </div>
    </div>
  </div>
</div>
</div>
 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
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
    <?php
    // Verifica se o contrato do agenciado está vencido
    if ($userRow['tipo_cadastro_vigente'] != "Ator" && $hoje > date('Y-m-d', strtotime($userRow['data_contrato_vigente']."+2 years"))){
      // Verifica quanto o agenciado tem de caches a receber
      $id_usuario = $_SESSION['user'];
      $recebivel = mysqli_query($link, "SELECT SUM(cache_liquido) as receber FROM financeiro WHERE id_elenco_financeiro='$id_usuario' AND tipo_entrada='cache' AND status_pagamento='0'");
      $row_recebivel = mysqli_fetch_array($recebivel);
      $recebivel = $row_recebivel['receber'];
      $recebivel = number_format($recebivel,2,",",".");
      // Modal
      echo "
          <div id='myModal' class='modal'>
          <div class='modal-content'>
          <img src='images/fechar.svg' class='close navigation_buttons' />
          <img src='images/voltar.svg' class='back navigation_buttons' />
          <div class='renova_01'>
         <div class='page-header'>
              <center><h1>Nosso contrato está vencido!</h1>
              <p><strong>Cadastro ".$userRow['tipo_cadastro_vigente']."</strong> expirado em: ".date('d/m/Y', strtotime($userRow['data_contrato_vigente'].'+2 years'))."</p></center>
      </div>
        <div class='row'>
        <div class='col-lg-12'>
        <center>
          <h4 class='renove'>Renove seu contrato para continuar trabalhando e aproveite os valores promocionais.</h4>
          <p>Conheça nossas modalidades:</p></div><BR />
          <div class='quadrot'>
          <div class='quadro'>
          <div class='quadro_concordo'>
          <div class='botoes'>
          <form method='post' action='#' class='forms' id='renova_cadastro'>
          <button id='btn_renova_cadastro' type='submit' class='botao'>
          <input type='hidden' id='input_renova_01' name='id_usuario' value='$id_usuario' />
          <input type='hidden' id='input_renova_02' name='cadastro' value='gratuito' />
            <img src='images/gratuito.svg' class='first' /></button></form>
          <form method='post' action='#' class='forms' id='renova_cadastro_premium'>
          <button id='btn_renova_cadastro_premium' type='submit' class='botao'>
          <input type='hidden' id='input_renova_premium_01' name='id_usuario' value='$id_usuario' />
          <input type='hidden' id='input_renova_premium_02' name='cadastro' value='premium' />
            <img src='images/premium.svg' class='second' /></button></form>
          <form method='post' action='#' class='forms' id='renova_cadastro_profissional'>
          <button id='btn_renova_cadastro_profissional' id='renova_cadastro' type='submit' class='botao'>
          <input type='hidden' id='input_renova_profissional_01' name='id_usuario' value='$id_usuario' />
          <input type='hidden' id='input_renova_profissional_02' name='cadastro' value='profissional' />
            <img src='images/profissional.svg' class='third' /></button></form>
          <BR /><BR />
          </div>
          </div>
          </div>
          </div>

        </center>
        </div>
        </div>
        </div>
        ";
        echo "<div class='renova_02'></div>
        </div>
        </div>";
        echo "
        <script type='text/javascript'>
          // Get the modal
          var modal = document.getElementById('myModal');

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName('close')[0];

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
            $('#myModal').fadeOut(250);
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              $('#myModal').fadeOut(250);
            }
          }
          // When the user presses ESC, close the modal
          $(document).keyup(function(e) {
            if (e.keyCode == 27) {
              $('#myModal').fadeOut(250);
            }
          });
          $(window).on('load',function(){
            $('#myModal').fadeIn(250);
          });
          $('.botao').click(function(){
              jQuery('form').submit(function(){
              var dados = jQuery( this ).serialize();

              jQuery.ajax({
                type: 'POST',
                dataType: 'html',
                url: 'http://localhost:8888/elenco-ui/pagme/renova_cadastro.php',
                data: dados,
                success: function( data ) {
                  $('.renova_02').html(data);
                  $('.renova_01').fadeOut(0);
                  $('.renova_02').fadeIn(200);
                  $('.back').fadeIn(200);
                }
              });
              return false;
              });
          });
          $('.back').click(function(){
            $('.renova_02').fadeOut(0);
            $('.renova_01').fadeIn(200);
            $('.back').fadeOut(0);
          });
          </script>";
    }
    ?>
</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>