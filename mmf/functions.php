<?php 
include "db.php";

function update($link2, $id, $value, $name){
  $query = "UPDATE tb_voters SET $name='{$value}' WHERE facebook_ID='{$id}'";
  return mysqli_query($link2, $query);
}
#############################################################################
#                                                                           #
# insereDados()                                                             #
# A função insereDados() faz a inserção genérica no banco de dados.         #
# A função retorna o id auto-incremental do registro.                       #
# A função recebe 3 (três) parâmetros:                                      #
# $nome_tabela => Nome da tabela do banco de dados onde a inserção ocorrerá #
# $array_colunas => Array com a lista de colunas                            #
# $array_valores => Array com a lista de valores para a inserção            #
#                                                                           #
#############################################################################
function insereDados($link2, $nome_tabela, $array_colunas, $array_valores, $debug = false){
	if(sizeof($array_colunas) != sizeof($array_valores)){
		//Quantidade de colunas diferente da quantidade de valores
		return -1;
	}
	else{
		//Monta a string sql
		$sql = "INSERT INTO $nome_tabela (";
		for($i = 0; $i < sizeof($array_colunas); $i++){
			$sql .= $array_colunas[$i];
			if($i < (sizeof($array_colunas) - 1)) $sql .= ", ";
		}
		$sql .= ") VALUES (";
		for($i = 0; $i < sizeof($array_valores); $i++){
			$sql .= $array_valores[$i];
			if($i < (sizeof($array_valores) - 1)) $sql .= ", ";
		}		
		$sql .= ")";
		
		if($debug) die($sql);

		//Executa a string
		mysqli_query($link2, $sql) or die("ERRO - insereDados - " . mysqli_error() . $sql);
		$last_id = mysqli_insert_id($link2);
		return $last_id;
	}
}

#############################################################################
#                                                                           #
# atualizaDados()                                                           #
# A função atualizaDados() faz um update genérico no banco de dados.        #
# Possíveis retornos para a função:                                         #
# true => dados atualizados com sucesso                                     #
# false => falha na atualização dos dados                                   #
# A função recebe 4 (quatro) parâmetros:                                    #
# $nome_tabela => Nome da tabela do banco de dados onde o update ocorrerá   #
# $array_colunas => Array com a lista de colunas                            #
# $array_valores => Array com a lista de valores para a inserção            #
# $condicao => Condição para a execução do update                           #
#                                                                           #
#############################################################################
function atualizaDados($link2, $nome_tabela, $array_colunas, $array_valores, $condicao, $debug = false){
	if(sizeof($array_colunas) != sizeof($array_valores)){
		//Quantidade de colunas diferente da quantidade de valores
		return false;
	}
	else{
		//Monta a string sql
		$sql = "UPDATE $nome_tabela SET ";
		for($i = 0; $i < sizeof($array_colunas); $i++){
			$sql .= $array_colunas[$i] . " = " . $array_valores[$i];
			if($i < (sizeof($array_colunas) - 1)) $sql .= ",";
		}	
		$sql .= " WHERE " . $condicao . ";";
		
		if($debug) die($sql);
	
		//Executa a string
		mysqli_query($link2, $sql) or die("ERRO - atualizaDados - " . mysqli_error() . $sql);
		$last_id = mysqli_insert_id($link2);
		return $last_id;
	}
}
// FUNÇÃO ESPECÍFICA PARA EXIBIR FOTOS DOS AMIGOS
function selectFriends($link2, $facebook_ID, $debug = false) {
		$sql_id = "SELECT id, firstname, arquivo photo, candidate_facebook_ID FROM (SELECT firstname, candidate_elenco_ID id, candidate_facebook_ID FROM tb_games WHERE candidate_facebook_ID='$facebook_ID') T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";

		if($debug) die($sql_id);
	
		//Executa a string
		if(mysqli_query($link2, $sql_id)){
			$result = mysqli_query($link2, $sql_id);
			$row = mysqli_fetch_array($result);
			$array = array($row['id'],$row['firstname'],$row['photo'],$row['candidate_facebook_ID']);
			return $array;
		}
		else{
			echo("ERRO - selectFriends - " . mysqli_error() . $sql_id);
			return false;
		}
}
// PEGAR IP DO USUÁRIO
function get_client_ip() {
    $ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ip = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = 'UNKNOWN';
    return $ip;
}
// FUNÇÃO QUE INTERSECIONA VALORES COMUNS EM DOIS ARRAYS
function array_intersect_fixed($array1, $array2) { 
  $result = array(); 
  foreach ($array1 as $val) {
    // TEM INTERSEÇÃO
    if (($key = array_search($val, $array2, TRUE))!==false) { 
      $result[] = $val; 
      unset($array2[$key]);
      return true;
    }
    // NÃO TEM INTERSEÇÃO
    else {
      return false;
    }
  }
// SE DESEJAR QUE RETORNE O RESULTADO
// return $result;
}
function getCepFile($cep) {
            $url    = "http://viacep.com.br/ws/{$cep}/json/";
            $result = file_get_contents($url);
            return json_decode($result);
        }

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
		global $error;
		$mail = new PHPMailer();
		// $mail->IsSMTP();		// Ativar SMTP
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
			$error = 'E-mail(s) enviado(s)!';
			return true;
		}
	}
?>