<?php
// header( "refresh:5;url=index.php" );
require_once 'dbconnect.php';
require_once 'functions.php';
setlocale(LC_MONETARY, 'pt_BR');
$hora = date('Y-m-d H:i:s', time());
$hoje = date('Y-m-d', time());
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
if (isset($_POST['apagar_id_usuario'])) {
	$id_usuario = $_POST['apagar_id_usuario'];
}
// DESATIVA CADASTRO NO DB
mysqli_query($link, "UPDATE tb_elenco SET ativo = 'Não', concordo_timestamp = '$hora', ip = '$ip' WHERE id_elenco='$id_usuario'");
mysqli_close($link);
session_unset();
session_destroy();
?>