<?php header("Content-type: text/html; charset=utf-8");
include_once("analyticstracking.php");
session_start();

$sexo               = $_SESSION['sexo'];
$nome               = $_SESSION['nome'];
$sobrenome          = $_SESSION['sobrenome'];
$cpf                = $_SESSION['cpf'];
$nome_responsavel   = $_SESSION['nome_responsavel'];
$data_menor         = $_SESSION['data_menor'];
$data_menor         = $_SESSION['data_maior'];
$celular            = $_SESSION['celular'];
$email              = $_SESSION['email'];
$cadastro           = $_SESSION['cadastro'];
$cor_pele           = $_SESSION['cor_pele'];
$bairro             = $_SESSION['bairro'];
$ig                 = $_SESSION['ig'];
$face               = $_SESSION['face'];
$tt                 = $_SESSION['tt'];

if ( $sexo == "F" ) {
   $oa = 'a';
   $hm = 'mulheres';
} else {
   $oa = 'o';
   $hm = 'homens';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bem-vind<?php echo $oa; ?> à Magneto Elenco!</title>
 	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="css/sucesso.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    table {
    border-collapse: collapse;
    }
    th, td {
        /*border-bottom: 1px solid white;*/
        font-family: Avenir-Book;
        font-size: medium;
        color: white;
    }
</style>
</head>
<body class="gradient4"> 


<div class="sucesso" id="gradient">
<div  class="container">
<div class="row">
<div class="divsucesso_logo col-lg-offset-3 col-lg-5">
<img src="images/logo.svg" alt="LOGO">
</div>
</div>
<div class="row">
<div class="divsucesso_t col-lg-offset-3 col-lg-5">
<h1>Pronto!</h1>
</div>
</div>
<div class="row">
<div class="divsucesso_box col-lg-offset-3 col-lg-5">

<p>Você já está cadastrad<?php echo $oa; ?> e pront<?php echo $oa; ?> para trabalhar. Confira aqui as informações que você cadastrou:</p>

<table width="400px" border="0">
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Nome:&nbsp;</div></th>
    <td><div align="left"><?php echo $nome." ".$sobrenome;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Responsável:&nbsp;</div></th>
    <td><div align="left"><?php echo $nome_responsavel;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">CPF:&nbsp;</div></th>
    <td><div align="left"><?php echo $cpf;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Celular:&nbsp;</div></th>
    <td><div align="left"><?php echo $celular;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">E-mail:&nbsp;</div></th>
    <td><div align="left"><?php echo $email;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Bairro:&nbsp;</div></th>
    <td><div align="left"><?php echo $bairro;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Sexo:&nbsp;</div></th>
    <td><div align="left"><?php echo $sexo;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Twitter:&nbsp;</div></th>
    <td><div align="left"><?php echo $tt;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Facebook:&nbsp;</div></th>
    <td><div align="left"><?php echo $face;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Instagram:&nbsp;</div></th>
    <td><div align="left"><?php echo $ig;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Cor da Pele:&nbsp;</div></th>
    <td><div align="left"><?php echo $cor_pele;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Cadastro:&nbsp;</div></th>
    <td><div align="left"><?php echo $cadastro;?></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="right" style="font-family: Avenir-Heavy;">Nascimento:&nbsp;</div></th>
    <td><div align="left"><?php echo $data_menor;?></div></td>
  </tr>
</table>

Sempre que precisar de algo, dê um alô em nossa página do <a href="http://www.facebook.com/magnetoelenco">Facebook.</a>

</div>
</div>



</div>
</div>




<script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/form.js"></script>
    <script src="js/select.js"></script>
    <script src="js/jquery-ui.min.js"></script>


</body>
</html>