<?php
$IdContact = $_GET['IdContact'];
//lay thong tin co $IdContact
$querycontact = "SELECT * FROM contact WHERE IdContact = {$IdContact}";
$resultContact = mysql_query($querycontact);
$rowcontact = mysql_fetch_assoc($resultContact); 
$IdContact = $rowcontact['IdContact'];
$Content = $rowcontact['Content'];
?>
<div class="container_12">
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Thêm tin tức</span></h2>
                        
                     <div class="module-body">
                       	<form action="" method="post" enctype="multipart/form-data" id="frmAdmin">
                            <p>
                                <label>Chi tiết</label>
                                <textarea class="ckeditor" name="ChiTiet" required><?php echo $Content ?></textarea>
                            </p>
                                
                            <fieldset>
                                <input class="submit-green" type="submit" value="Trở về" /> 
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->