<?php 

require 'db.php';

// $user2 = 'vinigoulart12';
// $password2 = 'm@g3l3nc01122';
// $db2 = 'vinigoulart12';
// $host2 = 'mysql02.vinigoulart.com.br';



$sql = "SELECT * FROM tb_voters WHERE voter_elenco_ID = '".mysqli_real_escape_string($link2, $_POST['id_elenco'])."'";  // CONSULTA
$query = $link2->query($sql); // RODA A CONSULTA


$linhas = $query->num_rows;


if($linhas >= 1) { 
	//user existe
header('Location: vote.php');

} else {
	//user não existe
header('Location: home.php');
}