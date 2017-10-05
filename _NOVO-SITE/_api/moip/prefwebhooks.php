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
    ->setTarget('https://www.magnetoelenco.com.br/_api/moip/webhooks.php')
    ->create();
  
    echo '<pre>';
		print_r($notification);
	echo '</pre>';


} catch (Exception $e) {
  printf($e->__toString());    
}

?>
