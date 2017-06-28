<?php
$cepi = 71503506;
// function getCepFile($cep) {
//             $url    = "http://viacep.com.br/ws/{$cep}/json/";
//             $result = file_get_contents($url);
//             return json_decode($result);
//             // return json_decode($this->results_string, true);
//         }
$value = $cepi;
// $cep_details = getCepFile($value);
$cep_details = json_decode(file_get_contents("https://viacep.com.br/ws/{$value}/json/"));
$city = $cep_details->localidade;
$district = $cep_details->bairro;
$uf = $cep_details->uf;
$coordinates = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=$value+br"));

echo $cepi;
echo "\n";
echo $value;
echo "<pre> \n";
print_r($cep_details);
echo "\n";
echo $city;
echo "\n";
echo $district;
echo "\n";
echo $uf;
echo "\n";
print_r($coordinates);
echo "\n";
?>