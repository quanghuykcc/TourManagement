<?php
// định nghĩa đường dẫn đến thư mục gốc cửa web
define('ROOT_PATH', $_SERVER ['DOCUMENT_ROOT']);
//định nghĩa đến giao diện admin
define('ADMIN_TEMPLATE_PATH',ROOT_PATH . '/www/tour/templates/admincp/adminv1');
//include dbconnect
include_once ROOT_PATH . '/www/tour/configs/dbconnect.php';
//url đến template admin
define('TEMPLATE_ADMIN_URL', '/www/tour/templates/admincp/adminv1');
?>