<?php
session_start();
require_once './connection.php';

// get all the credentials given by the user
$email = $_POST['email'];
$password = $_POST['password'];


// check the database if email matches the given email by the user
$sql_query = "SELECT * FROM users WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql_query);
$user_info = mysqli_fetch_assoc($result);


// if password given match with the password in database
  //hashed should be verify

if (password_verify($password, $user_info['password'])){
	//to save the user
	$_SESSION['user'] = $user_info;
	
	header("Location: /");

}else{
  
    $_SESSION['errors']['login'] = "Failed";
   

	header("Location: {$_SERVER['HTTP_REFERER']}");
}

// if email and password matched, create a session for user