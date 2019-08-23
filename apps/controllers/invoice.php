<?php 

include'apps/models/m_trx.php';
include'apps/models/m_products.php';
include'apps/models/m_member.php';

if (isset($_GET['inv'])) {
	include'apps/views/pages/detail_invoice.php';
}else{
	include'apps/views/pages/invoice.php';
}