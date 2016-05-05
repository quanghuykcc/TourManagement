<?php
$Iddm = $_GET['IdCat'];
//Truy vấn danh mục
$querycat = " SELECT * FROM category WHERE IdCat = {$Iddm} ";	
$resultcat = mysql_query($querycat);
$arItemCat = mysql_fetch_assoc($resultcat);
$TenDM			= $arItemCat['NameCat'];// Lấy danh mục từ truy vấn danh mục
//Truy Vấn Tin		
$queryNews = "SELECT * FROM news  WHERE IdCat = {$Iddm}  ORDER BY IdNews DESC LIMIT 5";
$resultnews = mysql_query($queryNews);
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
//lay phan tu tin đầu tien
$arTin1 = $arTinMoi[0];
$IdNews 		= $arTin1['IdNews'];
$Title 			= $arTin1['Name'];
$DeTail 		= $arTin1['Detail'];
$DateCreate 	= $arTin1['DateCreate'];
$IdCat			= $arTin1['IdCat'];
$CreateBy 		= $arTin1['CreateBy'];
$IdCat			= $arTin1['IdCat'];
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
				//huy phan tu dau tien
				unset($arTinMoi[0]);
				//lay 3 phan tu tiep theo
				
				foreach ($arTinMoi as $key => $arTin){
					$tieude 			= $arTin['Name'];
					$hinhanh		= $arTin['Picture'];
				?>
              <!--items 1-->
              <div class="col-md-6 list-items-news">
                <div class="img-lienquan pull-left">
                  <a href="" title=""><img class="img-rounded" src="/www/tour/files/<?php echo $hinhanh?>" alt="" /></a>
                </div>
                <a href="" title="">
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