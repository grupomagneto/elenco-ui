<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
date_default_timezone_set('America/Sao_Paulo');
$dh_cadastro = date('Y-m-d H:i:s');

$id_elenco = $_SESSION['id_elenco'];
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

// Salva o arquivo
$fileName = $dir."elenco_".$id_elenco."_".$timestamp.".png";
file_put_contents($fileName, $fileData);
// Registra no DB
$sql = "INSERT INTO tb_foto (arquivo, dt_foto, cd_elenco, cd_tipo_foto, dh_cadastro, camera, flash, coordenadas, altitude) VALUES ('$fileName', '$dt_foto', '$id_elenco', '$cd_tipo_foto', '$dh_cadastro', '$camera', '$flash', '$coordenadas', '$altitude')";
mysqli_query($link, $sql);
mysqli_close($link);
?>