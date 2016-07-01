<?php
// include("conecta.php");

  $dir = 'fotos/'; //Diretório para uploads
  date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
  $hoje = date('Y-m-d');

  $nome_responsavel = $_POST['nome_responsavel'];
  $ator = $_POST['ator'];

  if ($nome_responsavel != '' || $nome_responsavel != NULL) {
    $cpf = $_POST['cpf_responsavel'];
    $cpf = preg_replace('/\D+/', '', $cpf);
    $data_menor = $_POST['data_menor'];
    if (strpos($data_menor, '-') !== false) {
      $data = explode("-", $data_menor);
      $ano = $data[0];
      $mes = $data[1];
      $dia = $data[2];
      $data_menor = $ano."-".$mes."-".$dia;
    } elseif (strpos($data_menor, '/') !== false) {
      $data = explode("/", $data_menor);
      $ano = $data[2];
      $mes = $data[1];
      $dia = $data[0];
      $data_menor = $ano."-".$mes."-".$dia;
    }
    $nome_responsavel = $_POST['nome_responsavel'];
    $nome_responsavel = ucwords($nome_responsavel);
    $sexo = $_POST['sexo_menor'];
      if ($sexo == 'masculino') {
        $sexo = 'M';
      } if ($sexo == 'feminino') {
        $sexo = 'F';
      }
    $nome = $_POST['nome_menor'];
    $nome = ucwords($nome);
    $sobrenome = $_POST['sobrenome_menor'];
    $sobrenome = ucwords($sobrenome);
    $celular = $_POST['celular_responsavel'];
    $celular = preg_replace('/\D+/', '', $celular);
    $email = $_POST['email_responsavel'];
    $cor_pele = $_POST['raca'];
    $bairro = $_POST['bairro'];
    $modalidade = $_POST['modalidade_menor'];
    $ig = $_POST['ig_menor'];
    $face = $_POST['face_menor'];
    $tt = $_POST['tt_menor'];

echo "Menor:"."<BR/>";
echo "CPF:".$cpf."<BR/>";
echo "Nome Responsável:".$nome_responsavel."<BR/>";
echo "Sexo:".$sexo."<BR/>";
echo "Nome:".$nome."<BR/>";
echo "Sobrenome:".$sobrenome."<BR/>";
echo "Data Nascimento:".$data_menor."<BR/>";
echo "Celular:".$celular."<BR/>";
echo "E-mail:".$email."<BR/>";
echo "Cor Pele:".$cor_pele."<BR/>";
echo "Bairro:".$bairro."<BR/>";
echo "Modalidade:".$modalidade."<BR/>";
echo "IG:".$ig."<BR/>";
echo "FB:".$face."<BR/>";
echo "TT:".$tt."<BR/>";
  }
  elseif ($ator != '' || $ator != NULL) {
    $data_maior = $_POST['data_maior'];
    if (strpos($data_maior, '-') !== false) {
      $data = explode("-", $data_maior);
      $ano = $data[0];
      $mes = $data[1];
      $dia = $data[2];
      $data_maior = $ano."-".$mes."-".$dia;
    } elseif (strpos($data_maior, '/') !== false) {
      $data = explode("/", $data_maior);
      $ano = $data[2];
      $mes = $data[1];
      $dia = $data[0];
      $data_maior = $ano."-".$mes."-".$dia;
    }
    $nome = $_POST['nome_maior'];
    $nome = ucwords($nome);
    $sobrenome = $_POST['sobrenome_maior'];
    $sobrenome = ucwords($sobrenome);
    $sexo = $_POST['sexo_maior'];
      if ($sexo == 'masculino') {
        $sexo = 'M';
      } if ($sexo == 'feminino') {
        $sexo = 'F';
      }
    $celular = $_POST['celular_maior'];
    $celular = preg_replace('/\D+/', '', $celular);
    $email = $_POST['email_maior'];
    $cor_pele = $_POST['raca_maior'];
    $bairro = $_POST['bairro_maior'];
    $cpf = $_POST['cpf_maior'];
    $cpf = preg_replace('/\D+/', '', $cpf);
    $modalidade = $_POST['modalidade_maior'];
    $ig = $_POST['ig_maior'];
    $face = $_POST['face_maior'];
    $tt = $_POST['tt_maior'];

echo "Maior"."<BR/>";
echo "Nome: ".$nome."<BR/>";
echo "Sobrenome: ".$sobrenome."<BR/>";
echo "Sexo: ".$sexo."<BR/>";
echo "Data Nascimento: ".$data_maior."<BR/>";
echo "Celular: ".$celular."<BR/>";
echo "E-mail: ".$email."<BR/>";
echo "Cor da Pele: ".$cor_pele."<BR/>";
echo "Bairro: ".$bairro."<BR/>";
echo "CPF: ".$cpf."<BR/>";
echo "Ator?: ".$ator."<BR/>";
echo "Modalidade: ".$modalidade."<BR/>";
echo "IG: ".$ig."<BR/>";
echo "FB: ".$face."<BR/>";
echo "TT: ".$tt."<BR/>";
  }




//      if ($ator == 'sim') {
//       $cadastro = 'Ator';
//      } if ($ator == 'nao') {
//         $cadastro = $_POST['opcao'];
//      }

//     $sql = "INSERT INTO novo_cadastro (nome, sobrenome, sexo, dt_nascimento, d_nascimento, m_nascimento, celular, email, tipo_cadastro, cor_pele, bairro, instagram, facebook, twitter) VALUES ('$nome', '$sobrenome', '$sexo', '$data_comp', '$dia', '$mes', '$celular', '$email', '$cadastro', '$cor_pele', '$bairro', '$ig', '$face', '$tt')";
//     mysqli_query($link, $sql);

//     $sql_in = "SELECT id_elenco FROM novo_cadastro WHERE nome = '$nome' AND sobrenome = '$sobrenome' AND email = '$email'";
//     $result = mysqli_query($link, $sql_in);
//       if (!$result) {
//         die('Erro: ' . mysqli_error($link));
//       }
//     $row = mysqli_fetch_array($result);
//     $id = $row['id_elenco'];

//     if(isset($_FILES['foto_1'])) { //verifica se recebeu um arquivo
//     $ext = strtolower(substr($_FILES['foto_1']['name'],-4)); //Pegando extensão do arquivo
//     $new_name = $id."-".$hoje."-"."01".$ext; //Definindo um novo nome para o arquivo
//      move_uploaded_file($_FILES['foto_1']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
//     $sql2 = "INSERT INTO fotos_mobile (arquivo, data_foto, id_elenco_foto) VALUES ('$new_name', '$hoje', '$id')";
//      mysqli_query($link, $sql2);
//     }

//     if(isset($_FILES['foto_2'])) { //verifica se recebeu um arquivo
//     $ext = strtolower(substr($_FILES['foto_2']['name'],-4)); //Pegando extensão do arquivo
//     $new_name = $id."-".$hoje."-"."02".$ext; //Definindo um novo nome para o arquivo
//      move_uploaded_file($_FILES['foto_2']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
//     $sql2 = "INSERT INTO fotos_mobile (arquivo, data_foto, id_elenco_foto) VALUES ('$new_name', '$hoje', '$id')";
//      mysqli_query($link, $sql2);
//     }

// header ("Location: sucesso.php?sexo=$sexo");
// mysqli_close($link);
?>
