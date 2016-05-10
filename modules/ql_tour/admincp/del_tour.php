<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';

$idTour = $_REQUEST['IdTour'];
$query = "DELETE FROM tour WHERE IdTour = $idTour";
$result = mysql_query($query);

if ($result == true){
	header("LOCATION: /www/tour/admincp/?module=ql_tour&action=index_tour&msg=Xóa thành công"); exit();
} else {
	 echo $thongbaoloi = "Có lỗi trong quá trình xóa";
}
?>
<div>
    <span class="notification n-success"><?php echo $thongbaoloi ?></span>
</div>