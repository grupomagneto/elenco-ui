<?php
//require 'vendor/autoload.php';

//API
//use Moip\Moip;
//use Moip\MoipBasicAuth;

//
//$moip = new Moip();
//$moip->setEnvironment('test');
//$moip->setCredential(array(
//    'key' => 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI',
//    'token' => '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'
//));
// 
include_once "autoload.inc.php";


$moip = new Moip();
$moip->setEnvironment('test');
$moip->setCredential(array('key' => 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI', 'token' => '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'));

$moip->setUniqueID('testesite');
$moip->setValue('199.00');
$moip->setReason('Teste cadastro site');

$moip->setPayer(array('name' => 'teste',
    'email' => 'teste',
    'payerId' => 'teste',
    'billingAddress' => array('address' => 'teste',
        'number' => 'teste',
        'complement' => 'teste',
        'city' => 'teste',
        'neighborhood' => 'teste',
        'state' => 'teste',
        'country' => 'BRA',
        'zipCode' => 'teste',
        'phone' => '(11)8888-8888')));

$moip->validate('Identification');
 
print_r($moip->send());

$response = $moip->getAnswer()->response;
$error= $moip->getAnswer()->error;
$token = $moip->getAnswer()->token;
$payment_url = $moip->getAnswer()->payment_url;

print_r($moip->getAnswer());

?>
