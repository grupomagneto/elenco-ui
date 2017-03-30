<?php
require_once ("api/conecta.php");
session_start();
$key = $_POST['array_key'];
$array = $_SESSION['search_array'];
$nome = $array[$key]["nome_artistico"];
$nome = explode(" ", $nome);
$nome = $nome[0];
$idade = $array[$key]['idade'];
$arquivo = $array[$key]["arquivo"];
$sexo = $array[$key]["sexo"];
$bairro = $array[$key]["bairro"];
$tipo_cadastro_vigente = $array[$key]["tipo_cadastro_vigente"];
$id = $array[$key]["id"];
$dt_foto = $array[$key]["dt_foto"];
$nomefoto = "idfavoritada_";
$nomeFotoCompleta = $nomefoto.$id;
?>
