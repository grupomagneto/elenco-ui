<?php
if(!session_id()) {
  session_start();
}
require 'conecta.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha = hash('sha256', $senha);
$sql = "SELECT id_elenco FROM tb_elenco WHERE email = '$email' AND senha = '$senha' AND ativo = 'New' ORDER BY dt_insercao ASC";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) != 0) {
	$_SESSION['id_elenco'] = $row['id_elenco'];
}
else {
	header('Location: ../cadastro/index.php');
}
mysqli_close($link);
?>
