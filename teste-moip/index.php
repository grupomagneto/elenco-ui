<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>teste moip</title>
</head>
<body>
	
<?php 
header('Content-Type: text/html; charset=utf-8');

require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\BasicAuth;
use MoipPayment\Payment;
use MoipPayment\Order;
use MoipPayment\Customer;

$token = '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN';
$key = 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI';

$moip = new Moip(new BasicAuth($token, $key), Moip::ENDPOINT_SANDBOX);
//Criando um comprador

try {
    $customer = $moip->customers()->setOwnId(uniqid())
        ->setFullname('Fulano de Tal')
        ->setEmail('fulano@email.com')
        ->setBirthDate('1988-12-30')
        ->setTaxDocument('22222222222')
        ->setPhone(11, 66778899)
        ->addAddress('BILLING',
            'Rua de teste', 123,
            'Bairro', 'Sao Paulo', 'SP',
            '01234567', 8)
        ->addAddress('SHIPPING',
                  'Rua de teste do SHIPPING', 123,
                  'Bairro do SHIPPING', 'Sao Paulo', 'SP',
                  '01234567', 8)
        ->create();
    print_r($customer);
} catch (Exception $e) {
    printf($e->__toString());
}
try {
    $order = $moip->orders()->setOwnId(uniqid())
        ->addItem("bicicleta 1",1, "sku1", 10000)
        ->addItem("bicicleta 2",1, "sku2", 11000)
        ->addItem("bicicleta 3",1, "sku3", 12000)
        ->addItem("bicicleta 4",1, "sku4", 13000)
        ->addItem("bicicleta 5",1, "sku5", 14000)
        ->addItem("bicicleta 6",1, "sku6", 15000)
        ->addItem("bicicleta 7",1, "sku7", 16000)
        ->addItem("bicicleta 8",1, "sku8", 17000)
        ->addItem("bicicleta 9",1, "sku9", 18000)
        ->addItem("bicicleta 10",1, "sku10", 19000)
        ->setShippingAmount(3000)->setAddition(1000)->setDiscount(5000)
        ->setCustomer($customer)
        ->create();

    print_r($order);
} catch (Exception $e) {
    printf($e->__toString());
}

try {
    $payment = $order->payments()->setCreditCard(12, 21, '4073020000000002', '123', $customer)
        ->execute();

    print_r($payment);
} catch (Exception $e) {
    printf($e->__toString());
}
// $customer = new Customer($moip, 
// 	["Karina Pereira", "teste@teste.com", "1993-01-23", "00000000000", [99, 000000000]]);

// $customer->attachBillingAddress(
// 	["Rua teste", 121, "Bairro Teste", "Cidade Teste", "TT", "65470000", 7]);

// $customer->attachShippingAddress(
// 	["Rua shipping teste", 121, "Bairro Shipping Teste", "Cidade Shipping Teste", "TS", "65470000", 8]);

// $newCustomer = $customer->createCustomer();
//Criando um pedido com o comprador que acabamos de criar
// $order = new Order($moip, $newCustomer);

// $order->addItem(["Item 1", 1, "PARAM", 1000]);
// $order->addItem(["Item 2", 1, "PARAM2", 1300]);

// $passOrdem = $order->createOrder();
//Criando o pagamento
// try {
//     $payment = $passOrdem->payments()->setCreditCard(12, 21, '4073020000000002', '123', $newCustomer)
//         ->execute();
//     print_r($payment);
// } catch (Exception $e) {
//     printf($e->__toString());
// }



 ?>

	<script src='https://desenvolvedor.moip.com.br/sandbox/transparente/MoipWidget-v2.js'></script>
</body>
</html>


