<div class="col-md-6 tour">
          <div class="panel panel-default">
			<!-- bat dau khoi 1 -->
          <div class="panel-heading"><i class="fa fa-list"></i>&nbsp;Kết quả tìm kiếm
            <a href="/www/tour?module=ql_tour&action=list-tour&IdCat=" title="">
	            <span class="detail pull-right">
	            </span>
            </a>
          </div>
          <div class="panel-body">
          	<?php 
          	$tukkhoa = $_GET['q'];
          	$query = "SELECT * FROM tour LEFT JOIN means ON tour.Means = means.MeansId WHERE NameTour Like'%$tukkhoa%'";
					$result = mysql_query($query);
					if ($result == 0){
						"Không tìm thấy kết quả";
						
					}else{
						while ($row = mysql_fetch_assoc($result)){
          
         	?>
            <div class="row list-tour">
              <div class="col-xs-12 col-md-4">
                <div class="list-item">
                  <a class="thumbnail" href="#">
                  <img alt="" src="/www/tour/files/<?php echo $row['Picture']?>" class="quay">
                  </a>
                </div>
              </div>
              <div class="col-xs-12 col-md-8">
                <a href="" class="text-uppercase"><?php echo $row['NameTour']	?></a>
                <p class="icn-tour">
                  <i class="fa fa-clock-o"></i>&nbsp;Khởi hành: <?php echo $row['Departure']	?>
                  <span class="infomation"></span>
                </p>
                <p class="icn-tour">
                  <i class="fa fa-calendar"></i>&nbsp;Thời Gian: <?php echo $row['Time']	?>
                  <span class="infomation"></span>
                </p>
                <p class="icn-tour">
                  <i class="fa fa-paper-plane"></i>&nbsp;Phương tiện: <?php echo $row['MeansName']	?>
                  <span class="infomation"></span>
                </p>
                <p class="icn-tour">
		        <i class="fa fa-money"></i>&nbsp;Giá: 
                  <span class="infomation"> <?php echo $row['Price']?> &nbsp; VNĐ /người</span>
                </p>
                <a class="btn btn-default" href="/www/tour?module=ql_tour&action=dattour&&IdTour=<?php echo $row['IdTour']?>" role="button">
                <i class="fa fa-suitcase"></i>&nbsp;Đặt tour</a>
                <a class="btn btn-default" href="/www/tour?module=ql_tour&action=detail_tour&IdTour=<?php echo $row['IdTour']?>" role="button">
                <i class="fa fa-list"></i>&nbsp;Xem chi tiết</a>
              </div>
              
            </div>
            <!--end tour 1-->
            <?php }}?>
          </div>
        </div>
          
      </div>
      <!--end content-->