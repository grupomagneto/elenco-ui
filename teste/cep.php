<?php
$token = 'ef6174dbcea0b6f4b8106c7050ad2c55';
$url = 'http://www.cepaberto.com/api/v2/ceps.json?lat=-15.712355&lng=-47.885910';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token token="' . $token . '"'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
echo $output;
?>