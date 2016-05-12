<div class="col-md-6 tour">
        <!--begin content-->
        <div class="panel panel-default">
          <div class="panel-heading">
          	 
          	<?php 
          		$IdCat = $_GET['IdCat'];
          		$querycat = " SELECT * FROM category WHERE IdCat = $IdCat";	
				$resultcat = mysql_query($querycat);
				$aritem = mysql_fetch_assoc($resultcat);
				$tendm = $aritem['NameCat'];
          	?>
            <i class="fa fa-list"></i>&nbsp;<?php echo $tendm?>
            <a href="" title="">
            </a>
          </div>
          <div class="panel-body ">
          		  <?php
						//thuat toan phan trang
						$sodongtrenmottrang = 4;
						$begin = 0;
						
						$query = "
							SELECT count(IdNews) AS tongsodong FROM news WHERE IdCat = '$IdCat'
						";
						$result = mysql_query($query);
						$arTongSoDong = mysql_fetch_assoc($result);
						$tongsodong = $arTongSoDong['tongsodong'];
						//tinh so trang
						$sotrang = ceil($tongsodong/$sodongtrenmottrang);
						
						//lay du lieu tu bang 
            $begin = 1;
						if (isset($_REQUEST['begin'])){
							$begin = $_REQUEST['begin'];
							$batdau = ($begin-1)*$sodongtrenmottrang;
						} else {
							$batdau = 0;
						}
						$querytour = "SELECT * FROM news WHERE IdCat = $IdCat  ORDER BY IdNews DESC
						LIMIT $batdau, $sodongtrenmottrang";
						$resulttour = mysql_query($querytour);
					?>
		          <?php
					while ($aritem = mysql_fetch_assoc($resulttour)){
						$IdNews = $aritem['IdNews'];
						$Name= $aritem['Name'];
						$Description= $aritem['Description'];
						$Detail= $aritem['Detail'];
						$Picture= $aritem['Picture'];
						$DateCreate= $aritem['DateCreate'];
						$IdCat= $aritem['IdCat'];
						$CreateBy= $aritem['CreateBy'];
				?>
              <div class="row list-news">
                <div class="content-news col-md-12 clearfix">
                  <div class="content-img col-md-4 col-lg-4 col-sm-12 col-xs-12 clearfix">
                    <a href="">
                    <img  src="/www/tour/files/<?php echo $Picture?>"  class="img-rounded img-responsive" alt="Responsive image">
                    </a>
                  </div>
                  <!--list news left-->
                  <div class="contennt-detail col-md-8 col-lg-8 col-sm-12 col-xs-12 clearfix">
                    <a class="title" href="/www/tour?module=ql_tintuc&action=detail-news&idNews=<?php echo $IdNews ?>&IdCat=<?php echo $IdCat?>" title=""><?php echo $Name?></a>
                    <p class="text-justify text-news text-muted"><?php echo $Description?> </p>
                    <a href="/www/tour?module=ql_tintuc&action=detail-news&idNews=<?php echo $IdNews ?>&IdCat=<?php echo $IdCat?>" type="button" class="btn btn-success  btn-md pull-right">Chi tiết</a>
                  </div>
                  <!--list news right-->
                </div>
              </div><!--news 1-->
              <?php }?>
              <nav><!--begin Phân trang-->
                 <ul class="pagination">
                    <li>
                      <?php
                        $previousPage = $begin - 1;
                        if (($previousPage) >= 1) {
                      ?>

                      <a href="/www/tour/?module=ql_tintuc&action=list-news&IdCat=<?php echo $IdCat?>&begin=<?php echo $previousPage?>">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                      <?php } ?>
                    </li>
                    <?php
                    	for($i=0;$i<$sotrang;$i++){
                    		$j= $i+1;
                    ?>
                    <li><a href="/www/tour/?module=ql_tintuc&action=list-news&IdCat=<?php echo $IdCat?>&begin=<?php echo $j?>"><?php echo $j?></a></li>
                    
                    <?php }?>
                    <li>
                      <?php
                        $nextPage = $begin + 1;
                        if (($nextPage) <= $sotrang) {
                      ?>
                      <a href="/www/tour/?module=ql_tintuc&action=list-news&IdCat=<?php echo $IdCat?>&begin=<?php echo $nextPage?>">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                      <?php } ?>
                    </li>
                </ul>
            </nav><!--end Phân trang-->
          </div>
          <!--end content-news1-->
        </div>
        <!--danh sách tin tức du lịch-->
      </div>
      <!--end content-->