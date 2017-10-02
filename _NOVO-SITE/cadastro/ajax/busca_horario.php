<?php
if(!session_id()) {
  session_start();
}
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$agora = date('Y-m-d H:i:s');

// Checa se já existe um horário agendado e recomenda o próximo adicionando tempo
$sql = "SELECT dh_agendamento FROM tb_agenda WHERE dh_agendamento > DATE_ADD(NOW(), INTERVAL 1 HOUR) ORDER BY dh_agendamento ASC LIMIT 1";
$result = mysqli_query($link, $sql);
// Se já tem horário agendado
if ($row = mysqli_fetch_array($result)) {
	// Localiza os horários do dia
	$data =  date('Y-m-d', strtotime($row['dh_agendamento']));
	// SELECIONA O PRIMEIRO HORÁRIO AGENDADO
	$sql2 = "SELECT dh_agendamento FROM tb_agenda WHERE DATE(dh_agendamento) = '$data' ORDER BY dh_agendamento ASC";
	$result2 = mysqli_query($link, $sql2);
	while ($row2 = mysqli_fetch_array($result2)) {
		$horarioExistente = $row2['dh_agendamento'];
		// Verifica se existe algum horário possível antes adicionando 15 minutos
		$horaProximoHorario =  date('H', strtotime($horarioExistente . ' +15 minute'));
		if ($horaProximoHorario >= 9 && $horaProximoHorario < 12 && $horaProximoHorario >= 14 && $horaProximoHorario < 19) {
			$proxHorarioTeste = date('Y-m-d H:i:s', strtotime($horarioExistente . ' +15 minute'));
		}
		// Se não tiver horário possível antes, subtrai 15 minutos
		else {
			$proxHorarioTeste = date('Y-m-d H:i:s', strtotime($horarioExistente . ' -15 minute'));
		}
		$hora = date('H', strtotime($proxHorarioTeste));
		if ($hora >= 12 && $hora < 14) {
	        $proxHorarioTeste = date('Y-m-d 14:00:00');
		}
		// Localizar se existe um horario igual agendado. Quando não localizar, adicionar 15 minutos ao horario resultante
		$sql3 = "SELECT dh_agendamento FROM tb_agenda WHERE dh_agendamento = '$proxHorarioTeste'";
		$result3 = mysqli_query($link, $sql3);
		if (!$row3 = mysqli_fetch_array($result3)) {
			$horarioResultante = $proxHorarioTeste;
			break;
		}
	}
	$agendaPlusOneHour = date('Y-m-d H:i:s', strtotime($horarioResultante . ' +1 hour'));
	// Se o horario agendado está a mais de uma hora de agora
	if ($agendaPlusOneHour >= $agora) {
		$proxHorario = $horarioResultante;
		$desconto = 5;
	}
	// Se o horario agendado não está a mais de uma hora de agora
	if ($agendaPlusOneHour < $agora) {
		$proxHorario = date('Y-m-d H:i:s', strtotime($agora . ' +30 minute'));
		$desconto = 5;
	}
	$data_desconto = proximoHorario($proxHorario)['data_format'];
	$data_desconto_unformat = proximoHorario($proxHorario)['data_unformat'];
	$horario = proximoHorario($proxHorario)['horario'];
	$pieces = explode(':', $horario);
	$hour = $pieces[0];
	$minutes = $pieces[1];
}
// Se não tem horário agendado
else {
	// Localizar próximo sábado (??) ou adicionar uma hora de agora
	$proxHorario = date('Y-m-d H:i:s', strtotime($agora . ' +1 hour'));
	$data_desconto = proximoHorario($proxHorario)['data_format'];
	$data_desconto_unformat = proximoHorario($proxHorario)['data_unformat'];
	$horario = proximoHorario($proxHorario)['horario'];
	$pieces = explode(':', $horario);
	$hour = $pieces[0];
	$minutes = $pieces[1];
}
?>
