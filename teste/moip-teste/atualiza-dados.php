<?php 
header('Content-Type: text/html; charset=utf-8');


$nome = $_POST["nome"];
$DDD = $_POST["DDD"];
$cel = $_POST["cel"];
$email = $_POST["email"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$DataNascimento = $_POST["DataNascimento"];
$CPF = $_POST["CPF"];
$encrypted_value = $_POST["encrypted_value"];

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
        ->setFullname($nome)
        ->setEmail($email)
        ->setBirthDate($DataNascimento)
        ->setTaxDocument($CPF)
        ->setPhone($DDD, $cel)
        ->addAddress('BILLING',
            $endereco, $numero,
            $bairro, $cidade, $uf,
            $cep, 8)
        ->create();
    print_r($customer);
} catch (Exception $e) {
    printf($e->__toString());
}
//criando o pedido
try {
    $order = $moip->orders()->setOwnId(uniqid())
        ->addItem("cadastro premium",1, "premium", 19900)
        ->setCustomer($customer)
        ->create();

    print_r($order);
} catch (Exception $e) {
    printf($e->__toString());
}
//criando o pagamento cartão
try {
    $payment = $order->payments()->setCreditCard($encrypted_value, $customer)
        ->execute();

    print_r($payment);
} catch (Exception $e) {
    printf($e->__toString());
}


 ?>
