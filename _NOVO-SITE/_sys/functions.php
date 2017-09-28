<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
if(!session_id()) {
  session_start();
}
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
// API de https://holidayapi.com/
function verificarFeriado($data, $boolean = false) {
    $param = array();
    // Sua chave (exigida após 01/08/2016!), leia no final dessa postagem!
    // Chave real
      $param['key'] = '16f0b554-12c2-48bf-8c74-5162e7da70a1';
    // Chave de testes
      // $param['key'] = 'e2d40b61-8a78-448b-afef-2e1a089db567';
    // Listas de países suportados!
    $paisesSuportados = array('BR');
    // Define o pais para buscar feriados
    $param['country'] = $paisesSuportados[0];
    // Quebra a string em partes (em ano, mes e dia)
    list($param['year'], $param['month'], $param['day']) = explode('-', $data);
    // Converte a array em parâmetros de URL
    $param = http_build_query($param);
    // Conecta na API
    $curl = curl_init('https://holidayapi.com/v1/holidays?'.$param);
    // Permite retorno
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Obtem dados da API
    $dados = json_decode(curl_exec($curl), true);
    // Encerra curl
    curl_close($curl); 
    // Retorna true/false se houver $boolean ou Nome_Do_Feriado/false se não houve $boolean
    return isset($dados['holidays']['0']) ? $boolean ? true : $dados['holidays']['0']['name'] : false;
}
function proximoHorario($data) {
  $pedacos = explode(" ", $data);
  $data = date($pedacos[0]);
  $horario = date($pedacos[1]);
  $hora = date('H', strtotime($horario));
  $minutos = date('i', strtotime($horario));
  // Verifica se não é domingo nem feriado e adiciona 01 hora
  $check_holiday = var_export(verificarFeriado($data), true);
  if (date('N', strtotime($data)) != 7 && $check_holiday == 'false') {
    $result = $data;
    if ($hora >= 9 && $hora <= 18) {
      //   $hora = $hora + 1;  
      if ($hora >= 12 && $hora < 14) {
        $hora = 14;
      }
      if ($minutos == 0) {
        $minutos = "00";
      }
      if ($minutos <= 15 && $minutos > 0) {
        $minutos = 15;
      }
      if ($minutos > 15 && $minutos <= 30) {
        $minutos = 30;
      }
      if ($minutos > 30 && $minutos <= 45) {
        $minutos = 45;
      }
      if ($minutos > 45 && $minutos <= 59) {
        $minutos = "00";
        $hora = $hora + 1;
        if ($hora >= 12 && $hora < 14) {
          $hora = 14;
        }
        if ($hora >= 19) {
          $result = date('Y-m-d', strtotime($result . ' +1 day'));
          $hora = "09";
          $minutos = "00";
        }
      }
    }
    else {
      $result = date('Y-m-d', strtotime($result . ' +1 day'));
      $hora = "09";
      $minutos = "00";
    }
    $horario = $hora.":".$minutos;
  }
  // Se for domingo ou feriado, adiciona 01 dia até ser um dia de trabalho válido
  else {
    while (date('N', strtotime($data)) == 7 || $check_holiday != 'false') {
      $data = date('Y-m-d', strtotime($data . ' +1 day'));
      $check_holiday = var_export(verificarFeriado($data), true);
    }
    $result = $data;
    $horario = '09:00';
  }
  $hoje = date('Y-m-d');
  $dataLimpa = date('Y-m-d', strtotime($result));
  $amanha = date('Y-m-d', strtotime($hoje . ' +1 day'));
  if ($dataLimpa == $hoje) {
    $diaSemana = "Hoje";
  }
  if ($dataLimpa == $amanha) {
    $diaSemana = "Amanhã";
  }
  if ($dataLimpa != $hoje && $dataLimpa != $amanha) {
    $diaSemana = strftime('%A', strtotime($result));
    $diaSemana = substr($diaSemana, 0, 3);
  }
  $novoDia = strftime('%d', strtotime($result));
  $novoMes = strftime('%B', strtotime($result));
  $novoMes = substr($novoMes, 0, 3);
  // $novoMes = strtolower($novoMes);
  $novoAno = strftime('%Y', strtotime($result));
  $return = $diaSemana.", ".$novoDia." de ".$novoMes." às ".$horario;
  $_SESSION['prox_horario'] = $return;
}
function vencimentoBoleto($data) {
  // Verifica se não é domingo nem feriado
  $check_holiday = var_export(verificarFeriado($data), true);
  if (date('N', strtotime($data)) != 7 && $check_holiday == 'false') {
    $result = $data;
  }
  // Se for domingo ou feriado, adiciona 01 dia até ser um dia de trabalho válido
  else {
    while (date('N', strtotime($data)) == 7 || $check_holiday != 'false') {
      $data = date('Y-m-d', strtotime($data . ' +1 day'));
      $check_holiday = var_export(verificarFeriado($data), true);
    }
    $result = $data;
  }
  return $result;
}
?>