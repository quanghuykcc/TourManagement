<?php
$Iddm = $_GET['IdCat'];
$IdNews = $_GET['idNews'];
//Truy vấn danh mục
$querycat = " SELECT * FROM category WHERE IdCat = {$Iddm} ";	
$resultcat = mysql_query($querycat);
$arItemCat = mysql_fetch_assoc($resultcat);
$TenDM			= $arItemCat['NameCat'];// Lấy danh mục từ truy vấn danh mục
//Truy Vấn Tin		
$queryNews = "SELECT * FROM news  WHERE IdCat = {$Iddm} AND IdNews != '$IdNews' ORDER BY IdNews DESC LIMIT 4";
$resultnews = mysql_query($queryNews);
$resultCurrentNews = mysql_query("SELECT * FROM news WHERE IdNews = '$IdNews'");
$rowCurrentNews = mysql_fetch_assoc($resultCurrentNews);
$arTinMoi = array();
$i = 0;
while ($arItemNew = mysql_fetch_assoc($resultnews)){
	$arTinMoi[$i] = $arItemNew;
	$i++;
}
//kiem tra neu co tin moi hien thi
if (count($arTinMoi) > 0){
?>

<?php 
$IdNews 		= $rowCurrentNews['IdNews'];
$Title 			= $rowCurrentNews['Name'];
$DeTail 		= $rowCurrentNews['Detail'];
$DateCreate 	= $rowCurrentNews['DateCreate'];
$IdCat			= $rowCurrentNews['IdCat'];
$CreateBy 		= $rowCurrentNews['CreateBy'];
$IdCat			= $rowCurrentNews['IdCat'];
?>
      <div class="col-md-6 tour">
        <div class="panel panel-default">
          <div class="panel-heading">
            Khám Phá <i class="fa fa-angle-double-right"></i> &nbsp;<?php echo $TenDM?>
          </div>
          <div class="panel-body">
            <div class="row" style="padding-left: 55px;">
              <div class="chitiettin">
                <h1 class="new-title">
                  <?php echo $Title?>
                </h1>
                <i class="fa fa-newspaper-o"></i> &nbsp;
                	<small>
                		<a  class="text-capitalize" href="/www/tour?module=ql_tintuc&action=list-news&IdCat=<?php echo $Iddm ?>" title=""><?php echo $TenDM?></a> &nbsp;
                		<samp><?php echo $DateCreate?></samp>
                	</small>
                <div class="new-detail text-muted">
                  <?php echo $DeTail?>
                </div>
              </div>
              <div class="col-md-12">
              		Phần bình luận	
              </div>
              
              
              <div class="col-md-12">
                <h4 id="tin-lien-quan">Tin tức liên quan</h4>
              </div>
              <?php 
				
				foreach ($arTinMoi as $key => $arTin){
					$tieude 			= $arTin['Name'];
          $id_news = $arTin['IdNews'];
          $id_cat = $arTin['IdCat'];
					$hinhanh		= $arTin['Picture'];
				?>
              <!--items 1-->
              <div class="col-md-6 list-items-news">
                <div class="img-lienquan pull-left">

                  <a href="/www/tour?module=ql_tintuc&action=detail-news&idNews=<?php echo $id_news ?>&IdCat=<?php echo $id_cat?>"><img class="img-rounded" src="/www/tour/files/<?php echo $hinhanh?>" alt="" /></a>
                </div>
                <a href="/www/tour?module=ql_tintuc&action=detail-news&idNews=<?php echo $id_news ?>&IdCat=<?php echo $id_cat?>">
                  <p class="lienquan pull-right"><?php echo $tieude?></p>
                </a>
                <div class="clearfix"></div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
      <!--content-->
      <!--Nếu có tin trong danh mục  --> 
      <?php }?>