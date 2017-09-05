<?php
date_default_timezone_set('America/Sao_Paulo');

$hoje = date('Y-m-d_H-i-s');
$tipo = $_POST['tipo'];
$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
//saving
$fileName = "../fotos/".$hoje."_".$tipo.".png";
file_put_contents($fileName, $fileData);
?>