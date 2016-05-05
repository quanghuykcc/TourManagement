 <?php
//lay thong tin danh muc tin co IdCat
$queryau = "SELECT * FROM aboutus WHERE IdAu = 1";
$resultau = mysql_query($queryau );
$rowau = mysql_fetch_assoc($resultau); 
//lay ten 
$titleview = $rowau['Name'];
$Descriptionview = $rowau['Description'];
?>
 <div class="col-md-6 tour">
        <!--begin content-->
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-list"></i>&nbsp;<?php echo $titleview?>
            <a href="" title="">
            </a>
          </div>
          <div class="panel-body">
                <?php echo $Descriptionview ?>
          </div>
        </div>
      </div>
