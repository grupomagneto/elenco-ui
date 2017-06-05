<?php
include_once "autoload.inc.php";

$moip = new Moip();
$moip->setEnvironment('test');
$moip->setCredential(array(
   'key' => 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI',
   'token' => '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'));

$operation_id = rand(10000,99999);
// $moip->setUniqueID(false);
$moip->setUniqueID($operation_id);
$moip->setValue('199.00');
$moip->setReason('Cadastro');

$moip->setPayer(array('name' => 'Vinicius Goulart Batista',
    'email' => 'vini@grupomagneto.com.br',
    'payerId' => '19741',
    'billingAddress' => array('address' => 'SHIN CA 6',
        'number' => '15',
        'complement' => 'Conjunto 5',
        'city' => 'Brasília',
        'neighborhood' => 'Lago Norte',
        'state' => 'DF',
        'country' => 'BRA',
        'zipCode' => '71503506',
        'phone' => '61993110767')));

$moip->validate('Identification');
$moip->send();
   
$response = $moip->getAnswer()->response;
$error= $moip->getAnswer()->error;
$token = $moip->getAnswer()->token;
$payment_url = $moip->getAnswer()->payment_url;

echo $payment_url;
?>
