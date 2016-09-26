<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta charset="utf-8">
	<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
	<title>Design questions</title>
	<link href="stylesheets/questions.css" rel="stylesheet">
</head>
<body>


<?php 

$pergunta 	= "Qual o CEP da sua residência?";
$id 		= "cep";
$name 		= "cep";
$extra 		= '<script language="javascript"> onblur="pesquisacep(this.value);" onkeyup="mascara(this, mcep);"  maxlength="9"  size="10" </script>';

include "textfield.php"; 

?>


	<script src="javascripts/jquery-1.12.1.min.js"></script>
	<script src="javascripts/questions.js"></script>

</body>
</html>
