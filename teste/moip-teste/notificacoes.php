<?php 

$header = [];
$header[] = 'Content-type: application/json';

$header[] = "Authorization: Basic " . base64_encode("4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
 
//Monta a URL
$url = 'https://sandbox.moip.com.br/v2/preferences/notifications' ;
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

$xml = simplexml_load_string($ret);
echo '<pre>';
print_r($xml);
echo '</pre>';
echo '<br />';

$json = json_encode($xml);
$array = json_decode($json, TRUE);
echo '<pre>';
print_r($array);
echo '</pre>';

echo '<br />';
//navega pelos elementos do array, imprimindo cada id
$id = $array['id']['ORD-432BJUHRZN43'];
echo $id;

$resourceId = $array['resourceId']['PAY-JVDTVDONUFKG'];
echo $resourceId;


?>
