<?php

include'../models/m_member.php';
foreach (glob('../config/*.php') as $config) {
	include $config;
}
if (isset($_POST['firstname'])) {
	$id = autoidmember();
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	if (isset($_POST['village']) && $_POST['village'] != "") {
		$lokasi = $_POST['village'];
	}elseif (!isset($_POST['village']) && isset($_POST['district']) && $_POST['district'] != "") {
		$lokasi = $_POST['district'];
	}elseif (!isset($_POST['village']) && !isset($_POST['district']) && isset($_POST['city']) && $_POST['city'] != "") {
		$lokasi = $_POST['city'];
	}elseif (!isset($_POST['village']) && !isset($_POST['district']) && !isset($_POST['city']) && isset($_POST['province']) && $_POST['province'] != "") {
		$lokasi = $_POST['province'];
	}
	$postcode = $_POST['postcode'];
	$fulladdress = $_POST['fulladdress'];
	$obj = new member();
	$cekemail = $obj->cekEmail($email);
	$cekphone = $obj->cekPhone($phone);
	if ($cekemail == false || $cekphone == false) {
		if ($cekemail == false && $cekphone == true) {
			$alert = "your email has been registered<br>Please use another email";
		}elseif ($cekphone == false && $cekemail == true) {
			$alert = "your phone number has been registered<br>Please use another phone number";
		}elseif ($cekphone == false && $cekphone == false){
			$alert = "your data has been registered<br>Please use another data";
		}
		echo '
			<p>
				<div class="fail-cross">
				  <div class="cross-icon">
				    <span class="icon-line line-tip"></span>
				    <span class="icon-line line-long"></span>
				    <div class="icon-circle"></div>
				    <div class="icon-fix"></div>
				  </div>
				</div>
			</p>
			<p class="size-head2 nopad" style="color: #fd5454">
				Oooppss sorry... </p>
			<p style="color: #fd5454">'.$alert.'</p>
		';
			?>
			<script>
				$('.popupBtn .myButton-gradBlueGreen').text('Try Again');
				$('.popupBtn .myButton-white').text('Close');
			</script>
			<?php
	}else{
		$save = $obj->addmember($id,$firstname,$lastname,$username,$email,$phone,$gender);
		$saveaddress = $obj->inputAddress($id,$lokasi,$postcode,$fulladdress);
		if ($save == "success") {
			echo '
				<p>
					<div class="success-checkmark">
					  <div class="check-icon">
					    <span class="icon-line line-tip"></span>
					    <span class="icon-line line-long"></span>
					    <div class="icon-circle"></div>
					    <div class="icon-fix"></div>
					  </div>
					</div>
				</p>
				<p class="size-head2 nopad" style="color: #62b965">
					SUCCESS
				</p>
			';
			?>
			<script>
				$('.popupBtn .myButton-gradBlueGreen').text('Go to list').attr("href", "http://localhost/project/ouradmin/?page=member");
				$('.popupBtn .myButton-white').text('Add more');
			</script>
			<?php
		}
	}
}elseif ($_POST['title_event']) {
	$id = autoid('kdevent','wp_event','created_event');
	$title = $_POST['title_event'];
	$start = $_POST['startOn'];
	$end = $_POST['endOn'];
	$url = $_POST['url_event'];
	$desc = $_POST['txtevent'];
	
}
