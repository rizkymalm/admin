<?php 
if (isset($_GET['type'])) {
	$typepage = $_GET['type'];
	if ($typepage == "detail") {
		include'produk_detail.php';
	}elseif ($typepage == "statistik") {
		include'produk_stat.php';
	}elseif ($typepage == "galeri") {
		include'produk_galery.php';
	}
}else if(!isset($_GET['type'])){
	include'produk_detail.php';
}
?>