<?php
  header('Content-Type: text/html; charset=utf-8');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  date_default_timezone_set('America/Sao_Paulo');
$path = $_SERVER['DOCUMENT_ROOT'];
// include $path.'/db.php';
// include $path.'/functions.php';
include_once 'db.php';
include_once 'functions.php';

	// Assuntos do email
	$subject1 = "[IMPORTANTE] Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";
	$subject2 = "Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";
	$subject3 = "[CASTING] Convide seus amigos para votarem em você";
	$subject4 = "Descubra seu Potencial de Magnetismo nas propagandas";
	$random_subject = array($subject1, $subject2, $subject3, $subject4);

	define('GUSER', 'inteligencia@magnetoelenco.com.br');	// <-- Insira aqui o seu GMail
	define('GPWD', 'rom54808285');		// <-- Insira aqui a senha do seu GMail

	$game_ID = $_POST['casting'];
	$game_ID = str_replace("http://www.magnetoelenco.com.br/v2/meu_casting.php?id_casting=", "", "$game_ID");
	$game_name = $_POST['game_name'];
	$question = $_POST['question'];
	$role = $_POST['role'];
	$client = $_POST['client'];
	$campaign = $_POST['campaign'];
	$sql = "SELECT cd_elenco FROM ta_casting_elenco WHERE cd_casting = '$game_ID'";
	$result = mysqli_query($link2, $sql);
	$count = mysqli_num_rows($result);
	while ($row = mysqli_fetch_array($result)) {
		$candidate_elenco_ID = $row['cd_elenco'];
		$sql_select = "SELECT nome_artistico, email, cep, nome_responsavel, dt_nascimento, cd_pele, sexo FROM tb_elenco WHERE id_elenco = '$candidate_elenco_ID'";
		$result2 = mysqli_query($link2, $sql_select);
		$row2 = mysqli_fetch_array($result2);
		$stagename = $row2['nome_artistico'];
		$names = explode(" ", $stagename);
		$firstname = $names[0];
		$lastname = $names[1];
		$email 		= strtolower($row2['email']);
		$email 		= filter_var($email, FILTER_SANITIZE_EMAIL);
		if ($row2['cd_pele'] == 1) { $skin_color = "Amarela"; }
		if ($row2['cd_pele'] == 2) { $skin_color = "Branca"; }
		if ($row2['cd_pele'] == 3) { $skin_color = "Parda"; }
		if ($row2['cd_pele'] == 4) { $skin_color = "Negra"; }
		if ($row2['cd_pele'] == 5) { $skin_color = "Indígena"; }
		$sex = $row2['sexo'];
		$cep = preg_replace('/\D+/', '', $row2['cep']);
		$birthday = $row2['dt_nascimento'];
		$nome_tabela = "tb_games";
		$array_colunas = array('game_ID','game_name','candidate_elenco_ID','stagename','email','cep','skin_color','firstname','lastname','question','role','client','campaign','birthday','sex');
		$array_valores = array("'$game_ID'","'$game_name'","'$candidate_elenco_ID'","'$stagename'","'$email'","'$cep'","'$skin_color'","'$firstname'","'$lastname'","'$question'","'$role'","'$client'","'$campaign'","'$birthday'","'$sex'");
		$age = date_diff(date_create($row2['dt_nascimento']), date_create(date('Y-m-d', time())))->y;
		$guardian_name = " ";
		if ($age < 18) {
			$guardian = $row2['nome_responsavel'];
			array_push($array_colunas,"guardian");
			array_push($array_valores,"'$guardian'");
			$guardian_name = "(ou responsável legal $guardian)";
		}
		$cep_details = getCepFile($cep);
		// $cep_details = json_decode(file_get_contents("https://viacep.com.br/ws/{$cep}/json/"), true);
		$city = $cep_details->localidade;
		$district = $cep_details->bairro;
		$uf = $cep_details->uf;
		if (!empty($city) && !empty($uf) && !empty($district)) {
			array_push($array_colunas,'uf','city','district');
			array_push($array_valores,"'$uf'","'$city'","'$district'");
		}
		insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
		// CREATE SHARE
		$subject = $random_subject[array_rand($random_subject)];
		$hoje = date('Y-m-d H:i:s', time());
		$nome_tabela = "tb_shares";
		$array_colunas = array('type','game_ID','candidate_ID','media','email_subject','timestamp');
		$array_valores = array("'out'","'$game_ID'","'$candidate_elenco_ID'","'email'","'$subject'","'$hoje'");
		$share_ID = insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
		$link = "http://www.meumodelofavorito.com.br/index.php?from_share_ID=$share_ID";
		// ************
		// ** E-mail **
		// ************

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
		<p>Oi $firstname, $guardian_name</p>
		<p>A Magneto Elenco está lançando uma novidade e você foi uma das primeiras pessoas selecionadas para participar!</p>
		<p>Criamos um jogo que mede o seu Potencial de Magnetismo. Ou seja, <strong>um teste que analisa se as pessoas se identificariam com uma propaganda caso você fosse personagem principal nela.</strong></p>
		<p>E você pode se ajudar aumentando suas chances de participação no trabalho. Basta compartilhar o link abaixo por e-mail ou nas suas redes sociais (Facebook, Whatsapp, Instagram, Twitter, ... quanto mais melhor!) para que <strong>seus amigos votem e te ajudem</strong>. Ah, mas não se esqueça de ser a primeira pessoa a votar em si, acredite, muita gente esquece! :P</p>
		<p><strong>DICA DE SUCESSO: escreva um textinho pessoal pedindo a colaboração de seus amigos antes de cada compartilhamento. Isso ajuda muito no engajamento das pessoas.</strong></p>
		<p>Boa sorte!</p>
		<p>Time Magneto Elenco</p>
		<p>LINK PARA VOTAR:<BR />
		$link</p>
		<img src='http://www.meumodelofavorito.com.br/newgame/email_opened.php?from_share_ID=$share_ID' width='1' height='1' border='0' alt='' />
		</body>
		</html>";

		// require_once $path."/phpmailer/class.phpmailer.php";
		require_once "phpmailer/class.phpmailer.php";
		smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
	}
	if (!empty($error)){ echo $error; }
	echo "<BR />";
	echo $count." perfis inseridos com sucesso.";
	mysqli_close($link2);
?>