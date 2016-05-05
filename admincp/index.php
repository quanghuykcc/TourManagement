 <?php 
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/autoload_admin.php'; 
?>	 
<?php
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/templates/admincp/adminv1/header.php';
?>	
	<?php 
	$module = 'ql_tour';
	$action = 'index_about';
	
	if (isset($_REQUEST['module'])){
		$module = $_REQUEST['module'];		
	}
	if (isset($_REQUEST['action'])){
		$action = $_REQUEST['action'];		
	}
	
	@include $_SERVER['DOCUMENT_ROOT'].'/www/tour/modules/'.$module.'/admincp/'.$action.'.php';
	?>
<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/www/tour/templates/admincp/adminv1/footer.php';
?>
