<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$ip = "189.61.13.223";
$ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $ip;
echo $ip_details->city;
echo $ip_details->region;
echo $ip_details->country;
echo $ip_details->loc;
?>