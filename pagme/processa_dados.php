<?php
$cpf = $_POST["cpf_titular"];
$nome = $_POST["nome_completo"];
$tel = $_POST["DDD"].$_POST["cel"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];
if(strpos($data_nascimento, "/") == true) {
    $data_nascimento = str_replace("/", "-", $data_nascimento);
    $pieces = explode("-", $data_nascimento);
    $dd = $pieces[0];
    $mm = $pieces[1];
	$yyyy = $pieces[2];
	$data_nascimento = $yyyy."-".$mm."-".$dd;
}
	echo json_encode(array(
		"cpf"=>$cpf,
		"nome"=>$nome,
		"email"=>$email,
		"data_nascimento"=>$data_nascimento,
		"tel"=>$tel),
		JSON_UNESCAPED_UNICODE
	);
?>