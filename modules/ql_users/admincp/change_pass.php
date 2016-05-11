<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div>
		<?php 
			@$thongbao = $_GET['msg'];
			if (isset($thongbao)){
		?>
		<span class="notification n-success"  style="width:43%"><?php echo $thongbao?></span>
		<?php }?>
	</div>
	<div class="module">
		<h2><span>Sửa danh mục tin</span></h2>
		<?php 
		//lay idCat tu URL
		$idUser = $_SESSION['iduser'];
		//lay thong tin danh muc tin co IdCat
		$queryUser = "SELECT * FROM users WHERE IdUser = $idUser LIMIT 1";
		$resultUser = mysql_query($queryUser);
		$user = mysql_fetch_assoc($resultUser);
		//khi nguoi dung nhan nut Sửa
		if (isset($_POST['submit'])){
			$passOld = $user['password'];
			$pass = $_POST['passold'];
			if($passOld == $pass){
				$passNew = $_POST['passnew'];
				//cap nhat lai du lieu
				$queryUserUpdate = "UPDATE users SET password = '$passNew' WHERE IdUser = $idUser";
				
				$resultUpdate = mysql_query($queryUserUpdate);
			
				if ($resultUpdate == true){ //update thanh công
					header("LOCATION: /www/tour/admincp/?module=ql_users&action=index_user&msg=Đổi mật khẩu thành công !");
				} else { //update ko thanh công
					echo "Có lỗi trong quá trình sửa. Vui lòng thử lại!";
				}
			}else{
				header("LOCATION: /www/tour/admincp/?module=ql_users&action=change_pass&msg=Mật khẩu chưa đúng");

			}
			
		}
		
		?>
		<div class="module-body">
			<form action="" method="post" id="frm-changepass">
				<?php 
					if(isset($thongbaoloi)){
				?>
				<div>
					<span class="notification n-success"><?php echo $thongbaoloi?></span>
				</div>
				<?php }?>
				<p>
					
					<label><strong>User name : <?php echo $_SESSION['username']?></strong></label>
				</p>
				<p>
					<label>Mật khẩu cũ</label>
					<input type="password" name="passold" value="" class="input-medium" required />
				</p>
				<p>
					<label>Mật khẩu mới</label>
					<input type="password" name="passnew" value="" class="input-medium" id="passnew" required />
				</p>
				<p>
					<label>Xác nhận mật khẩu</label>
					<input type="password" name="passcomfirm" value="" class="input-medium" id = "passcomfirm" required />
				</p>
				<fieldset>
					<input class="submit-green" type="submit" name="submit" value="Cập Nhật" /> 
					<input class="submit-gray" type="reset" value="Nhập lại" />
					<a href="/www/tour/admincp/?module=ql_users&action=index_user" style="text-decoration: none;">
						<input class="submit-green" type="button" name="back" value="Trở về" /> 
					</a>
				</fieldset>
			</form>
		</div>
		<!-- End .module-body -->
	</div>
	<!-- End .module -->
	<div style="clear:both;"></div>
</div>
<!-- End .grid_12 -->
<!-- comfirm passaword-->
<script>
	var password = document.getElementById("passnew")
	  , confirm_password = document.getElementById("passcomfirm");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Mật khẩu chưa khớp");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
