<?php
  require_once ("api/conecta.php");
  $gender = "F";
  $bairro = "Asa Sul";
  $ranger_age = "20;40";
  $age1 =  $ranger_age[0];
  $age1 .=  $ranger_age[1];
  $age2 =  $ranger_age[3];
  $age2 .=  $ranger_age[4];
  $raca_index = 2;


                  $sql = "SELECT * FROM (SELECT id_elenco AS id, nome_artistico, sexo, bairro, cd_pele, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, tipo_cadastro_vigente FROM tb_elenco WHERE sexo='$gender' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= '$age1' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) <= '$age2' AND cd_pele='$raca_index' AND bairro='$bairro') t1 INNER JOIN (SELECT cd_elenco AS id, arquivo, dt_foto FROM tb_foto ORDER BY dh_cadastro ASC) t2 USING (id) GROUP BY id ORDER BY tipo_cadastro_vigente DESC";
          // $sql = "SELECT sexo, bairro, nome, cd_pele FROM tb_elenco WHERE sexo='$gender' AND bairro='$bairro' AND cd_pele='raca_index' ";

          $res    = mysqli_query($conexao_index, $sql) or die (alerta("Falha na Conexão  ".mysqli_error()));

          // print_r($res);
          // $teste = mysqli_fetch_array($res);
          echo "<pre>";



            // foreach ($teste as $value) {
            //   print_r($value);
            // }

            // foreach ($teste as $key => $value) {
            // echo "{$key} => {$value} ";
            // print_r($teste);
            // }
          $array = array();
          while($row = mysqli_fetch_array($res)) {
            // $arraynew = array('id' => $row['id'],'nome_artistico' => $row['nome_artistico'],'sexo' => $row['sexo'],'bairro' => $row['bairro'],'arquivo' => $row['arquivo'],'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente']);
            // $array = array_push($arraynew, $array);
            // $array[] = $row;
            $addarray = array('id' => $row['id'],'nome_artistico' => $row['nome_artistico'],'sexo' => $row['sexo'],'bairro' => $row['bairro'],'arquivo' => $row['arquivo'],'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente']);
            // echo $row['id'];
            array_push($array, $addarray);
            // $array[] = $row;
            // usort($row, function($a, $b) {
            //   return $a['order'] - $b['order'];
            // });

            // print_r($row);

          }
          $cadastro = array();
            foreach ($array as $key => $value){
              $cadastro[$key] = $value['tipo_cadastro_vigente'];
            }
            array_multisort($cadastro, SORT_DESC, $array);
            // print_r($array);
            while($row2 = mysqli_fetch_array($array)) {
              foreach ($array as $key => $value) {
                $nome = $row["nome_artistico"];
                $nome = explode(" ", $nome);
                $nome = $nome[0];
                $idade = $row['idade'];
                $arquivo = $row["arquivo"];
              }
            //   echo '<p>' .$row2["nome_artistico"].'</p> <br />';
            //   echo '<p>' .$row2["sexo"].'</p> <br />';
            //   echo '<p>' .$row2["bairro"].'</p> <br />';
            //   echo '<p>' .$row2["arquivo"].'</p> <br />';
            }

?>
