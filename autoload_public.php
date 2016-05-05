<?php
// định nghĩa đường dẫn đến thư mục gốc cửa web
define('ROOT_PATH', $_SERVER ['DOCUMENT_ROOT']);
//định nghĩa đến giao diện public
define('PUBLIC_TEMPLATE_PATH',ROOT_PATH . '/www/tour/templates/public/tour');
//include dbconnect
include_once ROOT_PATH . '/www/tour/configs/dbconnect.php';
//url đến template public
define('TEMPLATE_PUBLIC_URL', '/www/tour/templates/public/tour');
?>