<?php
if(!session_id()) {
  session_start();
}
require '../../_sys/conecta.php';
require '../../_sys/functions.php';
$id_elenco = $_SESSION['id_elenco'];
$data = $_POST['date'];
$hora = $_POST['hour'];
$minutos = $_POST['minutes'];
$timestamp = $data." ".$hora.":".$minutos.":00";

$timestampEnd = date('Y-m-d H:i:s', strtotime($timestamp . ' +15 minutes'));
//Convert MYSQL datetime and construct iCal start, end and issue dates
$meetingstamp = strtotime($timestamp . " BRT"); 
$dtstart= gmdate("Ymd\THis\Z",$meetingstamp);
$dtend= gmdate("Ymd\THis\Z",$meetingstamp+900);
$todaystamp = gmdate("Ymd\THis\Z");

$tipo_ensaio = $_POST['tipo_ensaio'];
$status = "Pré-agendado";

// Se existir algum horário futuro com o mesmo ID, update
$sql = "SELECT id_agenda FROM tb_agenda WHERE cd_elenco = '$id_elenco' AND dh_agendamento > NOW()";
$result = mysqli_query($link, $sql) or die('Error');
$row = mysqli_fetch_array($result);
// Se já tem horário agendado
if (!empty($row) && $row != NULL && $row != "") {
  $id_row = $row['id_agenda'];
  mysqli_query($link, "UPDATE tb_agenda SET dh_agendamento = '$timestamp', tipo_ensaio = '$tipo_ensaio' WHERE id_agenda = '$id_row'");
}
elseif (empty($row) || $row == NULL || $row == "") {
  mysqli_query($link, "INSERT INTO tb_agenda (dh_agendamento, cd_elenco, tipo_ensaio, status) VALUES ('$timestamp', '$id_elenco', '$tipo_ensaio', '$status')");
}
// Pega informações do agenciado para o e-mail
$sql_contato = "SELECT nome_artistico, ddd_01, tl_celular, email, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, cidade, bairro FROM tb_elenco WHERE id_elenco = '$id_elenco'";
$result_contato = mysqli_query($link, $sql_contato) or die('Error');
$row_contato = mysqli_fetch_array($result_contato);
$nome_artistico = $row_contato['nome_artistico'];
$celular = "+55".$row_contato['ddd_01'].$row_contato['tl_celular'];
$celular = str_replace(" ", "", $celular);
$idade = $row_contato['idade'];
$cidade = $row_contato['cidade'];
$bairro = $row_contato['bairro'];
// $email = $row_contato['email'];
$email = "vini@grupomagneto.com.br";
// Resultado do AJAX
$horario_agendado = strftime('%a, %d de %b às ', strtotime($timestamp)).$hora.":".$minutos;
echo $horario_agendado;
if (empty($_SESSION['email_agendamento'])) {

    define('GUSER', 'inteligencia@magnetoelenco.com.br'); // <-- Insira aqui o seu GMail
    define('GPWD', 'rom54808285');    // <-- Insira aqui a senha do seu GMail
    $subject = "$tipo_ensaio agendado para $horario_agendado";

$ical="BEGIN:VCALENDAR
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:REQUEST
BEGIN:VEVENT
CATEGORIES:MEETING
STATUS:TENTATIVE
DTSTART:".$dtstart."
DTEND:".$dtend."
CREATED:".$todaystamp."
SUMMARY:".$tipo_ensaio."
DESCRIPTION:".$tipo_ensaio." de ".$nome_artistico." cel:".$celular."
CLASS:PRIVATE
ORGANIZER;CN=Magneto Elenco:mailto:inteligencia@magnetoelenco.com.br
LOCATION:Magneto Elenco - SIA Trecho 17 Rua 3 Lote 600 3º andar CEP: 71.200-207
STATUS:CONFIRMED
TRANSP:OPAQUE
X-APPLE-TRAVEL-ADVISORY-BEHAVIOR:AUTOMATIC
BEGIN:VALARM
ACTION:AUDIO
TRIGGER:-PT15H
ATTACH;VALUE=URI:Basso
X-APPLE-DEFAULT-ALARM:TRUE
END:VALARM
END:VEVENT
END:VCALENDAR";

    // Corpo do email
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, user-scalable=no'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p><h1>$horario_agendado</h1></p>
    <p>Tipo de ensaio: $tipo_ensaio</p>
    <p>Nome do agenciado: $nome_artistico</p>
    <p>Idade: $idade</p>
    <p>Telefone: $celular</p>
    <p>Localização: $bairro-$cidade</p>
    </body>
    </html>";

    require_once "../../_sys/phpmailer/class.phpmailer.php";
    smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg, $ical);
    $_SESSION['email_agendamento'] = "yes";
}
mysqli_close($link);
?>
