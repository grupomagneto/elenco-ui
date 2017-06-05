<?php
require_once 'dbconnect.php';
$hora = date('Y-m-d H:i:s', time());
$hoje = date('Y-m-d', time());
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$id_venda = $_SESSION['prevenda'];
// CONFIRMA A VENDA NO DB
$result = mysqli_query($link, "SELECT produto, id_elenco_financeiro FROM financeiro WHERE id = '$id_venda'");
$row = mysqli_fetch_array($result);
$produto = $row['produto'];
$id_elenco = $row['id_elenco_financeiro'];
$valor_venda = $_POST['valor_venda'];
$forma_pagamento = $_POST['forma_pagamento'];
if ($forma_pagamento == "Boleto Bancário") {
	$status_venda = "Processando";
}
elseif ($forma_pagamento == "Cartão de Crédito") {
	$status_venda = "Pago";
}
$n_parcelas = $_POST['n_parcelas'];
mysqli_query($link, "UPDATE financeiro SET valor_venda = '$valor_venda', forma_pagamento = '$forma_pagamento', n_parcelas = '$n_parcelas', status_venda = '$status_venda', data_venda = '$hoje' WHERE id = '$id_venda'");
// RENOVA O CADASTRO NO DB
if ($produto == "Renovação Premium") {
	$cadastro = "Premium";
}
elseif ($produto == "Renovação Profissional") {
	$cadastro = "Profissional";
}
mysqli_query($link, "UPDATE tb_elenco SET data_contrato_vigente = '$hoje', tipo_cadastro_vigente = '$cadastro', ativo = 'Sim', concordo_timestamp = '$hora', ip = '$ip' WHERE id_elenco='$id_elenco'");
mysqli_close($link);
?>