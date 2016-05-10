<?php
	
     $IdCat = $_GET['IdCat'];
	//thuat toan phan trang
	$tongsodong = 5;
	$sodongtrenmottrang = 4;
	$begin = 0;
	
	$query = "
		SELECT count(IdTour) AS tongsodong FROM tour WHERE Id_CatTour = $IdCat
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
	$querytour = " SELECT * FROM tour WHERE Id_CatTour = $IdCat ORDER BY IdTour DESC 
	LIMIT $batdau, $sodongtrenmottrang";
	$resulttour = mysql_query($querytour);
  $querycat = "SELECT * FROM category_tour WHERE Id_CatTour =$IdCat LIMIT 1";
  $resultcat = mysql_query($querycat);
  $cat = mysql_fetch_assoc($resultcat);
?>
<div class="col-md-6 tour">
        <!--begin content-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-list"></i>&nbsp;<?php echo $cat['CatTour']?>
            <a href="" title="">
            </a>
          </div>
          <div class="panel-body ">
          	<?php 
          		//$IdCat = $_GET['IdCat'];
          		//$querytour = " SELECT * FROM tour WHERE Id_CatTour = $IdCat ORDER BY IdTour DESC ";	
				//$resulttour = mysql_query($querytour);	
				while ($arItemTour = mysql_fetch_assoc($resulttour)){	
          	?>
            <div class="row list-tour">
              <div class="col-xs-12 col-md-4">
                <div class="list-item">
                  <a class="thumbnail" href="#">
                  <img alt="" src="/www/tour/files/<?php echo $arItemTour['Picture']?>" class="quay">
                  </a>
                </div>
              </div>
              <div class="col-xs-12 col-md-8">
                <a href="" class="text-uppercase"><?php echo $arItemTour['NameTour']?></a>
                <p class="icn-tour">
                  <i class="fa fa-clock-o"></i>&nbsp;Khởi hành: 
                  <span class="infomation"><?php echo $arItemTour['Departure']?></span>
                </p>
                <p class="icn-tour">
                  <i class="fa fa-calendar"></i>&nbsp;Thời Gian:
                  <span class="infomation"><?php echo $arItemTour['Time']?></span>
                </p>
                <p class="icn-tour">
                  <i class="fa fa-paper-plane"></i>&nbsp;Phương tiện:
                  <span class="infomation"><?php echo $arItemTour['Means']?></span>
                </p>
                <?php 
	                $Gia = $arItemTour['Price'];
			        $dongiaformat = number_format($Gia,0,',','.');
                ?>
                <p class="icn-tour">
                  <i class="fa fa-money"></i>&nbsp;Giá:
                  <span class="infomation"><?php  echo $dongiaformat?> &nbsp; VNĐ /người</span>
                </p>
                <a class="btn btn-default" href="/www/tour?module=ql_tour&action=dattour&IdTour=<?php echo $arItemTour['IdTour']?>" role="button">
                <i class="fa fa-suitcase"></i>&nbsp;Đặt tour</a>
                <a class="btn btn-default" href="#" role="button">
                <i class="fa fa-list"></i>&nbsp;Xem chi tiết</a>
              </div>
            </div>
            <!--end tour-->
           	<?php }?>
              <nav><!--begin Phân trang-->
                 <ul class="pagination">
                 	<?php
						for ($i = 0; $i<$sotrang; $i++){
							$titletrang = $i+1;
							$begin = $i * $sodongtrenmottrang; 
							//0*3| 1*3 | 2*3
					?>
                    <li><a  href="/www/tour?module=ql_tour&action=list-tour&IdCat=<?php echo $IdCat ?>&begin=<?php echo $begin?>"><?php echo $titletrang?></a></li>
                  	<?php }?>
                </ul>
            </nav><!--end Phân trang-->
          </div>
          <!--end content-news1-->
        </div>
        <!--danh sách tin tức du lịch-->
      </div>
      <!--end content-->