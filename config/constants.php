<!-- Main SQL Database connection file -->
<?php
define('LOCALHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE_NAME', 'php-bbms');

define(
    'HOMEURL',
    'http://localhost/rohit-projects/php-projects/php-blood-bank/'
);

session_start();

($conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD)) or die(mysqli_error());

($db_select = mysqli_select_db($conn, DATABASE_NAME)) or die(mysqli_error());


?>