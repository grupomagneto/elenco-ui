<?php 
require_once ("conecta.php");
// foreach($_POST["produto"] as $produto) {
//     mysql_query("INSERT INTO produtos (produtos) VALUES (".$produto.")") or die("Erro  query.<br>Mensagem do servidor: ".mysql_error());
// }
	function insereImagemFavorita($conexao, $imagefavorita) {
	$query = "INSERT INTO perfiltable (imagefavorita) VALUES ('{$imagefavorita}')";
	
	return mysqli_query($conexao, $query);
	}


	function insereImagemDescartada($conexao, $imagediscard) {
		$query = "INSERT INTO perfiltable (imagediscard) VALUES ('{$imagediscard}')";
		return mysqli_query($conexao, $query);
	}

?>
