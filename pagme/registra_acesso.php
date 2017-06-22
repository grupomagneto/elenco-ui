<?php
require_once 'dbconnect.php';
$id_usuario = $_SESSION['user'];
$pagina = $_POST['pagina'];
$timestamp = date('Y-m-d H:i:s', time());
$resultado = mysqli_query($link, "SELECT tipo_cadastro_vigente FROM tb_elenco WHERE id_elenco = '$id_usuario'");
$row = mysqli_fetch_array($resultado);
$cadastro = $row['tipo_cadastro_vigente'];
mysqli_query($link, "INSERT INTO acesso (id_elenco, tipo_cadastro_vigente, pagina, timestamp_acesso) VALUES ('$id_usuario', '$cadastro', '$pagina', '$timestamp')");
mysqli_close($link);
?>
