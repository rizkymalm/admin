<?php

include'../config/db.php';
include'../models/m_products.php';

$date = date("Y-m-d H:i:s");
if (isset($_FILES['files']['name'])) {
	$readprd = showbyid($_POST['id']);
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	$valid_ext = array ('jpeg','jpg','png');
	$no = 0;
	$cekprd = $mysqli->query("SELECT * FROM wp_slideproduct WHERE kdproduct='$_POST[id]'");
	$count = mysqli_num_rows($cekprd);
	for ($i=0; $i < count($_FILES['files']['name']); $i++) { 
		$image = $_FILES['files']['name'][$i];
		$source = $_FILES['files']['tmp_name'][$i];
		$size = $_FILES['files']['size'][$i];
		$filedest = $_SERVER['DOCUMENT_ROOT']."/project/ourboutique/wp-content/uploads/products/"; // file destination
		$httpfiledest = "http://localhost/project/ourboutique/wp-content/uploads/products/";
		$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
		
		// switch if extention file is valid
		switch (in_array($ext, $valid_ext)) {
			case '1':
				$extcek = "benar";
				break;

			default:
				$extcek = "salah";
		}
		// switch if extention file is valid

		$no++;
		$count++;
		// change file name
		$filename = $readprd['productname'];
		$replace = str_replace(" ", "-", $filename);
		$newfilename = $replace."-".$count.".".$ext;		


		if ($extcek == "benar" && $size < 1000000) {
			move_uploaded_file($source,$filedest.$newfilename);
			$cekfile = $filedest.$newfilename;
			if (file_exists($cekfile) && addslide($readprd['kdproduct'],$httpfiledest.$newfilename,$date) == true) {
				echo "Succesfully to upload file ".$image."<br>";
			}else{
				echo "Filed to Upload File";
			}
		}elseif ($extcek != "benar") {
			echo "File '".$image."' do not support please upload only jpeg, jpg or png file only<br> ";
		}elseif ($size > 1000000) {
			echo "File '".$image."' is to large please upload file under 1Mb<br>";
		}
	}
}elseif (isset($_POST['id'])) {
	foreach ($_POST['id'] as $idslide) {
		$filedest = $_SERVER['DOCUMENT_ROOT']."/project/ourboutique/wp-content/uploads/products/slide/"; // file destination
		$cek = $mysqli->query("SELECT * FROM wp_slideproduct WHERE kdslide='$idslide'");
		$find = $cek->fetch_assoc();
		$arr = explode('/', $find['small_image']);
		$filename = $arr[9];
		$cekfile = $filedest.$filename;
		if (file_exists($cekfile)) {
			if (unlink($cekfile)) {
				$mysqli->query("DELETE FROM wp_slideproduct WHERE kdslide='$idslide'");
			}else{
				$mysqli->query("DELETE FROM wp_slideproduct WHERE kdslide='$idslide'");				
			}
		}else{
			$mysqli->query("DELETE FROM wp_slideproduct WHERE kdslide='$idslide'");			
		}
	}
	$alertSuccess = "<div class='alert info left'><b>SUCCESS</b>, Your file has been deleted </div>";
	$alertFailed = "<div class='alert warning left'><b>SORRY</b>, Failed to delete image </div>";
	if (mysqli_affected_rows($mysqli) > 0) {
		echo $alertSuccess;
	}else{
		echo $alertFailed;
	}	
}else{
	echo "ga ada";
}