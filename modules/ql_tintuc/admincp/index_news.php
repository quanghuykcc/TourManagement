<div class="container_12">
<div class="bottom-spacing">
	<!-- Button -->
	<div class="float-left">
		<a href="/www/tour/admincp?module=ql_tintuc&action=add_news" class="button">
		<span>Thêm tin mới <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/plus-small.gif" alt="Thêm tin mới"></span>
		</a>
	</div>
	<div class="clear"></div>
</div>
<div class="grid_12">
	<!-- Example table -->
	<div class="module">
		<?php
			//thuat toan phan trang
			$tongsodong = 5;
			$sodongtrenmottrang = 5;
			$begin = 0;
			
			$query = "
				SELECT count(IdNews) AS tongsodong FROM news
			";
			$result = mysql_query($query);
			$arTongSoDong = mysql_fetch_assoc($result);
			$tongsodong = $arTongSoDong['tongsodong'];
			//tinh so trang
			$sotrang = round($tongsodong/$sodongtrenmottrang, 0 , PHP_ROUND_HALF_UP);
			
			//lay du lieu tu bang 
			if (isset($_REQUEST['begin'])){
				$batdau = $_REQUEST['begin'];
			} else {
				$batdau = 0;
			}
			
			$query = "
				SELECT * FROM news INNER JOIN category ON news.IdCat = category.IdCat ORDER BY IdNews DESC 
				LIMIT $batdau, $sodongtrenmottrang;
			";
			$result = mysql_query($query);
			?>
		<h2><span>Danh sách tin tức</span></h2>
		<div class="module-table-body">
				<div>
					<?php 
						@$thongbao = $_GET['msg'];
						if (isset($thongbao)){
					?>
					<span class="notification n-success"><?php echo $thongbao?></span>
					<?php }?>
				</div>
			<form action="">
				<table id="myTable" class="tablesorter">
					<thead>
						<tr>
							<th style="width:4%; text-align: center;">STT</th>
							<th style="width:20%">Tên tin</th>
							<th style="width:20%">Ngày Tạo</th>
							<th style="width:16%; text-align: center;">Danh Mục</th>
							<th style="width:16%">Người tạo</th>
							<th style="width:11%; text-align: center;">Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$stt=0;
							while ($arItemCat = mysql_fetch_assoc($result)) {
								$stt++;
								$IdNews = $arItemCat['IdNews'];
								$Name = $arItemCat['Name'];
								$Description =  $arItemCat['Description'];
								$DeTail = $arItemCat['Detail'];
								$Picture = $arItemCat['Picture'];
								$DateCreate = $arItemCat['DateCreate'];
								$IdCat = $arItemCat['IdCat'];
							    $TenDM = $arItemCat['NameCat'];
								$CreateBy = 'admin';
							?>
						<tr>
							<td class="align-center"><?php echo $stt?></td>
							<td><a href="/www/tour/admincp?module=ql_tintuc&action=edit_news&idNews=<?php echo $IdNews?>"><?php echo $Name ?></a></td>
							<td><?php echo $DateCreate?></td>
							<td><?php echo $TenDM?></td>
							<td align="center"><a href="/www/tour/admincp?module=ql_tintuc&action=edit_news&idNews=<?php echo $IdNews?>" ></a><img src="/files/<?php echo $Picture?>" class="hoa" /></a></td>
							<td align="center">
								<a href="/www/tour/admincp?module=ql_tintuc&action=edit_news&idNews=<?php echo $IdNews?>">Sửa <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/pencil.gif" alt="edit" /></a>
								<a href="/www/tour/admincp?module=ql_tintuc&action=del_news&idNews=<?php echo $IdNews?>" title="" onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">Xóa
								<img src="<?php echo TEMPLATE_ADMIN_URL?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</form>
		</div>
		<!-- End .module-table-body -->
	</div>
	<!-- End .module -->
	<div class="pagination">
		<div class="numbers">
			<span>Page:</span> 
			<?php
				for ($i = 0; $i<$sotrang; $i++){
					$titletrang = $i+1;
					$begin = $i * $sodongtrenmottrang; 
					//0*3| 1*3 | 2*3
				?>
			<a class="current" href= "/www/tour/admincp?module=ql_tintuc&action=index_news&begin=<?php echo $begin?>"><?php echo $titletrang?></a> 
			<span>|</span> 
			<?php }?>
		</div>
		<div style="clear: both;"></div>
	</div>
</div>
<!-- End .grid_12 -->

