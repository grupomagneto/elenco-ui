<?php
function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    global $error;
    $mail = new PHPMailer();
    // $mail->IsSMTP();   // Ativar SMTP
    $mail->SMTPDebug = 1;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;   // Autenticação ativada
    $mail->SMTPSecure = 'tls';  // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 587;      // A porta 587 deverá estar aberta em seu servidor
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
      $error = 'E-mail(s) enviado(s)!';
      return true;
    }
  }
    function mask($val, $mask)
    {
     $maskared = '';
     $k = 0;
     for($i = 0; $i<=strlen($mask)-1; $i++)
     {
     if($mask[$i] == '#')
     {
     if(isset($val[$k]))
     $maskared .= $val[$k++];
     }
     else
     {
     if(isset($mask[$i]))
     $maskared .= $mask[$i];
     }
     }
     return $maskared;
    }

  ?>
