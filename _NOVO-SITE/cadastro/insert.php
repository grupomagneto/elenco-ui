<?php
if(!session_id()) {
  session_start();
}
require '../_sys/conecta.php';
// $id_elenco = $_SESSION['id_elenco'];
$id_elenco = 100271;
$sql = "SELECT *, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade FROM tb_elenco WHERE id_elenco = '$id_elenco'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
// Maiores de cadastro próprio
if ($row['idade'] >= 18 && $row['nome_responsavel'] == NULL) {
	$status = "maior";
	$array = array('nome', 'dt_nascimento', 'sexo', 'ddd_01', 'tl_celular', 'endereco', 'complemento', 'numero', 'bairro', 'cidade', 'uf', 'cep', 'email', 'senha', 'cpf', 'facebook_ID', 'fb_link', 'fb_total_friends', 'instagram_ID', 'ig_link', 'ig_seguindo_total', 'ig_seguidores_total', 'ig_total_posts', 'ig_likes_avg', 'ig_comments_avg');
}
else{
	$status = "menor";
	$array = array('nome_responsavel', 'dt_nasc_responsavel', 'sexo_responsavel', 'ddd_01', 'tl_celular', 'endereco', 'complemento', 'numero', 'bairro', 'cidade', 'uf', 'cep', 'email', 'senha', 'cpf', 'facebook_ID', 'fb_link', 'fb_total_friends', 'instagram_ID', 'ig_link', 'ig_seguindo_total', 'ig_seguidores_total', 'ig_total_posts', 'ig_likes_avg', 'ig_comments_avg');
}


$n=0;
$f=1;
$array2 = array();
$sql_insert = "INSERT INTO tb_elenco (";
while ($n <= 24) {
	$var = $array[$n];
	$insert = $row[$var];
	if (!empty($insert) && $insert != "" && $insert != NULL && $insert != " ") {
		$array2[$f] = $var;
		$f++;
	}
	$n++;
}
$v = $f;
while ($f > 0) {
	$var = $array2[$f];
	$insert = $row[$var];
	if (!empty($insert) && $insert != "" && $insert != NULL && $insert != " ") {
		if ($status == "maior") {
			if ($var == 'nome') {
				$var = "nome_responsavel";
			}
			if ($var == 'sexo') {
				$var = "sexo_responsavel";
			}
			if ($var == 'dt_nascimento') {
				$var = "dt_nasc_responsavel";
			}
		}
		$sql_insert .= $var;
		if ($f > 1) {
			$sql_insert .= ", ";
		}
		if ($f == 1) {
			$sql_insert .= ") VALUES (";
		}
		if ($status == "maior") {
			if ($var == 'nome_responsavel') {
				$var = "nome";
			}
			if ($var == 'sexo_responsavel') {
				$var = "sexo";
			}
			if ($var == 'dt_nasc_responsavel') {
				$var = "dt_nascimento";
			}
		}
		${$var} = $insert;
	}
	$f--;
}
while ($v > 0) {
	$var = $array2[$v];
	if (isset(${$var})) {
		$insert = ${$var};
		$sql_insert .= "'".$insert."'";
		if ($v > 1) {
			$sql_insert .= ", ";
		}
	}
	if ($v == 1) {
		$sql_insert .= ")";
	}
	$v--;
}
echo $sql_insert;
?>