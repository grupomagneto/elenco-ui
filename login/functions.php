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

#############################################################################
#                                                                           #
# insereDados()                                                             #
# A função insereDados() faz a inserção genérica no banco de dados.         #
# A função retorna o id auto-incremental do registro.                       #
# A função recebe 3 (três) parâmetros:                                      #
# $nome_tabela => Nome da tabela do banco de dados onde a inserção ocorrerá #
# $array_colunas => Array com a lista de colunas                            #
# $array_valores => Array com a lista de valores para a inserção            #
#                                                                           #
#############################################################################
function insereDados($link2, $nome_tabela, $array_colunas, $array_valores, $debug = false){
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
		$sql .= ")";
		
		if($debug) die($sql);

		//Executa a string
		mysqli_query($link2, $sql) or die("ERRO - insereDados - " . mysqli_error() . $sql);
		return mysqli_insert_id();
	}
}

#############################################################################
#                                                                           #
# atualizaDados()                                                           #
# A função atualizaDados() faz um update genérico no banco de dados.        #
# Possíveis retornos para a função:                                         #
# true => dados atualizados com sucesso                                     #
# false => falha na atualização dos dados                                   #
# A função recebe 4 (quatro) parâmetros:                                    #
# $nome_tabela => Nome da tabela do banco de dados onde o update ocorrerá   #
# $array_colunas => Array com a lista de colunas                            #
# $array_valores => Array com a lista de valores para a inserção            #
# $condicao => Condição para a execução do update                           #
#                                                                           #
#############################################################################
function atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao, $debug = false){
	if(sizeof($array_colunas) != sizeof($array_valores)){
		//Quantidade de colunas diferente da quantidade de valores
		return false;
	}
	else{
		//Monta a string sql
		$sql = "UPDATE $nome_tabela SET ";
		for($i = 0; $i < sizeof($array_colunas); $i++){
			$sql .= $array_colunas[$i] . " = " . $array_valores[$i];
			if($i < (sizeof($array_colunas) - 1)) $sql .= ",";
		}	
		$sql .= " WHERE " . $condicao . ";";
		
		if($debug) die($sql);
	
		//Executa a string
		if(mysqli_query($link2, $sql)){
			return true;
		}
		else{
			echo("ERRO - atualizaDados - " . mysqli_error() . $sql);
			return false;
		}
	}
}

?>