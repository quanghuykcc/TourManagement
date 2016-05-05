	<div class="container_12">
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="float-left">
                      <a href="/www/tour/admincp/?module=ql_tour&action=add_tour" class="button">
                      	<span>Thêm tour mới <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/plus-small.gif" alt="Thêm tin mới"></span>
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
					$sodongtrenmottrang = 4;
					$begin = 0;
					
					$query = "
						SELECT count(IdTour) AS tongsodong FROM tour
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
					$querytour = "SELECT * FROM tour INNER JOIN category_tour ON tour.Id_CatTour = category_tour.Id_CatTour ORDER BY IdTour DESC
					LIMIT $batdau, $sodongtrenmottrang";
					$resulttour = mysql_query($querytour);
					?>
                	<h2><span>Danh sách tour</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
                    	<div>
							<?php 
							@$thongbao = $_GET['msg'];
							if (isset($thongbao)){
							?>
							<span class="notification n-success"><?php echo $thongbao?></span>
							<?php }?>
						</div>
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%; text-align: center;">STT</th>
                                    <th style="width:10%">Tên Tour</th>
                                    <th style="width:10%">Khởi Hành</th>
                                    <th style="width:10%">Thời Gian</th>
                                    <th style="width:10%">Phương Tiện</th>
                                    <th style="width:10%">Giá</th>
                                    <th style="width:16%; text-align: center;">Hình ảnh</th>
                                    <th style="width:10%">Loại tour</th>
                                    <th style="width:11%; text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
								while ($arItemTour = mysql_fetch_assoc($resulttour)) {
									//dinh dang lai gia
									   $Gia = $arItemTour['Price'];
									   $dongiaformat = number_format($Gia,0,',','.');
									//dinh dang lai ngay thang nam
										$khoihanhformat = $arItemTour['Departure'];
                                    	$khoihanh = date("d/m/Y", strtotime($khoihanhformat));
								?>
                                <tr>
                                    <td class="align-center"><?php echo $arItemTour['IdTour']?></td>
                                    <td><a href=""><?php echo $arItemTour['NameTour']?></a></td>
                                    <!-- xử lý khởi hành -->
                                   
                                	<td class="center"><?php echo  $khoihanh?></td>
                             		<!-- kết thúc xử lý khởi hành -->
                             		
                                    <td><?php echo $arItemTour['Time']?></td>
                                    
                                    <!-- xử lý Phương tiện -->
                                    <?php 
                                    	if ($arItemTour['Means'] == "1"){?>
                                    		 <td>Ô Tô</td>
                                    		
                                   	<?php }
		                                elseif ($arItemTour['Means'] == "2"){?>
                                                <td class="center">Xe Máy</td>
	                                <?php } else {?>
		                                		<td class="center">Xe Đạp</td>
		                            <?php }?>
		                            <!-- kết thúc xử lý Phương tiện -->
		                              
                                    <td><?php echo $dongiaformat; ?> đồng/người</td>
                                    <td align="center"><img src="/files/<?php echo $arItemTour['Picture'] ?>" class="hoa" /></td>
                                    <td><?php echo $arItemTour['CatTour']?></td>
                                    <td align="center">
                                        <a href="/www/tour/admincp?module=ql_tour&action=edit_tour&IdTour=<?php echo $arItemTour['IdTour']?>">Sửa <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/pencil.gif" alt="edit" /></a>
                                        <a href="/www/tour/admincp?module=ql_tour&action=del_tour&IdTour=<?php echo $arItemTour['IdTour']?>" title="" onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">Xóa <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
							<span class="current">
								<a href= "/www/tour/admincp?module=ql_tour&action=index_tour&begin=<?php echo $begin?>"><?php echo $titletrang?></a> 
							</span>
							<span>|</span> 
							<?php }?>
						</div>
						<div style="clear: both;"></div>
					</div>
                
			</div> <!-- End .grid_12 -->