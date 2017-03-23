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

                    while($row = mysqli_fetch_array($res)) {
                      $nome = $row["nome_artistico"];
                      $nome = explode(" ", $nome);
                      $nome = $nome[0];
                      $idade = $row['idade'];
                      $arquivo = $row["arquivo"];
                      echo  "
                      <div class='tab__box'>
                      <div class='tab-actions tab-actions__multiples'>

                        <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-multiples' />
                        <button type='submit' class='checkbox-multiples-action__fav botaofavorita fav' onclick='AddTableRow()'>
                          <img class='checkbox-multiples-img__fav' src='images/fav-icon.svg' alt=''>
                        </button>
                        
                        <input type='radio' name='imagediscard' value='valor da imagem' class='checkbox-multiples' />
                        <button type='submit' class='checkbox-multiples-action__discard botaodiscard discard'>
                          <img src='images/discard-icon.svg' alt=''>
                        </button>

                        <img alt='discard' class='discard-action cursor' src='images/discard.svg' />
                        <img alt='fav' class='fav-action cursor' src='images/fav.svg' />
                        <p class='subtitle font-family color-primary font-small cursor'>";
                        echo $nome.", ".$idade;
                        echo "
                        </p>

                        <img onmouseenter='onEnterFunction()' alt='background' class='tab-image__background cursor' src='http://www.magnetoelenco.com.br/fotos/";
                        echo $arquivo;
                        echo "' />

                        <button type='button' class='dislike'>
                          <img alt='overlay discard' src='images/discard-single.svg' />
                        </button>
                        
                        <button type='button' class='like'>
                          <img alt='overlay fav' src='images/fav-single.svg' />
                        </button>
                      </div>
                    </div>";
                    }

                    ?>
