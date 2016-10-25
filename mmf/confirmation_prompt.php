<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';
require_once 'functions.php';
if(!session_id()) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
    if (!empty($_SESSION['facebook_access_token'])) {
		
		$page = basename(__FILE__);
		include 'register_page.php';

		$firstname = $_SESSION['firstname'];
		$email 		= strtolower($_SESSION['email_prompt']);
		$email 		= filter_var($email, FILTER_SANITIZE_EMAIL);
		if (empty($_SESSION['confirmation_code'])) {
			$confirmation_code = rand(1000,9999);
			$_SESSION['confirmation_code'] = $confirmation_code;
		}
		if (empty($_SESSION['email_sent'])) {

		define('GUSER', 'inteligencia@magnetoelenco.com.br');	// <-- Insira aqui o seu GMail
		define('GPWD', 'rom54808285');		// <-- Insira aqui a senha do seu GMail
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
		<p>Oi $firstname,</p>
		<BR />
		<p>Seu código de confirmação de e-mail é: <strong>$confirmation_code</strong></p>
		<BR />
		<p>Obrigado e bons votos!</p>
		<p>Time Magneto Elenco</p>
		</body>
		</html>";

		require_once "newgame/phpmailer/class.phpmailer.php";
		smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
		$_SESSION['email_sent'] = "yes";
		}
		

echo "
<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
	<meta charset='utf-8'>
	<meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no' name='viewport'>
	<title>Meu Modelo Favorito por Magneto Elenco</title>
	<link href='stylesheets/questions.css' rel='stylesheet'>
  <link rel='stylesheet' href='stylesheets/loading.css'>
</head>
<body>
<div id='loading' style='display: none' class='overlay'>
<div class='loader loader--style1' title='0'>
  <svg version='1.1' id='loader-1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
   width='40px' height='40px' viewBox='0 0 40 40' enable-background='new 0 0 40 40' xml:space='preserve'>
  <path opacity='0.2' fill='#000' d='M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z'/>
  <path fill='#000' d='M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
    C22.32,8.481,24.301,9.057,26.013,10.047z'>
    <animateTransform attributeType='xml'
      attributeName='transform'
      type='rotate'
      from='0 20 20'
      to='360 20 20'
      dur='0.5s'
      repeatCount='indefinite'/>
    </path>
  </svg>
  </div>
</div>";
?>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id='form'>
<?php
echo "
	<div class='gradient container'>
		<div class='box'>
			<h1 class='pergunta font-family color-font'>Insira o código enviado para: $email</h1>
		</div>
		<div class='box'>
			<div class='box-outline_textfield'>

				<div class='column-full font-family color-font'>

						<input id='confirmation_prompt' name='confirmation_prompt' type='tel'>
						
						<button id='btn' class='ok' type='submit' onclick='showLoading()'>
							<img id='btn_img' alt='' src='images/ok_neg.svg' />
						</button>
				</div>

			</div>
		</div>
	</div>
</form>
	<script src='javascripts/jquery-1.12.1.min.js'></script>
	<script src='javascripts/questions.js'></script>

</body>
</html>";
	if (!empty($_POST['confirmation_prompt'])) {
		if ($_POST['confirmation_prompt'] == $_SESSION['confirmation_code']) {
			$_SESSION['confirmation_prompt'] = $_POST['confirmation_prompt'];
			header('location: detect_existing_client.php');
			exit();
		}
		else{
			echo "Código não confere.";
		}
		
	}
} else {
    if (!empty($_GET['code']) and !empty($_GET['state'])) {
        $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
        header('location: game.php');
    } else {
        $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
        header('location: '.$url.'');
    }
}
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>