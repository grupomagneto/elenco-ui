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
$sql_contato = "SELECT nome_artistico, tl_celular, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, cidade, bairro FROM tb_elenco WHERE cd_elenco = '$id_elenco'";
$result_contato = mysqli_query($link, $sql_contato) or die('Error');
$row_contato = mysqli_fetch_array($result_contato);
$nome_artistico = $row_contato['nome_artistico'];
$celular = $row_contato['tl_celular'];
$idade = $row_contato['idade'];
$cidade = $row_contato['cidade'];
$bairro = $row_contato['bairro'];
// Resultado do AJAX
$horario_agendado = strftime('%A, <BR /> %d de %B de %Y <BR /> às ', strtotime($timestamp)).$hora.":".$minutos;
echo $horario_agendado;
if (empty($_SESSION['email_agendamento'])) {

    define('GUSER', 'inteligencia@magnetoelenco.com.br'); // <-- Insira aqui o seu GMail
    define('GPWD', 'rom54808285');    // <-- Insira aqui a senha do seu GMail
    $subject = "$tipo_ensaio agendado para $horario_agendado";

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
    smtpmailer($email, 'inteligencia@magnetoelenco.com.br', 'Magneto Elenco', $subject, $msg);
    $_SESSION['email_agendamento'] = "yes";
}
mysqli_close($link);
?>
