<?php
include_once "autoload.inc.php";

if(!session_id()) {
    session_start();
}
$prevenda = $_SESSION['prevenda'];
$produto = $_SESSION['produto'];
$id_usuario = $_SESSION['id_usuario'];
$valor = $_SESSION['valor'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$endereco = $_SESSION['endereco'];
$numero = $_SESSION['numero'];
$complemento = $_SESSION['complemento'];
$cidade = $_SESSION['cidade'];
$bairro = $_SESSION['bairro'];
$uf = $_SESSION['uf'];
$cep = $_SESSION['cep'];
$tel = $_SESSION['tel'];

$moip = new Moip();
$moip->setEnvironment('test');
$moip->setCredential(array(
   'key' => 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI',
   'token' => '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'));

$operation_id = $id_usuario."-".$prevenda;

$moip->setUniqueID($operation_id);
$moip->setValue($valor);
$moip->setReason($produto);

$moip->setPayer(array('name' => $nome,
    'email' => $email,
    'payerId' => $id_usuario,
    'billingAddress' => array('address' => $endereco,
        'number' => $numero,
        'complement' => $complemento,
        'city' => $cidade,
        'neighborhood' => $bairro,
        'state' => $uf,
        'country' => 'BRA',
        'zipCode' => $cep,
        'phone' => $tel)));

$moip->validate('Identification');
//configura boleto
$moip->setBilletConf("2",
            false,
            array("Seu cadastro está quase concluído!",
                "Pague este boleto até o vencimento para",
                "que a renovação do seu cadastro seja concluída."),
                "http://www.magnetoelenco.com.br/pagme/images/mini-logo.png");
$moip->send();
   
$response = $moip->getAnswer()->response;
$error= $moip->getAnswer()->error;
$token = $moip->getAnswer()->token;
$payment_url = $moip->getAnswer()->payment_url;

echo json_encode(array('token'=>$token));
?>