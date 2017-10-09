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

// $json = json_encode($ret);
$array = json_decode($ret, TRUE);
// print_r($array);
$webhooks = $array['webhooks'];
echo '<br />';


echo '<br />';

//navega pelos elementos do array, imprimindo cada id
//navega pelos elementos do array, imprimindo cada id
foreach ($webhooks as $key => $e) {
    	$url = $e['url'];
    	$id = $e['resourceId'];
    	$event = $e['event'];
    	echo $id;
    	echo '<br />';
    	echo $event;
    	echo '<br />';
    	echo $url;
   //  	if ($id == "PAY-K5AOK26L4G1L") {
   //  		try {
			//   // $notification_id = 'ORD-UWSXYXLUAMHF';
			//   $notification = $moip->notifications()->delete($id);
			//   print_r($notification);
			// } catch (Exception $e) {
			//   printf($e->__toString());    
			// }
   //  	}
}


?>
