<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/www/tour/autoload_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Login Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
    	
      <div class="modal-body">
      		 <?php 
				if (isset($_POST['submit'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$query =  " SELECT * FROM users WHERE (username = '$username') AND (password = '$password' AND level='1' ) LIMIT 1";
					$result = mysql_query($query);
					$arUser = mysql_fetch_assoc($result);
					$username = $arUser['username'];
					$level=$arUser['level'];
					if ($arUser != false){ //dang nhap dung
						//tạo session user
						 $_SESSION['username']=$username;
            			 $_SESSION['level']=$level;
						header("LOCATION: /www/tour/admincp/index.php");
					} else {
						$baoloi ='Sai tài khoản hoặc mật khẩu !!!!';
					}
					
				}
			?>
          <form method="post" class="form col-md-12 center-block">
          	<h1>Login</h1>
          	<?php 
			if (isset($baoloi)){?>
          	<div class="alert alert-danger" role="alert"><?php echo $baoloi?></div>
          	<?php }?>
          	 <div class="form-group">
              <input type="text" name="username" class="form-control input-lg" placeholder="username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
                 <button type="submit" name="submit" value="Đăng Nhập" class="btn btn-danger">Đăng Nhập</button>
              <span class="pull-right"><a href="#">Đăng Ký</a></span><span><a href=	"#">Giúp đỡ?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>