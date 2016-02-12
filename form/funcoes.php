
<?php require_once("conecta.php"); ?>


<?php 

function insereUsuario($conexao, $nome){

    $query = "insert into usuario (nome) values ('{$nome}')";
    return mysqli_query($conexao, $query);
}


?>