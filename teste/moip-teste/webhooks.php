<?php 

$header = [];
$header[] = 'Content-type: application/json';

$header[] = "Authorization: Basic " . base64_encode("4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
 
//Monta a URL
$url = 'https://sandbox.moip.com.br/v2/webhooks';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_USERPWD, "4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$ret = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

// echo $ret;

echo '<br />';

// $xml = simplexml_load_string($ret);
// echo '<pre>';
// print_r($xml);
// echo '</pre>';
// echo '<br />';

$json = json_encode($ret);
$array = json_decode($json, TRUE);

print_r($array);

echo '<br />';


echo '<br />';
$webhooks = $array->webhooks;

//navega pelos elementos do array, imprimindo cada id
foreach ( $webhooks as $e )
    {
	echo "resourceId: $e->resourceId - event: $e->event - url: $e->url - status: $e->status - id: $e->id - sentAt: $e->sentAt<br>"; 
    }

?>
