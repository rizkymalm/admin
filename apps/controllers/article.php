<?php 

include'apps/models/m_article.php';


if (isset($_GET['id'])) {
	include'apps/views/pages/detail_payment.php';
}else if (isset($_GET['act'])) {
	include'apps/views/pages/add_article.php';
}else{
	include'apps/views/pages/article.php';
}