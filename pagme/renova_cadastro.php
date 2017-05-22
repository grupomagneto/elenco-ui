<?php
require_once 'dbconnect.php';
require_once 'functions.php';
setlocale(LC_MONETARY, 'pt_BR');
$hora = date('Y-m-d H:i:s', time());
$hoje = date('Y-m-d', time());
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
if (isset($_POST['id_usuario'])) {
	$id_usuario = $_POST['id_usuario'];
	$cadastro = $_POST['cadastro'];
	$cadastro = ucfirst($cadastro);
	$valor_cadastro = $_POST['valor_cadastro'];
	$valor_original_cadastro = $_POST['valor_cadastro'];
    $ddd = $_POST['DDD'];
    $cel = $_POST['cel'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
}
// select loggedin users detail
$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=$id_usuario");
$userRow=mysqli_fetch_array($res);
$nome = $userRow['nome_artistico'];
$nome_curto = explode(' ', $nome);
$primeiro_nome = $nome_curto[0];
$sobrenome = $nome_curto[1];
$cpf = $userRow['cpf'];
if ($userRow['sexo'] == 'F') {
  $sexo = 'a';
}
elseif ($userRow['sexo'] == 'M') {
  $sexo = 'o';
}
if ($cadastro == 'Gratuito') {
	// SE O CADASTRO SELECIONADO FOR GRATUITO
	$validade = "Indeterminada";
	$adicional = "";
	// RENOVA CADASTRO NO DB
	mysqli_query($link, "UPDATE tb_elenco SET data_contrato_vigente = '$hoje', tipo_cadastro_vigente = '$cadastro', ativo = 'Sim', concordo_timestamp = '$hora', ip = '$ip', ddd_01 = '$ddd', tl_celular = '$cel', email = '$email', cep = '$cep', endereco = '$endereco', complemento = '$complemento', numero = '$numero', bairro = '$bairro', cidade = '$cidade', uf = '$uf' WHERE id_elenco='$id_usuario'");
}
elseif ($cadastro == 'Premium' || $cadastro == 'Profissional') {
	// SE O CADASTRO SELECIONADO FOR PREMIUM OU PROFISSIONAL
	$validade = "2 anos";
	$adicional = "<li>Valor Pago:</li><li>Forma de Pagamento:</li>";
	$result = mysqli_query($link, "SELECT id, (cache_liquido - ifnull(abatimento_cache, 0) - ifnull(valor_pago, 0)) as cache, ifnull(abatimento_cache, 0) AS abatimento_cache, produto_abatimento, data_abatimento FROM financeiro WHERE id_elenco_financeiro='$id_usuario' AND tipo_entrada='cache' AND status_pagamento<>'1' ORDER BY cache DESC");
	while ($row = mysqli_fetch_array($result)) {
		$id_cache = $row['id'];
		$valor_cache = $row['cache'] - $row['abatimento_cache'];
		$abatimento_cache = $valor_cadastro + $row['abatimento_cache'];
		if (!empty($row['produto_abatimento'])) {
			$produto_abatimento = $row['produto_abatimento']." (".$row['data_abatimento']."), Cadastro ".$cadastro;
		}
		else {
			$produto_abatimento = "Cadastro ".$cadastro;
		}
		if ($valor_cache >= $valor_cadastro) {
			mysqli_query($link, "UPDATE financeiro SET abatimento_cache = '$abatimento_cache', data_abatimento = '$hoje', produto_abatimento = '$produto_abatimento' WHERE id = '$id_cache'");
			$valor_cadastro = 0;
		}
		elseif ($valor_cache < $valor_cadastro) {
			mysqli_query($link, "UPDATE financeiro SET abatimento_cache = '$valor_cache', data_abatimento = '$hoje', produto_abatimento = 'Cadastro $cadastro', status_pagamento = '1', data_pagamento = '$hoje' WHERE id = '$id_cache'");
			$valor_cadastro = $valor_cadastro - $valor_cache;
		}
	}
	// RENOVA O CONTRATO
	mysqli_query($link, "UPDATE tb_elenco SET data_contrato_vigente = '$hoje', tipo_cadastro_vigente = '$cadastro', ativo = 'Sim', concordo_timestamp = '$hora', ip = '$ip' WHERE id_elenco='$id_usuario'");
	// INSERE A VENDA
	mysqli_query($link, "INSERT INTO financeiro (tipo_entrada, nome, sobrenome, id_elenco_financeiro, produto, qtd, data_venda, valor_venda, forma_pagamento, n_parcelas) VALUES ('Venda', '$primeiro_nome', '$sobrenome', '$id_usuario', 'Cadastro $cadastro', '1', '$hoje', '$valor_original_cadastro', 'Abatimento de Cachê', '1')");
}
// ENVIA EMAIL
$hoje_format = date('d/m/Y', strtotime($hoje));
if (empty($_SESSION[$id])) {

    define('GUSER', 'inteligencia@magnetoelenco.com.br'); // <-- Insira aqui o seu GMail
    define('GPWD', 'rom54808285');    // <-- Insira aqui a senha do seu GMail
    $subject = "Nosso contrato foi renovado!";

    // Corpo do email
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Querid$sexo $primeiro_nome,</p>
    <p>Estamos muito felizes por ter você de volta ao nosso casting. Com o contrato renovado você continua se informando sobre nossas oportunidades e pode participar de trabalhos. Desejamos uma carreira longa e próspera pra você!</p>
    <p>Abaixo, para o seu controle, está o registro da nossa transação:</p>
    <strong><ul>
    <li>Nome d$sexo agenciad$sexo: $nome</li>
    <li>Modalidade selecionada: Cadastro $cadastro</li>
    <li>Data de ativação: $hoje_format</li>
    <li>Validade: $validade</li>
    $adicional
    <li>IP utilizado na renovaçao: $ip</li>
    </ul></strong>
    <p>Obrigada pela confiança e muitos trabalhos pra você!
    <BR />
    <p>Abração,</p>
    <p>Time Magneto Elenco</p>
    </body>
    </html>";

    require_once "phpmailer/class.phpmailer.php";
    smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
    $_SESSION[$id] = "Email Cadastro Enviado";
}
mysqli_close($link);
?>
