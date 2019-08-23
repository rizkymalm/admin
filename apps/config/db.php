<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "wordpress";



// mysql_connect($host,$username,$password) or die('error');
// mysql_select_db($database) or die('error');

$mysqli= new MySQLi($host,$username,$password,$database);
