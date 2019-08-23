<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if (session_status() === PHP_SESSION_NONE){session_start();}
	// if (!isset($_SESSION['kdadm'])) {
	// 	header("Location:login.php");
	// }else{
	// all files in config
	foreach (glob('apps/config/*.php') as $config) {
		include $config;
	}
	include'apps/views/tampilan/top.php'; 
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div class="blur writewidth" style="display: none; z-index: 1001"></div>
<div class="loading">
	<img src="<?php echo $base_url ?>assets/images/ajax-loader3-resize.gif">
</div>
<div class="wrapper">
	<?php include'desktop_menu.php'; ?>
	<?php include'mobile_menu.php'; ?>
	<div class="rside">
		<!-- Just for desktop -->
		<?php include'right_top.php'; ?>
		<!-- end desktop -->
		
		<!-- Content cut here -->
		<?php include'apps/views/pages.php'; ?>		
		<!-- end content -->

	</div>


</div>

<?php 
include'apps/views/tampilan/bottom.php';
include'fushionchart.php';
?>




</body>
</html>