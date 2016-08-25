<?php
session_start();
require_once("db.php");
require_once("functions.php");

$id = $_SESSION['id'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$gender = $_SESSION['gender'];

$occupation = $_POST["occupation"];

	if(insert($link2, $id, $firstname, $lastname, $email, $gender)) {

	} else {
		$msg = mysqli_error($link2);
?>
	<p> <?php echo $firstname; ?>, <?php echo $lastname; ?> não foi adicionado: <?= $msg ?> </p>
<?php
	}
header('Location: home-two.php');

	if(insert_occupation($link2, $occupation)) {
?>
<p> 
	<?php echo $occupation; ?> adicionada com sucesso!</p>

<?php
	} else {
		$msg = mysqli_error($link2);
?>
	<p> <?php echo $occupation; ?> não foi adicionado: <?= $msg ?> </p>
<?php
	}
?>






