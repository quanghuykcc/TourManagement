   <?php 
           		$IdTour =  $_GET['IdTour'];
                $querydetail = " SELECT * FROM tour WHERE IdTour = {$IdTour} ";	
				$resultdetail = mysql_query($querydetail);
				$row = mysql_fetch_assoc($resultdetail);
           ?>
 <div class="col-md-6 tour">
        <!--begin content-->
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-list"></i>&nbsp;Chi Tiết Tour" <?php echo $row['NameTour'] ?>"
            <a href="" title="">
            </a>
          </div>
         
          <div class="panel-body">
               <?php echo $row['Detail'] ?>
          </div>
        </div>
        <!--danh sách tour trong nước-->
      </div>
      <!--end content-->