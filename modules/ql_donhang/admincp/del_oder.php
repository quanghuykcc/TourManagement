<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';
$IdOder= $_GET['IdOder'];
$querydel = "DELETE FROM `dulich`.`dattour` WHERE `dattour`.`IdDatTour` = $IdOder";
$resultdel = mysql_query($querydel);

if ($resultdel == true){
	header("LOCATION: /www/tour/admincp/?module=ql_donhang&action=index_oder&msg=Xóa thành công"); exit();
} else {
	echo "<span>Có lỗi trong quá trình xóa</span>";
}
?>