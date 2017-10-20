<?php
require '../../_sys/conecta.php';

$json_str = file_get_contents('php://input');
$array = json_decode($json_str, TRUE);

$event = $array['event'];
$liquid = $array['resource']['payment']['amount']['liquid'];
$order = $array['resource']['payment']['_links']['order']['title'];

if ($event == "PAYMENT.CREATED") { $status = "Iniciado" } //Pagamento criado.
elseif ($event == "PAYMENT.WAITING") { $status = "Aguardando" } //Moip está aguardando confirmação de pagamento.
elseif ($event == "PAYMENT.IN_ANALYSIS") { $status = "Em Análise" } //Pagamento passando por análise de risco dentro do Moip.
elseif ($event == "PAYMENT.PRE_AUTHORIZED") { $status = "Pré-autorizado" } //indica a reserva do valor no cartão do cliente.
elseif ($event == "PAYMENT.AUTHORIZED") { $status = "Autorizado" } //Pagamento efetivado, proceda com a entrega da compra.
elseif ($event == "PAYMENT.CANCELLED") { $status = "Cancelado" } //Pagamento não efetivado, cancelado.
elseif ($event == "PAYMENT.REFUNDED") { $status = "Reembolsado" } //Atualização de status de pagamento para Reembolsado.
elseif ($event == "PAYMENT.REVERSED") { $status = "Estornado" } //Atualização de status de pagamento para Estornado
elseif ($event == "PAYMENT.SETTLED") { $status = "Disponível" } //Valor disponível para saque

$sql = "UPDATE financeiro SET status_venda = '$status', valor_venda = '$liquid' WHERE id_moip = '$order'";
$result = mysqli_query($link, $sql);

mysqli_close($link);

http_response_code(200);
?>