<!-- 
//<?php //require_once("conecta.php"); ?>


//<?php 

//function insereUsuario($conexao, $nome){

    //$query //= "insert into usuario (nome) values ('{$nome}')";
    //return mysqli_query($conexao, $query);
//}




//?> -->

<?php

$sexo = $_POST['sexo'];

if ( $sexo == "feminino" ) {
   $oa = 'a';
   $hm = 'mulheres';
} else {
   $oa = 'o';
   $hm = 'homens';
}

$texto  = "Olá, car".$oa." cliente!\n";


?>

<html>


	
<h1><?php echo $texto; ?></h1>

</html>