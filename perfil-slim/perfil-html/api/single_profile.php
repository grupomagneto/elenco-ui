<?php
require_once ("api/conecta.php");
echo $_SESSION['search_array'];
$key = $_POST['array_key'];
$array = $_SESSION['search_array'];
$nome = $array[$key]["nome_artistico"];
$nome = explode(" ", $nome);
$nome = $nome[0];
$idade = $array[$key]['idade'];
$arquivo = $array[$key]["arquivo"];
$sexo = $array[$key]["sexo"];
$bairro = $array[$key]["bairro"];
$tipo_cadastro_vigente = $array[$key]["tipo_cadastro_vigente"];
$id = $array[$key]["id"];
$dt_foto = $array[$key]["dt_foto"];
$nomefoto = "idfavoritada_";
$nomeFotoCompleta = $nomefoto.$id;


echo"

        <div class='container-outline__single'>

              <section class='intro' id='intro'>
                <div class='content'>
                  <div class='parent'>
                    <div class='container-outline__center'>
                      <div class='carousel'>
                        <div class='item'>
                          <div class='container-outline__center'>
                            <div class='imageContainer'>
                              <img alt='background' src='http://www.magnetoelenco.com.br/fotos/";
                echo $arquivo;
                echo "' />
                            </div>
                          </div>
                        </div>
                        <div class='item'>
                          <div class='container-outline__center'>
                            <div class='imageContainer'>
 
                              <img alt='background' src='http://www.magnetoelenco.com.br/fotos/";
                echo $arquivo;
                echo "' />
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-single' />
                    <button type='submit' class='checkbox-single-action__fav botaofavorita fav' onclick='AddTableRow()'>
                      <img src='images/fav-single.svg' alt=''>
                    </button>
                    <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-single' />
                    <button type='submit' class='checkbox-single-action__discard botaofavorita fav' onclick='AddTableRow()'>
                      <img src='images/discard-single.svg' alt=''>
                    </button>
                      
                      <div class='legend-after__carousel'>
                        <p class='font-family color-primary'>
                          Brasília-DF
                        </p>
                        <p class='font-family color-primary'>
                          Foto: 07/09/16
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
          </div>
";
?>
