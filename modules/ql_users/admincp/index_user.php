    
    <div class="container_12">
            <div class="bottom-spacing">
                  <!-- Button -->
                  <div class="clear"></div>
            </div>
            
            <div class="grid_12">
            <div>
                <?php 
                    @$thongbao = $_GET['msg'];
                    if (isset($thongbao)){
                ?>
                <span class="notification n-success"  style="width:43%"><?php echo $thongbao?></span>
                <?php }?>
             </div>
                <!-- Example table -->
                <div class="module">
                    <?php
                    $idUser = $_SESSION['iduser'];
                    $queryuser = "SELECT * FROM users WHERE IdUser = $idUser LIMIT 1";
                    $resultuser = mysql_query($queryuser);
                    if($resultuser==true){
                        $user = mysql_fetch_assoc($resultuser);
                    }
                    ?>
                    <h2 style="width: 80%; text-align: center; font-size: 14px;"><span>Danh sách tour</span></h2>
                    
                    <div class="module-table-body">
                        
                    <form action="">
                        <table id="myTable" class="tablesorter" style="width: 80%">
                            <thead>
                                <tr>
                                    <th style="width:30%; text-align: center;">Chi tiết</th>
                                    <th style="width:70%; text-align: center;">Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-center">Tên đăng nhập</td>
                                    <td><?php echo $user['username']?></td>
                                   
                                </tr>
                                 <tr>
                                    <td class="align-center">Họ và tên</td>
                                    <td><?php echo $user['FullName']?></td>
                                    
                                </tr>
                                <tr>
                                    <td class="align-center">Địa chỉ</td>
                                    <td><?php echo $user['Address']?></td>
                                   
                                </tr>
                                  <tr>
                                    <td class="align-center">Số điện thoại</td>
                                    <td><?php echo $user['Phone']?></td>
            
                                </tr>
                            </tbody>
                        </table>
                         <a href="/www/tour/admincp/?module=ql_users&action=edit_user" class="button">
                        <span>Chỉnh sửa thông tin</span>
                        </a>
                         <a href="/www/tour/admincp/?module=ql_users&action=change_pass" class="button" style="margin-left: 20px;">
                        <span>Thay đổi mật khẩu</span>
                        </a>
                        </form>

                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
               
            </div> <!-- End .grid_12 -->



