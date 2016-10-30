<?php
  header('Content-Type: text/html; charset=utf-8');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  date_default_timezone_set('America/Sao_Paulo');
include_once 'db.php';
include_once 'functions.php';

	define('GUSER', 'inteligencia@magnetoelenco.com.br');	// <-- Insira aqui o seu GMail
	define('GPWD', 'rom54808285');		// <-- Insira aqui a senha do seu GMail


	$sql = "SELECT candidate_elenco_ID, email, sex, game_name, question, firstname, game_ID FROM tb_games";
	$result = mysqli_query($link2, $sql);
	$count = mysqli_num_rows($result);
	while ($row = mysqli_fetch_array($result)) {
		$candidate_elenco_ID = $row['candidate_elenco_ID'];
		$email = $row['email'];
		$firstname  = $row['firstname'];
		$game_name = $row['game_name'];
		$question = $row['question'];
		$game_ID  = $row['game_ID'];
	    $sex  = $row['sex'];
		if ($sex == 'f' || $sex == 'F') {
			$article = 'a';
		}
		elseif ($sex == 'm' || $sex == 'M') {
			$article = 'o';
		}
		// Assuntos do email
		$subject = "[IMPORTANTE] Você ainda não votou em si mesm$article e pode perder sua chance";
		
		// CREATE SHARE
		$hoje = date('Y-m-d H:i:s', time());
		$nome_tabela = "tb_shares";
		$array_colunas = array('type','game_ID','candidate_ID','media','email_subject','timestamp');
		$array_valores = array("'resend'","'$game_ID'","'$candidate_elenco_ID'","'email'","'$subject'","'$hoje'");
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
		<p>Oi $firstname,</p>
		<p>Sem sua ajuda fica difícil te ajudar. :)</p>
		<p>Clique no link abaixo, faça login e vote em você mesm$article até o final. Sem <strong>seu próprio voto e seu esforço para convidar seus amigos para votar</strong> vai ficar difícil convencer o anunciante de que você é a melhor opção para o trabalho!</p>
		<p>Não deixe passar essa chance e aproveite a oportunidade de ser você $article responsável pela sua participação nos trabalhos.</p>
		<p><strong>DICA DE SUCESSO: Antes de compartilhar, escreva um textinho pessoal pedindo a colaboração de seus amigos. Isso ajuda muito no engajamento das pessoas.</strong></p>
		<p>Boa sorte!</p>
		<p>Time Magneto Elenco</p>
		<p>PARA VOTAR E COMPARTILHAR:<BR />
		$link</p>
		<img src='http://www.meumodelofavorito.com.br/newgame/email_opened.php?from_share_ID=$share_ID' width='1' height='1' border='0' alt='' />
		</body>
		</html>";

		require_once "phpmailer/class.phpmailer.php";
		smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
	}
	if (!empty($error)){ echo $error; }
	echo "<BR />";
	echo $count." e-mails enviados com sucesso.";
	mysqli_close($link2);
?>