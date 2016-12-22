<?php 

$gender = $_POST["gender"];
$ranger = $_POST["ranger"];
$raca = $_POST["raca"];
$bairro = $_POST["bairro"];

$mysqli = new mysqli('localhost:8888', 'root', 'root', 'testeperfil');

$sql = "INSERT INTO `perfiltable` ('gender', 'ranger', 'raca', 'bairro') VALUES ('{$gender}', '{$ranger}', '{$raca}', '{$bairro}')";

if($mysqli->query($sql) === false){
      echo mysqli_connect_error();
    }
    else{
    echo "salvo";
    }

?>

