<?php 
require_once("functions.php");

if(isset($_POST)){
    
    $imagefavorita = $_POST['imagefavorita'];
    echo $imagefavorita;
    
    $imagediscard = $_POST['imagediscard'];
    echo $imagediscard;
    
//    $imagefavorita = $_POST['imagefavorita'];
//    print_r($_POST);
//  echo $imagefavorita;
//  $gender = $_POST['gender'];
//  echo $gender;
//  $ranger_age = $_POST['ranger_age'];
//  echo $ranger_age;
//  $raca_index = $_POST['raca_index'];
//  echo $raca_index;
//  $bairro = $_POST['bairro'];
//  echo $bairro;

 };
?>

<?php
	if(insereImagemFavorita($conexao, $imagefavorita)) {
?>
	 <p class="text-success">
		Imagem <?php echo $imagefavorita;  ?> adicionado com sucesso!
	</p> 
<?php
	} else {
		$msg = mysqli_error($conexao);
?>
	 <p class="text-danger">
		Imagem favorita <?php $imagefavorita; ?> não foi adicionado: <?php $msg ?>
	</p> 
<?php
	}
?>

<?php
	if(insereImagemDescartada($conexao, $imagediscard)) {
?>
	 <p class="text-success">
		Imagem <?php echo $imagediscard;  ?> adicionado com sucesso!
	</p> 
<?php
	} else {
		$msg = mysqli_error($conexao);
?>
	 <p class="text-danger">
		Imagem favorita <?php $imagediscard; ?> não foi adicionado: <?php $msg ?>
	</p> 
<?php
	}
?>

<?php
	if(efetuaPesquisa($conexao_index, $ranger_age, $gender, $raca_index, $bairro)) {
?>
	<p class="text-success">
		Imagem <?php $ranger_age; ?> pesquisou com sucesso!
	</p> 
<?php
	} else {
		$msg = mysqli_error($conexao_index);
?>
	<p class="text-danger">
		Não pesquisou <?php $ranger_age; ?> não foi adicionado: <?php $msg ?>
	</p>
<?php
	}
?>
