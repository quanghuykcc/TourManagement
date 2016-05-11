<?php
session_start();
if (isset($_SESSION['username'])){
	unset($_SESSION['username']); //xoa session nguoi dung
	unset($_SESSION['level']);
	header('LOCATION: /www/tour/admincp/login.php');
exit();
}
?>
