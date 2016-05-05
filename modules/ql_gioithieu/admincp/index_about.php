<?php
//lay thong tin danh muc tin co IdCat
$queryau = "SELECT * FROM aboutus WHERE IdAu = 1";
$resultau = mysql_query($queryau );
$rowau = mysql_fetch_assoc($resultau); 
//lay ten 
$titleview = $rowau['Name'];
$Descriptionview = $rowau['Description'];

//khi nguoi dung nhan nut Sửa
if (isset($_POST['submit'])){
	$tieude =  mysql_real_escape_string($_POST['tieude']);
	$mota =    mysql_real_escape_string ($_POST['mota']);
	//cap nhat lai du lieu
	$queryauUpdate = "UPDATE aboutus SET  Name = '$tieude', Description = '$mota' WHERE IdAu = 1";
	$resultauUpdate = mysql_query($queryauUpdate);

	if ($resultauUpdate == true){ //update thanh công
		header("LOCATION: /www/tour/admincp/?module=ql_gioithieu&action=index_about");
	} else { //update ko thanh công
		echo $baoloi = 'Có lỗi trong quá trình thêm dữ liệu!';
	}
}

?>
<div class="container_12">
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Thêm tin tức</span></h2>
                        
                     <div class="module-body">
                       	<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
                        	<?php 
                        	if (isset($baoloi)){
                        	?>
                            <div>
                                <span class="notification n-success"><?php echo $baoloi ?></span>
                            </div>
                            <?php }?>
                            <p>
                                <label>Tiêu đề</label>
                                <textarea rows="8" cols="90" name="tieude" class="input-medium" required><?php echo $titleview?></textarea>
                            </p>
                            
                            
                            <p>
                                <label>Chi tiết</label>
                                	<textarea class="ckeditor" name="mota" required><?php echo $Descriptionview?></textarea>
                            </p>
                                
                            <fieldset>
                                <input class="submit-green" name="submit" type="submit" value="Cập nhật" /> 
                                <input class="submit-gray" type="submit" value="Nhập lại" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->