<?php
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
$json_str = file_get_contents('php://input');
$array = json_decode($json_str, TRUE);

$file_1 = "file_1.txt";
$file_2 = "file_2.txt";

file_put_contents($file_1, $json_str, FILE_APPEND);
file_put_contents($file_1, $array, FILE_APPEND);

$event = $array['event'];
// $paymentId = $array['resource']['payment']['id'];
// $status = $array['resource']['payment']['status'];
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

$id_venda = 12552;
$sql = "UPDATE financeiro SET status_venda = '$status', valor_venda = '$liquid' WHERE id = '$id_venda'";
// $result = mysqli_query($link, $sql);

// mysqli_close($link);

http_response_code(200);


// ORDER.CREATED - Criação de um novo pedido
// ORDER.WAITING - Atualização de status de pedido para Aguardando pagamento
// ORDER.PAID - Atualização de status de pedido para Pago
// ORDER.NOT_PAID - Atualização de status de pedido para Não Pago
// ORDER.REVERTED - Atualização de status de pedido para Revertido

// echo $event;
// echo '<br />';
// echo $paymentId;
// echo '<br />';
// echo $status;
// echo '<br />';
// echo $liquid;
// echo '<br />';
// echo $order;

// $header = [];
// $header[] = 'Content-type: application/json; text/html; charset=utf-8';

// $header[] = "Authorization: Basic " . base64_encode("4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
 
// //Monta a URL
// $url = 'https://sandbox.moip.com.br/v2/webhooks';
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// curl_setopt($curl, CURLOPT_USERPWD, "4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $ret = curl_exec($curl);
// $err = curl_error($curl);
// curl_close($curl);

// $array = json_decode($ret, TRUE);

// // $resourceId = $array['webhooks'][0]['resourceId'];
// // $event = $array['webhooks'][0]['event'];
// $webhooks = $array['webhooks'];

// require 'vendor/autoload.php';

// header('Content-Type: text/html; charset=utf-8');

// use Moip\Moip;
// use Moip\Auth\BasicAuth;
// use MoipPayment\Payment;
// use MoipPayment\Order;
// use MoipPayment\Customer;

// $token = '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN';
// $key = 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI';

// $moip = new Moip(new BasicAuth($token, $key), Moip::ENDPOINT_SANDBOX);

// //navega pelos elementos do array, imprimindo cada id
// foreach ($webhooks as $key => $e) {
//      $id = $e['resourceId'];
//      $event = $e['event'];
//      echo $id;
//      echo '<br />';
//      echo $event;
//      echo '<br />';
//    //    if ($id == "PAY-K5AOK26L4G1L") {
//    //      try {
//      //   // $notification_id = 'ORD-UWSXYXLUAMHF';
//      //   $notification = $moip->notifications()->delete($id);
//      //   print_r($notification);
//      // } catch (Exception $e) {
//      //   printf($e->__toString());    
//      // }
//    //    }
// }
?>
