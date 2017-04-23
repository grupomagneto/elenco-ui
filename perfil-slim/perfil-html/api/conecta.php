<?php
if(!session_id()) {
    session_start();
}
ob_start();
header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set('America/Sao_Paulo');
$year = date('Y', time());
$timestamp = date('Y-m-d H:i:s', time());

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conexao_index = mysqli_connect("localhost:8889", "root", "root", "testecadastro");
mysqli_set_charset($conexao_index,"utf8");

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
?>
