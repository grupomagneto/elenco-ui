<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
if(!session_id()) {
    session_start();
}
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB Online
// $user = 'vinigoulart1';
// $password = 'ThM]HETPv@';
// $db = 'testecadastro';
// $host = 'p3plcpnl0612.prod.phx3.secureserver.net';

// $link = mysqli_init();
// $success = mysqli_real_connect(
//    $link,
//    $host,
//    $user,
//    $password,
//    $db
// );
// mysqli_set_charset($link,"utf8");

// DB Localhost
$user = 'root';
$password = 'root';
$db = 'testecadastro';
$host = 'localhost:8889';

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db
);
mysqli_set_charset($link,"utf8");