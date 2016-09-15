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
$income = $_POST["income"];
$skincolor = $_POST["skincolor"];
$scholarity = $_POST["scholarity"];
$relationship_status = $_POST["relationship_status"];

$user_agent = mysqli_real_escape_string($link2, $_POST['user_agent']);

?>


<?php 


$script = '<script language="javascript">location.href="occupation.php";</script>';

if(isset($_POST['face'])){


	if(insert($link2, $id, $firstname, $lastname, $email, $gender, $user_agent)) {

		echo $script;

	} else {
		$msg = mysqli_error($link2);

		echo $msg;

	}

}

?>



<?php 


$redirect_income = '<script language="javascript">location.href="income.php";</script>';

if(isset($_POST['occupation'])){


	if(insert_occupation($link2, $id, $occupation)) {

		echo $redirect_income;

	}else {
		$msg = mysqli_error($link2);

		echo $msg;

	}

}

?>



<?php 


$redirect_skin = '<script language="javascript">location.href="skincolor.php";</script>';

if(isset($_POST['income'])){


	if(insert_income($link2, $id, $income)) {

		echo $redirect_skin;

	} else {
		$msg = mysqli_error($link2);

	}

}


?>



<?php 


$redirect_scholarity = '<script language="javascript">location.href="scholarity.php";</script>';

if(isset($_POST['skincolor'])){


	if(insert_skincolor($link2, $id, $skincolor)) {

		echo $redirect_scholarity;

	} else {
		$msg = mysqli_error($link2);

	}

}

?>



<?php 


$redirect_relationship_status = '<script language="javascript">location.href="relationship.php";</script>';

if(isset($_POST['scholarity'])){


	if(insert_scholarity($link2, $id, $scholarity)) {

		echo $redirect_relationship_status;

	} else {
		$msg = mysqli_error($link2);

	}

}

?>



<?php 


$redirect_before_vote = '<script language="javascript">location.href="before-vote.php";</script>';

if(isset($_POST['relationship_status'])){


	if(insert_relationship_status($link2, $id, $relationship_status)) {

		echo $redirect_before_vote;

	} else {
		$msg = mysqli_error($link2);

	}

}

?>





