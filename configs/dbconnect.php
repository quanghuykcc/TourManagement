<?php 
//kết nối mysql và php
$conn = mysql_connect('localhost:3306','root','root') or die('Không thể kết nối đến database');
//chọn tên cơ sở dữ liệu để làm việc
mysql_select_db('dulich');
//hiển thị tiếng việt
mysql_query("set names 'utf8'");  
//thực hiện lệnh select
?>