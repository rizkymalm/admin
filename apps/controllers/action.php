<?php

include'apps/models/m_adv.php';
include'apps/models/m_products.php';
include'apps/models/m_member.php';

if (isset($_POST['addnewprd'])) {
	$id = autoid('kdproduct','wp_product','update_time');
	$name = $_POST['prname'];
	$brand = $_POST['brand'];
	$status = $_POST['status'];
	$gender = $_POST['gender'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$addtype = $_POST['addtype'];
	$stock = $_POST['stock'];
	$image = $_FILES['img_prd']['name'];
	$source = $_FILES['img_prd']['tmp_name'];
	$valid_ext = array ('jpeg','jpg','png');
	$size = $_FILES['img_prd']['size'];
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
	switch ($gender) {
		case '1':
			$gen = 'm';
			break;
		case '2':
			$gen = 'w';
			break;
	}



	$desc = $_POST['desc'];
	$addinfo = $_POST['addinfo'];
	$changechar = str_replace(array('[', ']', '"', ','), array('', '', '', ' '), $addinfo);
	$redirect = $base_url."?page=products";

	// replacing image name
	$filename = $name;
	$replace = str_replace(" ", "-", $filename);
	$newfilename = $replace.".".$ext;

	$exp_addinfo = explode (" ",$changechar);
	$count_addinfo = count($exp_addinfo);
	
	if ($extcek == "benar" && $size < 1000000) {
		if (!move_uploaded_file($source,$filedest.$newfilename)) {
			echo "
				<script>
					window.history(-1)
				</script>
			";
		}else{
			move_uploaded_file($source,$filedest.$newfilename);
			adddesc($id,$desc);
			for ($i=0; $i < $count_addinfo ; $i++) { 
				$type = $exp_addinfo[$i];
				$save = $mysqli->query("INSERT INTO wp_addinfo VALUES(null,'$id','$exp_addinfo[$i]','$addtype')");
			}
			addproduct($id,$gender,$brand,$name,$httpfiledest.$newfilename,$price,$discount,$status,$addtype,$gen,$stock,$redirect);
			addslide($id,$httpfiledest.$newfilename,$date);
		}
		
	}else{
		echo "
			<script>
				alert('Error uploading image, please check your image file')
				window.history.back();
			</script>
		";
	}
}else if(isset($_GET['delete'])){
	$deleteid = $_GET['delete'];
	$cek = $mysqli->query("SELECT * FROM wp_product WHERE kdproduct='$deleteid'");
	$find = mysqli_num_rows($cek);
	if ($find > 0) {
		$actdeleteinfo = $mysqli->query("DELETE FROM wp_addinfo WHERE kdproduct='$deleteid'");
		$actdelete = $mysqli->query("DELETE FROM wp_product WHERE kdproduct='$deleteid'");		
		$actdeletedesc = $mysqli->query("DELETE FROM wp_descproduct WHERE kdproduct='$deleteid'");
		if ($actdelete == TRUE) {
			echo "
			<script>
			window.location='$base_url?page=products'
			</script>
			";
		}
	}
}elseif (isset($_POST['imgdel'])) {
	$checkimg = $_POST['imgdel'];
	$filedest = $_SERVER['DOCUMENT_ROOT']."/project/ourboutique/wp-content/uploads/products/slide/"; // file destination
	for ($i=0; $i < count($checkimg); $i++) {
		$cek = $mysqli->query("SELECT * FROM wp_slideproduct WHERE kdslide='$checkimg[$i]'");
		$find = $cek->fetch_assoc();
		$arr = explode('/', $find['small_image']);
		$filename = $arr[9];
		$cekfile = $filedest.$filename;
		if (file_exists($cekfile)) {
			if (unlink($cekfile)) {
				$delete = $mysqli->query("DELETE FROM wp_slideproduct WHERE kdslide='$checkimg[$i]'");
				if ($delete = TRUE) {
					echo "
					<script>
					window.location='$base_url?page=products&pid='
					</script>
					";
				}				
			}else{
				echo "file cannot be delete";
			}
		}else{
			$delete = $mysqli->query("DELETE FROM wp_slideproduct WHERE kdslide='$checkimg[$i]'");
			if ($delete = TRUE) {
				echo "file has been delete";
			}
		}		

	}
}elseif (isset($_POST['editprd'])) {
	$readprd = showbyid($_POST['prid']);
	$id 	= $_POST['prid'];
	$name 	= $_POST['prname'];
	$brand	= $_POST['brand'];
	$price	= $_POST['price'];
	$discount=$_POST['discount'];
	$stock	= $_POST['stock'];
	$kdgender	= $_POST['gender'];
	if ($kdgender == '1') {
		$gender = "m";
	}elseif ($kdgender == '2') {
		$gender = "w";
	}
	$status	= $_POST['status'];
	$addtype= $_POST['addtype'];
	$desc 	= $_POST['desc'];
	$date	= date("Y-m-d H:i:s");
	$update = $mysqli->query("UPDATE wp_product SET productname='$name', kdbrand='$brand', productprice='$price', kdgender='$kdgender', gender_product='$gender', discount='$discount', status='$status', additional_product='$addtype', stock_product='$stock', update_time='$date' WHERE kdproduct='$id'") or die('err');	
	if ($update) {
		upddesc($readprd['kdproduct'],$desc);
		$addinfo = $_POST['addinfo'];
		$changechar = str_replace(array('[', ']', '"', ','), array('', '', '', ' '), $addinfo);
		$redirect = $base_url."?page=products";
		$exp_addinfo = explode (" ",$changechar);
		$count_post_addinfo = count($exp_addinfo);
		// cek additional info
		$cekinfo = $mysqli->query("SELECT * FROM wp_addinfo WHERE kdproduct = '$_POST[prid]'");
		$countinfo = mysqli_num_rows($cekinfo);
		if ($countinfo == $count_post_addinfo) {
			echo "jumlah masih sama";
		}elseif ($countinfo > $count_post_addinfo) {
			$query_addinfo=$mysqli->query("SELECT * FROM wp_addinfo WHERE kdproduct='$id'");
			while ($find=$query_addinfo->fetch_assoc()) {
				if (!in_array($find['add_info'], $exp_addinfo)) {
					$mysqli->query("DELETE FROM wp_addinfo WHERE kdproduct='$id' AND add_info='$find[add_info]'");
				}
			}
		}elseif ($countinfo < $count_post_addinfo) {
			for ($i=0; $i < $count_post_addinfo; $i++) {
				$query_addinfo=$mysqli->query("SELECT * FROM wp_addinfo WHERE kdproduct='$id' AND add_info='$exp_addinfo[$i]'");
				$find=$query_addinfo->fetch_assoc();
				if ($find['add_info'] != $exp_addinfo[$i]) {
					$mysqli->query("INSERT INTO wp_addinfo VALUES(null,'$id','$exp_addinfo[$i]','$addtype')");
				}
			}
		}
		echo "
		<script>
		window.location='$base_url?page=products&pid=$id'
		</script>
		";
	}else{
		echo "
			<script>
				window.history(-1)
			</script>
		";
	}	
}elseif (isset($_POST['article'])) {
	$title = $_POST['title'];
	$date = date("Y-m-d H:i:s");
	$imgthumb = $_FILES['img_thumb']['name'];
	$source = $_FILES['img_thumb']['tmp_name'];
	$article = $_POST['txtarticle'];
	$id = autoid("kdarticle","wp_article","date_article");
	copy($source, '../ourboutique/wp-content/uploads/article/'.$imgthumb);
	
	if ($mysqli->query("INSERT INTO wp_article VALUES('$id','$title','$article','$imgthumb','$date','0')")) {
		echo "
		<script>
		window.location='$base_url?page=article'
		</script>
		";
	}else{
		echo "
			<script>
				alert('sorry something went wrong')
				window.history(-1)
			</script>
		";
	}

}else if (isset($_POST['updpayment'])) {
	$id = $_POST['invid'];
	if (isset($_POST['status'])) {
		$updateck = $mysqli->query("UPDATE wp_checkout SET status_payment='y' WHERE kdcheckout='$id'");
		$updatepay = $mysqli->query("UPDATE wp_payment SET confirm_payment='y' WHERE kdcheckout='$id'");
		if ($updateck && $updatepay) {
			echo "
			<script>
				alert('Status payment $id being confirmation')
				window.location='$base_url?page=payment&inv=$id'
			</script>
			";
		}else{
			echo"
				<script>
					alert('sorry something went wrong')
					window.history(-1)
				</script>
			";
		}
	}else{
		$updateck = $mysqli->query("UPDATE wp_checkout SET status_payment='n' WHERE kdcheckout='$id'");
		$updatepay = $mysqli->query("UPDATE wp_payment SET confirm_payment='n' WHERE kdcheckout='$id'");
		if ($updateck && $updatepay) {
			echo "
			<script>
				alert('Status payment $id being cancel')
				window.location='$base_url?page=payment&inv=$id'
			</script>
			";
		}else{
			echo"
				<script>
					alert('sorry something went wrong')
					window.history(-1)
				</script>
			";
		}
	}
}elseif ($_POST['event']) {
	
}