<?php

function countt($table,$group){
	global $mysqli;

	$count=$mysqli->query("SELECT * FROM $table GROUP BY $group");
	return mysqli_num_rows($count);
}

function countaday($table,$day,$group){
	global $mysqli;
	if(empty($group)){
		$count=$mysqli->query("SELECT * FROM $table WHERE Ldate='$day'");
	}else{
		$count=$mysqli->query("SELECT * FROM $table WHERE Ldate='$day' GROUP BY $group");
	}
	return mysqli_num_rows($count);
}


function countamonth($table,$month,$group){
	global $mysqli;

	if(empty($group)){
		$count=$mysqli->query("SELECT * FROM $table WHERE month(Ldate)='$month'");
	}else{
		$count=$mysqli->query("SELECT * FROM $table WHERE month(Ldate)='$month' GROUP BY $group");
	}
	return mysqli_num_rows($count);
}


function countayear($table,$year,$group){
	global $mysqli;

	if(empty($group)){
		$count=$mysqli->query("SELECT * FROM $table WHERE year(Ldate)='$year'");
	}else{
		$count=$mysqli->query("SELECT * FROM $table WHERE year(Ldate)='$year' GROUP BY $group");
	}
	return mysqli_num_rows($count);
}


function statistikfb($tgl){
	global $mysqli;

	$count=$mysqli->query("SELECT * FROM user_facebook WHERE Ldate='$tgl'");
	return mysqli_num_rows($count);
}


function statistiktwttr($tgl){
	global $mysqli;

	$count=$mysqli->query("SELECT * FROM user_twitter WHERE Ldate='$tgl'");
	return mysqli_num_rows($count);
}

function countadv($kdadv){
	global $mysqli;

	$count=$mysqli->query("SELECT SUM(jml_klik) AS hitung FROM adklik WHERE kdadv='$kdadv'");
	$sql=$count->fetch_assoc();
	$hasil=$sql['hitung'];
	return $hasil;
}