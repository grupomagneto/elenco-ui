<?php
	require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<style>
		body {
			margin: 50px auto;
			width: 400px;
			text-align: center;
		}
	</style>
</head>
<body> 

	<?php if (!isset($_SESSION['facebook'])): ?>
		<h2>Facebook login</h2>
		<a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>" class="btn btn-primary">Iniciar com Facebook!</a>
	<?php else: ?>
		<p>
			 <img src='<?php echo $img;?>' /> <br />
			Id: <?php echo $facebook_user->getId(); ?> <br />
			Primeiro nome: <?php echo $facebook_user->getFirstName(); ?> <br />
			Último nome: <?php echo $facebook_user->getLastName(); ?> <br />
			Email: <?php echo $facebook_user->getEmail(); ?> <br />
			Gênero: <?php echo $facebook_user->getGender(); ?> <br />
			Data de aniversário: <?php echo $birthday ?> <br />

		</p>
		<a href="logout.php" class="btn btn-danger">Encerrar sessão</a>
	<?php endif; ?>
</body>
</html>