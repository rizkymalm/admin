<?php

include'apps/models/m_products.php';


if (isset($_GET['act'])) {
	include'apps/views/pages/addnewprd.php';
}elseif (isset($_GET['pid'])) {
	include'apps/views/pages/detailprd.php';
}elseif (isset($_GET['edit'])) {
	include'apps/views/pages/editprd.php';
}else{
	include'apps/views/pages/products.php';
}

