<?php header('Content-Type: text/html; charset=utf-8');
// DB Online
// $user = 'vinigoulart1';
// $password = 'ThM]HETPv@';
// $db = 'testecadastro';
// $host = 'p3plcpnl0612.prod.phx3.secureserver.net';

// $link = mysqli_init();
// $success = mysqli_real_connect(
//   $link,
//   $host,
//   $user,
//   $password,
//   $db
// );
// mysqli_set_charset($link,"utf8");
// // Configura a timezone do DB
// mysqli_query($link, "SET time_zone='-03:00'");
// // DB 2 Online
// $user2 = 'elencooriginal';
// $password2 = 'M@g3l3nc0_0962';
// $db2 = 'elencooriginal';
// $host2 = 'elencooriginal.mysql.dbaas.com.br';

// $link2 = mysqli_init();
// $success2 = mysqli_real_connect(
//   $link2,
//   $host2,
//   $user2,
//   $password2,
//   $db2
// );
// mysqli_set_charset($link2,"utf8");

// Localhost 1
$user = 'root';
$password = 'root';
$db = 'testecadastro';
$host = '127.0.0.1:8889';

$link = mysqli_init();
$success = mysqli_real_connect(
  $link,
  $host,
  $user,
  $password,
  $db
);
mysqli_set_charset($link,"utf8");
mysqli_query($link, "SET time_zone='-03:00'");
// Localhost 2
$user2 = 'root';
$password2 = 'root';
$db2 = 'elencooriginal';
$host2 = '127.0.0.1:8889';

$link2 = mysqli_init();
$success2 = mysqli_real_connect(
  $link2,
  $host2,
  $user2,
  $password2,
  $db2
);
mysqli_set_charset($link2,"utf8");
?>