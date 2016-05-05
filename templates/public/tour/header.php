<?php 
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Du lịch Đà Nẵng</title>
	<link rel="shortcut icon" href="/www/tour/files/iconn.png">
    <!-- Bootstrap -->
    
    <link href="<?php echo TEMPLATE_PUBLIC_URL ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_PUBLIC_URL ?>/css/styles.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_PUBLIC_URL ?>/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo TEMPLATE_PUBLIC_URL ?>/js/jquery1.11.1.min.js"></script>
    <!-- Ngày tháng năm -->
	<script src="<?php echo TEMPLATE_PUBLIC_URL ?>/datetime/jquery-ui.js"></script>
	<link rel="stylesheet" href="<?php echo TEMPLATE_PUBLIC_URL ?>/datetime/jquery-ui.css">
	<!--  -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- validate  -->
    <script type="text/javascript" src="/wwww/tour/library/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE_ADMIN_URL?>/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE_ADMIN_URL?>/js/jquery.validate.min.js"></script>
    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
      window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
      d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
      _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
      $.src='//v2.zopim.com/?2gSKrKYT4qIhPnXhR9XLJkz9KrfKSc6P';z.t=+new Date;$.
      type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
    </script>
    <!--End of Zopim Live Chat Script-->
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="container menu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          			<?php 
						@$action= $_REQUEST['action'];
						if ($action == 'index'){
							$class_trangchu = 'active';
						} else {
							$class_trangchu = '';
						}
						
						if ($action == 'gioithieu'){
							$class_gioithieu = 'active';
						} else {
							$class_gioithieu = '';
						}
						
						if ($action == 'index-contact'){
							$class_lienhe = 'active';
						} else {
							$class_lienhe = '';
						}
						if ($action == 'list-tour'){
							$class_tour = 'active';
						} else {
							$class_tour = '';
						}
						if ($action == 'list-news'){
							$class_news = 'active';
						} else {
							$class_news = '';
						}
							
					?>
            <ul class="nav navbar-nav">
              <li class="<?php echo $class_trangchu?>"><a href="/www/tour?module=ql_tour&action=index">
                <i class="fa fa-home"></i>&nbsp;Trang Chủ <span class="sr-only">(current)</span></a>
              </li>
              <li class="<?php echo $class_gioithieu?>"><a href="/www/tour?module=ql_gioithieu&action=gioithieu"><i class="fa fa-file-o"></i>&nbsp;Giới Thiệu</a></li>
              <li class="dropdown <?php echo $class_tour?>">
                <a href="listtour.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-umbrella"></i>&nbsp;Tour<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <?php 
                		//Truy vấn danh mục tour
				  		$querycattour = "SELECT * FROM category_tour";
				  		$resultcattour = mysql_query($querycattour);
						while ($rowcattour = mysql_fetch_assoc($resultcattour)){
												
				  	?>
                  <li><a href="/www/tour?module=ql_tour&action=list-tour&IdCat=<?php echo $rowcattour['Id_CatTour']?>"><i class="fa fa-chevron-right"></i>
                    &nbsp;<?php echo $rowcattour['CatTour']?></a>
                  </li>
                  <li class="divider"></li>
                  <?php }?>
                 
                </ul>
              </li>
             <li class="dropdown <?php echo $class_news?>">
                <a href="listtour.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-binoculars"></i>&nbsp;Khám Phá&nbsp;<span class="fa fa-arrow-circle-down"></span></a>
                <ul class="dropdown-menu" role="menu">
                	
                	<?php 
                		//Truy vấn danh mục tin
				  		$querytheloai = "SELECT * FROM category";
				  		$resulttheloai = mysql_query($querytheloai);
						while ($rowtl = mysql_fetch_assoc($resulttheloai)){
						$IdMenu = $rowtl['IdCat'];
						$NameMenu = $rowtl['NameCat'];
				  	?>
                  <li><a href="/www/tour?module=ql_tintuc&action=list-news&IdCat=<?php echo $IdMenu ?>"><i class="fa fa-chevron-right"></i>
                    &nbsp;<?php echo $NameMenu?></a>
                  </li>
                  <li class="divider"></li>
					<?php }?>
                </ul>
              </li>
              <li class="<?php echo $class_lienhe?>"><a href="/www/tour?module=ql_lienhe&action=index-contact"><i class="fa fa-pencil"></i>&nbsp;Liên Hệ</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!--end menu-->
      </nav>
    </header>
    <!--end header-->
    <section id="slider-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12 slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/slider.jpg" alt="...">
                  <div class="carousel-caption">
                    Hình 1
                  </div>
                </div>
                <div class="item">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/slider3.jpg" alt="...">
                  <div class="carousel-caption">
                    Hình 3
                  </div>
                </div>
                <div class="item">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/slider4.jpg" alt="...">
                  <div class="carousel-caption">
                    Hình 4
                  </div>
                </div>
                <div class="item">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/slider5.jpg" alt="...">
                  <div class="carousel-caption">
                    Hình 5
                  </div>
                </div>
                <div class="item">
                  <img src="<?php echo TEMPLATE_PUBLIC_URL ?>/images/slider2.jpg" alt="...">
                  <div class="carousel-caption">
                    Hình 2
                  </div>
                </div>
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--end slider top-->