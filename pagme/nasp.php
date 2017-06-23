<?php
require_once 'dbconnect.php';
// echo "<pre>";
// print_r($_POST);
// exit;
$timestamp = date('Y-m-d H:i:s', time());
$id_transacao = $_POST['id_transacao'];
$pieces = explode("-", $id_transacao);
$id_venda = $pieces[1];
$status_pagamento = $_POST['status_pagamento'];
if ($status_pagamento == 1) { $status_pagamento = "Autorizado"; }
elseif ($status_pagamento == 2) { $status_pagamento = "Iniciado"; }
elseif ($status_pagamento == 3) { $status_pagamento = "Boleto Impresso"; }
elseif ($status_pagamento == 4) { $status_pagamento = "Concluido"; }
elseif ($status_pagamento == 5) { $status_pagamento = "Cancelado"; }
elseif ($status_pagamento == 6) { $status_pagamento = "Em Análise"; }
elseif ($status_pagamento == 7) { $status_pagamento = "Estornado"; }
elseif ($status_pagamento == 9) { $status_pagamento = "Reembolsado"; }
mysqli_query($link, "UPDATE financeiro SET status_venda = '$status_pagamento', timestamp_nasp = '$timestamp' WHERE id = '$id_venda'");
mysqli_close($link);
http_response_code(200);
?>
