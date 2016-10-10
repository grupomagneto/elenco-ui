<?php
		// Assunto do email
		$subject = "[IMPORTANTE] Você está participando de um casting e PODE MUDAR O RESULTADO FINAL";

		// Corpo do email
		$msg = echo "'
		<p>Oi $firstname, (ou responsável legal $guardian)</p>
		<p>A Magneto Elenco está lançando uma novidade e você foi uma das primeiras pessoas selecionadas para participar!</p>
		<p>Criamos um jogo que mede o seu Magnetismo Potencial®. Ou seja, um teste que analisa se as pessoas se identificariam com uma propaganda caso você fosse personagem principal nela.</p>
		<p>E você pode agir para aumentar suas chances de participação no trabalho. Basta compartilhar o link abaixo por e-mail ou nas suas redes sociais (quanto mais melhor) para que seus amigos votem e te ajudem. Ah, mas não se esqueça de ser a primeira pessoa a votar em si, acredite, muita gente esquece!</p>
		<p>DICA DE SUCESSO: escreva um textinho pessoal pedindo a colaboração de seus amigos antes de cada compartilhamento. Isso muda muito o engajamento das pessoas no final.</p>
		<p>Boa sorte!</p>
		<p>Time Magneto Elenco</p>
		<p>SEU LINK EXCLUSIVO:<BR />
		$link</p>'";

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
			if(!$mail->Send()) {
				$error = 'Mail error: '.$mail->ErrorInfo; 
				return false;
			} else {
				$error = 'Mensagem enviada!';
				return true;
			}
		}
?>