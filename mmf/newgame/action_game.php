<?php header('Content-Type: text/html; charset=utf-8');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  date_default_timezone_set('America/Sao_Paulo');
$path = $_SERVER['DOCUMENT_ROOT'];
include $path.'/db.php';
include $path.'/functions.php';

	// Assuntos do email
	$subject1 = "[IMPORTANTE] Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";
	$subject2 = "Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";
	$subject3 = "[CASTING] Convide seus amigos para votarem em você";
	$subject4 = "Descubra seu Potencial de Magnetismo nas propagandas";
	$random_subject = array($subject1, $subject2, $subject3, $subject4);
	$subject = $random_subject[array_rand($random_subject)];


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
		$sql_select = "SELECT nome_artistico, email, cep, nome_responsavel, dt_nascimento, cd_pele FROM tb_elenco WHERE id_elenco = '$candidate_elenco_ID'";
		$result2 = mysqli_query($link2, $sql_select);
		$row2 = mysqli_fetch_array($result2);
		$stagename = $row2['nome_artistico'];
		$names = explode(" ", $stagename);
		$firstname = $names[0];
		$email 		= strtolower($row2['email']);
		$email 		= filter_var($email, FILTER_SANITIZE_EMAIL);
		if ($row2['cd_pele'] == 1) { $skin_color = "Amarela"; }
		if ($row2['cd_pele'] == 2) { $skin_color = "Branca"; }
		if ($row2['cd_pele'] == 3) { $skin_color = "Parda"; }
		if ($row2['cd_pele'] == 4) { $skin_color = "Negra"; }
		if ($row2['cd_pele'] == 5) { $skin_color = "Indígena"; }
		$cep 		= preg_replace('/\D+/', '', $row2['cep']);
		$cep_details = json_decode(file_get_contents("https://viacep.com.br/ws/{$cep}/json/"));
		$city = $cep_details->localidade;
		$district = $cep_details->bairro;
		$uf = $cep_details->uf;
		$nome_tabela = "tb_games";
		$array_colunas = array('game_ID','game_name','candidate_elenco_ID','stagename','email','cep','uf','city','district','skin_color','question','role','client','campaign');
		$array_valores = array("'$game_ID'","'$game_name'","'$candidate_elenco_ID'","'$stagename'","'$email'","'$cep'","'$uf'","'$city'","'$district'","'$skin_color'","'$question'","'$role'","'$client'","'$campaign'");
		$age = date_diff(date_create($row2['dt_nascimento']), date_create(date('Y-m-d', time())))->y;
		$guardian_name = " ";
		if ($age < 18) {
			$guardian = $row2['nome_responsavel'];
			array_push($array_colunas,"guardian");
			array_push($array_valores,"'$guardian'");
			$guardian_name = "(ou responsável legal $guardian)";
		}
		insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
		// CREATE SHARE
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
		<img src='http://www.meumodelofavorito.com.br/email_opened.php?from_share_ID=$share_ID' width='1' height='1' border='0' alt='' />
		</body>
		</html>";

		require_once $path."/phpmailer/class.phpmailer.php";

		define('GUSER', 'inteligencia@magnetoelenco.com.br');	// <-- Insira aqui o seu GMail
		define('GPWD', 'rom54808285');		// <-- Insira aqui a senha do seu GMail

		function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
			global $error;
			$mail = new PHPMailer();
			$mail->IsSMTP();		// Ativar SMTP
			$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
			$mail->SMTPAuth = true;		// Autenticação ativada
			$mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
			$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
			$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
			$mail->Username = GUSER;
			$mail->Password = GPWD;
			$mail->SetFrom($de, $de_nome);
			$mail->Subject = $assunto;
			$mail->Body = $corpo;
			$mail->AddAddress($para);
			// $mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->IsHTML(true);
			$mail->CharSet = "UTF-8";                                  // Set email format to HTML
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			if(!$mail->Send()) {
				$error = 'Mail error: '.$mail->ErrorInfo;
				$nome_tabela = "tb_shares";
				$array_colunas = array('error_message');
				$array_valores = array("'$error'");
				$condicao = "share_ID='$share_ID'";
				atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao);
				return false;
			} else {
				$error = 'Mensagem enviada!';
				return true;
			}
		}
		smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
		if (!empty($error)) echo $error;
	}
	echo $count." perfis inseridos com sucesso.";
	mysqli_close($link2);
?>