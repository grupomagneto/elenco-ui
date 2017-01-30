<?php header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
if(!session_id()) {
    session_start();
}
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB Online
$user = 'vinigoulart1';
$password = 'ThM]HETPv@';
$db = 'testecadastro';
$host = 'p3plcpnl0612.prod.phx3.secureserver.net';

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db
);
mysqli_set_charset($link,"utf8");

	// // this will avoid mysql_connect() deprecation error.
	// error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// // but I strongly suggest you to use PDO or MySQLi.
	
	// define('DBHOST', 'localhost');
	// define('DBUSER', 'root');
	// define('DBPASS', '');
	// define('DBNAME', 'dbtest');
	
	// $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	// $dbcon = mysql_select_db(DBNAME);
	
	// if ( !$conn ) {
	// 	die("Connection failed : " . mysql_error());
	// }
	
	// if ( !$dbcon ) {
	// 	die("Database Connection failed : " . mysql_error());
	// }