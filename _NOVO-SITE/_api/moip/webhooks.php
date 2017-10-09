<?php 


$json_str = file_get_contents('php://input');

# Get as an object
$json_obj = json_decode($json_str);

echo $json_obj;

// $header = [];
// $header[] = 'Content-type: application/json; text/html; charset=utf-8';

// $header[] = "Authorization: Basic " . base64_encode("4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
 
// //Monta a URL
// $url = 'https://sandbox.moip.com.br/v2/webhooks';
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// curl_setopt($curl, CURLOPT_USERPWD, "4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN:FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI");
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $ret = curl_exec($curl);
// $err = curl_error($curl);
// curl_close($curl);

// $array = json_decode($ret, TRUE);

// // $resourceId = $array['webhooks'][0]['resourceId'];
// // $event = $array['webhooks'][0]['event'];
// $webhooks = $array['webhooks'];

// require 'vendor/autoload.php';

// header('Content-Type: text/html; charset=utf-8');

// use Moip\Moip;
// use Moip\Auth\BasicAuth;
// use MoipPayment\Payment;
// use MoipPayment\Order;
// use MoipPayment\Customer;

// $token = '4LPKLD8JMZPTMSYGU1UTF6DAKJP7OALN';
// $key = 'FFQZG6GOBHEPPKRGABPNENUEQFYB6WALYMIWRJWI';

// $moip = new Moip(new BasicAuth($token, $key), Moip::ENDPOINT_SANDBOX);

// //navega pelos elementos do array, imprimindo cada id
// foreach ($webhooks as $key => $e) {
//     	$id = $e['resourceId'];
//     	$event = $e['event'];
//     	echo $id;
//     	echo '<br />';
//     	echo $event;
//     	echo '<br />';
//    //  	if ($id == "PAY-K5AOK26L4G1L") {
//    //  		try {
// 			//   // $notification_id = 'ORD-UWSXYXLUAMHF';
// 			//   $notification = $moip->notifications()->delete($id);
// 			//   print_r($notification);
// 			// } catch (Exception $e) {
// 			//   printf($e->__toString());    
// 			// }
//    //  	}
// }
?>
