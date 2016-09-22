<?php 
require_once("db.php");

function insert($link2, $id, $firstname, $lastname, $email, $gender, $birthday, $device, $os, $browser, $resolution, $viewport, $model, $user_agent, $ip, $access_city, $access_uf, $access_country, $access_loc){
	$query = "INSERT INTO tb_voters (facebook_ID, firstname, lastname, email, sex, birthday, device, os, browser, resolution, viewport, model, user_agent, ip, access_city, access_uf, access_country, access_loc) VALUES ('{$id}','{$firstname}','{$lastname}','{$email}','{$gender}','{$birthday}','{$device}','{$os}','{$browser}','{$resolution}','{$viewport}','{$model}','{$user_agent}','{$ip}','{$access_city}','{$access_uf}','{$access_country}','{$access_loc}')";

	return mysqli_query($link2, $query);
}

function insert_occupation($link2, $id, $occupation){
	$query = "UPDATE tb_voters SET occupation='{$occupation}' WHERE facebook_ID='{$id}'";

	return mysqli_query($link2, $query);
}


function insert_income($link2, $id, $income){
	$query = "UPDATE tb_voters SET income='{$income}' WHERE facebook_ID='{$id}'";

	return mysqli_query($link2, $query);
}

function insert_skincolor($link2, $id, $skincolor){
	$query = "UPDATE tb_voters SET skin_color='{$skincolor}' WHERE facebook_ID='{$id}'";

	return mysqli_query($link2, $query);
}

function insert_scholarity($link2, $id, $scholarity){
	$query = "UPDATE tb_voters SET scholarity='{$scholarity}' WHERE facebook_ID='{$id}'";

	return mysqli_query($link2, $query);
}

function insert_relationship_status($link2, $id, $relationship_status){
	$query = "UPDATE tb_voters SET relationship_status='{$relationship_status}' WHERE facebook_ID='{$id}'";

	return mysqli_query($link2, $query);
}
