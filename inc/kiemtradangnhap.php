<?php 
//kiem tra co phai la admin khong
if (!isset($_SESSION['username'])){
	header("LOCATION: /www/tour/admincp/login.php");
	exit();
}
?>