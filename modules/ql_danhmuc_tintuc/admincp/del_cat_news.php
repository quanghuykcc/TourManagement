<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/inc/kiemtradangnhap.php';

$IdCat= $_GET['IdCat'];
$querydel = "DELETE category,news 
				FROM category INNER JOIN news ON category.IdCat = news.idCat WHERE category.IdCat = $IdCat";
$resultdel = mysql_query($querydel);

if ($resultdel == true){
	header("LOCATION: /admincp/?module=ql_danhmuc_tintuc&action=index_cat_news"); exit();
} else {
	echo "<span>Có lỗi trong quá trình xóa</span>";
}
?>