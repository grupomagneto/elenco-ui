<?php
require 'vendor/autoload.php';

$endpoint = 'sandbox.moip.com.br';
$token = "4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN";
$key_api = "FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI";

$inxml = '
<EnviarInstrucao>
<InstrucaoUnica TipoValidacao="Transparente">
<Razao>Teste api</Razao>
<Valores>
<Valor moeda="BRL">199</Valor>
</Valores>
<IdProprio>Meu_ID</IdProprio>
<Pagador>
<Nome>Cliente Sobrenome</Nome>
<Email>login@meudominio.com.br</Email>
<IdPagador>MEU_CLIENTE_ID</IdPagador>
<EnderecoCobranca>
<Logradouro>Av. Brigadeiro Faria Lima</Logradouro>
<Numero>2927</Numero>
<Complemento>8° Andar</Complemento>
<Bairro>Jardim Paulistao</Bairro>
<Cidade>Sao Paulo</Cidade>
<Estado>SP</Estado>
<Pais>BRA</Pais>
<CEP>01452-000</CEP>
<TelefoneFixo>(11)3165-4020</TelefoneFixo>
</EnderecoCobranca>
</Pagador>
<FormasPagamento>
<FormaPagamento>CartaoDeCredito</FormaPagamento>
</FormasPagamento>
      <Parcelamentos>
         <Parcelamento>
            <MinimoParcelas>1</MinimoParcelas>
            <MaximoParcelas>10</MaximoParcelas>
            <Recebimento>Parcelado</Recebimento>
            <Juros>0.99</Juros>
         </Parcelamento>
         <Parcelamento>
            <MinimoParcelas>1</MinimoParcelas>
            <MaximoParcelas>10</MaximoParcelas>
            <Recebimento>AVista</Recebimento>
         </Parcelamento>
      </Parcelamentos>
</InstrucaoUnica>
</EnviarInstrucao>
';

echo $inxml;


?>