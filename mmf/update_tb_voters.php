<?php
// UPDATE TB_VOTERS WITH VOTER_ELENCO_ID
$id = $_SESSION['id'];
$voter_elenco_ID = $_SESSION['voter_elenco_ID'];
$nome_tabela = "tb_voters";
$array_colunas = array("voter_elenco_ID");
$array_valores = array("'$voter_elenco_ID'");
$condicao = "facebook_ID='$id'";
atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
?>