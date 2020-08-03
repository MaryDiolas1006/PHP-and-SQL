<?php

// connection to db
require_once './connection.php';

// query
$name = trim($_POST['name']);
// var_dump($name);
// manual testing
if(!$name){
	
	header("Location: {$_SERVER['HTTP_REFERER']}");
}else {
	// if name is not empty
	// create a query and send it to database

$sql_query = "INSERT INTO categories (name) VALUES ('{$name}')";
// var_dump($sql_query);

// send the query to database using the connection
$result = mysqli_query($conn, $sql_query);

// var_dump($result);
// change the query string depending on the result
if ($result){
      // header is use to return in own location
	header("Location: ./../views/category.php?success=true");
}else {
     // header is use to return in own location
	header("Location: ./../views/category.php?success=false");

}

}
