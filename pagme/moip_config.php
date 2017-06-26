<?php
require_once 'dbconnect.php';
$hoje = date('Y-m-d', time());

$id_usuario = $_POST['id_usuario'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$tel = $_POST['tel'];

// INSERE PRÉ-VENDA
$result=mysqli_query($link, "SELECT nome_artistico FROM tb_elenco WHERE id_elenco=$id_usuario");
$row=mysqli_fetch_array($result);
$nome = $row['nome_artistico'];
$nome_curto = explode(' ', $nome);
$primeiro_nome = $nome_curto[0];
$sobrenome = $nome_curto[1];
mysqli_query($link, "INSERT INTO financeiro (tipo_entrada, nome, sobrenome, id_elenco_financeiro, produto, qtd, data_venda, valor_venda, status_venda, forma_pagamento) VALUES ('Venda', '$primeiro_nome', '$sobrenome', '$id_usuario', '$produto', '1', '$hoje', '$valor', 'Pré-Venda', 'Moip')");
$prevenda = mysqli_insert_id($link);
mysqli_close($link);

include_once "autoload.inc.php";

// $moip = new Moip();
// $moip->setEnvironment('test');
// $moip->setCredential(array(
//    'key' => 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI',
//    'token' => '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'));

$moip = new Moip();
$moip->setCredential(array(
   'key' => 'SHPPS0077Z8YVZPI8V6ZXAV2NPQB3JAJF8KVNJJ9',
   'token' => 'YCROBLW04MTE1I3NZOJDX74FHGZNN44B'));

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

$_SESSION['produto'] = $produto;
$_SESSION['id_usuario'] = $id_usuario;
$_SESSION['valor'] = $valor;
$_SESSION['nome'] = $_POST['nome'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['endereco'] = $_POST['endereco'];
$_SESSION['numero'] = $_POST['numero'];
$_SESSION['complemento'] = $_POST['complemento'];
$_SESSION['cidade'] = $_POST['cidade'];
$_SESSION['bairro'] = $_POST['bairro'];
$_SESSION['uf'] = $_POST['uf'];
$_SESSION['cep'] = $_POST['cep'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['prevenda'] = $prevenda;
?>