

		<?php
      		$con = mysqli_connect("mysql08.vinigoulart.com.br","vinigoulart18","HjkL2k7gD8", "vinigoulart18");
      		if (mysqli_connect_errno())
        	{
          		echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
        	}
        	/*
			//CRIA BANCO DE DADOS
      		$sql="CREATE DATABASE banco";
      		if (mysqli_query($con,$sql))
        	{
          		echo "Banco de dados 'banco' criado com sucesso";
        	}
      		else
        	{
          		echo "Erro criando banco de dados: " . mysqli_error($con);
        	}
      		//CRIA TABELA
        	$sql="CREATE TABLE usuarios(nome CHAR(30),email CHAR(30),senha CHAR(30))";
      		if (mysqli_query($con,$sql))
        	{
          		echo "Tabela 'usuarios' criada com sucesso";
        	}
      		else
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

	      	$sql = "INSERT INTO usuario (nome, sobrenome, celular, email, sexo, raca, bairro, ator, instagram, facebook, twitter) VALUES ('$nome', '$sobrenome', $celular, '$email','$sexo','$raca','$bairro','$ator', '$instagram', '$facebook', '$twitter')";

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



      		mysqli_close($con);
    	?>