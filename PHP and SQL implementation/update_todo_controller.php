<?php
	require_once 'database.php';

	$todo = $_POST['todo'];
	$id = $_GET['id'];
	// $id =  $_POST['id'];

	$sql_query = "UPDATE todos SET todo='{$todo}' WHERE id = {$id}";

	// var_dump($sql_query);
	$result = mysqli_query($conn, $sql_query);
	// var_dump($result);

	header("Location: /");
