<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Sửa tin tức</span></h2>
		<div class="module-body">
			<?php
			$IdNews = $_REQUEST['idNews'];
			//lay du lieu có id
			$query = "
				SELECT * FROM news WHERE IdNews = $IdNews;
			";
			$result	 		= mysql_query($query);
			$arrtin 		= mysql_fetch_assoc($result);
			$IdNews 		= $arrtin['IdNews'];
			$Name 			= $arrtin['Name'];
			$Description	= $arrtin['Description'];
			$Detail 		= $arrtin['Detail'];
			$Picture 		= $arrtin['Picture'];
			$DateCreate		= $arrtin['DateCreate'];
			$IdCat			= $arrtin['IdCat'];
			$CreateBy		= $arrtin['CreateBy'];
			
			//update db
			if (isset($_POST['submit'])){
			//lay du lieu tu form theo name
				$NameUp 			= mysql_real_escape_string($_POST['TieuDeTin']);
				$DescriptionUp  	= mysql_real_escape_string($_POST['MoTa']);
				$DetailUp  			= $_POST['ChiTiet'];
				$DateCreateUp		= date('Y-m-d');
				$IdCatf				= mysql_real_escape_string($_POST['DanhMuc']);
				$CreateByUp			=	"admin";
				//lay du lieu file
				$filename = $_FILES['HinhBia']['tmp_name'];
				
				if ($filename != ''){
					//tao ten file moi			
					$time = time();	
					$phanmorong = end(explode(".", strtolower( $_FILES['HinhBia']['name'])));
					$ten_file = "file_$time.$phanmorong";
					//thuc hien update
					$queryUp = "
						UPDATE 
							news 
						SET 
							Name 		= '$NameUp',
							Description = '$DescriptionUp',
							Detail 		= '$DetailUp',
							Picture 	= '$ten_file',
							DateCreate  = '$DateCreateUp',
							IdCat 		= '$IdCatf',
							CreateBy	= '$CreateByUp'
							
						WHERE
							IdNews 		= $IdNews
					";
				} else {
					$queryUp = "
						UPDATE 
							news 
						SET 
							Name 		= '$NameUp',
							Description = '$DescriptionUp',
							Detail 		= '$DetailUp',
							DateCreate  = '$DateCreateUp',
							IdCat		= '$IdCatf',
							CreateBy	= '$CreateByUp'
						WHERE
							IdNews 		= $IdNews
							";
				}
				$result = mysql_query($queryUp);
				if ($result == true){
					if ($filename != ''){
						//upload file len host
						$destination = $_SERVER['DOCUMENT_ROOT']."/www/tour/files/".$ten_file;
						$ketquaUpload = move_uploaded_file($filename, $destination);
					}
					header("LOCATION: /www/tour/admincp/?module=ql_tintuc&action=index_news&msg=Sửa thành công.");
					exit();
				} else {
					echo $baoloi = 'Có lỗi trong quá trình sửa. Vui lòng thử lại!';
				}
			}
			?>
			<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
				<?php if (isset($baoloi)){?>
				<div>
					<span class="notification n-error"><?php echo $baoloi?></span>
				</div>
				<?php }?>
				<p>
					<label>Tên</label>
					<input type="text" class="input-medium" value="<?php echo $Name?>"  name="TieuDeTin" required />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea rows="7" cols="90" name="MoTa" class="input-medium"><?php echo $Description?></textarea>
				</p>
				<p>
					<label>Danh mục tin</label>
					<select name="DanhMuc" class="input-short" >
						<option value="">-------Chọn danh mục--------</option>
						<?php
						$querycat = "SELECT * FROM category"; 
						$resultcat = mysql_query($querycat);
						while ($arcat = mysql_fetch_assoc($resultcat)){
										$IdCat = $arcat['IdCat'];
										$NameCat= $arcat['NameCat'];
						 ?>
						<option value="<?php echo $IdCat ?>" selected="selected"><?php echo $NameCat ?></option>
						<?php }?>
					</select>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea class="ckeditor" name="ChiTiet" required><?php echo $Detail ?></textarea>
				</p>
				<p>
					<label>Hình ảnh</label>
					<img alt="" src="/files/<?php echo $Picture?>" width="100px" /><br /><br />
					<input type="file" value="" name="HinhBia" />
				</p>
				<fieldset>
					<input class="submit-green" name="submit" type="submit" value="Sửa tin" /> 
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

