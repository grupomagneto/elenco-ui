<?php

      		$con = mysqli_connect('mysql08.vinigoulart.com.br','vinigoulart18','HjkL2k7gD8', 'vinigoulart18');
      		if (mysqli_connect_errno())
        	{
          		echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
        	}


       $cpf = $_POST['cpf'];
       $nome_responsavel = $_POST['nome_responsavel'];
       $sexo = $_POST['sexo'];
       $nome_menor = $_POST['nome_menor'];
       $sobrenome_menor = $_POST['sobrenome_menor'];
       $dia = $_POST['dia'];
       $ano = $_POST['ano'];
       $mes = $_POST['mes'];
       $celular = $_POST['celular'];
       $email = $_POST['email'];
       $raca = $_POST['raca'];
       $bairro = $_POST['bairro'];
       $ig = $_POST['ig'];
       $face = $_POST['face'];
       $tt = $_POST['tt'];

  if(isset($_FILES['foto']))//verifica se recebeu um arquivo 
     {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
 
      $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'clientesorrindo/'; //Diretório para uploads
 
      move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    }

             if(isset($_FILES['fotos']))//verifica se recebeu um arquivo 
    {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
 
      $ext = strtolower(substr($_FILES['fotos']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'clienteserio/'; //Diretório para uploads


      move_uploaded_file($_FILES['fotos']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    }


	      	$sql = "INSERT INTO usuario (cpf_responsavel, nome_responsavel,  sexo, nome,  sobrenome, d_nascimento, m_nascimento, a_nascimento, celular, email, raca, bairro, instagram, facebook, twitter)
           VALUES ( '$cpf', '$nome_responsavel', '$sexo', '$nome_menor', '$sobrenome_menor', '$dia', '$mes', '$ano',  '$celular',  '$email',  '$raca',  '$bairro',  '$ig',  '$face',  '$tt')";

               $sql2 = "INSERT INTO fotos_mobile (arquivo, data_foto) VALUES ('$new_name', '$new_name')";

      		$a = 0;

      		if (mysqli_query($con,$sql) && mysqli_query($con,$sql2))
        	{
          		die('Erro: ' . mysqli_error($con));
          		echo "<p>Erro ao se cadastrar. Por favor, tente novamente.</p>"; 
          		$a = 1;
          		echo "<a href='form_2.php'>Clique aqui para voltar</a>";
        	}
        	if ($a == 0) {
        		echo "<p>Cadastro efetuado com sucesso</p>";
        	}

header ("Location: sucesso.php?sexo=$sexo");


mysqli_close($con);



?>