<?php header('Content-Type: text/html; charset=utf-8');
// DB Online
$user = 'vinigoulart1';
$password = 'ThM]HETPv@';
$db = 'testecadastro';
$host = 'p3plcpnl0612.prod.phx3.secureserver.net';

$link = mysqli_init();
$success = mysqli_real_connect(
  $link,
  $host,
  $user,
  $password,
  $db
);
mysqli_set_charset($link,"utf8");
// Configura a timezone do DB
mysqli_query($link, "SET time_zone='-03:00'");
?>