<section class="col-md-3 right-bar">
		<!--begin right-bar-->
		<div class="panel panel-default search ">
			<!--begin tim kiem -->
			<div class="panel-heading center-title "><i class="fa fa-list"></i>&nbsp;Tìm Kiếm</div>
			<div class="panel-body">
				<form action="" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="keyword" id="timkiem" placeholder="Tên tour hoặc giá nhỏ hơn">
					</div>
					<input type="submit" name="btnsearch" class="btn btn-success" value="Tìm Kiếm" />
					<input type="reset" class="btn btn-info" value="Nhập Lại" />
				</form>
			</div>
			<!--end tim kiem -->
			<?php 
				if (isset($_POST['btnsearch'])){
					$key = $_POST['keyword'];
					header("LOCATION: /www/tour?module=ql_tour&action=timkiem&q={$key}");exit();
				}
			?>
		</div>
		<div class="panel panel-default ">
			<div class="panel-heading center-title"><i class="fa fa-list"></i>&nbsp;Video</div>
			<div class="panel-body">
				<div class="embed-responsive embed-responsive-4by3">
					<iframe class="embed-responsive-item" width="560" height="400" src="http://www.youtube.com/embed/he4ME9dlbnw" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="panel-body">
				<div class="embed-responsive embed-responsive-4by3">
					<iframe class="embed-responsive-item" width="5600" height="400" src="https://www.youtube.com/embed/Ts_5nwmUmOg" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="panel-body">
				<div class="embed-responsive embed-responsive-4by3">
					<iframe class="embed-responsive-item" width="560" height="400" src="https://www.youtube.com/embed/xJRPaneaOmA" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</section>
	<!--end right-bar-->
</section>
