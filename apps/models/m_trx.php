<?php

function soldtoday(){
	global $mysqli;

	$date = date("Y-m-d");
	$i = 0;
	$query = $mysqli->query("SELECT * FROM wp_checkout WHERE DATE(checkoutdate)='$date' AND status_payment='y'");
	while($sql=$query->fetch_assoc()){
		$i++;
		$detail = $mysqli->query("SELECT SUM(qty_detail) AS totalqty FROM wp_detailcheckout WHERE kdcheckout = '$sql[kdcheckout]'");
		$sqldet=$detail->fetch_assoc();
		$totalqty[$i]= $sqldet['totalqty'];
	}
	$count = mysqli_num_rows($query);
	if ($count>0) {
		$total = array_sum($totalqty);
	}else{
		$total = "0";
	}
	return $total;
}

function todayrevenue(){
	global $mysqli;

	$date = date("Y-m-d");
	$query = $mysqli->query("SELECT SUM(total_payment) AS total FROM wp_checkout WHERE DATE(checkoutdate)='$date' AND status_payment='y'");
	$sql=$query->fetch_assoc();
	echo $sql['total'];
}

function showpayment(){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_payment");
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		while ($sql = $query->fetch_assoc()) {
			$read[]=$sql;
		}
	}else{
		$read[]=" ";
	}
	return $read;
}


function paymentId($id){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_payment WHERE kdcheckout='$id'");
	$sql = $query->fetch_assoc();

	return $sql;
}

function showinv($order,$limit,$mulai){
	global $mysqli;

	$query = "SELECT * FROM wp_checkout WHERE status_payment='n' ORDER BY $order";
	$sql = $mysqli->query($query);
	$count = mysqli_num_rows($sql);
	$pages = ceil($count/$limit);
	$queryperpage = $mysqli->query($query." LIMIT $mulai, $limit");
	if ($count > 0) {
		while ($sqlperpage = $queryperpage->fetch_assoc()) {
			$read[] = $sqlperpage;
		}
	}else{
		$read[] = "";
	}
	return $read;
}

function pageinv($order,$limit){
	global $mysqli;

	$query = "SELECT * FROM wp_checkout WHERE status_payment='n' ORDER BY $order";
	$sql = $mysqli->query($query);
	$count = mysqli_num_rows($sql);
	$pages = ceil($count/$limit);

	return $pages;	
}


function invoicebyID($id){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_checkout WHERE kdcheckout='$id'");
	$sql=$query->fetch_assoc();

	return $sql;
}

function detailChekcout($id){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_detailcheckout WHERE kdcheckout='$id'");
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		while ($sql = $query->fetch_assoc()) {
			$read[]=$sql;
		}
		return $read;
	}
}
