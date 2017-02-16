<?php
	require_once 'dbconnect.php';

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
  if (!empty($userRow['nome_responsavel'])) {
       $_SESSION['nome_responsavel'] = $userRow['nome_responsavel'];
  }
  $_SESSION['cpf'] = $cpf;
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
<title>Bem-vind<?php echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
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

    	<div class="page-header">
              <h2>PAGME</h2>
              <p>Pagamento de Agenciados Magneto Elenco (versão ßeta)</p>
    	</div>

        <div class="row">
        <div class="col-lg-12">
         <p>O PAGME é o novo sistema de pagamentos da Magneto Elenco. Ainda em sua primeira versão de teste, o PAGME vai substituir o pagamento de cachês em cheques nominais e cruzados por tranferências para a conta bancária de cada agenciado.</p>

         <p>Cada pedido de transferência levará até 72 horas para ser concluído e terá um custo de R$ 10,00 por transferência, descontado do saldo a ser transferido. É possível transferir mais de um cachê na mesma transferência e pagar a taxa apenas uma vez.</p>

         <p>As transferências apenas poderão ser feitas para contas bancárias vinculadas ao CPF do agenciado ou, no caso de menores de idade, para contas vinculadas ao CPF do responsável.</p>

         <p>Os pagamentos em cheque continuarão a ser feitos na nova sede da agência até o dia 31/03/2017, quando serão completamente substituídos pelo PAGME.</p>

         <p>Como estamos em fase de testes, pedimos desculpas antecipadas por qualquer erro e colocamos um número para suporte via whatsapp: 61 99311-0767.</p>

         <p>Obrigado e sucesso!</p>
        </div>
        </div>

    </div>
</div>
    </div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
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
