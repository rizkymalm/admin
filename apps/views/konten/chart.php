<?php
//PAKE mysql biasa, bagi yg ga support (PHP 5.5) bisa pake mysqli
mysql_connect("localhost","root","");
mysql_select_db("wordpress");
//kita ngambil jumlah penjualan pertahun dan di grup kan tahun nya, karena banyak nilai tahun pada data
$now=date("Y-m-d");
$past=date('Y-m-d', strtotime('-30 days', strtotime($now)));
// $sql="Select SUM(visitperday) as m,tgl_visit from visitors GROUP BY tgl_visit";
$sql="Select SUM(jml_klik) as m,tgl_klik from adklik WHERE tgl_klik BETWEEN '$past' AND '$now' GROUP BY tgl_klik";
// $sql="Select from wp_checkout WHERE checkoutdate BETWEEN '$past' AND '$now'";
//jalankan query
$rs=mysql_query($sql);
//bikin variabel sebagai array untuk menampung data nantinya
$data=array();
//loooooooooop sebagai object, bisa pake fetch_array $row['field']
while ($row = mysql_fetch_object($rs)) {
	$data[]=array(
		'y'=>$row->tgl_klik, //y sebagai kata kunci nya (tahun)		
		'jumlah'=>$row->m, //jumlah penjualan
		);	
}
	//outputkan sebagai json
	echo json_encode($data);
?>