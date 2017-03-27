<?php header('Content-Type: text/html; charset=utf-8');

$conexao = mysqli_connect("localhost:8889", "root", "root", "testeperfil");

$conexao_index = mysqli_connect("localhost:8889", "root", "root", "testecadastro");

mysqli_set_charset($conexao,"utf8");
mysqli_set_charset($conexao_index,"utf8");

?>