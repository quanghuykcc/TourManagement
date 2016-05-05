<?php
$idNdtt = $_POST['id'];
$query="SELECT * FROM thanhtoan WHERE IdThanhToan='$idNdtt'";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
$ndtt = $row['NoiDung'];
?>