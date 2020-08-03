<?php
session_start();

// conn

require_once './connection.php';

//query
// var_dump($_POST['name']);
// trim is deleting white spaces in the beginning and end
$name = trim($_POST['name']);
if(!$name) {

	$_SESSION['message'] = "Category name is required";
	// message color
     $_SEESION['message_color'] = "danger";

}else {


$sql_query = "UPDATE categories SET name = '{$name}' WHERE id = {$_GET['id']}";

// send the query to database
$result = mysqli_query($conn, $sql_query);

// var_dump($result);

if (!$result){
    
    $_SESSION['message'] = "Category already exists";
    $_SESSION['message_color'] = "danger";

}else{

	$_SESSION['message'] = "Category is edited successfully";
	$_SEESION['message_color'] = "success";

}

}

	header("Location: {$_SERVER['HTTP_REFERER']}");