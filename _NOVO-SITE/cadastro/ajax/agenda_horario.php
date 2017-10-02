<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
$id_elenco = $_SESSION['id_elenco'];
$data = $_POST['date'];
$hora = $_POST['hour'];
$minutos = $_POST['minutes'];
$timestamp = $data." ".$hora.":".$minutos.":00";
$tipo_ensaio = $_POST['tipo_ensaio'];
$status = "Pré-agendado";

// Se existir algum horário futuro com o mesmo ID, update
$sql = "SELECT id_agenda FROM tb_agenda WHERE cd_elenco = '$id_elenco' AND dh_agendamento > NOW()";
$result = mysqli_query($link, $sql) or die('Error');
$row = mysqli_fetch_array($result);
// Se já tem horário agendado
if (!empty($row) && $row != NULL && $row != "") {
  $id_row = $row['id_agenda'];
  mysqli_query($link, "UPDATE tb_agenda SET dh_agendamento = '$timestamp', tipo_ensaio = '$tipo_ensaio' WHERE id_agenda = '$id_row'");
}
elseif (empty($row) || $row == NULL || $row == "") {
  mysqli_query($link, "INSERT INTO tb_agenda (dh_agendamento, cd_elenco, tipo_ensaio, status) VALUES ('$timestamp', '$id_elenco', '$tipo_ensaio', '$status')");
}
mysqli_close($link);
echo strftime('%A, <BR /> %d de %B de %Y <BR /> às ', strtotime($timestamp)).$hora.":".$minutos;
