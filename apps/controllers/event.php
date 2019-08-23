<?php


include'apps/models/m_event.php';


if (isset($_GET['act'])) {
	include'apps/views/pages/add_event.php';
}else{
	include 'apps/views/pages/list_event.php';
}