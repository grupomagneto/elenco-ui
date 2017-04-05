<?php
if(!session_id()) {
    session_start();
}
ob_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $conexao = mysqli_connect("localhost:8889", "root", "root", "testeperfil");

$conexao_index = mysqli_connect("localhost:8889", "root", "root", "testecadastro");

// mysqli_set_charset($conexao,"utf8");
mysqli_set_charset($conexao_index,"utf8");

?>
