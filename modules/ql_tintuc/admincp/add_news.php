

<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Thêm tin tức</span></h2>
		<div class="module-body">
			<?php 
				$querynews = "SELECT * FROM news";
				$resultnews = mysql_query($querynews);
					if (isset($_POST['submit'])){
							//lay du lieu file
							$filename = $_FILES['HinhBia']['tmp_name'];
							//tao ten file moi			
							$time = time();	
							$phanmorong = end(explode(".", strtolower( $_FILES['HinhBia']['name'])));
							$ten_file 	= "file_$time.$phanmorong";
							$TieuDeTin  = mysql_real_escape_string($_POST['TieuDeTin']);
							$MoTa 		= mysql_real_escape_string($_POST['MoTa']);
							$DanhMuc 	= mysql_real_escape_string($_POST['DanhMuc']);
							$ChiTiet 	= mysql_real_escape_string($_POST['ChiTiet']);
							$HinhBia	= $ten_file;
							$TaoBoi		='admin';
							$NgayTao 	= date('Y-m-d');
							$queryinsert = " INSERT INTO News VALUES(NULL,'$TieuDeTin','$MoTa','$ChiTiet','$HinhBia','$NgayTao','$DanhMuc','$TaoBoi')";
							
							$result = mysql_query($queryinsert);
								if ($result == true){
									//upload file len host
									$filename = $_FILES['HinhBia']['tmp_name'];
									
									$destination = $_SERVER['DOCUMENT_ROOT']."/www/tour/files/".$ten_file;
									$ketquaUpload = move_uploaded_file($filename, $destination);
									header("LOCATION: /www/tour/admincp?module=ql_tintuc&action=index_news&msg=Thêm thành công.");
								} else {
									echo $baoloi = 'Có lỗi trong quá trình thêm dữ liệu!';
								}
								
							}
							?>
			<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
				<div>
					<?php 
					if (isset($baoloi)){?>
					<span class="notification n-error"><?php echo $baoloi?></span>
					<?php }?>
				</div>
				<p>
					<label>Thêm tin</label>
					<input type="text" class="input-medium"  name="TieuDeTin" required />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea rows="7" cols="90" name="MoTa" class="input-medium" required></textarea>
				</p>
				<p>
					<label>Danh mục tin</label>
					<select name="DanhMuc" class="input-short" >
						<option value="">-------Chọn danh mục--------</option>
						<?php 
							$querycat = "SELECT * FROM category"; 
							$resultcat = mysql_query($querycat);
							while ($row1 = mysql_fetch_assoc($resultcat)){
							$IdCat = $row1['IdCat'];
							$NameCat= $row1['NameCat'];
						?>
						<option selected="selected" value="<?php echo $IdCat ?>"><?php echo $NameCat ?></option>
						<?php }?>
					</select>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea class="ckeditor" name="ChiTiet" id="editor1" required></textarea>
				</p>
				<p>
					<label>Hình ảnh</label>
					<input type="file" value="" name="HinhBia" />
				</p>
				<fieldset>
					<input class="submit-green" name="submit" type="submit" value="Thêm tin" /> 
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

