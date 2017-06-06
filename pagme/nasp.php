<?php
//require 'vendor/autoload.php';
include_once "autoload.inc.php";
$moip = new Moip();
$moip->setEnvironment('test');
$moip->setCredential(array(
   'key' => 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI',
   'token' => '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN'));

$iniciar = curl_init();

//curl_setopt($iniciar, CURLOPT URL, '');
$file_contents = file_get_contents('https://desenvolvedor.moip.com.br/sandbox/ws/alpha/ConsultarInstrucao/M2F0G1P7K0M6E086U1A7T4C230R8M6J1V5K040Y0F0D0T1T315W1O6X7U3K2');

// display file
echo $file_contents;
curl_exec($iniciar);


curl_close($iniciar);

//$Notificacao = ('');
//
//$Notificacao = json_decode($Notificacao);
//
//var_dump($Notificacao);
//
//if ($Notificacao->event == "plan.created");
//      //Faz alguma coisa quando um novo plano é criado
//else if ($Notificacao->event == "plan.updated");
//      //Faz alguma coisa quando um plano é atualizado
//else if ($Notificacao->event == "plan.activated");
//      //Faz alguma coisa quando um plano é ativado
//else if ($Notificacao->event == "plan.inactivated");
//      //Faz alguma coisa quando um plano é desativado
//else if ($Notificacao->event == "customer.created");
//      //Faz alguma coisa quando um assinante é criado
//else if ($Notificacao->event == "customer.updated");
//      //Faz alguma coisa quando um assinante é atualizado
//else if ($Notificacao->event == "subscription.created");
//      //Faz alguma coisa quando uma assinatura é criada
//else if ($Notificacao->event == "subscription.updated");
//      //Faz alguma coisa quando uma assinatura é atualizada
//else if ($Notificacao->event == "subscription.activated");
//      //Faz alguma coisa quando uma assinatura é ativada
//else if ($Notificacao->event == "subscription.suspended");
//      //Faz alguma coisa quando uma assinatura é suspensa
//else if ($Notificacao->event == "subscription.canceled");
//      //Faz alguma coisa quando uma assinatura é cancelada
//else if ($Notificacao->event == "invoice.created");
//      //Faz alguma coisa quando uma fatura é criada
//      if ($Notificacao->resource->status->code == '2');
//          //Aguardando confirmação
//      if ($Notificacao->resource->status->code == '3');
//          //Fatura paga
//      if ($Notificacao->resource->status->code == '4');
//          //Fatura não paga
//      if ($Notificacao->resource->status->code == '5');
//          //Fatura atrasada
//else if ($Notificacao->event == "invoice.status_updated");
//      //Faz alguma coisa quando uma fatura é atualizada
//      if ($Notificacao->resource->status->code == '2');
//          //Aguardando confirmação
//      if ($Notificacao->resource->status->code == '3');
//          //Fatura paga
//      if ($Notificacao->resource->status->code == '4');
//          //Fatura não paga
//      if ($Notificacao->resource->status->code == '5');
//          //Fatura atrasada
//else if ($Notificacao->event == "payment.created");
//      //Faz alguma coisa quando um pagamento é criado
//      if ($Notificacao->resource->status->code == '1');
//          //Pagamento autorizado
//      if ($Notificacao->resource->status->code == '2');
//          //Iniciado mas ainda não aceito pelo banco
//      if ($Notificacao->resource->status->code == '4');
//          //Concluído e valor já disponível
//      if ($Notificacao->resource->status->code == '5');
//          //Pagamento negado pelo banco ou análise de risco
//      if ($Notificacao->resource->status->code == '6');
//          //Pagamento autorizado pelo banco e está em análise de risco
//      if ($Notificacao->resource->status->code == '7');
//          //Pagamento estornado pelo banco
//      if ($Notificacao->resource->status->code == '9');
//          //Pagamento reembolsado a pedido do cliente
//else if ($Notificacao->event == "payment.status_updated");
//      //Faz alguma coisa quando o status de um pagamento é atualizado
//      if ($Notificacao->resource->status->code == '1');
//          //Pagamento autorizado
//      if ($Notificacao->resource->status->code == '2');
//          //Iniciado mas ainda não aceito pelo banco
//      if ($Notificacao->resource->status->code == '4');
//          //Concluído e valor já disponível
//      if ($Notificacao->resource->status->code == '5');
//          //Pagamento negado pelo banco ou análise de risco
//      if ($Notificacao->resource->status->code == '6');
//          //Pagamento autorizado pelo banco e está em análise de risco
//      if ($Notificacao->resource->status->code == '7');
//          //Pagamento estornado pelo banco
//      if ($Notificacao->resource->status->code == '9');
//          //Pagamento reembolsado a pedido do cliente

?>