<?php
include 'functions.php';
include 'db.php';
if (isset($_GET['post_id'])) {
  $post_ID = $_GET['post_id'];
  $pieces = explode("_", $post_ID);
  $user = $pieces[0];
  $post = $pieces[1];
  $post_link = "'http://www.facebook.com/";
  $post_link .= $user;
  $post_link .= "/"."posts/";
  $post_link .= $post."'";
  $share_ID = $_GET['from_share_ID'];
  $condicao = "share_ID=".$share_ID;
  $nome_tabela = 'tb_shares';
  $array_colunas = array('post_link');
  $array_valores = array($post_link);
  atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
} else {
  $share_ID = $_GET['from_share_ID'];
  $condicao = "share_ID=".$share_ID;
  $nome_tabela = 'tb_shares';
  if (isset($_GET['error_code'])) {
    $error_code = $_GET['error_code'];
    $array_colunas = array("error_code");
    $array_valores = array("'$error_code'");
  }
  if (isset($_GET['error_message'])) {
    $error_message = $_GET['error_message'];
    $error_message = str_replace("+", " ", $error_message);
    array_push($array_colunas,"error_message");
    array_push($array_valores,"'$error_message'");
  }
  atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
}
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Obrigado</title>
</head>
<body>
Obrigado!
</body>
</html>";
?>