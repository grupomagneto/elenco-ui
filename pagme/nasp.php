<?php
//require 'vendor/autoload.php';
//include_once "autoload.inc.php";
//
$header[] = "Authorization: Basic " . base64_encode("4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");

$queryString = array(
    'pagador' => 'nome',
    'pagador' => 'email'
);
 
//Monta a URL
$url = 'https://desenvolvedor.moip.com.br/sandbox/ws/alpha/ConsultarInstrucao/M2F0G1P7K0M6E086U1A7T4C230R8M6J1V5K040Y0F0D0T1T315W1O6X7U3K2?' . http_build_query($queryString);

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

//teste moip nasp localhost
echo "<pre>";
print_r($_POST);

?>