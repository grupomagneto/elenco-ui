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
    $notification = $moip->notifications()->addEvent('ORDER.WAITING')
            ->addEvent('PAYMENT.IN_ANALYSIS')
            ->setTarget('https://requestb.in/18mpc541')
            ->create();
    print_r($notification);
} catch (Exception $e) {
    printf($e->__toString());    
}

$result = file_get_contents('https://requestb.in/18mpc541');
   echo $result;

?>
