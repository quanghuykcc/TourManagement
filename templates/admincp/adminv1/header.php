<?php 
//kiểm tra đăng nhập
    ob_start(); 
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/inc/kiemtradangnhap.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/autoload_admin.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Trang quản lý thông tin</title>
        <link rel="shortcut icon" href="/www/tour/files/iconn.png">
        <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_ADMIN_URL?>/css/styles.css" media="screen" />
        <script type="text/javascript" src="/www/tour/library/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo TEMPLATE_ADMIN_URL?>/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo TEMPLATE_ADMIN_URL?>/js/jquery.validate.min.js"></script>
		<!-- js datapicker -->
		<link href="<?php echo TEMPLATE_ADMIN_URL?>/js/datapicker/jquery-ui.css" rel="stylesheet">
      	<script src="<?php echo TEMPLATE_ADMIN_URL?>/js/datapicker/jquery-1.10.2.js"></script>
      	<script src="<?php echo TEMPLATE_ADMIN_URL?>/js/datapicker/jquery-ui.js"></script>
	</head>
	<!-- Chọn ngày tháng -->
	 <script>
         $(function() {
            $( "#datepicker" ).datepicker();
           
         });
	 </script>
	<body>
    	<!-- Header -->
        <div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_4">
                    	<ul class="user-pro">
							<li><a href="/www/tour/admincp/logout.php" onclick="return confirm('Bạn có chắc chắc muốn thoát không?')">Logout</a></li>
							<li>Chào<a href="">&nbsp;<?php echo $_SESSION['username']?></a></li>
                    	</ul>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <?php
                                    if(isset($_GET['current'])){
                                        if($_GET['current']=="qt"){
                                            $qt ="id='current'";
                                            $tk="";
                                        }else if($_GET['current']=="tk"){
                                            $qt ="";
                                            $tk="id='current'";
                                        }
                                       
                                    }else{
                                        $qt ="id='current'";
                                        $tk="";
                                    } 
                                ?>
                                <li <?php echo $qt ?>><a href="/www/tour/admincp?module=ql_tour&action=index_about&current=qt">Quản trị</a></li>
                                <li <?php echo $tk ?>><a href="/www/tour/admincp?module=ql_users&action=index_user&current=tk">Tài khoản</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 	-->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            <li><a href="/www/tour/admincp?module=ql_tour&action=index_tour">Tour</a></li>
                            <li><a href="/www/tour/admincp?module=ql_danhmuc_tour&action=index_cat_tour">Danh mục Tour</a></li>
                            <li><a href="/www/tour/admincp?module=ql_tintuc&action=index_news">Tin tức</a></li>
                            <li><a href="/www/tour/admincp?module=ql_danhmuc_tintuc&action=index_cat_news">Danh mục Tin</a></li>
                            <li><a href="/www/tour/admincp?module=ql_gioithieu&action=index_about">Giới thiệu</a></li>
                            <li><a href="/www/tour/admincp?module=ql_donhang&action=index_oder">Đơn hàng</a></li>
                            <li><a href="/www/tour/admincp?module=ql_lienhe&action=index_contact">Liên hệ</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        