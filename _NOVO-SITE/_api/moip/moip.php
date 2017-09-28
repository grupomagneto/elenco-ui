<?php
require '../../_sys/conecta.php';
require '../../_sys/functions.php';

$hoje = date('Y-m-d', time());

$id_elenco          = $_POST["id_elenco"];
$nome               = $_POST["nome_pagador"];
$DDD                = $_POST["DDD"];
$cel                = $_POST["cel"];
$email              = $_POST["email"];
$cep                = $_POST["cep"];
$endereco           = $_POST["endereco"];
$numero             = $_POST["numero"];
$complemento        = $_POST["complemento"];
$bairro             = $_POST["bairro"];
$cidade             = $_POST["cidade"];
$uf                 = $_POST["uf"];
$DataNascimento     = $_POST["data_nascimento"];
$CPF                = $_POST["cpf_titular"];
$produto            = $_POST["produto"];
$valor              = intval($_POST["valor"]);
$desconto           = $_POST["desconto"];
$forma_pagamento    = $_POST["forma_pagamento"];

if ($forma_pagamento == "Cartão de Crédito") {
    $encrypted_value    = $_POST["encrypted_value"];
    $parcelas           = $_POST["parcelas"];
}
if ($forma_pagamento == "Boleto Bancário") {
    $encrypted_value    = "";
    $parcelas           = 1;
}
// Identifica o Desconto
if ($desconto == "0" || $desconto == "" || empty($desconto)) {
    $discount = 0;
}
if ($desconto == "5") {
    $discount = $valor * 0.05;
}
if ($desconto == "10") {
    $discount = $valor * 0.10;
}
$valor_format = ($valor-$discount)/100;
$valor_format = number_format($valor_format, 2, '.', '');

// INSERE PRÉ-VENDA
$nome_curto = explode(' ', $nome);
$primeiro_nome = $nome_curto[0];
$sobrenome = $nome_curto[1];
mysqli_query($link, "INSERT INTO financeiro (tipo_entrada, nome, sobrenome, id_elenco_financeiro, produto, qtd, data_venda, valor_venda, status_venda, forma_pagamento, n_parcelas) VALUES ('Venda', '$primeiro_nome', '$sobrenome', '$id_elenco', '$produto', '1', '$hoje', '$valor_format', 'Pré-Venda', '$forma_pagamento', '$parcelas')");
$prevenda = mysqli_insert_id($link);
mysqli_close($link);

$operation_id = $id_elenco."-".$prevenda;

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
    $customer = $moip->customers()->setOwnId($id_elenco)
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
if ($forma_pagamento == "Boleto Bancário") {
    //criando o pedido
    try {
        $order = $moip->orders()->setOwnId($operation_id)
            ->addItem($produto,1,$produto, $valor)
            ->setDiscount($discount)
            ->setCustomer($customer)
            ->create();

        //print_r($order);
    } catch (Exception $e) {
        printf($e->__toString());
    }

    //criando o pagamento boleto
    $logoUri = 'https://www.magnetoelenco.com.br/pagme/images/mini-logo.png';
    $expiration_date = vencimentoBoleto($hoje);
    $instruction_lines = ['Seu cadastro está quase concluído!', 'Pague este boleto até o vencimento para', 'que seu perfil seja ativado.'];

    try {
        $payment = $order->payments()  
            ->setBoleto($expiration_date, $logoUri, $instruction_lines)
            ->execute();
            // echo "<pre>";
            // print_r($payment);
            // echo "</pre>";

            $xml = json_decode(json_encode($payment),true);
            $boleto = $xml["_links"]["payBoleto"]["printHref"];
            echo $boleto;
            
    } catch (Exception $e) {
        printf($e->__toString());
    }
}
if ($forma_pagamento == "Cartão de Crédito") {
    //criando o pedido
    try {
        $order = $moip->orders()->setOwnId($operation_id)
            ->addItem($produto,1,$produto, $valor)
            ->setDiscount($discount)
            ->setCustomer($customer)
            ->create();

        //print_r($order);
    } catch (Exception $e) {
        printf($e->__toString());
    }

    //criando o pagamento cartão com hash
    try {  $hash = $encrypted_value;  
        $payment = $order->payments()  
        ->setCreditCardHash($hash, $customer)                                 
        ->setInstallmentCount($parcelas)                                 
        ->setStatementDescriptor('MagnetoElenc')                                 
        ->setDelayCapture(false)                                 
        ->execute();  

        print_r($payment); 

        } 
        catch (Exception $e) {     
            printf($e->__toString()); 
        }
}

?>