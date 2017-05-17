<?php
require_once 'dbconnect.php';
require_once 'functions.php';
setlocale(LC_MONETARY, 'pt_BR');
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
if (isset($_POST['id_usuario'])) {
	$id_usuario = $_POST['id_usuario'];
	$cadastro = $_POST['cadastro'];
	$cadastro = ucfirst($cadastro);
}
// select loggedin users detail
$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=$id_usuario");
$userRow=mysqli_fetch_array($res);
$nome = $userRow['nome_artistico'];
$cpf = $userRow['cpf'];
$email = $userRow['email'];
if ($userRow['sexo'] == 'F') {
  $sexo = 'a';
}
elseif ($userRow['sexo'] == 'M') {
  $sexo = 'o';
}
$recebivel = mysqli_query($link, "SELECT SUM(cache_liquido) as receber FROM financeiro WHERE id_elenco_financeiro='$id_usuario' AND tipo_entrada='cache' AND status_pagamento='0'");
$row_recebivel = mysqli_fetch_array($recebivel);
$recebivel = $row_recebivel['receber'];
$recebivel = number_format($recebivel,2,",",".");

?>