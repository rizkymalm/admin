<?php 
foreach (glob('../../config/*.php') as $config) {
	include $config;
}
include'../../models/m_lokasi.php';
if (isset($_GET['province'])) {
	$province = $_GET['province'];
	foreach (city($province) as $key => $value) {
		echo '<option value="'.$value['lokasi_kode'].'">'.$value['lokasi_nama'].'</option>';
	}
}

if (isset($_GET['city']) && isset($_GET['prov']) && !isset($_GET['district'])) {
	$prov = $_GET['prov'];
	$city = $_GET['city'];
	foreach (district($prov,$city) as $key => $value) {
		echo '<option value="'.$value['lokasi_kode'].'">'.$value['lokasi_nama'].'</option>';
	}
}

if (isset($_GET['city']) && isset($_GET['prov']) && isset($_GET['district'])) {
	$prov = $_GET['prov'];
	$city = $_GET['city'];
	$district = $_GET['district'];
	foreach (village($prov,$city,$district) as $key => $value) {
		echo '<option value="'.$value['lokasi_kode'].'">'.$value['lokasi_nama'].'</option>';
	}
}
