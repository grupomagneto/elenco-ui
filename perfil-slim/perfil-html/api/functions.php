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

	function efetuaPesquisa($conexao_index, $ranger_age, $gender, $raca_index, $bairro) {
		$query_index = "SELECT * FROM (SELECT id_elenco AS id, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade FROM tb_elenco WHERE sexo AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AND cd_pele AND bairro";

		return mysqli_query($conexao_index, $query_index);

	}

?>
