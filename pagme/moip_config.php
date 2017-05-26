<?php

include_once "Moip.php";
include_once "autoload.inc.php";


$moip = new MoIP();


$moip->setCredential(array('key'=>'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI', 'token'=>'4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'));
$moip->setUniqueID(12343);
$moip->setReason('Teste MoIP-PHP');
$moip->setValue('10.00');

$moip->validate();
$moip->send();

echo $moip->getAnswer()->token;

//$endpoint = 'https://desenvolvedor.moip.com.br/sandbox';
//$token = '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN';
//$key_token = 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI';
//
//$moip = new Moip(new MoipBasicAuth($token, $key_token), $endpoint);
//
//$customer = $moip->customers()->setOwnId('sandbox_v2_1401147277')
//                              ->setFullname(' ')
//                              ->setEmail('sandbox_v2_1401147277@email.com');
//
//$order = $moip->orders()->setOwnId('sandbox_v2_1401147277')
//                        ->addItem('Pedido de testes Sandbox - 1401147277', 1, 'Mais info...', 10000)
//                        ->setShippingAmount(100)
//                        ->setCustomer($customer)
//                        ->create();

?>