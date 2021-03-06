<?php
	require_once 'dbconnect.php';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $_SESSION['ip']         = $ip;
    $_SESSION['cidade']     = $ip_details->city;
    $_SESSION['uf']         = $ip_details->region;
    $_SESSION['pais']       = $ip_details->country;
    $_SESSION['loc']        = $ip_details->loc;
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

			$res=mysqli_query($link, "SELECT id_elenco, senha FROM tb_elenco WHERE email='$email' AND ativo <> 'Não' ORDER BY dt_nascimento ASC LIMIT 1");
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
<meta data-react-helmet="true" charset="utf-8"/>
<meta data-react-helmet="true" http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta data-react-helmet="true" name="description" content="Cadastre-se gratuitamente e encontre os trabalhos de audiovisual da sua cidade."/>
<meta data-react-helmet="true" name="viewport" content="width=device-width, initial-scale=1"/>
<meta data-react-helmet="true" name="mobile-web-app-capable" content="yes"/>
<meta data-react-helmet="true" name="apple-mobile-web-app-capable" content="yes"/>
<meta data-react-helmet="true" name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta data-react-helmet="true" name="apple-mobile-web-app-title" content="PAGME"/>
<meta data-react-helmet="true" name="msapplication-TileColor" content="#FFFFFF"/>
<meta data-react-helmet="true" property="og:site_name" content="PAGME"/>
<meta data-react-helmet="true" property="og:url" content="https://www.magnetoelenco.com.br/pagme"/>
<meta data-react-helmet="true" property="og:title" content="Cadastre-se gratuitamente e encontre os trabalhos de audiovisual da sua cidade."/>
<title>PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
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
</head>
<body>
<div class="gradient inicio_login">
<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    	<div class="col-md-12">
        <div class="form-group">
          <center><a href="https://www.magnetoelenco.com.br"><img src="images/logo_branca.svg" /></a></center>
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
<!-- <script src='//code.jquery.com/jquery-2.2.4.min.js'></script> -->
<!-- <script src='assets/js/jquery-3.2.1.min.js'></script> -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.min.js"
  integrity="sha256-eEa1kEtgK9ZL6h60VXwDsJ2rxYCwfxi40VZ9E0XwoEA="
  crossorigin="anonymous"></script>
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
