<?php 

function insert($link2, $id, $firstname, $lastname, $email, $birthday, $gender, $occupation, $income, $skincolor, $schooling, $maritalstatus){
	$query = "INSERT INTO tb_voters (voter_elenco_ID, facebook_ID, name, lastname, email, birthdate, gender, occupation, income, skin_color, schooling, relationship_status) VALUES ({$id},'{$firstname}',{$lastname}, '{$email}',{$birthday},'{$occupation}','{$income}','{$skincolor}','{$schooling}','{$maritalstatus}')";

	return mysqli_query($link2, $query);
}
