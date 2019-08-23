<?php


function showmember($order,$limit,$mulai){
	global $mysqli;

	$query = "SELECT * FROM wp_member ORDER BY $order";
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

function pagemember($order,$limit){
	global $mysqli;

	$query = "SELECT * FROM wp_member ORDER BY $order";
	$sql = $mysqli->query($query);
	$count = mysqli_num_rows($sql);
	$pages = ceil($count/$limit);

	return $pages;
}

function memberbyId($id){
	global $mysqli;

	$query = $mysqli->query("SELECT * FROM wp_member WHERE kdmember='$id'");
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		$read = $query->fetch_assoc();
	}else{
		$read = "<div class='alert warning'>Sorry we cannot find the memeber</div>";
	}
	return $read;
}

// function addmember($id,$firstname,$lastname,$username,$email,$gen,$linkred){
// 	global $mysqli;

// 	$date = date("Y-m-d H:i:s");
// 	$save = $mysqli->query("INSERT INTO wp_member VALUES($id,$firstname,$lastname,$username,$email,'',$gen,$date,'n')");
// 	if ($save === TRUE) {
// 		echo "
// 		<script>
// 			window.location='$linkred'
// 		</script>
// 		";
// 	}
// }

class member
{
	private $date;
	public function addmember($id,$firstname,$lastname,$username,$email,$phone,$gen){
		global $mysqli;

		$date = date("Y-m-d H:i:s");
		$save = $mysqli->query("INSERT INTO wp_member VALUES('$id','$firstname','$lastname','$username','$email','$phone','','$gen','$date','n')");
		if ($save === TRUE) {
			$alert = "success";
		}else{
			$alert = "failed";
		}
		return $alert;
	}

	public function cekEmail($email){
		global $mysqli;
		$query = $mysqli->query("SELECT * FROM wp_member WHERE email_member='$email'");
		$find = mysqli_num_rows($query);
		if ($find == 0) {
			$cek = true; //jika email belum dipakai
		}else{
			$cek = false; //jika email belum dipakai
		}
		return $cek;
	}


	public function cekPhone($phone){
		global $mysqli;
		$query = $mysqli->query("SELECT * FROM wp_member WHERE phone_member='$phone'");
		$find = mysqli_num_rows($query);
		if ($find == 0) {
			$cek = true; //jika email belum dipakai
		}else{
			$cek = false; //jika email belum dipakai
		}
		return $cek;
	}

	public function inputAddress($member,$lokasi,$postcode,$fulladdress){
		global $mysqli;
		$date = date("Y-m-d H:i:s");
		$save = $mysqli->query("INSERT INTO member_address VALUES(null,'$member','$lokasi','$postcode','$fulladdress','$date')");
	}
}