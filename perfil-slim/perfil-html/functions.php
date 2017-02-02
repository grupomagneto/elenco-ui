<?php 
require_once ("conecta.php");

	function insereImagem($conexao, $imagefavorita){
		$query = "INSERT INTO perfiltable (imagefavorita) VALUES ('{$imagefavorita}')";
		return mysqli_query($conexao, $query);
	}

?>
