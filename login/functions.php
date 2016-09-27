<?php 
require_once("db.php");

function insert($link2, $id, $firstname, $lastname, $email, $gender, $birthday, $device, $os, $browser, $resolution, $viewport, $model, $user_agent, $ip, $access_city, $access_uf, $access_country, $access_loc){
	$query = "INSERT INTO tb_voters (facebook_ID, firstname, lastname, email, sex, birthday, device, os, browser, resolution, viewport, model, user_agent, ip, access_city, access_uf, access_country, access_loc) VALUES ('{$id}','{$firstname}','{$lastname}','{$email}','{$gender}','{$birthday}','{$device}','{$os}','{$browser}','{$resolution}','{$viewport}','{$model}','{$user_agent}','{$ip}','{$access_city}','{$access_uf}','{$access_country}','{$access_loc}')";

	return mysqli_query($link2, $query);
}

function update($link2, $id, $value, $name){
  $query = "UPDATE tb_voters SET $name='{$value}' WHERE facebook_ID='{$id}'";
  return mysqli_query($link2, $query);
}

function insereDados($nome_tabela, $array_colunas, $array_valores, $debug = false){
	if(sizeof($array_colunas) != sizeof($array_valores)){
		//Quantidade de colunas diferente da quantidade de valores
		return -1;
	}
	else{
		//Monta a string sql
		$sql = "INSERT INTO $nome_tabela (";
		for($i = 0; $i < sizeof($array_colunas); $i++){
			$sql .= $array_colunas[$i];
			if($i < (sizeof($array_colunas) - 1)) $sql .= ", ";
		}
		$sql .= ") VALUES (";
		for($i = 0; $i < sizeof($array_valores); $i++){
			$sql .= $array_valores[$i];
			if($i < (sizeof($array_valores) - 1)) $sql .= ", ";
		}		
		$sql .= ");";
		
		if($debug) die($sql);

		//Executa a string
		mysqli_query($sql) or die("ERRO - insereDados - " . mysqli_error());
		return mysqli_insert_id();
	}
}

?>