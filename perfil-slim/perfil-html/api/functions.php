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
		$query_index = "SELECT * FROM (SELECT id_elenco AS id, nome_artistico, sexo, bairro, cd_pele, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, tipo_cadastro_vigente FROM tb_elenco WHERE sexo='$gender' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= '$age1' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) <= '$age2' AND cd_pele='$raca_index' AND bairro='$bairro') t1 INNER JOIN (SELECT cd_elenco AS id, arquivo, dt_foto FROM tb_foto ORDER BY dh_cadastro ASC) t2 USING (id) GROUP BY id ORDER BY tipo_cadastro_vigente DESC";

		return mysqli_query($conexao_index, $query_index);

	}

?>
