<div class="container_12">
            <div class="bottom-spacing">
                  <!-- Button -->
                <!--<div class="float-left">
                      <a href="add.html" class="button">
                      	<span>Thêm sản phẩm mới <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/plus-small.gif" alt=""></span>
                      </a>
                  	</div>
                 --> 
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
                	<h2><span>Danh sách đơn hàng</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ Tên</th>
                                    <th>Email</th>
                                    <th>Địa Chỉ</th>
                                    <th>Số Người lớn</th>
                                    <th>Số Trẻ Em</th>
                                    <th>Ngày đi</th>
                                    <th>SĐT</th>
                                    <th>TT Thanh Toán</th>
                                    <th>Hình Thức </th>
                                    <th>Tổng Tiền </th>
                                    <th>Chức Năng </th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
									//thuat toan phan trang
									$tongsodong = 5;
									$sodongtrenmottrang = 5;
									$begin = 0;
									
									$query = "
										SELECT count(IdDatTour) AS tongsodong FROM dattour
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
									
									$queryoder = "
										SELECT * FROM dattour As dt INNER JOIN thanhtoan As tt ON dt.IdThanhToan = tt.IdThanhToan ORDER BY IdDatTour DESC 
										LIMIT $batdau, $sodongtrenmottrang;
									";
									$resultoder = mysql_query($queryoder);
								?>
                            	<?php 
									//$queryoder = "SELECT * FROM dattour As dt INNER JOIN thanhtoan As tt ON dt.IdThanhToan = tt.IdThanhToan;";
									//$resultoder = mysql_query($queryoder);
									while ($arItemOder = mysql_fetch_assoc($resultoder)){
								?>
                                <tr>
                                    <td class="align-center"><?php echo $arItemOder['IdDatTour']?></td>
                                    <td><a href=""><?php echo $arItemOder['HoTen']?></a></td>
                                    <td><?php echo $arItemOder['Email']?></td>
                                    <td align="center"><?php echo $arItemOder['DiaChi']?></td>
                                    <td align="center"><?php echo $arItemOder['SoNguoiLon']?></td>
                                    <td align="center"><?php echo $arItemOder['SoTreEm']?></td>
                                    <td align="center"><?php echo $arItemOder['NgayDi']?></td>
                                    <td align="center"><?php echo $arItemOder['SoDT']?></td>
                                    <td align="center"><?php echo $arItemOder['TTThanhToan']?></td>
                                    <td align="center"><?php echo $arItemOder['TenThanhToan']?></td>
                                    <td align="center"><?php echo $arItemOder['TongTien']?></td>
                                    <td align="center">
                                        <a href="/www/tour/admincp/?module=ql_donhang&action=del_oder&IdOder=<?php echo $arItemOder['IdDatTour']?>">Xóa <img src="<?php echo TEMPLATE_ADMIN_URL?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
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
								<a class="current" href= "/www/tour/admincp/?module=ql_donhang&action=index_oder&begin=<?php echo $begin?>"><?php echo $titletrang?></a> 
								<span>|</span> 
								<?php }?>
							</div>
							<div style="clear: both;"></div>
						</div>
                        <div style="clear: both;"></div> 
                     </div>
                
			</div> <!-- End .grid_12 -->
                
            <div style="clear:both;"></div>