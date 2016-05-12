  <?php 
   $querynews = 'SELECT * FROM news JOIN category ON news.IdCat = category.IdCat
    ORDER BY IdNews DESC LIMIT 5';
   $resultnews = mysql_query($querynews);
   if (!$resultnews){
   echo "khong có dữ liệu".$resultnews;
  }
   $arTinMoi = array();
	   $i = 0 ;
	  	while ($arItemNews = mysql_fetch_assoc($resultnews)){
	   $arTinMoi[$i] = $arItemNews;
		$i++;
    }
    ?>

  <div class="col-md-6 tour">
  		 <?php 
	   		@$thongbao = $_GET['msg'];
			if (isset($thongbao)){
			?>
		   <div class="alert alert-success" role="alert">
			  	<?php echo @$thongbao?>
		   </div>
		   <?php }?>
        <!--begin content-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-list"></i>&nbsp;TIN TỨC NỔI BẬT
          </div>
          <div class="panel-body ">
            <div class="row news-travel">
              <?php 
					//kiem tra neu co tin moi hien thi
					if (count($arTinMoi) > 0){
					
					//lay phan tu dau tien
					$arTin1 = $arTinMoi[0];
					
			 ?>
              <div class="col-md-6 news-left">
                <a href="/www/tour?module=ql_tintuc&action=detail-news&IdNews=<?php echo $arTin1['IdNews']?>&IdCat=<?php echo $arTin1['IdCat'] ?>" title=""><img class="img-rounded" src="/www/tour/files/<?php echo $arTin1['Picture']?>" alt="" /></a>
                <h1>
                  <a href="/www/tour?module=ql_tintuc&action=detail-news&IdNews=<?php echo $arTin1['IdNews']?>&IdCat=<?php echo $arTin1['IdCat'] ?>" title=""><?php  echo $arTin1['Name'] ?></a>
                </h1>
                <p class="text-muted"><?php echo $arTin1['Description']?></p>
              </div>
              <?php 
				//huy phan tu dau tien
				unset($arTinMoi[0]);
				//lay 3 phan tu tiep theo
				
				foreach ($arTinMoi as $key => $arTin){
					
				?>
              <div class="col-md-6  news">
                <div class="new-items">
                  <div class="images-tintuc pull-left">
                    <a href="/www/tour?module=ql_tintuc&action=detail-news&IdNews=<?php echo $arTin['IdNews']?>&IdCat=<?php echo $arTin1['IdCat'] ?>" title=""><img class="img-rounded" src="/www/tour/files/<?php echo $arTin['Picture']?>" alt="" /></a>
                  </div>
                  <div class="img-description pull-right">
                    <h4><a href="/www/tour?module=ql_tintuc&action=detail-news&IdNews=<?php echo $arTin['IdNews']?>&IdCat=<?php echo $arTin1['IdCat'] ?>" title=""><?php  echo $arTin['Name'] ?></a></h4>
                    <p class="text-muted"><?php echo $arTin['NameCat'];?>| <i class="fa fa-calendar"></i>&nbsp;<?php echo $arTin['CreateBy'];?></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <!--news 1-->
              <?php }?>
            </div>
            <!--news-travel1-->
            <?php }?>
          </div>
        </div>
        <!--kết thúc danh sách tin tức du lịch-->
        	<?php 
        	$querycat = " SELECT * FROM category_tour";	
			$resultcat = mysql_query($querycat);
			?>
        <!-- Phan hien theo danh muc tour -->
        <div class="panel panel-default">
          <?php 
          //bat dau  1 khoi danh muc
			while ($arItemCat = mysql_fetch_assoc($resultcat)){
				$IdCat = $arItemCat['Id_CatTour'];
				$Name = $arItemCat['CatTour'];
				//chon 4 tin co danh muc thuoc idCat = $IdCat
				$querytour = "SELECT * FROM tour tr LEFT JOIN means mn ON tr.Means = mn.MeansId WHERE Id_CatTour = $IdCat ORDER BY IdTour DESC LIMIT 4";	
				$resulttour = mysql_query($querytour);
				//tao mang chua 4 tin	
			?>
			<!-- bat dau khoi 1 -->
          <div class="panel-heading"><i class="fa fa-list"></i>&nbsp;<?php echo $Name?>
            <a href="/www/tour?module=ql_tour&action=list-tour&IdCat=<?php echo $IdCat?>" title="">
	            <span class="detail pull-right">
	            <i class="fa fa-angle-double-down"></i>&nbsp;Xem Thêm
	            </span>
            </a>
          </div>
          <div class="panel-body">
          	
          	<?php 
          			// Bat dau hien thi tin
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
                <a href="/www/tour/?module=ql_tour&action=detail_tour&IdTour=<?php echo $arItemTour['IdTour']?>" class="text-uppercase"><?php  echo $arItemTour['NameTour']?></a>
                <p class="icn-tour">
                  <?php 
                  $khoihanhformat = $arItemTour['Departure'];
                  $khoihanh = date("d/m/Y", strtotime($khoihanhformat));
                  ?>
                  <i class="fa fa-clock-o"></i>&nbsp;Khởi hành: 
                  <span class="infomation"><?php  echo $khoihanh?></span>
                </p>
                <p class="icn-tour">
                  <i class="fa fa-calendar"></i>&nbsp;Thời Gian:
                  <span class="infomation"><?php  echo $arItemTour['Time']?></span>
                </p>
                <p class="icn-tour">
                  <i class="fa fa-paper-plane"></i>&nbsp;Phương tiện:
                  <span class="infomation"><?php  echo $arItemTour['MeansName']?></span>
                </p>
                <p class="icn-tour">
                	<?php 
                	$Gia = $arItemTour['Price'];
			        $dongiaformat = number_format($Gia,0,',','.');
                    ?>
		        <i class="fa fa-money"></i>&nbsp;Giá:
                  <span class="infomation"><?php  echo $dongiaformat?> &nbsp; VNĐ /người</span>
                </p>
                <a class="btn btn-default" href="/www/tour?module=ql_tour&action=dattour&&IdTour=<?php echo $arItemTour['IdTour']?>" role="button">
                <i class="fa fa-suitcase"></i>&nbsp;Đặt tour</a>
                <a class="btn btn-default" href="/www/tour?module=ql_tour&action=detail_tour&IdTour=<?php echo $arItemTour['IdTour']?>" role="button">
                <i class="fa fa-list"></i>&nbsp;Xem chi tiết</a>
              </div>
              
            </div>
            
            <?php }//ket thuc hien thi tin?>
            <!--end tour 1-->
          </div>
          <?php }//Ket thuc 1 khoi danh muc ?>
        </div>
        <!--danh sách tour trong nước-->
 </div>
      <!--end content-->