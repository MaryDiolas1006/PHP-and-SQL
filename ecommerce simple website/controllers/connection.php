<?php
// what we need
// host
define('DB_HOST', 'localhost');

// db_username
define('DB_USERNAME', 'root');

// db_password
define('DB_PASSWORD', '');

// db_name
define('DB_NAME', 'pushcart');

$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

// var_dump($conn);
