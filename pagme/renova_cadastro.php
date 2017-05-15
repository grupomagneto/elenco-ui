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
<?php
if ($cadastro == 'Gratuito') {
	$valor = '0';
}
elseif ($cadastro == 'Premium') {
	$valor = '199';
}
elseif ($cadastro == 'Profissional') {
	$valor = '799';
}
if ($cadastro == 'Premium' || $cadastro == 'Profissional') { ?>
    <div class='renova_04-1'>
		<div class='conteiner conteiner-renova'>
		  <div class='navegacao navegacao-renova'>
		    <img src='images/voltar.svg' class='voltar-4 botoes_navegacao' />
		    <span class='progresso'>3 de 4</span>
            <img src='images/fechar.svg' class='fechar botoes_navegacao' />
		  </div>
		  <div class='titulo'>
		    Como gostaria de pagar?
		  </div>
		  <div class='descricao'>
		    Parcele em até 10x no cartão ou aproveite as vantagens de utilizar seu Saldo de Cachês a receber.
		  </div>
		  <div class='botoes'>
		    <button class='botao botao_saldo'>Saldo de Cachês</button>
		    <button class='botao botao_gateway'>Cartão ou Boleto</button>
		  </div>
		</div>
	</div>
	<?php
	}
	if ($cadastro == 'Premium') {
		echo "
			<script>
			$('.voltar-4').click(function(){
				$('.modal-content').fadeIn(0);
				$('.renova_04').fadeOut(0);
				$('.renova_03-premium').fadeIn(200);
			});
			</script>";
	}
	elseif ($cadastro == 'Profissional') {
		echo "
			<script>
			$('.voltar-4').click(function(){
				$('.modal-content').fadeIn(0);
				$('.renova_04').fadeOut(0);
				$('.renova_03-profissional').fadeIn(200);
			});
			</script>";
	}
	elseif ($cadastro == 'Gratuito') { ?>
		<div class='renova_05-1'>
		<div class='conteiner conteiner-sucesso'>
		  <div class='navegacao navegacao-sucesso'>
            <img src='images/fechar.svg' class='fechar botoes_navegacao' />
		  </div>
		  <div class='titulo'>
		    Contrato renovado!
		  </div>
		  <div class='descricao'>
		    Nosso contrato foi renovado e enviado, junto com todas as informações, para o seu e-mail cadastrado.
		  </div>
		</div>
	</div>
	<? } ?>
<!-- 
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
							<span class='large'><? echo $recebivel; ?></span>
							<span class='small'>,00</span>
						</div>
					</div>
					<div class='valor'>
						<div class='small'>Cadastro <? echo $cadastro; ?></div>
						<div class='texto_valor_02'>
							<span class='small'>R$ </span>
							<span class='large'><? echo $valor; ?></span>
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
<div class='botao btn-primary btn_confirma'><button>Confirmar</button></div>
</div>
</div>
</div>
</div>  -->