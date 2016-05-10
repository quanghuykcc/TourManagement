<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Thêm tour</span></h2>
		<div class="module-body">
			<?php 
					if (isset($_POST['submit'])){
							//lay du lieu file
							$filename = $_FILES['HinhBia']['tmp_name'];
							//tao ten file moi			
							$time = time();	
							$phanmorong = end(explode(".", strtolower( $_FILES['HinhBia']['name'])));
							$ten_file 	= "file_$time.$phanmorong";
							
							$TenTour 		    = mysql_real_escape_string($_POST['TenTour']);
							$LichKhoiHanh 	    = date("Y/m/d", strtotime($LichKhoiHanh));
							$ThoiGian 			= mysql_real_escape_string($_POST['ThoiGian']);
							$PhuongTien 		= mysql_real_escape_string($_POST['PhuongTien']);
							$GiaTour 			= mysql_real_escape_string($_POST['GiaTour']);
							$MoTa 				= mysql_real_escape_string($_POST['MoTa']);
							$ChiTiet 			= $_POST['ChiTiet'];
							$HinhBia			= $ten_file;
							$NgayTao 			= date('d-m-y');
							$LoaiTour 			= mysql_real_escape_string($_POST['LoaiTour']);
							$queryinsert = 
								"INSERT INTO tour(NameTour, Departure, Time, Means, Price, Description, Detail, Picture, Datecreat, Id_CatTour) VALUES ('','$TenTour','$LichKhoiHanh','$ThoiGian','$PhuongTien','$GiaTour','$MoTa','$ChiTiet','$HinhBia','$NgayTao','$LoaiTour')";
								$result = mysql_query($queryinsert);
								if ($result == true){
									//upload file len host
									if ($HinhBia != "") {
										$filename = $_FILES['HinhBia']['tmp_name'];
										$destination = $_SERVER['DOCUMENT_ROOT']."/www/tour/files/".$ten_file;
										$ketquaUpload = move_uploaded_file($filename, $destination);
									}						
									header("LOCATION: /www/tour/admincp?module=ql_tour&action=index_tour&msg=Thêm thành công");
								} else {
									echo $baoloi = 'Có lỗi trong quá trình thêm dữ liệu!';
								}
					}
			?>
			<form action="#" method="post" enctype="multipart/form-data" id="frmAdmin">
				<div>
					<?php 
					if (isset($baoloi)){?>
					<span class="notification n-error"><?php echo $baoloi?></span>
					<?php }?>
				</div>
				<p>
					<label>Tên Tour</label>
					<input type="text" class="input-medium" name="TenTour" required />
				</p>
				<p>
					<label>Khởi Hành</label>
					<input id="datepicker" type="text" value="" class="input-medium" name="LichKhoiHanh" required />
				</p>
				
				<p>
					<label>Thời Gian</label>
					<input type="text" class="input-medium" name="ThoiGian" required />
				</p>
				<p>
					<label>Phương Tiện</label>
					<select class="input-short" name="PhuongTien">
						<?php
							$means = mysql_query("SELECT * FROM means");
							while($row = mysql_fetch_assoc($means)) {
						?>
							<option value=<?php echo $row['MeansId']?>><?php echo $row['MeansName']?></option>
						<?php 
							}
						?>
					</select>
				</p>
				<p>
					<label>Giá tour trọn gói</label>
					<input type="number" class="input-medium" name="GiaTour" required />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea rows="7" cols="90" class="input-medium" name="MoTa" required></textarea>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea class="ckeditor" name="ChiTiet" required></textarea>
				</p>
				<p>
					<label>Hình ảnh</label>
					<input type="file" value="" name="HinhBia" />
				</p>
				
				<p>
					<label>Loại Tour</label>
					<select  class="input-short" name="LoaiTour">
					<option value="" selected="selected">-------Chọn danh mục--------</option>
						<!-- Xử lý danh mục chọn -->
						
						<?php 
							$querycat = "SELECT * FROM category_tour"; 
							$resultcat = mysql_query($querycat);
							while ($row1 = mysql_fetch_assoc($resultcat)){
							$IdCat = $row1['Id_CatTour'];
							$NameCat= $row1['CatTour'];
						?>
						<option value=<?php echo $IdCat?>><?php echo $NameCat?></option>
						<?php }?>
						
					</select>
				</p>
				
				<fieldset>
					<input class="submit-green" type="submit" name="submit" value="Thêm tin" /> 
					<input class="submit-gray" type="button" value="Nhập lại" />
				</fieldset>
			</form>
		</div>
		<!-- End .module-body -->
	</div>
	<!-- End .module -->
	<div style="clear:both;"></div>
</div>
<!-- End .grid_12 -->