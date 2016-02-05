
<?php require_once("conecta.php"); ?>


<?php 

function insereUsuario($conexao, $nome, $sobrenome, $celular){

    $query = "insert into usuario (nome, sobrenome, celular) values ('{$nome}', '{$sobrenome}', $celular)";
    return mysqli_query($conexao, $query);
}


?>