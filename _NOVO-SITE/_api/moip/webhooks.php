<?php

require '../../_sys/conecta.php';


$json_str = file_get_contents('php://input');
$array = json_decode($json_str, TRUE);


$event = $array['event'];
$liquid = $array['resource']['payment']['amount']['liquid'];
$order = $array['resource']['payment']['_links']['order']['title'];

echo $json_obj;

$event = $dados['event'];
$paymentId = $dados['resource']['payment']['id'];
$status = $dados['resource']['payment']['status'];

echo $event;
echo '<br />';
echo $paymentId;
echo '<br />';
echo $status;

http_response_code(200);



// require '../../_sys/conecta.php';
// $json_str = '{
//   "event": "PAYMENT.IN_ANALYSIS",
//   "resource": {
//     "payment": {
//       "id": "PAY-32LJ77AT4JNN",
//       "status": "IN_ANALYSIS",
//       "installmentCount": 1,
//       "amount": {
//         "total": 2000,
//         "liquid": 1813,
//         "refunds": 0,
//         "fees": 187,
//         "currency": "BRL"
//       },
//       "fundingInstrument": {
//         "method": "CREDIT_CARD",
//         "creditCard": {
//           "id": "CRC-BXXOA5RLGQR8",
//           "holder": {
//             "taxDocument": {
//               "number": "33333333333",
//               "type": "CPF"
//             },
//             "birthdate": "30/12/1988",
//             "fullname": "Jose Portador da Silva"
//           },
//           "brand": "MASTERCARD",
//           "first6": "555566",
//           "last4": "8884"
//         }
//       },
//       "events": [
//         {
//           "createdAt": "2015-03-16T18:11:19-0300",
//           "type": "PAYMENT.IN_ANALYSIS"
//         },
//         {
//           "createdAt": "2015-03-16T18:11:16-0300",
//           "type": "PAYMENT.CREATED"
//         }
//       ],
//       "fees": [
//         {
//           "amount": 187,
//           "type": "TRANSACTION"
//         }
//       ],
//       "createdAt": "2015-03-16T18:11:16-0300",
//       "updatedAt": "2015-03-16T18:11:19-0300",
//       "_links": {
//         "order": {
//           "title": "ORD-SDZARE29MWVY",
//           "href": "https://sandbox.moip.com.br/v2/orders/ORD-SDZARE29MWVY"
//         },
//         "self": {
//           "href": "https://sandbox.moip.com.br/v2/payments/PAY-32LJ77AT4JNN"
//         }
//       }
//     }
//   }
// }';
// echo "<pre>";
// print_r($json_str);


// $event = $array['event'];
// // $paymentId = $array['resource']['payment']['id'];
// // $status = $array['resource']['payment']['status'];
// $liquid = $array['resource']['payment']['amount']['liquid'];
// $order = $array['resource']['payment']['_links']['order']['title'];

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

