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

$res = mysqli_query($conexao_index, $sql) or die (alerta("Falha na Conexão  ".mysqli_error()));

// echo "<pre>";

$array_profissional = array();
$array_premium = array();
$array_gratuito = array();
// $count = mysqli_num_rows($res);
while($row = mysqli_fetch_array($res)) {
  if ($row['tipo_cadastro_vigente'] == 'Profissional') {
    $addarray1 = array(
    'id' => $row['id'],
    'nome_artistico' => $row['nome_artistico'],
    'sexo' => $row['sexo'],
    'bairro' => $row['bairro'],
    'arquivo' => $row['arquivo'],
    'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente'],
    'idade' => $row['idade'],
    'dt_foto' => $row['dt_foto']
    );
    array_push($array_profissional, $addarray1);
    $cadastro1 = array();
    foreach ($array_profissional as $key => $value){
      $cadastro1[$key] = $value['dt_foto'];
    }
    array_multisort($cadastro1, SORT_DESC, $array_profissional);
  }
  elseif ($row['tipo_cadastro_vigente'] == 'Premium' || $row['tipo_cadastro_vigente'] == 'Ator') {
    $addarray2 = array(
    'id' => $row['id'],
    'nome_artistico' => $row['nome_artistico'],
    'sexo' => $row['sexo'],
    'bairro' => $row['bairro'],
    'arquivo' => $row['arquivo'],
    'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente'],
    'idade' => $row['idade'],
    'dt_foto' => $row['dt_foto']
    );
    array_push($array_premium, $addarray2);
    $cadastro2 = array();
    foreach ($array_premium as $key => $value){
      $cadastro2[$key] = $value['dt_foto'];
    }
    array_multisort($cadastro2, SORT_DESC, $array_premium);
  }
  elseif ($row['tipo_cadastro_vigente'] == 'Gratuito') {
    $addarray3 = array(
    'id' => $row['id'],
    'nome_artistico' => $row['nome_artistico'],
    'sexo' => $row['sexo'],
    'bairro' => $row['bairro'],
    'arquivo' => $row['arquivo'],
    'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente'],
    'idade' => $row['idade'],
    'dt_foto' => $row['dt_foto']
    );
    array_push($array_gratuito, $addarray3);
    $cadastro3 = array();
    foreach ($array_gratuito as $key => $value){
      $cadastro3[$key] = $value['dt_foto'];
    }
    array_multisort($cadastro3, SORT_DESC, $array_gratuito);
  }
}
$array = array();
foreach ($array_profissional as $key => $value) {
  array_push($array, $value);
}
foreach ($array_premium as $key => $value) {
  array_push($array, $value);
}
foreach ($array_gratuito as $key => $value) {
  array_push($array, $value);
}
// print_r($array);
foreach ($array as $key => $value) {
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
  ${'position'.$id} = $key;
  // echo ${'position'.$id}.'<br />';
  echo $nome.'<br />';
  echo $tipo_cadastro_vigente.'<br />';
  echo $dt_foto.'<br />';
  echo $idade.'<br />';
  echo $bairro.'<br />';
  echo $sexo.'<br />';
  echo '<hr>';
}

?>
