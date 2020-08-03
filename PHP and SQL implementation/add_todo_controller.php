<?php

require_once 'database.php';

 //to get the data from index
$todo = $_POST['todo'];

//create an sql query
$sql_query = "INSERT INTO todos(todo) VALUES('{$todo}')";
echo $sql_query;

//to make a query to database
// use mysqli_query($connection, $query)function
  // if return boolean true, it is successful. If return false, it is unsuccessful.

$result = mysqli_query($conn, $sql_query);
// var_dump($result);  
header("Location: {$SERVER['HTTP_REFERER']}");
echo "<pre>", var_dump($_SERVER), "</pre>";

