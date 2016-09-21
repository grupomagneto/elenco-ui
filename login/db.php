<?php header('Content-Type: text/html; charset=utf-8');
// DB Online
$user2 = 'vinigoulart12';
$password2 = 'm@g3l3nc01122';
$db2 = 'vinigoulart12';
$host2 = 'mysql02.vinigoulart.com.br';

$link2 = mysqli_init();
$success2 = mysqli_real_connect(
  $link2,
  $host2,
  $user2,
  $password2,
  $db2
);
mysqli_set_charset($link,"utf8");
?>