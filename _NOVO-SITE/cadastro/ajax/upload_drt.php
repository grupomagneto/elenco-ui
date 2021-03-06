<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('YmdHis');
$id_elenco = $_SESSION['id_elenco'];
$id_elenco_formatado = str_pad($id_elenco, 6, "0", STR_PAD_LEFT);
$dir = "../drt/";

if(isset($_FILES['drt_file'])) { //verifica se recebeu um arquivo
    $pathinfo = pathinfo($_FILES['drt_file']);
    $extension = $pathinfo['extension'];
    if ($extension == 'jpeg') {
      $ext = '.jpg';
    } else {
      $ext = strtolower(substr($_FILES['drt_file']['name'],-4)); //Pegando extensão do arquivo
    }
    $new_name = "elenco_".$id_elenco_formatado."_".$hoje."_DRT".$ext; //Definindo um novo nome para o arquivo
    move_uploaded_file($_FILES['drt_file']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    $sql = "UPDATE tb_elenco SET DRT_filename = '$new_name' WHERE id_elenco = $id_elenco";
    mysqli_query($link, $sql);
}
mysqli_close($link);
?>