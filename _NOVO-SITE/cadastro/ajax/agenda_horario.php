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

mysqli_query($link, "INSERT INTO tb_agenda (dh_agendamento, cd_elenco, tipo_ensaio, status) VALUES ('$timestamp', '$id_elenco', '$tipo_ensaio', '$status')");
mysqli_close($link);
echo strftime('%A, <BR /> %d de %B de %Y <BR /> às ', strtotime($timestamp)).$hora.":".$minutos;
?>
