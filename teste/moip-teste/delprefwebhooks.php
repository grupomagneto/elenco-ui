<?php 
require 'vendor/autoload.php';


header('Content-Type: text/html; charset=utf-8');

use Moip\Moip;
use Moip\Auth\BasicAuth;
use MoipPayment\Payment;
use MoipPayment\Order;
use MoipPayment\Customer;

$token = '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN';
$key = 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI';

$moip = new Moip(new BasicAuth($token, $key), Moip::ENDPOINT_SANDBOX);

try {
  $notification_id = 'NPR-LJQOTNI7VYT1';
  $notification = $moip->notifications()
    ->delete($notification_id);
  print_r($notification);
} catch (Exception $e) {
  printf($e->__toString());    
}



?>
