<?php
require_once 'dbconnect.php';
$id_usuario = $_POST['id_usuario'];
// select loggedin users detail
$sql = "SELECT * FROM tb_elenco WHERE id_elenco='$id_usuario'";
$res=mysqli_query($link, $sql) or die (mysqli_error($link));
if ($row = mysqli_fetch_array($res)) {
	$tel = $row['ddd_01'].$row['tl_celular'];
	echo json_encode(array(
		'nome'=>$row['nome'],
		'email'=>$row['email'],
		'endereco'=>$row['endereco'],
		'numero'=>$row['numero'],
		'complemento'=>$row['complemento'],
		'cidade'=>$row['cidade'],
		'bairro'=>$row['bairro'],
		'uf'=>$row['uf'],
		'cep'=>$row['cep'],
		'tel'=>$tel
	));
}
mysqli_close($link);
?>