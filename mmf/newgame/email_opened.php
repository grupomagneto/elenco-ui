<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!empty($_GET['from_share_ID'])){
	$path = $_SERVER['DOCUMENT_ROOT'];
	include $path.'/db.php';
	include $path.'/functions.php';
	$ip = get_client_ip();
	if(!session_id()) { session_start(); }
	$from_share_ID = $_GET['from_share_ID'];
	date_default_timezone_set('America/Sao_Paulo');
	$hoje = date('Y-m-d H:i:s', time());
	$sql_share = "SELECT game_ID, candidate_ID, media, email_subject FROM tb_shares WHERE share_ID='$from_share_ID'";
	$result = mysqli_query($link2, $sql_share);
	$row = mysqli_fetch_array($result);
	$game_ID 		= $row['game_ID'];
	$candidate_ID 	= $row['candidate_ID'];
	$media 			= $row['media'];
	$email_subject 	= $row['email_subject'];
	$nome_tabela = "tb_shares";
	$array_colunas = array('type','from_share_ID','game_ID','candidate_ID','media','email_subject','timestamp','ip');
	$array_valores = array("'opened'","'$from_share_ID'","'$game_ID'","'$candidate_ID'","'$media'","'$email_subject'","'$hoje'","'$ip'");
	insereDados($link2, $nome_tabela, $array_colunas, $array_valores);
	echo $sql_share;
}
header( 'Content-Type: image/gif' );
//Full URI to the image
$graphic_http = 'http://www.meumodelofavorito.com.br/images/blank.gif';

//Get the filesize of the image for headers
$filesize = filesize( 'blank.gif' );

//Now actually output the image requested (intentionally disregarding if the database was affected)
header( 'Pragma: public' );
header( 'Expires: 0' );
header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
header( 'Cache-Control: private',false );
header( 'Content-Disposition: attachment; filename="blank.gif"' );
header( 'Content-Transfer-Encoding: binary' );
header( 'Content-Length: '.$filesize );
readfile( $graphic_http );
exit;
?>