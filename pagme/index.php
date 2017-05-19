<?php
	require_once 'dbconnect.php';

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}

	$erro = false;
  if (!empty($_SESSION['errMSG'])) {
    $errTyp = $_SESSION['errTyp'];
    $errMSG = $_SESSION['errMSG'];
  }

	if( isset($_POST['btn-login']) ) {

		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($email)){
            $erro = true;
            $errTyp = "danger";
            $errMSG = "Por favor digite seu email cadastrado.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $erro = true;
            $errTyp = "danger";
            $errMSG = "Por favor digite um email válido.";
		}

		if(empty($pass)){
            $erro = true;
            $errTyp = "danger";
            $errMSG = "Por favor digite sua senha.";
		}

		// if there's no error, continue to login
		if (!$erro) {

			$password = hash('sha256', $pass); // password hashing using SHA256

			$res=mysqli_query($link, "SELECT id_elenco, senha FROM tb_elenco WHERE email='$email' AND ativo = 'Sim' ORDER BY dt_nascimento ASC LIMIT 1");
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

			if( $count == 1 && $row['senha']==$password ) {
				$_SESSION['user'] = $row['id_elenco'];
                $_SESSION['email'] = $email;
				header("Location: home.php");
			} else {
                $errTyp = "danger";
                $errMSG = "Dados não conferem, tente novamente...";
			}

		}

	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="gradient inicio_login">
<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    	<div class="col-md-12">
        <div class="form-group">
          <center><a href="http://www.magnetoelenco.com.br"><img src="images/logo_branca.svg" /></a></center>
        </div>
        	<div class="form-group">
            	<h2>PAGME</h2>
              <p>Pagamento de Agenciados Magneto Elenco (versão ßeta)</p>
            </div>
        	<div class="form-group">
            	<hr />
            </div>
            <?php
			if ( isset($errMSG) ) {
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
        <span class="glyphicon glyphicon-info-sign"></span> <?php if (!empty($errMSG)) { echo $errMSG; } ?>
                </div>
            	</div>
                <?php
			}
			?>
            <div class="form-group">
            <p><h5>Faça login:</h5></p>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Seu email" maxlength="40" autocomplete="off" required />
                </div>
               <!-- <span class="text-danger"><?php if (!empty($emailError)) { echo $emailError; } ?></span> -->
            </div>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Sua senha" maxlength="15" autocomplete="off" required />
                </div>
                <!-- <span class="text-danger"><?php if (!empty($passError)) { echo $passError; } ?></span> -->
            </div>
            <div class="form-group">
            	<hr />
            </div>
            <div class="form-group">
            	<button type="submit" class="botao" name="btn-login">Entrar</button>
            </div>
            <div class="form-group">
            	<a href="register.php">Primeira vez? Crie uma senha de acesso</a>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
<script src='//code.jquery.com/jquery-2.2.4.min.js'></script>
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
