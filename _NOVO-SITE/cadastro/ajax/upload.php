<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
date_default_timezone_set('America/Sao_Paulo');
$dh_cadastro = date('Y-m-d H:i:s');

$id_elenco = $_SESSION['id_elenco'];
$id_elenco_formatado = str_pad($id_elenco, 6, "0", STR_PAD_LEFT);
$dir = "../fotos/";

$timestamp 		= $_POST['timestamp'];
$dt_foto 		= $_POST['dt_foto'];
$cd_tipo_foto 	= $_POST['tipo'];
$camera 		= $_POST['camera'];
$flash 			= $_POST['flash'];
$coordenadas 	= $_POST['coordenadas'];
$altitude 		= $_POST['altitude'];

$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);

// Se tem EXIF
if ($timestamp != null && $timestamp != "") {
	// Salva o arquivo
	$fileName = "elenco_".$id_elenco_formatado."_".$timestamp.".png";
	$sql = "INSERT INTO tb_foto (arquivo, dt_foto, cd_elenco, cd_tipo_foto, dh_cadastro, camera, flash, coordenadas, altitude) VALUES ('$fileName', '$dt_foto', '$id_elenco', '$cd_tipo_foto', '$dh_cadastro', '$camera', '$flash', '$coordenadas', '$altitude')";
}
// Se não tem EXIF
else {
	$timestamp = date('YmdHis');
	$dt_foto = date('Y-m-d');
	// Salva o arquivo
	$fileName = "elenco_".$id_elenco_formatado."_".$timestamp.".png";
	$sql = "INSERT INTO tb_foto (arquivo, dt_foto, cd_elenco, cd_tipo_foto, dh_cadastro) VALUES ('$fileName', '$dt_foto', '$id_elenco', '$cd_tipo_foto', '$dh_cadastro')";
}
// Salva arquivo e registra no DB
$fileDir = $dir.$fileName;
file_put_contents($fileDir, $fileData);
mysqli_query($link, $sql);

mysqli_close($link);
?>