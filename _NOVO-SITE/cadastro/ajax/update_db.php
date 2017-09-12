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
// Atualiza o DB do site velho
if ($field != "ddd_01" && $field != "pele" && $field != "DRT" && $field != "ativo" && $field != "cpf_menor") {
	mysqli_query($link2, $sql_insert);
}
if ($field == "pele") {
	if ($value == "Amarela") {
		$value = 1;
	}
	if ($value == "Branca") {
		$value = 2;
	}
	if ($value == "Indígena") {
		$value = 5;
	}
	if ($value == "Negra") {
		$value = 4;
	}
	if ($value == "Parda") {
		$value = 3;
	}
	mysqli_query($link2, "UPDATE tb_elenco SET cd_pele = '$value' WHERE id_elenco = '$id_elenco'");
}
if ($field == "DRT") {
	if ($value == "Sim") {
		$value = 1;
	}
	if ($value == "Não") {
		$value = 0;
	}
	mysqli_query($link2, "UPDATE tb_elenco SET drt = '$value' WHERE id_elenco = '$id_elenco'");
}
if ($field == "ativo") {
	mysqli_query($link2, "UPDATE tb_elenco SET publicado = 1 WHERE id_elenco = '$id_elenco'");
}
if (!empty($_POST['value2'])) {
	$field2 = $_POST['field2'];
	$value2 = $_POST['value2'];
	$sql_insert2 = "UPDATE tb_elenco SET $field2 = '$value2' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert2);
	mysqli_query($link2, $sql_insert2);
}
if (!empty($_POST['value3'])) {
	$field3 = $_POST['field3'];
	$value3 = $_POST['value3'];
	$sql_insert3 = "UPDATE tb_elenco SET $field3 = '$value3' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert3);
	// Atualiza o DB do site velho
	if ($field != "concordo_timestamp") {
		mysqli_query($link2, $sql_insert3);
	}
}
if (!empty($_POST['value4'])) {
	$field4 = $_POST['field4'];
	$value4 = $_POST['value4'];
	$sql_insert4 = "UPDATE tb_elenco SET $field4 = '$value4' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert4);
	// Atualiza o DB do site velho
	if ($field != "ip") {
		mysqli_query($link2, $sql_insert4);
	}
}
if (!empty($_POST['value5'])) {
	$field5 = $_POST['field5'];
	$value5 = $_POST['value5'];
	$sql_insert5 = "UPDATE tb_elenco SET $field5 = '$value5' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert5);
	mysqli_query($link2, $sql_insert5);
}
if (!empty($_POST['value6'])) {
	$field6 = $_POST['field6'];
	$value6 = $_POST['value6'];
	$sql_insert6 = "UPDATE tb_elenco SET $field6 = '$value6' WHERE id_elenco = '$id_elenco'";
	mysqli_query($link, $sql_insert6);
	mysqli_query($link2, $sql_insert6);
}
mysqli_close($link);
mysqli_close($link2);
?>
