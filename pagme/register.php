<?php
	require_once 'dbconnect.php';
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	
	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		// $name = trim($_POST['name']);
		// $name = strip_tags($name);
		// $name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// // basic name validation
		// if (empty($name)) {
		// 	$error = true;
		// 	$nameError = "Please enter your full name.";
		// } else if (strlen($name) < 3) {
		// 	$error = true;
		// 	$nameError = "Name must have atleat 3 characters.";
		// } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		// 	$error = true;
		// 	$nameError = "Name must contain alphabets and space.";
		// }
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Por favor digite um email válido.";
		} else {
			// check email exist or not
			$query = "SELECT email FROM tb_elenco WHERE email='$email'";
			$result = mysqli_query($link, $query);
			$count = mysqli_num_rows($result);
			if($count == 0){
				$error = true;
				$emailError = "E-mail não encontrado. Entre em contato por whatsapp: 61 99311-0767.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Por favor introduza uma senha.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Sua senha deve ter no mínimo 6 caracteres.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "UPDATE tb_elenco SET senha='$password' WHERE email='$email'";
			$res = mysqli_query($link, $query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Senha criada com sucesso, você já pode fazer login.";
				unset($name);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Ocorreu um erro, entre em contato por whatsapp: 61 99311-0767.";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">1º acesso ao PAGME</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
  <!--           <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div> -->
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Seu e-mail cadastrado na Magneto Elenco" maxlength="40" />
                </div>
                <!-- <span class="text-danger"><?php echo $emailError; ?></span> -->
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Crie uma senha com 6 caracteres" maxlength="15" />
                </div>
                <!-- <span class="text-danger"><?php echo $passError; ?></span> -->
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass2" class="form-control" placeholder="Confirme sua senha" maxlength="15" />
                </div>
                <!-- <span class="text-danger"><?php echo $passError; ?></span> -->
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Criar senha</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Voltar ao login</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>