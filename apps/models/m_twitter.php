<?php

function readtwitter(){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM user_twitter WHERE Ldate='".date("Y-m-d")."'");
	$count=mysqli_num_rows($query);
	if ($count!=0) {
		while ($sql=$query->fetch_assoc()) {
			$read[]=$sql;
		}
		return $read;
	}
}