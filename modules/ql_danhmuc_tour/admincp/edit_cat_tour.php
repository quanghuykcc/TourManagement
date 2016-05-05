<div class="container_12">
<!-- Form elements -->    
<div class="grid_12">
	<div class="module">
		<h2><span>Sửa danh mục tour</span></h2>
		<?php 
		//lay idCat tu URL
		$idCat = $_GET['Id_CatTour'];
		//lay thong tin danh muc tin co IdCat
		$queryCat = "SELECT * FROM category_tour WHERE Id_CatTour = {$idCat}";
		$resultCat = mysql_query($queryCat);
		$arCat = mysql_fetch_assoc($resultCat); 
		//lay ten cat
		$tenCat = $arCat['CatTour'];
		
		//khi nguoi dung nhan nut Sửa	
		if (isset($_POST['submit'])){
			$tenCatMoi = $_POST['name'];
			//cap nhat lai du lieu
			$queryCatUpdate = "UPDATE category_tour SET CatTour = '$tenCatMoi' WHERE Id_CatTour = $idCat";
			
			$resultUpdate = mysql_query($queryCatUpdate);
		
			if ($resultUpdate == true){ //update thanh công
				header("LOCATION: /www/tour/admincp/?module=ql_danhmuc_tour&action=index_cat_tour&msg=Sửa danh mục thành công");
			} else { //update ko thanh công
				echo "Có lỗi trong quá trình sửa. Vui lòng thử lại!";
			}
		}
		
		?>
		<div class="module-body">
			<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
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

