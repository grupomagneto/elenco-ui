<?php 
require_once("functions.php");

if(isset($_POST)){

  $imagediscard = $_POST['imagediscard'];
  echo $imagediscard;
    
 };
 ?>
<?php
	if(insereImagemDescartada($conexao, $imagediscard)) {
?>
	<!-- <p class="text-success">
		imagem <?php $imagefavorita; ?> adicionado com sucesso!
	</p> -->
<?php
	} else {
		$msg = mysqli_error($conexao);
?>
	<!-- <p class="text-danger">
		imagem favorita <?php $imagefavorita; ?> não foi adicionado: <?php $msg ?>
	</p> -->
<?php
	}
?>
