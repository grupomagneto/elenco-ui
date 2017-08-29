<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
$field = $_POST['field'];
$value = $_POST['value'];
$id_elenco = $_SESSION['id_elenco'];
$sql_insert = "UPDATE tb_elenco SET $field = '$value' WHERE id_elenco = '$id_elenco'";
mysqli_query($link, $sql_insert);

if (!empty($_POST['value2'])) {
	$field2 = $_POST['field2'];
	$value2 = $_POST['value2'];
	$sql_insert2 = "UPDATE tb_elenco SET $field2 = '$value2' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert2);
}
if (!empty($_POST['value3'])) {
	$field3 = $_POST['field3'];
	$value3 = $_POST['value3'];
	$sql_insert3 = "UPDATE tb_elenco SET $field3 = '$value3' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert3);
}
if (!empty($_POST['value4'])) {
	$field4 = $_POST['field4'];
	$value4 = $_POST['value4'];
	$sql_insert4 = "UPDATE tb_elenco SET $field4 = '$value4' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert4);
}
if (!empty($_POST['value5'])) {
	$field5 = $_POST['field5'];
	$value5 = $_POST['value5'];
	$sql_insert5 = "UPDATE tb_elenco SET $field5 = '$value5' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert5);
}
if (!empty($_POST['value6'])) {
	$field6 = $_POST['field6'];
	$value6 = $_POST['value6'];
	$sql_insert6 = "UPDATE tb_elenco SET $field6 = '$value6' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert6);
}
mysqli_close($link);
?>