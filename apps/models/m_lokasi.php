<?php

function province(){
	global $mysqli;

	$query = "SELECT * FROM inf_lokasi WHERE lokasi_kabupatenkota = 0 AND lokasi_kecamatan = 0 AND lokasi_kelurahan = 0 ORDER BY lokasi_nama";
	$sql = $mysqli->query($query);
	while ($read = $sql->fetch_assoc()) {
		$res[]=$read;
	}

	return $res;
}

function city($id){
	global $mysqli;

	$query = "SELECT * FROM inf_lokasi where lokasi_propinsi=$id AND lokasi_kecamatan = 0 AND lokasi_kelurahan = 0 AND lokasi_kabupatenkota != 0 ORDER BY lokasi_nama";
	$sql = $mysqli->query($query);
	while ($read = $sql->fetch_assoc()) {
		$res[]=$read;
	}
	return $res;
}

function district($idprov,$idcity){
	global $mysqli;

	$query = "SELECT * FROM inf_lokasi WHERE lokasi_propinsi = $idprov AND lokasi_kecamatan != 0 AND lokasi_kelurahan = 0 AND lokasi_kabupatenkota = $idcity ORDER BY lokasi_nama";
	$sql = $mysqli->query($query);
	while ($read = $sql->fetch_assoc()) {
		$res[]=$read;
	}
	return $res;
}

function village($idprov,$idcity,$iddist){
	global $mysqli;

	$query = "SELECT * FROM inf_lokasi WHERE lokasi_propinsi = $idprov AND lokasi_kecamatan = $iddist AND lokasi_kelurahan != 0 AND lokasi_kabupatenkota = $idcity ORDER BY lokasi_nama";
	$sql = $mysqli->query($query);
	while ($read = $sql->fetch_assoc()) {
		$res[]=$read;
	}
	return $res;
}