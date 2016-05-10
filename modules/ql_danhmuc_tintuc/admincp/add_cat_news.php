

<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Thêm tin tức</span></h2>
			<?php 
			//khi nguoi dung nhan nut Thêm
			if (isset($_POST['submit'])){
				$Name = mysql_real_escape_string($_POST['name']);
				//cap nhat lai du lieu
				$queryCat = "INSERT INTO category VALUES(NULL,'$Name')";
				$result = mysql_query($queryCat);
				if ($result == true){ //update thanh công
					header("LOCATION: /www/tour/admincp/?module=ql_danhmuc_tintuc&action=index_cat_news&msg=Thêm thành công.");
				} else { //update ko thanh công
					echo $thongbaoloi = "Có lỗi trong quá trình thêm. Vui lòng thử lại!";	
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
					<label>Thêm tin</label>
					<input type="text" name="name" class="input-medium" required />
				</p>
				<fieldset>
					<input class="submit-green" type="submit" name="submit" value="Thêm tin" /> 
					<input class="submit-gray" type="submit" value="Nhập lại" />
				</fieldset>
			</form>
		</div>
		<!-- End .module-body -->
	</div>
	<!-- End .module -->
	<div style="clear:both;"></div>
</div>
<!-- End .grid_12 -->

