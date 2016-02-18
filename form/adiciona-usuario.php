<?php

      		$con = mysqli_connect('mysql08.vinigoulart.com.br','vinigoulart18','HjkL2k7gD8', 'vinigoulart18');
      		if (mysqli_connect_errno())
        	{
          		echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
        	}
        	/*
		
        	{ '$sobrenome', $celular, '$email','$sexo','$raca','$bairro','$ator', '$instagram', '$facebook', '$twitter'
        	, sobrenome, celular, email, sexo, raca, bairro, ator, instagram, facebook, twitter
          		echo "Erro criando tabela: " . mysqli_error($con);
        	}*/
    			$nome = $_POST['nome'];
				$sobrenome = $_POST['sobrenome'];
				$celular = $_POST['celular'];
				$email = $_POST['email'];
				$sexo = $_POST['sexo'];
				$raca = $_POST['raca'];
				$bairro = $_POST['bairro'];
				$ator = $_POST['ator'];
				$instagram = $_POST['instagram'];
				$facebook = $_POST['facebook'];
				$twitter = $_POST['twitter'];


           if(isset($_FILES['foto']))//verifica se recebeu um arquivo 
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
 
      $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'clientesorrindo/'; //Diretório para uploads
 
      move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   }

             if(isset($_FILES['fotos']))//verifica se recebeu um arquivo 
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
 
      $ext = strtolower(substr($_FILES['fotos']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'clienteserio/'; //Diretório para uploads
 
      move_uploaded_file($_FILES['fotos']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   }


	      	$sql = "INSERT INTO usuario (nome, sobrenome, celular, email, sexo, raca, bairro, fotos, ator, instagram, facebook, twitter) VALUES ('$nome', '$sobrenome', '$celular', '$email','$sexo','$raca','$bairro', '$new_name','$ator', '$instagram', '$facebook', '$twitter')";

      		$a = 0;

      		if (!mysqli_query($con,$sql))
        	{
          		//die('Erro: ' . mysqli_error($con));
          		echo "<p>Erro ao se cadastrar. Por favor, tente novamente.</p>"; 
          		$a = 1;
          		echo "<a href='form2.php'>Clique aqui para voltar</a>";
        	}
        	if ($a == 0) {
        		echo "<p>Cadastro efetuado com sucesso</p>";
          		echo "<a href='form2.php'>Clique aqui para voltar</a>";
        	}

header("location: sucesso.php");


mysqli_close($con);



?>