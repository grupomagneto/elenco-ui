<?php 
require_once("functions.php");

if(isset($_POST)){

  $imagefavorita = $_POST['imagefavorita'];
  echo $imagefavorita;
  $gender = $_POST['gender'];
  echo $gender;
  $ranger_age = $_POST['ranger_age'];
  echo $ranger_age;
  $raca_index = $_POST['raca_index'];
  echo $raca_index;
  $bairro = $_POST['bairro'];
  echo $bairro;

 };
?>

<?php
	if(insereImagemFavorita($conexao, $imagefavorita)) {
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

<?php
	if(efetuaPesquisa($conexao_index, $ranger_age, $gender, $raca_index, $bairro)) {
?>
	<!-- $gender, $ranger_age, $raca, $bairro -->
	<p class="text-success">
		imagem <?php $ranger_age; ?> pesquisou com sucesso!
	</p> 
<?php
	} else {
		$msg = mysqli_error($conexao_index);
?>
	<p class="text-danger">
		não pesquisou <?php $ranger_age; ?> não foi adicionado: <?php $msg ?>
	</p>
<?php
	}
?>
