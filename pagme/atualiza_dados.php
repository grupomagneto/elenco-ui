<?php
require_once 'dbconnect.php';
if (isset($_POST['id_usuario'])) {
	$id_usuario = $_POST['id_usuario'];
    $ddd = $_POST['DDD'];
    $cel = $_POST['cel'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    // ATUALIZA DADOS NO DB
    mysqli_query($link, "UPDATE tb_elenco SET ddd_01 = '$ddd', tl_celular = '$cel', email = '$email', cep = '$cep', endereco = '$endereco', complemento = '$complemento', numero = '$numero', bairro = '$bairro', cidade = '$cidade', uf = '$uf' WHERE id_elenco='$id_usuario'");
}
mysqli_close($link);
?>
