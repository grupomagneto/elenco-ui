<?php
require_once 'dbconnect.php';
$id_usuario = $_SESSION['user'];
$pagina = $_POST['pagina'];
$timestamp = date('Y-m-d h:i:s', time());
mysqli_query($link, "INSERT INTO acesso (id_elenco, pagina, timestamp_acesso) VALUES ('$id_usuario', '$pagina', '$timestamp')");
echo json_encode(array(
	'id_usuario'=>$id_usuario,
	'pagina'=>$pagina,
	'timestamp'=>$timestamp),
	JSON_UNESCAPED_UNICODE
);
mysqli_close($link);
?>