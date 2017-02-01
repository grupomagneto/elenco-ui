<?php
	require_once 'dbconnect.php';
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}

	$error = false;

	if ( isset($_POST['btn-confirm_email']) ) {

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Por favor digite um e-mail válido.";
      $errTyp = "danger";
      $errMSG = "Por favor digite um e-mail válido.";
		} else {
      // check email exist or not
      $result = mysqli_query($link, "SELECT * FROM tb_elenco WHERE email='$email' LIMIT 1");
      $row = mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);
      if ($count == 0){
          $error = true;
          $emailError = "E-mail não encontrado! <BR />Por favor entre em contato por whatsapp: 61 99311-0767";
          $errTyp = "danger";
          $errMSG = "E-mail não encontrado! <BR />Por favor entre em contato por whatsapp: 61 99311-0767";
      }
    }
		// if there's no error, continue to signup
		if( !$error ) {
			$_SESSION['nome'] = $row['nome'];
      $_SESSION['cpf'] = $row['cpf'];
      $_SESSION['nome_artistico'] = $row['nome_artistico'];
      $_SESSION['email'] = $row['email'];
      header("Location: confirm_email.php");
      exit;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="gradient">
<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    	<div class="col-md-12">

        <div class="form-group">
          <center><a href="http://www.magnetoelenco.com.br"><img src="images/logo_branca.svg" /></a></center>
        </div>

        	<div class="form-group">
            	<h2 class="">1º acesso ao PAGME</h2>
            </div>

        	<div class="form-group">
            	<hr />
            </div>

            <?php
			if ( isset($emailError) ) {

				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php if (!empty($emailError)) { echo $emailError; } ?>
                </div>
            	</div>
                <?php
			}
			?>
            <div class="form-group">
             <p><h5>Digite seu e-mail cadastrado na Magneto Elenco:</h5></p>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Seu e-mail" maxlength="40" />
                </div>
                <!-- <span class="text-danger"><?php if (!empty($emailError)) { echo $emailError; } ?></span> -->
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-confirm_email">Receber Código de Verificação</button>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<a href="mailto:vini@grupomagneto.com.br">Não consegui, preciso de ajuda</a>
            </div>

        </div>

    </form>
    </div>

</div>
</div>
<script src='//code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='assets/js/gradient.js'></script>
</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>
