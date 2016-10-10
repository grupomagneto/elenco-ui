<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $value = "71503506";
$coordinates = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address={$value}+br"), true);
// $lat = $coordinates->getProperty('results')->getProperty('geometry')->getProperty('location')->lat;
// $results = $coordinates->results[2]->lat;
// $geometry = $results[2]->geometry;
// $location = $geometry->location;
// $lat = $location->lat;

// $keys = array();
// foreach($coordinates['results'] as $key => $value){
//     $keys[] = $value["geometry"];
//     foreach($keys['geometry'] as $key => $value){
//     $keys[] = $value["location"];
// 	}
// }
// echo '<pre>';
// print_r($coordinates);
// echo "teste: ".$lat;

	$subject1 = "[IMPORTANTE] Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";
	$subject2 = "Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";
	$subject3 = "[CASTING] Peça para seus amigos votarem em você";
	$subject4 = "Descubra seu Potencial de Magnetismo nas propagandas";
	$random_subject = array($subject1, $subject2, $subject3, $subject4);
	echo $random_subject[array_rand($random_subject)];
?>