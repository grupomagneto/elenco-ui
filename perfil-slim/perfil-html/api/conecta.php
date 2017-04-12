<?php
if(!session_id()) {
    session_start();
}
ob_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
$year = date('Y', time());
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $conexao = mysqli_connect("localhost:8889", "root", "root", "testeperfil");

$conexao_index = mysqli_connect("localhost:8889", "root", "root", "testecadastro");
// $conexao_index = mysqli_connect("mysql02.vinigoulart.com.br", "vinigoulart12", "m@g3l3nc01122", "vinigoulart12");

// mysqli_set_charset($conexao,"utf8");
mysqli_set_charset($conexao_index,"utf8");

?>
