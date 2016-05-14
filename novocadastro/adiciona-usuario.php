<?php
include("conecta.php");

      $sdata = $_POST['data'];
      $data_comp = $_POST['data'];

      $data = explode("-", $sdata);
      $ano = $data[0];
      $mes = $data[1];
      $dia = $data[2];

      $nome = $_POST['nome'];
      $sobrenome = $_POST['sobrenome'];
      $sexo = $_POST['sexo'];
      $celular = $_POST['celular'];
      $celular = preg_replace('/\D+/', '', $celular);
      $email = $_POST['email'];
      $cor_pele = $_POST['cor_pele'];
      $bairro = $_POST['bairro'];
      $ator = $_POST['ator'];
      $ig = $_POST['ig'];
      $face = $_POST['face'];
      $tt = $_POST['tt'];
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
      $data = date("Ymd");
      $dir = 'fotos/'; //Diretório para uploads
      $opcao = $_POST['opcao'];
      $opcao_m = $_POST['opcao_m'];

      echo $nome;
      echo $opcao;
      echo $opcao_m;
      echo $data_comp;


      $sql = "INSERT INTO novo_cadastro (nome, sobrenome, sexo, dt_nascimento, d_nascimento, m_nascimento, celular, email, cor_pele, bairro, ator, instagram, facebook, twitter)
      VALUES ('$nome', '$sobrenome', '$sexo', '$data_comp', '$dia', '$mes', '$celular',  '$email',  '$cor_pele',  '$bairro',  '$ator',  '$ig',  '$face',  '$tt')";
        // mysqli_query($link,$sql);

      $sql_in = "SELECT id_elenco FROM novo_cadastro WHERE nome = '$nome' AND sobrenome = '$sobrenome' AND email = '$email'";
        $result = mysqli_query($link,$sql_in);
          while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_elenco'];
          }

      if(isset($_FILES['foto_1'])) { //verifica se recebeu um arquivo 
        $ext = strtolower(substr($_FILES['foto_1']['name'],-4)); //Pegando extensão do arquivo
        $new_name = $id."-".$data."-"."01".$ext; //Definindo um novo nome para o arquivo
          // move_uploaded_file($_FILES['foto_1']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $sql2 = "INSERT INTO fotos_mobile (arquivo, data_foto, id_elenco_foto) VALUES ('$new_name', '$data', '$id')";
          // mysqli_query($link,$sql2);
      }

      if(isset($_FILES['foto_2'])) { //verifica se recebeu um arquivo 
        $ext = strtolower(substr($_FILES['foto_2']['name'],-4)); //Pegando extensão do arquivo
        $new_name = $id."-".$data."-"."02".$ext; //Definindo um novo nome para o arquivo
          // move_uploaded_file($_FILES['foto_2']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $sql2 = "INSERT INTO fotos_mobile (arquivo, data_foto, id_elenco_foto) VALUES ('$new_name', '$data', '$id')";
          // mysqli_query($link,$sql2);
      }

// header ("Location: sucesso.php?sexo=$sexo");
mysqli_close($link);
?>