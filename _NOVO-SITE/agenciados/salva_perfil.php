<?php 

if(isset($_POST['msg'])) {
    //salva no banco de dados
    echo "<script type='javascript'>
    			alert('Sucesso!');
		  </script>
    "; // sucesso
} else {
    echo "<script type='javascript'>
    			alert('Falhou!');
		  </script>"; // falhou
}

 ?>
