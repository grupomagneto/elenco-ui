<?php header('Content-Type: text/html; charset=utf-8');
session_start(); $usuario_magneto = $password_magneto = $userError = $passError = '';
if(isset($_POST['sub'])){
  $usuario_magneto = $_POST['username']; $password_magneto = $_POST['password'];
  if($usuario_magneto === 'vini' && $password_magneto === 'Vgb808285'){
    $_SESSION['login'] = true; header('LOCATION:inicio.html'); die();
  }
  if($usuario_magneto !== 'vini')$userError = 'Usuário Inválido';
  if($password_magneto !== 'Vgb808285')$passError = 'Senha Inválida';
}
echo "<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='pt-BR' lang='pt-BR'>
   <head>
		<meta http-equiv='Content-type' content='text/html; charset=ISO-8859-15' />
		<title>Sistema Financeiro - Magneto Elenco</title>
   </head>
   <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:300,300italic,900,900italic,400,400italic' />
	<style type='text/css'>
		h1 {
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			font-size: 13px;
		}
        body {
			font-family: 'Roboto', sans-serif;
			font-size: 17px;
	  		font-weight: 300;
        }
		#corpo {
		    margin: auto;
		    width: 90%;
		}
		#texto {
		    margin: auto;
		    width: 160px;
		}
		#caixas {
		    margin: auto;
		    width: 160px;
		}
	</style>
<body bgcolor='#ffffff' style='margin-top: 100px;'>
	<div id='corpo'>
	<center><img src='images/logo.png' width='150' align='center' /></center>
  <form name='input' action='{$_SERVER['PHP_SELF']}' method='post'>
  <span style='color: gray;'>
    <div id='texto'><label for='username'>Usuário: </label></div><div id='caixas'><input type='text' value='$usuario_magneto' id='username' name='username' size='23' />
    <div class='error'>$userError</div></div>
    <div id='texto'><label for='password'>Senha: </label></div><div id='caixas'><input type='password' value='$password_magneto' id='password' name='password' size='23' />
    <div class='error'>$passError</div></div><BR />
    <center><button name='sub' type='submit' size='23'><h1>ENTRAR</h1></button></center></span></div>
  </form>
</body>
</html>";
?>