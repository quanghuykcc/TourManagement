<?php
$IdContact = $_GET['IdContact'];
$query = "DELETE FROM contact WHERE IdContact = $IdContact";
$result = mysql_query($query);

if ($result == true){
	header("LOCATION: /www/tour/admincp/?module=ql_lienhe&action=index_contact&msg=Xóa thành công"); exit();
} else {
	echo 'Có lỗi trong quá trình xóa';
}
?>
