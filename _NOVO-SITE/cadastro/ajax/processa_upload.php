<?php
// header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
// if(!session_id()) {
//     session_start();
// }
// ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
$dir = '../fotos/'; //Diretório para uploads
$hoje = date('Y-m-d H:i:s');
// define ('SITE_ROOT', realpath(dirname(__FILE__)));
 if (isset($_FILES['file'])) {
    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    // $pathinfo = pathinfo($_FILES['file']);
    // $extension = $pathinfo['extension'];
    $path = $_FILES['file']['name'];
	$extension = pathinfo($path, PATHINFO_EXTENSION);
    if ($extension == 'jpeg') {
      $ext = '.jpg';
    } else {
      $ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
    }
    $new_name = $hoje."_"."01".$ext; //Definindo um novo nome para o arquivo
    $error = $_FILES['file']['error'];
    if ($error !== UPLOAD_ERR_OK) {
    	$ret = 'Erro ao fazer o upload:'. $error;
        // echo 'Erro ao fazer o upload:', $error;
    } elseif (move_uploaded_file($tmp_name, $dir . $new_name)) {
        // echo 'Uploaded';
        $ret = array('status' => 'ok');  
    }
} else {
    // echo 'Selecione um arquivo para fazer upload';
    $ret = array('error' => 'no_file');
    
	echo json_encode($ret);
	exit;
    // ? >
    // <html>
    // <body>
    // <form action="#" method="post" enctype="multipart/form-data">
    // 	<input type="file" name="file">
    // 	<input type="submit" name="submit">
    // </form>
    // </body>
    // </html>
    // <?php
}

// if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
//   file_put_contents('fotos/post.txt', 'name=' . $_POST['name'] . ',count=' . $_POST['i'] . PHP_EOL, FILE_APPEND);
//   move_uploaded_file($_FILES['file']['tmp_name'], "fotos/" . $_FILES['file']['name']);
//   $ret = array('status' => 'ok');
// } else {
//   $ret = array('error' => 'no_file');
// }
// header('Content-Type: application/json');
// echo json_encode($ret);
// exit;
?>