<?php 


function showArticle($order,$mulai,$limit){
	global $mysqli;

	$query = "SELECT * FROM wp_article ORDER BY $order";
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


function pageArticle($order,$limit){
	global $mysqli;

	$query = "SELECT * FROM wp_article ORDER BY $order";
	$sql = $mysqli->query($query);
	$count = mysqli_num_rows($sql);
	$pages = ceil($count/$limit);

	return $pages;	
}