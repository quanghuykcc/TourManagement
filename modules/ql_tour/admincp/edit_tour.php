<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Thêm tour</span></h2>
		<div class="module-body">
			<?php
			$IdTour = $_REQUEST['IdTour'];
			//lay du lieu có id
			$query = "
				SELECT * FROM tour WHERE IdTour = $IdTour;
			";
			$result	 		= mysql_query($query);
			$artour 		= mysql_fetch_assoc($result);
			//update db
			if (isset($_POST['submit'])){
				//lay du lieu file
				$filename = $_FILES['HinhBia']['tmp_name'];
				//tao ten file moi			
				$time = time();	
				$phanmorong = end(explode(".", strtolower( $_FILES['HinhBia']['name'])));
				$ten_file 	= "file_$time.$phanmorong";
				
				
				//lay du lieu tu form theo name
				$TenTour 		    = mysql_real_escape_string($_POST['TenTour']);
				$LichKhoiHanh 		= date("Y/m/d", strtotime($LichKhoiHanh));
				$ThoiGian 			= mysql_real_escape_string($_POST['ThoiGian']);
				$PhuongTien 		= mysql_real_escape_string($_POST['PhuongTien']);
				$GiaTour 			= mysql_real_escape_string($_POST['GiaTour']);
				$MoTa 				= mysql_real_escape_string($_POST['MoTa']);
				$ChiTiet 			= $_POST['ChiTiet'];
				$HinhBia			= $ten_file;
				$NgayTao 			= date('d-m-y');
				$LoaiTour 			= mysql_real_escape_string($_POST['LoaiTour']);
				//lay du lieu file
				
				if ($filename != ''){
					//tao ten file moi			
					$time = time();	
					$phanmorong = end(explode(".", strtolower( $_FILES['HinhBia']['name'])));
					$ten_file = "file_$time.$phanmorong";
					//thuc hien update
					$queryUp = "
						UPDATE 
							tour 
						SET 	  	 
							NameTour 			= '$TenTour',
							Departure 			= '$LichKhoiHanh',
							Time 				= '$ThoiGian',
							Means 				= '$PhuongTien',
							Price 				= '$GiaTour',
							Description			= '$MoTa',
							Detail 				= '$ChiTiet',
							Picture 			= '$ten_file',	
							Datecreat			= '$NgayTao',
							Id_CatTour 			= '$LoaiTour'
							
						WHERE
							IdTour 		= $IdTour
					";
				} else {
					$queryUp = "
						UPDATE 
							tour 
						SET 	  	 
							NameTour 			= '$TenTour',
							Departure 			= '$LichKhoiHanh',
							Time 				= '$ThoiGian',
							Means 				= '$PhuongTien',
							Price 				= '$GiaTour',
							Description			= '$MoTa',
							Detail 				= '$ChiTiet',
							Datecreat			= '$NgayTao',
							Id_CatTour 			= '$LoaiTour'
							
						WHERE
							IdTour 		= $IdTour
					";
				}
				$result = mysql_query($queryUp);
				if ($result == true){
					if ($filename != ''){
						//upload file len host
						$destination = $_SERVER['DOCUMENT_ROOT']."/www/tour/files/".$ten_file;
						$ketquaUpload = move_uploaded_file($filename, $destination);
					}
					header("LOCATION: /www/tour/admincp/?module=ql_tour&action=index_tour&msg=Sửa thành công.");
					exit();
				} else {
					echo $baoloi = 'Có lỗi trong quá trình sửa. Vui lòng thử lại!';
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
					<input type="text" class="input-medium" value="<?php echo $artour['NameTour']?>" name="TenTour" required />
				</p>
				
				<p>
					<label>Lịch Khởi Hành</label>
					<input id="datepicker" type="text" class="input-medium" value="<?php echo $artour['Departure'] ?>" name="LichKhoiHanh" required />
				</p>
				<p>
					<label>Thời Gian</label>
					<input type="text" id="datapicker" value="<?php echo $artour['Time']?>" class="input-medium" name="ThoiGian" required />
				</p>
				<p>
					<label>Phương Tiện</label>
					<select class="input-short" name="PhuongTien">
						<?php
							$means = mysql_query("SELECT * FROM means");
							while($row = mysql_fetch_assoc($means)) {
								if ($artour['Means'] == $row['MeansId']) {
						?>
							<option value=<?php echo $row['MeansId']?> selected><?php echo $row['MeansName']?></option>
						<?php 
							}
							else {
						?>
							<option value=<?php echo $row['MeansId']?>><?php echo $row['MeansName']?></option>
						<?php 
							}
						}
						?>	


					</select>
				</p>
				<p>
					<label>Giá tour trọn gói</label>
					<?php 
						 $Gia =  $artour['Price'];
						 $dongiaformat = number_format($Gia,0,',','.');
					?>
					<input type="text" value="<?php echo $dongiaformat ?>" class="input-medium" name="GiaTour" required />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea rows="7" cols="90" class="input-medium" name="MoTa" required>
						<?php echo $artour['Description']?>
					</textarea>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea class="ckeditor" name="ChiTiet" required>
						<?php echo $artour['Detail']?>
					</textarea>
				</p>
				<img alt="" src="/files/<?php echo $artour['Picture']?>" width="100px" /><br /><br />
				<p>
					<label>Hình ảnh</label>
					<input type="file" value="" name="HinhBia" />
				</p>
				<p>
					<label>Loại Tour</label>
					<select class="input-short" name="LoaiTour">
						<option>-Chọn loại tour-</option>
						<?php 
						
							$querycat = "SELECT * FROM category_tour"; 
							$resultcat = mysql_query($querycat);
							while ($row1 = mysql_fetch_assoc($resultcat)){
							$IdCat = $row1['Id_CatTour'];
							$NameCat= $row1['CatTour'];
							//Kiểm tra nếu id danh mục bằng id danh mục của id hiện tại 
							if ($IdCat == $artour['Id_CatTour']){
								  $strSelect = ' selected="selected" ';
                                       }else{
                                          $strSelect = null;
							}
						?>
						<option value="<?php echo $IdCat ?>" <?php echo $strSelect?>><?php echo $NameCat?></option>
						<?php }?>
					</select>
				</p>
				<fieldset>
					<input class="submit-green" type="submit" name="submit" value="Cập Nhật" /> 
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