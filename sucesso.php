<?php


$con = mysqli_connect('mysql08.vinigoulart.com.br','vinigoulart18','HjkL2k7gD8', 'vinigoulart18');
            if (mysqli_connect_errno())
            {
                echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
            }

              $sql3 = "UPDATE fotos_mobile SET arquivo = id_foto WHERE id_foto = id_foto";

            // UPDATE fotos_mobile INNER JOIN usuario ON fotos_mobile.id_foto = usuario.id SET fotos_mobile.arquivo = usuario.id

              $a = 0;

            if (mysqli_query($con,$sql3))
            {
            }


mysqli_close($con);


$sexo = $_GET['sexo'];

if ( $sexo == "feminino" ) {
   $oa = 'a';
   $hm = 'mulheres';
} else {
   $oa = 'o';
   $hm = 'homens';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro Magneto Elenco</title>
 	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="css/sucesso.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body class="gradient4"> 


<div class="sucesso" id="gradient">
        <div  class="container">

            <div class="row">
                <div class=" divsucesso_t col-lg-offset-3 col-lg-5">
                            <h1>Pronto!</h1>
                </div>
            </div>
            <div class="row">
                <div class=" divsucesso_box col-lg-offset-3 col-lg-5">
                   
                 <p>
                 Você já está cadastrad<?php echo $oa; ?> e pront<?php echo $oa; ?> para trabalhar. 
                 Sempre que precisar de algo, dê um alô em nossa página do <a href="http://www.facebook.com/magnetoelenco">Facebook.</a>
                </p>
                </div>
            </div>


            <div class="row">
                <div class=" divsucesso_logo col-lg-offset-3 col-lg-5">
                  <img src="images/logo.svg" alt="LOGO">
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