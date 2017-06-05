<?php
require_once 'dbconnect.php';
$hoje = date('Y-m-d', time());
$produto = $_SESSION['produto'];
$id_usuario = $_SESSION['id_usuario'];
$valor = $_SESSION['valor'];
// // INSERE PRÉ-VENDA
$result=mysqli_query($link, "SELECT nome_artistico FROM tb_elenco WHERE id_elenco=$id_usuario");
$row=mysqli_fetch_array($result);
$nome = $row['nome_artistico'];
$nome_curto = explode(' ', $nome);
$primeiro_nome = $nome_curto[0];
$sobrenome = $nome_curto[1];
mysqli_query($link, "INSERT INTO financeiro (tipo_entrada, nome, sobrenome, id_elenco_financeiro, produto, qtd, data_venda, valor_venda, status_venda, forma_pagamento) VALUES ('Venda', '$primeiro_nome', '$sobrenome', '$id_usuario', '$produto', '1', '$hoje', '$valor', 'Pré-Venda', 'Moip')");
$_SESSION['prevenda'] = mysqli_insert_id($link);
mysqli_close($link);
?>