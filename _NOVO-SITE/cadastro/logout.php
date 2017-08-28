<?php
if(!session_id()) {
	session_start();
}
unset($_SESSION['facebook_access_token']);
session_destroy();
header('Location: index.php');
?>