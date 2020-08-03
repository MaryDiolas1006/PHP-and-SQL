<?php 
// connection
require_once './connection.php';

// query
$sql_query = "DELETE FROM products WHERE id = {$_GET['id']}";

// result
 mysqli_query($conn, $sql_query);

// redirect to home
header("Location: /")

?>