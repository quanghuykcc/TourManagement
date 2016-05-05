<div class="container_12">
<div class="bottom-spacing">
	<!-- Button -->
	<div class="float-left">
		<a href="/admincp?module=ql_danhmuc_tintuc&action=add_cat_news" class="button">
		<span>Tạo danh mục<img src="<?php echo TEMPLATE_ADMIN_URL?>/images/plus-small.gif" alt="Thêm tin mới"></span>
		</a>
	</div>
	<div class="clear"></div>
</div>
<div class="grid_12">
	<!-- Example table -->
	<div>
		<?php 
			@$thongbao = $_GET['msg'];
			if (isset($thongbao)){
		?>
		<span class="notification n-success"  style="width:43%"><?php echo $thongbao?></span>
		<?php }?>
	</div>
	<div class="module">
		<h2 style="width:50%"><span>Danh mục tin tức</span></h2>
		<div class="module-table-body">
				<table id="myTable" class="tablesorter"  style="width:50%">
					<thead>
						<tr>
							<th style="width:10%; text-align: center;">ID</th>
							<th >Tên danh mục</th>
							<th >Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$querycat = "SELECT * FROM category ORDER BY IdCat DESC";
							$resultcat = mysql_query($querycat);
							$i=0;
							while ($arItemCat = mysql_fetch_assoc($resultcat)) {
								$idCat = $arItemCat['IdCat'];
								$name = $arItemCat['NameCat'];
								$i++;
							
						?>
						<tr>
							<td  class="align-center"><?php echo $i ?></td>
							<td><a href=""><?php echo $name?></a></td>
						
							 <td align="center">
									<a href="/admincp?module=ql_danhmuc_tintuc&action=edit_cat_news&IdCat=<?php echo $idCat?>" title="">Sửa <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/pencil.gif" alt="edit" /></a>
	                                <a href="/admincp?module=ql_danhmuc_tintuc&action=del_cat_news&IdCat=<?php echo $idCat?>" title="" onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">Xóa
	                         </td>
                        </tr>
						<?php }?>
					</tbody>
				</table>
		</div>
		<!-- End .module-table-body -->
	</div>
	<!-- End .module -->
</div>
<!-- End .grid_12 -->

