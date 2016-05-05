<?php 
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/autoload_public.php'; 
?>	

<?php 
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/templates/public/tour/header.php';
?> 


<?php 
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/templates/public/tour/left_bar.php';
?>


	<?php 

	$module = 'ql_tour';
	$action = 'index';
	
	if (isset($_REQUEST['module'])){
		$module = $_REQUEST['module'];		
	}
	if (isset($_REQUEST['action'])){
		$action = $_REQUEST['action'];		
	}
	
	include $_SERVER['DOCUMENT_ROOT'].'/www/tour/modules/'.$module.'/public/'.$action.'.php';
	?>
<?php 
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/templates/public/tour/right_bar.php';
?>
<?php 
include $_SERVER['DOCUMENT_ROOT'].'/www/tour/templates/public/tour/footer.php';
?> 	
