<?php
require_once 'dbconnect.php';
require_once 'functions.php';
setlocale(LC_MONETARY, 'pt_BR');
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
if (isset($_POST['id_usuario'])) {
	$id_usuario = $_POST['id_usuario'];
	$cadastro = $_POST['cadastro'];
	$cadastro = ucfirst($cadastro);
}
// select loggedin users detail
$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=$id_usuario");
$userRow=mysqli_fetch_array($res);
$nome = $userRow['nome_artistico'];
$cpf = $userRow['cpf'];
$email = $userRow['email'];
if ($userRow['sexo'] == 'F') {
  $sexo = 'a';
}
elseif ($userRow['sexo'] == 'M') {
  $sexo = 'o';
}
$recebivel = mysqli_query($link, "SELECT SUM(cache_liquido) as receber FROM financeiro WHERE id_elenco_financeiro='$id_usuario' AND tipo_entrada='cache' AND status_pagamento='0'");
$row_recebivel = mysqli_fetch_array($recebivel);
$recebivel = $row_recebivel['receber'];
$recebivel = number_format($recebivel,2,",",".");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css'  />
<link rel='stylesheet' href='style.css' type='text/css' />
</head>
<body>
<div class='row'>
<div class='col-lg-12'>
<div class='quadrot'>
<div class='quadro'>
<div class='quadro_concordo'>
<div class='confirma'>
<div class='icon'><img src='images/profissional_icon.svg' style='width:100%' /></div>
<div class='quadro_cadastro quadro_cadastro_01'>
<div class='descricao'>
<div class='title'><img src='images/profissional_title.svg' style='width:100%' /></div>
<ul class='lista_cadastro'>
<li class='itens'>Inclui ensaio fotográfico completo com mínimo de 30 fotos tratadas entregues em DVD ou link;</li>
<li class='itens'>Você recebe 90% do cachê líquido em todos os trabalhos;</li>
<li class='itens'>Seu perfil aparece primeiro nas buscas por atores/modelos;</li>
<li class='itens'>Transferência automática de cachês disponíveis para sua conta bancária;</li>
<li class='itens'>Assinatura válida por 02 anos;</li>
</ul>
</div>
<div><img src='images/899.svg' /></div>
</div>
<div class='quadro_cadastro quadro_cadastro_02'>
	<div class='renovar'><img src='images/renovar_contrato.svg' style='width:100%' /></div>
		<div class='conteudo'>
			<div class='subtracao'>
				<div class='operacoes'>
					<div class='menos'><img src='images/menos.svg' /></div>
					<div class='igual'><img src='images/igual.svg' /></div>
				</div>
				<div class='valores'>
					<div class='valor'>
						<div class='small'>total disponível</div>
						<div class='texto_valor_02'>
							<span class='small'>R$ </span>
							<span class='large'>2.500</span>
							<span class='small'>,00</span>
						</div>
					</div>
					<div class='valor'>
						<div class='small'>Cadastro <? echo $cadastro; ?></div>
						<div class='texto_valor_02'>
							<span class='small'>R$ </span>
							<span class='large'>899</span>
							<span class='small'>,00</span>
						</div>
					</div>
					<div class='valor'>
						<div class='small'>saldo remanescente</div>
						<div class='texto_valor_02'>
							<span class='small'>R$ </span>
							<span class='large'>1.601</span>
							<span class='small'>,00</span>
						</div>
					</div>
				</div>
			</div>
<div class='declaro'>
	<div class='quadrot'>
		<div class='quadro'>
			<div class='quadro_concordo'>
					<input type='checkbox' id='terms'>
				<div class='aviso'>
					<label for='concordo'><declaro class='declaro'>Declaro estar ciente dos <a href='#'>Termos do Contrato</a> e concordo em utilizar meu Saldo em Cachês para assinatura do Cadastro <? echo $cadastro; ?>.</declaro></label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class='btn-primary btn_confirma'><button>Confirmar</button></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>