<?php 
  require_once ("api/conecta.php");
  $gender = $_POST['gender'];
  $bairro = $_POST['bairro'];
  $ranger_age = $_POST['ranger_age'];
  $age1 =  $ranger_age[0]; 
  $age1 .=  $ranger_age[1];
  $age2 =  $ranger_age[3]; 
  $age2 .=  $ranger_age[4];
  $raca_index = $_POST['raca_index'];


                  $sql = "SELECT * FROM (SELECT id_elenco AS id, nome_artistico, sexo, bairro, cd_pele, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, tipo_cadastro_vigente FROM tb_elenco WHERE sexo='$gender' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= '$age1' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) <= '$age2' AND cd_pele='$raca_index' AND bairro='$bairro') t1 INNER JOIN (SELECT cd_elenco AS id, arquivo, dt_foto FROM tb_foto ORDER BY dh_cadastro ASC) t2 USING (id) GROUP BY id ORDER BY tipo_cadastro_vigente DESC";
          // $sql = "SELECT sexo, bairro, nome, cd_pele FROM tb_elenco WHERE sexo='$gender' AND bairro='$bairro' AND cd_pele='raca_index' ";

          $res    = mysqli_query($conexao_index, $sql) or die (alerta("Falha na Conexão  ".mysqli_error()));

          echo $sql;

          while($row = mysqli_fetch_array($res)) {
            echo '<p>' .$row["nome_artistico"].'</p> <br />';
            echo '<p>' .$row["sexo"].'</p> <br />';
            echo '<p>' .$row["bairro"].'</p> <br />';
            echo '<p>' .$row["arquivo"].'</p> <br />';
          }

?>
