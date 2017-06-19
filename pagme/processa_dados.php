<?php
require_once 'dbconnect.php';
$cpf = $_POST['cpf_titular'];
$nome = $_POST['nome_completo'];
$tel = $_POST['DDD'].$_POST['cel'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
	echo json_encode(array(
		'cpf'=>$cpf,
		'nome'=>$nome,
		'email'=>$email,
		'data_nascimento'=>$data_nascimento,
		'tel'=>$tel),
		JSON_UNESCAPED_UNICODE
	);
mysqli_close($link);
?>