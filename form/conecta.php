<?php 

$conexao = mysqli_connect ('localhost', 'root', '', 'vinigoulart18');	

if (mysqli_connect_errno())
        	{
          		echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
        	}

?>