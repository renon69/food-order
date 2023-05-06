<?php 
//start session
session_start();

//create constants 
define('SITE_URL', 'http://localhost/project-1/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_errr());
$db_connect = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>