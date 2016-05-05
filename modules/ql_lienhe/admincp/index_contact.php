<?php
			@$thongbao = $_GET['msg'];//Thông báo khi xóa
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
			
			$query = "SELECT * FROM contact ORDER BY IdContact DESC  
				LIMIT $batdau, $sodongtrenmottrang;
			";
			$result = mysql_query($query);
			?>
<div class="container_12">
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="clear"></div>
            </div>
            <div class="grid_12">
                <!-- Example table -->
                 <div>
					<?php 
						if (isset($thongbao)){
					?>
					<span class="notification n-success"><?php echo $thongbao?></span>
					<?php }?>
				</div>
                <div class="module">
                	<h2><span>Danh sách tin tức</span></h2>
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">STT</th>
                                    <th>Họ Tên</th>
                                    <th style="width:20%">Email</th>
                                    <th style="width:16%; text-align: center;">Số điện thoại</th>
                                    <th style="width:16%; text-align: center;">Nội dung</th>
                                    <th style="width:16%; text-align: center;">Thời gian gửi</th>
                                    <th style="width:11%; text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
									
									$result = mysql_query($query);
											$i=0;
											while ($arItem = mysql_fetch_assoc($result)) {
												$IdContact = $arItem['IdContact'];
												$FullName = $arItem['FullName'];
												$Email = $arItem['Email'];
												$Phone = $arItem['Phone'];
												$Content = $arItem['Content'];
												$DateCreate = $arItem['DateCreate'];
												$i++;
								?>
                                <tr>
                                    <td class="align-center"><?php echo $i ?></td>
                                    <td><a href=""><?php echo $FullName?></a></td>
                                    <td align="center"><?php echo $Email?></td>
                                    <td align="center"><?php echo $Phone?></td>
                                    <td align="center"><a href="/www/tour/admincp/?module=ql_lienhe&action=detail_contact&IdContact=<?php echo $IdContact ?>">Xem nội dung</a></td>
                                    <td align="center"><?php echo $DateCreate ?></td>
                                    <td align="center">
                                        <a href="/www/tour/admincp/?module=ql_lienhe&action=del_contact&IdContact=<?php echo $IdContact ?>" onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">Xóa <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        </form>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                     <div class="pagination">           
                        <div class="numbers">
                            <span>Page:</span> 
                            <?php
							for ($i = 0; $i<$sotrang; $i++){
								$titletrang = $i+1;
								$begin = $i * $sodongtrenmottrang; 
								//0*3| 1*3 | 2*3
							?>
                            <a class="current" href= "/www/tour/admincp?module=ql_lienhe&action=index_contact&begin=<?php echo $begin?>"><?php echo $titletrang?></a> 
                            <span>|</span> 
                            <?php }?>
                        </div> 
                        <div style="clear: both;"></div> 
                     </div>
                
			</div> <!-- End .grid_12 -->