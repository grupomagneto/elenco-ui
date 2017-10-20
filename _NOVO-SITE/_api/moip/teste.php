<?php
// header('Content-type: text/plain');
// require '../../_sys/conecta.php';
$json_str = 'Moip\Resource\Orders Object(    [orders:Moip\Resource\Orders:private] =>     [moip:protected] => Moip\Moip Object        (            [moipAuthentication:Moip\Moip:private] => Moip\Auth\BasicAuth Object                (                    [token:Moip\Auth\BasicAuth:private] => 4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN                    [key:Moip\Auth\BasicAuth:private] => FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI                )            [endpoint:Moip\Moip:private] => https://sandbox.moip.com.br            [session:Moip\Moip:private] => Requests_Session Object                (                    [url] => https://sandbox.moip.com.br                    [headers] => Array                        (                        )                    [data] => Array                        (                        )                    [options] => Array                        (                            [cookies] => Requests_Cookie_Jar Object                                (                                    [cookies:protected] => Array                                        (                                        )                                )                            [auth] => Moip\Auth\BasicAuth Object                                (                                    [token:Moip\Auth\BasicAuth:private] => 4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN                                    [key:Moip\Auth\BasicAuth:private] => FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI                                )                            [timeout] => 30                            [connect_timeout] => 30                            [useragent] => MoipPhpSDK/1.3.2 (+https://github.com/moip/moip-sdk-php/)                        )                )        )    [data:protected] => stdClass Object        (            [ownId] => 100203-12568            [amount] => stdClass Object                (                    [currency] => BRL                    [subtotals] => stdClass Object                        (                            [shipping] => 0                            [addition] => 0                            [discount] => 1495                            [items] => 29900                        )                    [total] => 28405                    [fees] => 0                    [refunds] => 0                    [liquid] => 0                    [otherReceivers] => 0                )            [items] => Array                (                    [0] => stdClass Object                        (                            [product] => Cadastro Premium                            [price] => 29900                            [detail] => Cadastro Premium                            [quantity] => 1                        )                )            [receivers] => Array                (                    [0] => stdClass Object                        (                            [moipAccount] => stdClass Object                                (                                    [id] => MPA-95DDE1C619D8                                    [login] => vini@grupomagneto.com.br                                    [fullname] => Mag2 Producoes Artisticas e Fotograficas Ltda                                )                            [type] => PRIMARY                            [amount] => stdClass Object                                (                                    [total] => 28405                                    [fees] => 0                                    [refunds] => 0                                )                            [feePayor] => 1                        )                )            [checkoutPreferences] => stdClass Object                (                    [redirectUrls] => stdClass Object                        (                        )                    [installments] => Array                        (                        )                )            [customer] => Moip\Resource\Customer Object                (                    [moip:protected] => Moip\Moip Object                        (                            [moipAuthentication:Moip\Moip:private] => Moip\Auth\BasicAuth Object                                (                                    [token:Moip\Auth\BasicAuth:private] => 4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN                                    [key:Moip\Auth\BasicAuth:private] => FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI                                )                            [endpoint:Moip\Moip:private] => https://sandbox.moip.com.br                            [session:Moip\Moip:private] => Requests_Session Object                                (                                    [url] => https://sandbox.moip.com.br                                    [headers] => Array                                        (                                        )                                    [data] => Array                                        (                                        )                                    [options] => Array                                        (                                            [cookies] => Requests_Cookie_Jar Object                                                (                                                    [cookies:protected] => Array                                                        (                                                        )                                                )                                            [auth] => Moip\Auth\BasicAuth Object                                                (                                                    [token:Moip\Auth\BasicAuth:private] => 4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN                                                    [key:Moip\Auth\BasicAuth:private] => FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI                                                )                                            [timeout] => 30                                            [connect_timeout] => 30                                            [useragent] => MoipPhpSDK/1.3.2 (+https://github.com/moip/moip-sdk-php/)                                        )                                )                        )                    [data:protected] => stdClass Object                        (                            [id] => CUS-HMF5D14984GF                            [ownId] => 100203                            [fullname] => Vinicius Goulart Batista                            [email] => vinicius.goulart@gmail.com                            [phone] => stdClass Object                                (                                    [countryCode] =>                                     [areaCode] =>                                     [number] =>                                 )                            [birthDate] => 1980-09-26                            [taxDocument] => stdClass Object                                (                                    [type] => CPF                                    [number] => 71247297187                                )                            [addresses] => Array                                (                                )                            [shippingAddress] =>                             [billingAddress] =>                             [fundingInstrument] =>                             [_links] => stdClass Object                                (                                    [self] => stdClass Object                                        (                                            [href] => https://sandbox.moip.com.br/v2/customers/CUS-HMF5D14984GF                                        )                                    [hostedAccount] => stdClass Object                                        (                                            [redirectHref] => https://hostedaccount-sandbox.moip.com.br?token=2035ccc7-3375-412a-b911-8f51c0b89b53&id=CUS-HMF5D14984GF&mpa=MPA-95DDE1C619D8                                        )                                )                        )                )            [id] => ORD-SBP8I8SBXWIL            [payments] => Array                (                )            [refunds] => Array                (                )            [entries] => Array                (                )            [events] => Array                (                    [0] => Moip\Resource\Event Object                        (                            [moip:protected] => Moip\Moip Object                                (                                    [moipAuthentication:Moip\Moip:private] => Moip\Auth\BasicAuth Object                                        (                                            [token:Moip\Auth\BasicAuth:private] => 4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN                                            [key:Moip\Auth\BasicAuth:private] => FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI                                        )                                    [endpoint:Moip\Moip:private] => https://sandbox.moip.com.br                                    [session:Moip\Moip:private] => Requests_Session Object                                        (                                            [url] => https://sandbox.moip.com.br                                            [headers] => Array                                                (                                                )                                            [data] => Array                                                (                                                )                                            [options] => Array                                                (                                                    [cookies] => Requests_Cookie_Jar Object                                                        (                                                            [cookies:protected] => Array                                                                (                                                                )                                                        )                                                    [auth] => Moip\Auth\BasicAuth Object                                                        (                                                            [token:Moip\Auth\BasicAuth:private] => 4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN                                                            [key:Moip\Auth\BasicAuth:private] => FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI                                                        )                                                    [timeout] => 30                                                    [connect_timeout] => 30                                                    [useragent] => MoipPhpSDK/1.3.2 (+https://github.com/moip/moip-sdk-php/)                                                )                                        )                                )                            [data:protected] => stdClass Object                                (                                    [type] => ORDER.CREATED                                    [createdAt] => 2017-10-20T18:54:51.815-02                                    [description] =>                                 )                        )                )            [createdAt] => 2017-10-20T18:54:51.815-02            [status] => CREATED            [_links] => stdClass Object                (                    [self] => stdClass Object                        (                            [href] => https://sandbox.moip.com.br/v2/orders/ORD-SBP8I8SBXWIL                        )                    [checkout] => stdClass Object                        (                            [payCheckout] => stdClass Object                                (                                    [redirectHref] => https://checkout-new-sandbox.moip.com.br?token=be8b2a9d-f58b-4e39-bcf4-1a5f4e8a0543&id=ORD-SBP8I8SBXWIL                                )                            [payCreditCard] => stdClass Object                                (                                    [redirectHref] => https://checkout-new-sandbox.moip.com.br?token=be8b2a9d-f58b-4e39-bcf4-1a5f4e8a0543&id=ORD-SBP8I8SBXWIL&payment-method=credit-card                                )                            [payBoleto] => stdClass Object                                (                                    [redirectHref] => https://checkout-new-sandbox.moip.com.br?token=be8b2a9d-f58b-4e39-bcf4-1a5f4e8a0543&id=ORD-SBP8I8SBXWIL&payment-method=boleto                                )                            [payOnlineBankDebitItau] => stdClass Object                                (                                    [redirectHref] => https://checkout-sandbox.moip.com.br/debit/itau/ORD-SBP8I8SBXWIL                                )                        )                )        ))
';

// print_r($json_str);
// $json_str = file_get_contents($json_str);
// $json_str = json_encode($json_str);
$array = json_decode($json_str, TRUE);
print_r($json_str);
// echo $json_str;

// print_r($array);

// $file_1 = "file_1.txt";
// $file_2 = "file_2.txt";

// file_put_contents($file_1, $json_str, FILE_APPEND);
// file_put_contents($file_2, $array, FILE_APPEND);

// $event = $array['event'];
// // $paymentId = $array['resource']['payment']['id']; // ID do evento
// // $status = $array['resource']['payment']['status'];
// $liquid = $array['resource']['payment']['amount']['liquid'];
// $order = $array['resource']['payment']['_links']['order']['title'];

// if ($event == "PAYMENT.CREATED") { $status = "Iniciado" } //Pagamento criado.
// elseif ($event == "PAYMENT.WAITING") { $status = "Aguardando" } //Moip está aguardando confirmação de pagamento.
// elseif ($event == "PAYMENT.IN_ANALYSIS") { $status = "Em Análise" } //Pagamento passando por análise de risco dentro do Moip.
// elseif ($event == "PAYMENT.PRE_AUTHORIZED") { $status = "Pré-autorizado" } //indica a reserva do valor no cartão do cliente.
// elseif ($event == "PAYMENT.AUTHORIZED") { $status = "Autorizado" } //Pagamento efetivado, proceda com a entrega da compra.
// elseif ($event == "PAYMENT.CANCELLED") { $status = "Cancelado" } //Pagamento não efetivado, cancelado.
// elseif ($event == "PAYMENT.REFUNDED") { $status = "Reembolsado" } //Atualização de status de pagamento para Reembolsado.
// elseif ($event == "PAYMENT.REVERSED") { $status = "Estornado" } //Atualização de status de pagamento para Estornado
// elseif ($event == "PAYMENT.SETTLED") { $status = "Disponível" } //Valor disponível para saque

// $id_venda = 12552;
// $sql = "UPDATE financeiro SET status_venda = '$status', valor_venda = '$liquid' WHERE id = '$id_venda'";
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
//     	$id = $e['resourceId'];
//     	$event = $e['event'];
//     	echo $id;
//     	echo '<br />';
//     	echo $event;
//     	echo '<br />';
//    //  	if ($id == "PAY-K5AOK26L4G1L") {
//    //  		try {
// 			//   // $notification_id = 'ORD-UWSXYXLUAMHF';
// 			//   $notification = $moip->notifications()->delete($id);
// 			//   print_r($notification);
// 			// } catch (Exception $e) {
// 			//   printf($e->__toString());    
// 			// }
//    //  	}
// }
?>
