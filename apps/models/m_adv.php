<?php

function readadv(){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM advertising");
	while ($sql=$query->fetch_assoc()) {
		$read[]=$sql;
	}
	return $read;
}


function locationname($kdloc){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM location WHERE kdlocation='$kdloc'");
	$sql=$query->fetch_assoc();
	$location=$sql['location'];

	return $location;
}

function selloc(){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM location");
	$cek=mysqli_num_rows($query);
	if ($cek>0) {
		while($sql=$query->fetch_assoc()){
			$read[]=$sql;
		}
	}
	return $read;
}

function selectadv($kdadv){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM  advertising WHERE kdadv='$kdadv'");

	$cek=mysqli_num_rows($query);
	if ($cek==1) {
		$sql=$query->fetch_assoc();
		$read[]=$sql;
	}
	return $read;
}


function addadv($id,$adv,$email,$telp,$alamat,$lokasi,$image,$link,$start,$finish){
	global $mysqli;

	$query=$mysqli->query("INSERT INTO advertising SET kdadv='$id', kdlocation='$lokasi', advertising='$adv', img_adv='$image', address='$alamat', phone='$telp', email='$email', link_adv='$link' start='$start', finish='$finish', status='n'");

	if ($query) {
		echo"sukses";
	}else{
		echo mysql_error();
	}
	return $query;
}