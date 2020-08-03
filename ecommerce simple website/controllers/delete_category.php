<?php
session_start();
// var_dump($_GET['id']);

// connection
require_once './connection.php';

// query
$sql_query = "DELETE FROM categories WHERE id = {$_GET['id']}";

mysqli_query($conn, $sql_query);

// create a session for result. session is use to access data from one page to another page 
$_SESSION['result'] = "Category is deleted successfully";

// header is use to return in own location
header("Location: ./../views/category.php");