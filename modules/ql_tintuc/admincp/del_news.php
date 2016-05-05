<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';

$IdNews = $_REQUEST['idNews'];
$query = "DELETE FROM news WHERE IdNews = $IdNews";
$result = mysql_query($query);

if ($result == true){
	header("LOCATION: /www/tour/admincp/?module=ql_tintuc&action=index_news"); exit();
} else {
	 echo $thongbaoloi = "Có lỗi trong quá trình xóa";
}
?>
<div>
    <span class="notification n-success"><?php echo $thongbaoloi ?></span>
</div>