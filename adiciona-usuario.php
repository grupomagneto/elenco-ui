<?php
// include("conecta.php");

  $dir = 'fotos/'; //Diretório para uploads
  date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
  $hoje = date('Y-m-d');

  $nome_responsavel = $_POST['nome_responsavel'];
  $ator = $_POST['ator'];

  if ($nome_responsavel != '' || $nome_responsavel != NULL) {
    $cpf = $_POST['cpf_responsavel'];
    $sdata = $_POST['data_menor'];
    $data_menor = $_POST['data_menor'];
    $data = explode("/", $sdata);
    $ano = $data[0];
    $mes = $data[1];
    $dia = $data[2];
    $nome_responsavel = $_POST['nome_responsavel'];
    $sexo = $_POST['sexo_menor'];
      if ($sexo == 'masculino') {
        $sexo = 'M';
      } if ($sexo == 'feminino') {
        $sexo = 'F';
      }
    $nome = $_POST['nome_menor'];
    $sobrenome = $_POST['sobrenome_menor'];
    $celular = $_POST['celular_responsavel'];
    $celular = preg_replace('/\D+/', '', $celular);
    $email = $_POST['email_responsavel'];
    $cor_pele = $_POST['raca'];
    $bairro = $_POST['bairro'];
    $modalidade = $_POST['modalidade_menor'];
    $ig = $_POST['ig_menor'];
    $face = $_POST['face_menor'];
    $tt = $_POST['tt_menor'];

echo "Menor:";
echo $cpf;
echo $nome_responsavel;
echo $sexo;
echo $nome;
echo $sobrenome;
echo $data_menor;
echo $celular;
echo $email;
echo $cor_pele;
echo $bairro;
echo $modalidade;
echo $ig;
echo $face;
echo $tt;
  }
  elseif ($ator != '' || $ator != NULL) {
    $sdata = $_POST['data_maior'];
    $data_maior = $_POST['data_maior'];
    $data = explode("/", $sdata);
    $ano = $data[0];
    $mes = $data[1];
    $dia = $data[2];
    $nome = $_POST['nome_maior'];
    $sobrenome = $_POST['sobrenome_maior'];
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
    $modalidade = $_POST['modalidade_maior'];
    $ig = $_POST['ig_maior'];
    $face = $_POST['face_maior'];
    $tt = $_POST['tt_maior'];

echo "Maior";
echo $nome;
echo $sobrenome;
echo $sexo;
echo $data_maior;
echo $celular;
echo $email;
echo $cor_pele;
echo $bairro;
echo $cpf;
echo $ator;
echo $modalidade;
echo $ig;
echo $face;
echo $tt;
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