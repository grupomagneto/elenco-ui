<?php
	require_once 'dbconnect.php';
	date_default_timezone_set('America/Sao_Paulo');
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
  if ($userRow['sexo'] == 'F') {
    $sexo = 'a';
  }
  elseif ($userRow['sexo'] == 'M') {
    $sexo = 'o';
  }

$id = $_SESSION['user'];
if (!empty($_SESSION['nome_responsavel'])) {
     $name = $_SESSION['nome_responsavel'];
}
else {
  $name = $userRow['nome'];
}
$cpf = $userRow['cpf'];
$bank_number = $_POST['banco'];
$bank_agency = trim($_POST['agencia']);
$bank_agency = strip_tags($bank_agency);
$bank_agency = htmlspecialchars($bank_agency);
$bank_account = trim($_POST['conta']);
$bank_account = strip_tags($bank_account);
$bank_account = htmlspecialchars($bank_account);
$timestamp = date('Y-m-d h:i:s', time());

require_once 'bank_names.php';
// echo $cpf;

$insert = mysqli_query($link, "INSERT INTO bank_accounts (id_elenco_financeiro, bank_number, bank_name, bank_agency, bank_account, cpf, full_name, active, timestamp) VALUES ('$id','$bank_number','$bank_name','$bank_agency','$bank_account','$cpf','$name','1','$timestamp')");
header("Location: dbancarios.php");
exit;
?>
