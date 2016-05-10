<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';

$IdCat= $_GET['IdCat'];
$querydel = "DELETE FROM category WHERE category.IdCat = $IdCat";

$resultdel = mysql_query($querydel);

if ($resultdel == true){
	header("LOCATION: /www/tour/admincp/?module=ql_danhmuc_tintuc&action=index_cat_news&msg=Xóa thành công"); exit();
} else {
		echo "<span>Có lỗi trong quá trình xóa</span>";
}
?>