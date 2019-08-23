<?php

function readfb(){
	global $mysqli;

	$query=$mysqli->query("SELECT * FROM user_facebook WHERE Ldate='".date("Y-m-d")."'");
	$count=mysqli_num_rows($query);
	if ($count==0) {
		
	}else{
		while ($sql=$query->fetch_assoc()) {
			$read[]=$sql;
		}
		return $read;
	}
}