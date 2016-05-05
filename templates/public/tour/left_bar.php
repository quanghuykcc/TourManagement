   <section class="wrap-content container">
      <div class="row content-body">
      <div class="col-md-3 left-bar">
      	<?php 
      		$querycatId = " SELECT * FROM tour WHERE Id_CatTour = 1";	
			     $resultCatId = mysql_query($querycatId);
      	?>
        <!--begin left-bar-->
        <div class="panel panel-default tour-trongnuoc ">
          <div class="panel-heading center-title"><i class="fa fa-list"></i>&nbsp;tour trong nước</div>
          <div class="panel-body">
            <ul class="list-group">
            	<?php 
            				while ($aritem = mysql_fetch_assoc($resultCatId)){
            	?>
              <li class="list-group-item">
                <i class="fa fa-suitcase"></i>&nbsp;
                <a href="" title=""><?php echo $aritem['NameTour']?></a>
              </li>
              <?php }?>
            </ul>
          </div><!-- tour trong nước -->
          </div>
          <div class="panel panel-default tour-quocte">
            <div class="panel-heading center-title"><i class="fa fa-list"></i>&nbsp;Khám Phá</div>
            <div class="panel-body">
              <ul class="list-group">
              	<?php 
              		$queryct = " SELECT * FROM category";	
					$resultct = mysql_query($queryct);
					while ($aritemct = mysql_fetch_assoc($resultct)){
              	?>
                <li class="list-group-item">
                  <i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;
                  <a href="/www/tour?module=ql_tintuc&action=list-news&IdCat=<?php echo $aritemct['IdCat'] ?>" title=""><?php echo $aritemct['NameCat']?></a>
                </li>
                <?php }?>
              </ul>
            </div><!-- tour quốc tế -->
          </div>
          <div class="panel panel-default diadiemdulich">
            <div class="panel-heading center-title"><i class="fa fa-list"></i>&nbsp;Điểm du lịch</div>
            <div class="panel-body">
              <div class="row travel-news">
                <div class="col-md-6">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/tour1.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
                </div>
                <div class="col-md-6">
                  <a href="" title="">
                    <p class="text-left">Đèo Hải Vân - Lăng Cô</p>
                  </a>
                </div>
              </div>
              <div class="row travel-news">
                <div class="col-md-6">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/tour2.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
                </div>
                <div class="col-md-6">
                  <a href="" title="">
                    <p class="text-left">Đèo Hải Vân - Lăng Cô</p>
                  </a>
                </div>
              </div>
              <div class="row travel-news">
                <div class="col-md-6">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/tour3.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
                </div>
                <div class="col-md-6">
                  <a href="" title="">
                    <p class="text-left">Đèo Hải Vân - Lăng Cô</p>
                  </a>
                </div>
              </div>
              <div class="row travel-news">
                <div class="col-md-6">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/tour4.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
                </div>
                <div class="col-md-6">
                  <a href="" title="">
                    <p class="text-left">Đèo Hải Vân - Lăng Cô</p>
                  </a>
                </div>
              </div>
              </div><!-- Địa điểm du lịch -->
            
          </div>
          <div class="hidden-xs quangcao">
				        <embed  src="http://24h-ad.24hstatic.com/upload/4-2014/images/2014-12-30/1419927793-1417407863_honda_300_450_chu.swf" width="260" height="450" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="transparent"></embed>
          </div>
      </div>
      <!--end left-bar-->