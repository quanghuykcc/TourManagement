<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';

$IdCat= $_GET['Id_CatTour'];
$querydel = "DELETE category_tour,tour 
				FROM category_tour INNER JOIN tour ON category_tour.Id_CatTour = tour.Id_CatTour  WHERE category_tour.Id_CatTour = {$IdCat}";
$resultdel = mysql_query($querydel);

if ($resultdel == true){
	header("LOCATION: /www/tour/admincp/?module=ql_danhmuc_tour&action=index_cat_tour"); exit();
} else {
	echo "<span>Có lỗi trong quá trình xóa</span>";
}
?>