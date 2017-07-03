<?php
header("Content-type: text/html; charset=utf-8");
// include("conecta.php");
session_start();
$id = "79999";
$dir = 'fotos/'; //Diretório para uploads
date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
$timestamp = date('YmdHis');

if(isset($_FILES['file'])) { //verifica se recebeu um arquivo
  $pathinfo = pathinfo($_FILES['file']);
  $extension = $pathinfo['extension'];
  if ($extension == 'jpeg') {
    $ext = '.jpg';
  } else {
    $ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
  }
  $new_name = "original_".$id."_".$timestamp.$ext; //Definindo um novo nome para o arquivo
   move_uploaded_file($_FILES['file']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
  // $sql2 = "INSERT INTO fotos_mobile (arquivo, data_foto, id_elenco_foto) VALUES ('$new_name', '$hoje', '$id')";
   // mysqli_query($link, $sql2);
  }
?>