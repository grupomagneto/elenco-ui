<?php 
require_once("db.php");

function insert($link2, $id, $firstname, $lastname, $email, $gender){
	$query = "INSERT INTO tb_voters (facebook_ID, name, lastname, email, sex) VALUES ({$id},'{$firstname}','{$lastname}','{$email}','{$gender}')";

	return mysqli_query($link2, $query);
}


function insert_occupation($link2, $occupation){
	$query = "INSERT INTO tb_voters (occupation) VALUES ({'{$occupation}')";

	return mysqli_query($link2, $query);
}