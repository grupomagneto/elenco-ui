<?php 
require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\BasicAuth;
use MoipPayment\Payment;
use MoipPayment\Order;
use MoipPayment\Customer;

$token = '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN';
$key = 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI';

$moip = new Moip(new BasicAuth($token, $key), Moip::ENDPOINT_SANDBOX);


try {
    $notification = $moip->notifications()
    		->addEvent('ORDER.*')
            ->addEvent('PAYMENT.*')
            ->setTarget('https://requestb.in/1mr843n1')
            ->create();

            echo '<pre>';
				print_r($notification);
			echo '</pre>';



} catch (Exception $e) {
    printf($e->__toString());    
}


// // Pega o RAW data da requisição
// $json = file_get_contents('php://input');
// // Converte os dados recebidos
// $response = json_decode($json, true);

// echo '<pre>';
// print_r($response);
// echo '</pre>';


?>
