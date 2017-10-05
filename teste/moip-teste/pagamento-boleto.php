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
$Parcelas = $_POST["Parcelas"];

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
    //print_r($customer);
} catch (Exception $e) {
    printf($e->__toString());
}
//criando o pedido
try {
    $order = $moip->orders()->setOwnId(uniqid())
        ->addItem("cadastro premium",1, "premium", 19900)
        ->setCustomer($customer)
        ->create();

    //print_r($order);
} catch (Exception $e) {
    printf($e->__toString());
}

//criando o pagamento boleto
$logo_uri = 'https://cdn.moip.com.br/wp-content/uploads/2016/05/02163352/logo-moip.png';
$expiration_date = new DateTime();
$instruction_lines = ['INSTRUÇÃO 1', 'INSTRUÇÃO 2', 'INSTRUÇÃO 3'];
try {
    $payment = $order->payments()  
        ->setBoleto($expiration_date, $logo_uri, $instruction_lines)    
        ->execute();
        // echo "<pre>";
        // print_r($payment);
        // echo "</pre>";

        $xml = json_decode(json_encode($payment),true);
        $boleto = $xml["_links"]["payBoleto"]["redirectHref"];

        echo $boleto;
        
} catch (Exception $e) {
    printf($e->__toString());
}

 ?>
