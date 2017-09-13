<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
require '../../_sys/functions.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = hash('sha256', $senha);
$sql = "SELECT id_elenco FROM tb_elenco WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) == 0) {
	$sql_insert = "INSERT INTO tb_elenco (email, senha) VALUES ('$email', '$senha')";
	mysqli_query($link, $sql_insert);
    $id_OLD = mysqli_insert_id($link);
    $sql_OldDB = "INSERT INTO tb_elenco (id_elenco, email) VALUES ('$id_OLD', '$email')";
    mysqli_query($link2, $sql_OldDB);
}
$link = "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/index.php?email=".$email."&hash=".$senha;

if (empty($_SESSION['email_sent'])) {

    define('GUSER', 'inteligencia@magnetoelenco.com.br'); // <-- Insira aqui o seu GMail
    define('GPWD', 'rom54808285');    // <-- Insira aqui a senha do seu GMail
    $subject = "Confirme seu e-mail";

    // Corpo do email
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, user-scalable=no'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Olá,</p>
    <BR />
    <p>Clique no botão abaixo para confirmar seu e-mail:</p>
    <p><a href=".$link." target='_blank'><button>Confirmar meu e-mail</button></a></p>
    <BR />
    <p>Abração,</p>
    <p>Time Magneto Elenco</p>
    </body>
    </html>";

    require_once "../../_sys/phpmailer/class.phpmailer.php";
    smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
    $_SESSION['email_sent'] = "yes";
}
mysqli_close($link);
mysqli_close($link2);
?>