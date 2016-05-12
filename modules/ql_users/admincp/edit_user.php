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
			$pass = $_POST['password'];
			if($passOld == $pass){
				$fullname = $_POST['fullname'];
				$address = $_POST['address'];
				$phone = $_POST['phone'];
				//cap nhat lai du lieu
				$queryUserUpdate = "UPDATE users SET FullName = '$fullname', Address = '$address', Phone = '$phone' WHERE IdUser = $idUser";
				
				$resultUpdate = mysql_query($queryUserUpdate);
			
				if ($resultUpdate == true){ //update thanh công
					header("LOCATION: /www/tour/admincp/?module=ql_users&action=index_user&current=tk&msg=Cập nhật thông tin thành công");
				} else { //update ko thanh công
					echo "Có lỗi trong quá trình sửa. Vui lòng thử lại!";
				}
			}else{
				header("LOCATION: /www/tour/admincp/?module=ql_users&action=edit_user&current=tk&msg=Mật khẩu chưa đúng");

			}
			
		}
		
		?>
		<div class="module-body">
			<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
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
					<label>Fullname</label>
					<input type="text" name="fullname" value="<?php echo $user['FullName']?>" class="input-medium" required />
				</p>
				<p>
					<label>Address</label>
					<input type="text" name="address" value="<?php echo $user['Address']?>" class="input-medium" required />
				</p>
				<p>
					<label>Phone</label>
					<input type="text" name="phone" value="<?php echo $user['Phone']?>" class="input-medium" required />
				</p>
				<p>
					<label>Password</label>
					<input type="password" name="password" value="" class="input-medium" required />
				</p>
				<fieldset>
					<input class="submit-green" type="submit" name="submit" value="Cập Nhật" /> 
					<a href="/www/tour/admincp/?module=ql_users&action=index_user&current=tk"  style="text-decoration: none;">
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

