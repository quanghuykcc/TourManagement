
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';

$IdCat= $_GET['Id_CatTour'];
$querydel = "DELETE FROM category_tour WHERE category_tour.Id_CatTour = $IdCat";
$resultdel = mysql_query($querydel);

if ($resultdel ==true){
	header('Location: /www/tour/admincp/?module=ql_danhmuc_tour&action=index_cat_tour&msg=Xóa thành công.'); 
	exit();
} else {
	echo "<span>Có lỗi trong quá trình xóa</span>";
}
?>