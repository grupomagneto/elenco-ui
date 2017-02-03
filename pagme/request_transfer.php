<?php
require_once 'dbconnect.php';
require_once 'functions.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
$id_elenco = $_SESSION['user'];
$result = mysqli_query($link, "SELECT * FROM bank_accounts WHERE id_elenco_financeiro='$id_elenco' AND active='1'");
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if ($count == 0) {
	$error = true;
	$errTyp = "danger";
	$errMSG = "Antes de continuar, cadastre uma Conta Bancária para receber a transferência.";
	echo '<script language="javascript">';
	echo 'alert("Por favor cadastre sua Conta Bancária antes de continuar.")';
	echo '</script>';
	header("Location: dbancarios.php");
	echo '<script language="javascript">';
	echo 'alert("Por favor cadastre sua Conta Bancária antes de continuar.")';
	echo '</script>';
} else{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$id_cache = $_POST['id_cache'];
	$timestamp = date('Y-m-d h:i:s', time());
	$bank_number = $row['bank_number'];
	$bank_name = $row['bank_name'];
	$bank_agency = $row['bank_agency'];
	$bank_account = $row['bank_account'];
	$cpf = $row['cpf'];
	$full_name = $row['full_name'];
	$email = $_SESSION['email'];
	mysqli_query($link, "UPDATE financeiro SET request_timestamp='$timestamp', bank_number='$bank_number', bank_name='$bank_name', bank_agency='$bank_agency', bank_account='$bank_account', cpf='$cpf', full_name='$full_name', email='$email', ip='$ip' WHERE id='$id_cache'");
	echo '<script language="javascript">';
	echo 'alert("Pedido de Transferência realizado com sucesso!")';
	echo '</script>';
	header("Location: trabalhos.php");
}
mysqli_close($link);
?>