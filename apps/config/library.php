<?php
  function randomString($length, $type = '') {
  // Select which type of characters you want in your random string
  switch($type) {
    case 'num':
      // Use only numbers
      $salt = '1234567890';
      break;
    case 'lower':
      // Use only lowercase letters
      $salt = 'abcdefghijklmnopqrstuvwxyz';
      break;
    case 'upper':
      // Use only uppercase letters
      $salt = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      break;
    default:
      // Use uppercase, lowercase, numbers, and symbols
      $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      break;
  }
  $rand = '';
  $i = 0;
  while ($i < $length) { // Loop until you have met the length
    $num = rand() % strlen($salt);
    $tmp = substr($salt, $num, 1);
    $rand = $rand . $tmp;
    $i++;
  }
  return $rand; // Return the random string
}


function auto($abc,$date,$num){
	global $mysqli;
	//tanggal sekarang berdasarkan $date
	$now=$date;
	
	//panggil data dalam database
	$max=$mysqli->query("SELECT MAX(kdadv)AS kode FROM advertising");
	$result=$max->fetch_assoc();
	
	//inisial statis yang selalu tampil
	$inisial=$abc.$now;
	
	//random angka
	$rand=randomString(3, $type = '');
	//menghitung karakter inisial
	$char=strlen($inisial);
	
	
	//panggil data terakhir dalam database
	$lastid=substr($result['kode'],0,$char);
	$lastdigit=substr($result['kode'],$char,$num);


	//statement jika data terakhir sama dengan tanggal sekarang
	if($lastid==$inisial){
		$tambah=$lastdigit + 1;		
		$auto=$inisial.sprintf('%0'.$num.'s',$tambah).$rand;
	}else{
		$tambah= 0 + 1;		
		$auto=$inisial.sprintf('%0'.$num.'s',$tambah).$rand;
	}
	return $auto;
}


function autoid($field,$table,$orderby){
	global $mysqli;

	$today=date("m");
	$query=$mysqli->query("SELECT ($field) as kode FROM $table ORDER BY $orderby DESC LIMIT 1");
	$max=$query->fetch_assoc();

	$rand=rand(111,999);
	$newday=$today."0001".$rand;

	$lastid=substr($max['kode'],1,1);
	$lastdigit=substr($max['kode'],2,4);

	$sameday=$lastdigit + 1;

	if ($lastid==$today) {
		$newcode=$today.sprintf('%04s', $sameday).$rand;
	}else{
		$newcode=$newday;
	}
	return $newcode;
}

function autoidmember(){
	global $mysqli;
	$today=date("my");
	$max=$mysqli->query("SELECT * FROM wp_member ORDER BY register_date DESC, kdmember DESC");
	$count=$max->fetch_assoc();
	$initial=rand(100,999).$today;
	$newday=$initial."001";
	$lastid=substr($count['kdmember'],3,4);
	$lastdigit=substr($count['kdmember'],7,3);
	$sameday=$lastdigit + 1;
	if ($lastid==$today) {
		$newcode=$initial.sprintf('%03s', $sameday);
	}else{
		$newcode=$newday;
	}
	return $newcode;
}


function formatdate($date){
	$format = date('d M', strtotime($date));
	return $format;
}