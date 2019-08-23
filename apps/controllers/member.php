<?php

include'apps/models/m_member.php';
include'apps/models/m_lokasi.php';

if (isset($_GET['act'])) {
	include'apps/views/pages/addnewmember.php';
}else{
	include'apps/views/pages/member.php';
}