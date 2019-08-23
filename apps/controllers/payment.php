<?php 

include'apps/models/m_trx.php';
include'apps/models/m_products.php';

if (isset($_GET['inv'])) {
	include'apps/views/pages/detail_payment.php';
}else{
	include'apps/views/pages/payment.php';
}