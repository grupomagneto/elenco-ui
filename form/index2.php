<html>
<head>
	<title>Cadastro</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/vertical-slider.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


	<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

</head>
<body>

	<div class="hue2">

		<h1>Quem você está cadastrando?</h1>

<?php
header('Content-Type: text/html; charset=utf-8');
	//lista os links 
$urls = array("form1.php" ,"form2.php"); 
$urls2 = array("form3.php#1" ,"form4.php#1"); 

//Lista o nome dos links
$text = array("Eu mesm@, sou maior de idade","Eu mesm@, sou maior de idade"); 
$text2 = array("Uma criança ou menor de idade.","Uma criança ou menor de idade."); 
		srand(time());

//Define a quantidade de arrays existentes
		$random = (rand()%2); 
		$random2 = (rand()%2); 

//Define o link
echo ("<div class='botao'><a class='link111' href = \"$urls[$random]\"><p class='text-center link11'>$text[$random]<span><img src='images/arrow-right.svg'></span></p></a></div>"); 
echo ("<div class='botao'><a class='link122' href = \"$urls2[$random2]\"><p class='text-center link22'>$text2[$random2]<span><img src='images/arrow-right.svg'></span></p></a></div>"); 

?>

</div>
		<script src="js/res/jquery-2.1.4.js"></script>
		<script src="js/res/hammer.min.js"></script>
		<script src="js/res/mousewheel.min.js"></script>
		<script src="//cdn.jsdelivr.net/velocity/1.2.2/velocity.min.js"></script>
		<script src="//cdn.jsdelivr.net/velocity/1.2.2/velocity.ui.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/hallo.js/1.0.2/hallo.js"></script>
    <script src="js/horizontal-slider.js"></script>
    <script src="http://arti.us/clients/concept/questionnaire/dist/js/bootstrap.min.js"></script>

		<script src="js/vertical-slider.js"></script>
		<script src="js/main.js"></script>

	
</body>
</html>