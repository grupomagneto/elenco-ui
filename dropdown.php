<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="login/stylesheets/questions.css">
</head>
<body>

<?php 

$pergunta 	= "Qual o seu estilo musical favorito?";
$id 		= "dropdown";
$name 		= "music";
$opcao1 	= "Axé";
$opcao2 	= "Axé";
$opcao3 	= "Axé";
$opcao4 	= "Axé";
$opcao5 	= "Axé";
$numero 	= 5;
$extra 		= ' ';
 ?>

	<form action="https://www.google.com.br" method="post" id="form">
	<div class="gradient container" >
		<div class="box">
			<h1 class="pergunta font-family color-font"><?php echo $pergunta; ?></h1>
		</div>
		<div class="box">
			<div class="box-outline_dropdown">
				<div class="column-full font-family color-font">
					<select id='<?php echo $id; ?>' name='<?php echo $name; ?>' >
						<option disabled="" value="1"> Selecione...</option>
						<?php while ($numero > 0) {
							echo "<option value='".${'opcao'.$numero}."'>".${'opcao'.$numero}."</option>";
							$numero--;
						} ?>
					</select>	
				</div>
			</div>
		</div>
	</div>
</form>

	<script src='login/javascripts/jquery-1.12.1.min.js'></script>
	<script src='login/javascripts/questions.js'></script>

</body>
</html>
