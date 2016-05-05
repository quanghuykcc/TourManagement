<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Sửa danh mục tin</span></h2>
		<?php 
		//lay idCat tu URL
		$idCat = $_GET['IdCat'];
		//lay thong tin danh muc tin co IdCat
		$queryCat = "SELECT * FROM category WHERE IdCat = {$idCat}";
		$resultCat = mysql_query($queryCat);
		$arCat = mysql_fetch_assoc($resultCat); 
		//lay ten cat
		$tenCat = $arCat['NameCat'];
		
		//khi nguoi dung nhan nut Sửa
		if (isset($_POST['submit'])){
			$tenCatMoi = $_POST['name'];
			//cap nhat lai du lieu
			$queryCatUpdate = "UPDATE category SET NameCat = '$tenCatMoi' WHERE IdCat = $idCat";
			
			$resultUpdate = mysql_query($queryCatUpdate);
		
			if ($resultUpdate == true){ //update thanh công
				header("LOCATION: /admincp/?module=ql_danhmuc_tintuc&action=index_cat_news&msg=Sửa danh mục thành công");
			} else { //update ko thanh công
				echo "Có lỗi trong quá trình sửa. Vui lòng thử lại!";
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
					<input type="text" name="name" value="<?php echo $tenCat?>" class="input-medium" required />
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

