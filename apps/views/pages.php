<?php 

if (isset($_GET['page'])) {

	switch ($_GET['page']) {
		case 'dashboard':
			include'apps/controllers/dashboard.php';
			break;

		case 'products':
			include'apps/controllers/products.php';
			break;
		
		case 'export':
			include'apps/controllers/export.php';
			break;

		case 'action':
			include'apps/controllers/action.php';
			break;

		case 'transaction':
			include'apps/controllers/transaction.php';
			break;

		case 'payment':
			include'apps/controllers/payment.php';
			break;

		case 'invoice':
			include'apps/controllers/invoice.php';
			break;

		case 'article':
			include'apps/controllers/article.php';
			break;

		case 'member':
			include'apps/controllers/member.php';
			break;

		case 'profile':
			include'apps/controllers/profile.php';
			break;

		case 'event':
			include'apps/controllers/event.php';
			break;
	}
}else{
	include'apps/controllers/dashboard.php';
}