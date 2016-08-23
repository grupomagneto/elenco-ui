<?php 

session_start();
  require_once("db.php");

$id = $_SESSION['id'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$birthday = $_SESSION['birthday'];
$gender = $_SESSION['gender'];

$occupation = $_POST['occupation'];
$income = $_POST['income'];
$skincolor = $_POST['skincolor'];
$schooling = $_POST['schooling'];
$maritalstatus = $_POST['maritalstatus'];
	
?>

<?php
	if(insert($link2, $id, $firstname, $lastname, $email, $birthday, $gender, $occupation, $income, $skincolor, $schooling, $maritalstatus)) {
?>
	<p class="text-success"> <?php echo $firstname; ?>, <?php echo $lastname; ?> adicionada com sucesso!</p>
<?php
	} else {
		$msg = mysqli_error($link2);
?>
	<p class="text-danger">O usuário <?php echo $firstname; ?> não foi adicionado: <?= $msg ?> </p>
<?php
	}
?>

