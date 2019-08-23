<?php
function showprd(){
	global $mysqli;
	$query = $mysqli->query("SELECT * FROM wp_product");
	$count = mysqli_num_rows($query);
	if ($count > 0 ) {
		while ($sql = $query->fetch_assoc()) {
			$read[]=$sql;
		}
		return $read;
	}
}

function showbrand(){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_brand");
	$count = mysqli_num_rows($query);
	if ($count > 0 ) {
		while ($sql = $query->fetch_assoc()) {
			$read[]=$sql;
		}
		return $read;
	}
}

function addproduct($id,$gen,$brand,$name,$image,$price,$discount,$status,$addinfo,$initgen,$stock,$linkred){
	global $mysqli;

	$save=$mysqli->query("INSERT INTO wp_product VALUES('$id','$gen','$brand','$name','$image','$price','$discount','$status','$addinfo','$initgen','$stock','0','".date("Y-m-d H:i:s")."')");
	if ($save === TRUE) {
		echo "
			<script>
				window.location='$linkred'
			</script>
		";
	}
}

function showbyid($id){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM wp_product WHERE kdproduct='$id'");
	$sql=$query->fetch_assoc();
	return $sql;
}

function adddesc($id,$desc){
	global $mysqli;
	$save = $mysqli->query("INSERT INTO wp_descproduct VALUES(null,'$id','$desc')");
}

function upddesc($id,$desc){
	global $mysqli;
	$cek = $mysqli->query("SELECT * FROM wp_descproduct WHERE kdproduct='$id'");
	$count = mysqli_num_rows($cek);
	if ($count > 0) {
		$mysqli->query("UPDATE wp_descproduct SET description='$desc' WHERE kdproduct='$id'");
	}else{
		$mysqli->query("INSERT INTO wp_descproduct VALUES(null,'$id','$desc')");
	}
}

function addslide($id,$img,$update){
	global $mysqli;
	$save = $mysqli->query("INSERT INTO wp_slideproduct VALUES(null,'$id','$img','$img','$update')");

	return true;
}


function showdesc($id){
	global $mysqli;
	$query = $mysqli->query("SELECT (description) AS descprd FROM wp_descproduct WHERE kdproduct='$id'");
	$sql = $query->fetch_assoc();
	$read = $sql['descprd'];
	return $read;
}

function brandbyid($id){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM wp_brand WHERE kdbrand='$id'");
	$sql=$query->fetch_assoc();
	return $sql;
}

function showaddinfo($id){
	global $mysqli;

	// $cek=$mysqli->query("SELECT * FROM wp_product WHERE kdproduct='$id'");
	// $c=$cek->fetch_assoc();
	// if ($c['additional_product'] == "size") {
	// 	$addprd = 'size_info';
	// }else{
	// 	$addprd = 'color_info';
	// }


	$query=$mysqli->query("SELECT (add_info) as addprd FROM wp_addinfo WHERE kdproduct='$id'");
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		while ($sql = $query->fetch_assoc()) {
			$read[]=$sql['addprd'];
		}
	}else{
		$read[] = "";
	}
	return $read;
}


function showorderby($order,$limit){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_product ORDER BY $order DESC LIMIT $limit");
	while ($sql = $query->fetch_assoc()) {
		$read[]=$sql;
	}
	return $read;
}


function checked($value,$status){
	if ($value == $status) {
		$checkstatus = "checked";
		return $checkstatus;
	}
}

function galeryprd($id){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM wp_slideproduct WHERE kdproduct='$id'");
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		while ($sql=$query->fetch_assoc()) {
			$read[]=$sql;
		}		
	}else{
		$read = "";
	}
	return $read;

}