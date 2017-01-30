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

$user_ID = $_SESSION['user'];
$result=mysqli_query($link, "SELECT * FROM bank_accounts WHERE id_elenco_financeiro='$user_ID' AND active='1'");
$row=mysqli_fetch_array($result);
if (!empty($row['active']) || $row['active'] == '1') {
  $id = $row['id'];
  mysqli_query($link, "UPDATE bank_accounts SET active='0' WHERE id='$id'");
}
header("Location: dbancarios.php");
exit;
?>
