<?php
require_once 'dbconnect.php';
include "functions.php";
if( isset($_SESSION['user'])!="" ){
	header("Location: home.php");
}
$erro = false;

if (empty($_SESSION['confirmation_code'])) {
  $confirmation_code = rand(1000,9999);
  $_SESSION['confirmation_code'] = $confirmation_code;
} else {
    $confirmation_code = $_SESSION['confirmation_code'];
}
if (!empty($_SESSION['errMSG'])) {
    $errTyp = $_SESSION['errTyp'];
    $errMSG = $_SESSION['errMSG'];
}
// echo $_SESSION['confirmation_code'];
$nome = $_SESSION['nome'];
$cpf = $_SESSION['cpf'];
$nome_artistico = $_SESSION['nome_artistico'];
$email = $_SESSION['email'];

if (empty($_SESSION['email_sent'])) {

    define('GUSER', 'inteligencia@magnetoelenco.com.br'); // <-- Insira aqui o seu GMail
    define('GPWD', 'rom54808285');    // <-- Insira aqui a senha do seu GMail
    $subject = "Código de confirmação de e-mail";

    // Corpo do email
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Oi $nome_artistico,</p>
    <BR />
    <p>Seu código de confirmação de e-mail para acesso ao PAGME é: <strong>$confirmation_code</strong></p>
    <BR />
    <p>Abração,</p>
    <p>Time Magneto Elenco</p>
    </body>
    </html>";

    require_once "phpmailer/class.phpmailer.php";
    smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
    $_SESSION['email_sent'] = "yes";
}

if ( isset($_POST['btn-signup']) ) {

		// password validation
		if (empty($_POST['codver']) || $_POST['codver'] != $confirmation_code){
      $teste = $_POST['codver'];
      $erro = true;
      $errTyp = "danger";
      $errMSG = "Código de confirmação inválido. $confirmation_code $teste";
    } elseif (empty($_POST['pass'])){
			$erro = true;
            $errTyp = "danger";
			$errMSG = "Por favor introduza uma senha.";
		} elseif (strlen($_POST['pass']) < 6) {
			$erro = true;
            $errTyp = "danger";
			$errMSG = "Sua senha deve ter no mínimo 6 caracteres.";
		} elseif ($_POST['pass'] != $_POST['pass2']) {
      $erro = true;
      $errTyp = "danger";
      $errMSG = "Digite a mesma senha nos dois campos.";
    }
		// password encrypt using SHA256();
		$password = hash('sha256', $_POST['pass']);

		// if there's no error, continue to signup
		if( !$erro ) {

			$query = "UPDATE tb_elenco SET senha='$password' WHERE email='$email' ORDER BY dt_nascimento ASC LIMIT 1";
			$res = mysqli_query($link, $query);

			if ($res) {
				$errTyp = "success";
				$errMSG = "Senha criada com sucesso, você já pode fazer login:";
                $_SESSION['errTyp'] = $errTyp;
                $_SESSION['errMSG'] = $errMSG;
				unset($email);
				unset($password);
                header("Location: index.php");
                exit;
			} else {
				$errTyp = "danger";
				$errMSG = "Ocorreu um erro, entre em contato por whatsapp: 61 99311-0767.";
			}

		}
        unset($confirmation_code);
        unset($_SESSION['confirmation_code']);
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
    <form id="confirm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    	<div class="col-md-12">

        <div class="form-group">
          <center><a href="http://www.magnetoelenco.com.br"><img src="images/logo_branca.svg" /></a></center>
        </div>

        	<div class="form-group">
            	<h2 class="">Confirmação de e-mail:</h2>
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
              <p><h5>Abra seu e-mail e insira abaixo o Código de confirmação recebido:</h5></p>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="number" name="codver" class="form-control" placeholder="Digite o código aqui" maxlength="40" />
                </div>
                <!-- <span class="text-danger"><?php if (!empty($errMSG)) { echo $errMSG; } ?></span> -->
            </div>

            <div class="form-group">
            <p><h5>Escolha uma senha de acesso ao PAGME:</h5></p>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Crie uma senha com 6 caracteres" maxlength="15" />
                </div>
                <!-- <span class="text-danger"><?php if (!empty($errMSG)) { echo $errMSG; } ?></span> -->
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass2" class="form-control" placeholder="Repita sua senha" maxlength="15" />
                </div>
                <!-- <span class="text-danger"><?php if (!empty($errMSG)) { echo $errMSG; } ?></span> -->
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Criar senha</button>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<a href="index.php">Voltar ao login</a>
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
