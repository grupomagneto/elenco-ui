<?php
$codigo_moip = $_POST['CodigoMoIP'];
$status_pagamento = $_POST['Status'];
echo $codigo_moip."<BR/>";
echo $status_pagamento."<BR/>";
exit;

$header[] = "Authorization: Basic " . base64_encode("4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");

//Monta a URL
$url = 'https://desenvolvedor.moip.com.br/sandbox/ws/alpha/ConsultarInstrucao/X2P0M1L7Q0Z6C1X3X1T8V2L2U4T3R2U0Z1Z0U030O0U0Q163D6P0S1J5K8G2';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_USERPWD, "4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$ret = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

echo $ret;
echo '<br />';

echo '<br />';

$xml = simplexml_load_string($ret);


$json = json_encode($xml);
$array = json_decode($json,TRUE);

echo '<br />';
//navega pelos elementos do array, imprimindo cada id
$id = $array['RespostaConsultar']['ID'];
echo $id;
echo '<br />';
//imprimindo cada status
$status = $array['RespostaConsultar']['Status'];
echo $status;
echo '<br />';
//imprimindo cada nome do pagador
$nome = $array['RespostaConsultar']['Autorizacao']['Pagador']['Nome'];
echo $nome;
echo '<br />';
//imprimindo cada email do pagador
$email = $array['RespostaConsultar']['Autorizacao']['Pagador']['Email'];
echo $email;
echo '<br />';
//imprimindo logradouro
$logradouro = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Logradouro'];
echo $logradouro;
echo '<br />';
//imprimindo numero
$numero = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Numero'];
echo $numero;
echo '<br />';
//imprimindo complemento
$complemento = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Complemento'];
echo $complemento;
echo '<br />';
//imprimindo bairro
$bairro = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Bairro'];
echo $bairro;
echo '<br />';
//imprimindo cep
$cep = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['CEP'];
echo $cep;
echo '<br />';
//imprimindo cidade
$cidade = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Cidade'];
echo $cidade;
echo '<br />';
//imprimindo estado
$estado = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Estado'];
echo $estado;
echo '<br />';
//imprimindo pais
$pais = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['Pais'];
echo $pais;
echo '<br />';
//imprimindo telefonefixo
$telefonefixo = $array['RespostaConsultar']['Autorizacao']['EnderecoCobranca']['TelefoneFixo'];
echo $telefonefixo;
echo '<br />';
//imprimindo nome do recebedor
$nome_recebedor = $array['RespostaConsultar']['Autorizacao']['Recebedor']['Nome'];
echo $nome_recebedor;
echo '<br />';
//imprimindo email do recebedor
$email_recebedor = $array['RespostaConsultar']['Autorizacao']['Recebedor']['Email'];
echo $email_recebedor;
echo '<br />';
//imprimindo data do pagamento
$data_pagamento = $array['RespostaConsultar']['Autorizacao']['Pagamento']['Data'];
echo $data_pagamento;
echo '<br />';
//imprimindo TotalPago
$totalpago = $array['RespostaConsultar']['Autorizacao']['Pagamento']['TotalPago'];
echo $totalpago;
echo '<br />';
//imprimindo TaxaParaPagador
$taxaparapagador = $array['RespostaConsultar']['Autorizacao']['Pagamento']['TaxaParaPagador'];
echo $taxaparapagador;
echo '<br />';
//imprimindo TaxaMoIP
$taxamoip = $array['RespostaConsultar']['Autorizacao']['Pagamento']['TaxaMoIP'];
echo $taxamoip;
echo '<br />';
//imprimindo ValorLiquido
$valorliquido = $array['RespostaConsultar']['Autorizacao']['Pagamento']['ValorLiquido'];
echo $valorliquido;
echo '<br />';
//imprimindo FormaPagamento
$formapagamento = $array['RespostaConsultar']['Autorizacao']['Pagamento']['FormaPagamento'];
echo $formapagamento;
echo '<br />';
//imprimindo InstituicaoPagamento
$instituicao = $array['RespostaConsultar']['Autorizacao']['Pagamento']['InstituicaoPagamento'];
echo $instituicao;
echo '<br />';
//imprimindo Status do Pagamento
$status_pagamento = $array['RespostaConsultar']['Autorizacao']['Pagamento']['Status'];
echo $status_pagamento;
echo '<br />';
//imprimindo Parcela do Pagamento
$parcela_pagamento = $array['RespostaConsultar']['Autorizacao']['Pagamento']['Parcela']['TotalParcelas'];
echo $parcela_pagamento;
echo '<br />';
//imprimindo Cartao do Pagamento
$cartao = $array['RespostaConsultar']['Autorizacao']['Pagamento']['Cartao'];
echo $cartao;
echo '<br />';
//imprimindo Bandeira do cartão
$bandeira = $array['RespostaConsultar']['Autorizacao']['Pagamento']['Bandeira'];
echo $bandeira;
echo '<br />';
//imprimindo CodigoMoIP
$codigo_moip = $array['RespostaConsultar']['Autorizacao']['Pagamento']['CodigoMoIP'];
echo $codigo_moip;
echo '<br />';

?>














