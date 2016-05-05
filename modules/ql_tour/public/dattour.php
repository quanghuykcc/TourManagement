<script>

		function getNoiDung(idHTTT){
			//alert(idHTTT);
			$.ajax({
			  type: "POST",
			  url: "/ajax/ndtt.php",
			  data:{id:idHTTT} ,
			  success: function(data) {
				$('#noidungtt').html(data); 
			  }
			});
			
		}
	
</script>
<?php 
	$ten="";
	$id="";
	$now1=date("d/M/Y");
	$arngay=explode('/',$now1);
	$ngaymoi=$arngay[0];
	$thang=$arngay[1];
	if(isset($_SESSION['guest'])){
			$ten=$_SESSION['guest'];
		}
	//Truy van ma tour
	$matour=$_REQUEST['IdTour'];
	$querymatour="SELECT * FROM tour WHERE IdTour='$matour'";
	$resultmatour=mysql_query($querymatour);
	$rowmatour =mysql_fetch_assoc($resultmatour);
	$tentour = $rowmatour['IdTour'];
	$tentour = $rowmatour['NameTour'];
	$gia = $rowmatour['Price'];

//Thực insert khi đặt tour
if(isset($_POST['thanhtoan'])){
		$tenthat	        =$_REQUEST['tenthat'];
		$diachithat			=$_REQUEST['diachithat'];
		$email				=$_REQUEST['email'];
		$sodt				=$_REQUEST['sodt'];
		$songuoilon 		=$_REQUEST['songuoilon'];
		$sotre				=$_REQUEST['sotre'];
		$ngaydi				=$_REQUEST['ngaydi'];
		$trangthai			= "chưa";
		$httt				=$_REQUEST['httt'];
		$tongtien			=$songuoilon*$gia+$sotre*$gia/2;
		$query2= "INSERT INTO dattour 
					VALUES
					(NULL,'$tenthat','$email','$diachithat','$sodt','$matour','$songuoilon','$sotre','$ngaydi','$now1','Chưa','$httt','$tongtien')";
		$result2=mysql_query($query2);
	if($result2==true) {
  		header("LOCATION: /www/tour?module=ql_tour&action=index&msg=Bạn đã đặt tour thành công");
	 if($httt==3){
	 //chuyen sang trang ngan luong 
	 
				$urlNganLuong = "https://www.nganluong.vn/button_payment.php?receiver=giang359757@gmail.com&product_name=$matour&price=$tongtien&return_url=dulich.php&comments=Ngày đặt $now1";
				//echo $urlNganLuong ;
				header("LOCATION:$urlNganLuong");
	 }
	 else{
	 	header("LOCATION: /www/tour?module=ql_tour&action=index&msg=Bạn đã đặt tour thành công");
	 }
	}
	else { $tb= 'Đã có lỗi xảy ra, mời nhập lại. Lưu ý: Bạn phải nhập đầy đủ các thông tin trên !';}
}
?>
 <div class="col-md-6 tour">
        <!--begin content-->
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-list"></i>&nbsp;Đặt tour
            <a href="" title="">
            </a>
          </div>
          <div class="panel-body">
                <div class="alert alert-warning" role="alert">
                	<p> 
                	<span style="color:red;">Bạn đã chọn tour:</span> <span style="color:blue"><?php echo $tentour ?></span><br/>
                	<span style="color:red;">Giá :<?php echo $gia ?>/ người</span> <span style="color:blue">(trẻ dưới 6 tuổi được giảm 50% giá tour).</span><br />
                    Để liên hệ đặt tour du lịch vui lòng điền đầy đủ thông tin bên dưới</p>
                </div>
                <form class="form-horizontal" method="post">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Họ & Tên</label>
                        <div class="col-sm-10 col-md-5">
                          <input type="text" class="form-control" name="tenthat" value="" id="inputEmail3" placeholder="Họ Tên">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Địa Chỉ</label>
                        <div class="col-sm-10 col-md-5">
                          <input type="text" class="form-control" name="diachithat"  value="" id="inputEmail3" placeholder="Địa Chỉ">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Email</label>
                        <div class="col-sm-10 col-md-5">
                          <input type="email" class="form-control " name="email"  value="" id="inputEmail3" placeholder="Email">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Số Điện Thoại</label>
                        <div class="col-sm-10 col-md-5">
                          <input  type="text" name="sodt" class="form-control "  value="" id="inputEmail3" placeholder="Số Điện Thoại">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Số Người Lớn</label>
                        <div class="col-sm-10 col-md-5">
                          <input  type="number" name="songuoilon" class="form-control "  value="" id="inputEmail3" placeholder="Số Người Lớn">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Số Trẻ Em</label>
                        <div class="col-sm-10 col-md-5">
                          <input  type="number" name="sotre"  class="form-control "  value="" id="inputEmail3" placeholder="Số Trẻ Em">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Ngày đi</label>
                        <div class="col-sm-10 col-md-5">
                          <input type="text" name="ngaydi" class="form-control datepicker" value="<?php echo $rowmatour['Departure']?>"  readonly="readonly" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-3 control-label">Thanh Toán</label>
                        <div class="col-sm-10 col-md-5">
                          <select class="form-control" name="httt" class="httt" id="httt"
						              onchange="getNoiDung(this.value);">
                            <option value="" selected="selected">--------Chọn HTTT--------</option>
                            <?php 
                            	$queryHTTT="SELECT * FROM thanhtoan"; 
								$resultHTTT=mysql_query($queryHTTT);
								while($rowHTTT=mysql_fetch_array($resultHTTT)){
                            ?>
                            <option value="<?php echo $rowHTTT['IdThanhToan'] ?>"><?php echo $rowHTTT['TenThanhToan'] ?></option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="full-right btn-thanhtoan">
                      	<div id="noidungtt"></div>
                         <input type="submit" name="thanhtoan" value="Thanh toán" class="btn btn-success btn-sm"></input>
                         <input type="reset"  name="nhaplai" value="Làm lại"	class="btn btn-info btn-sm" ></input>
                      </div>
          </div>
        </div>
        <!--danh sách tour trong nước-->
      </div>
      <!--end content-->