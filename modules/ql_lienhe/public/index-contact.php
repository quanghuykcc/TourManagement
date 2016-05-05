<?php 
//lay du lieu khi nguoi dung submit
if (isset($_POST['submit'])){ 
	$hoten     = mysql_real_escape_string($_POST['hoten']);
	$email     = mysql_real_escape_string($_POST['email']);
	$dienthoai = mysql_real_escape_string($_POST['dienthoai']);
	$ngaytao  = date('Y-m-d H:i:s');
	$noidung   = mysql_real_escape_string($_POST['noidung']);
	//thêm dữ liệu vào db
	$query = "INSERT INTO contact VALUES(NULL,'$hoten','$email','$dienthoai','$noidung','$ngaytao')";
	$result = mysql_query($query);
	
}
?>
<div class="col-md-6 tour">
	<div class="panel panel-default">
		<div class="panel-heading">
			Liên Hệ 
		</div>
		<div class="panel-body">
			<div class="contact">
				<div class="row">
					<div class="col-md-12">
						<h4 class="contact-title">Liên hệ với chúng tôi</h4>
						<form class="cmxform" id="frmAdmin" method="post" action="#">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" name="hoten" class="form-control" placeholder="Họ và tên" required>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="number" name="email" class="form-control" placeholder="Số điện thoại" required>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
								<input type="text" name="dienthoai" class="form-control" placeholder="Email" required>
							</div>
							<textarea placeholder="Gõ nội dung liên hệ..."  name="noidung" class="form-control" rows="5" required></textarea>
							<div class="input-group">
								<input class="btn btn-success" type="submit" name="submit" value="Gửi liên hệ" />
								<input class="btn btn-info" type="reset" value="Nhập lại"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
