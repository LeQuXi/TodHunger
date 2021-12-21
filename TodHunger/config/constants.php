<?php
session_start();



//  Database Constants
define('SITEURL', 'http://localhost/TodHunger/');
define('LOCALHOST', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'TodHunger');
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
// $res =mysqli_query($conn, $sql) or die(mysqli_error());

?>