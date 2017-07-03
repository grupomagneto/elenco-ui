<?php
$img = $_POST['dataURL'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
//saving
$id = "79999";
$dir = 'fotos/'; //Diretório para uploads
date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
$timestamp = date('YmdHis');
$new_name = "elenco_".$id."_".$timestamp.".png"; //Definindo um novo nome para o arquivo
// $fileName = 'fotos/vini-salvo.png';
$fileName = $dir.$new_name;
file_put_contents($fileName, $fileData);
?>