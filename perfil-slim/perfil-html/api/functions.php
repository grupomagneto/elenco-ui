<?php 
require_once ("conecta.php");

	function insereImagemFavorita($conexao, $imagefavorita){
		$query = "INSERT INTO perfiltable (imagefavorita) VALUES ('{$imagefavorita}')";
		return mysqli_query($conexao, $query);
	}

	function insereImagemDescartada($conexao, $imagediscard){
		$query = "INSERT INTO perfiltable (imagediscard) VALUES ('{$imagediscard}')";
		return mysqli_query($conexao, $query);
	}

?>
