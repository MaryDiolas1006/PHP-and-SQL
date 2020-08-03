<?php 
session_start();

//create a user session

$_SESSION['user'] = $_POST['username'];


// redirect the user to home.php
header('location: ./../views/home.php');