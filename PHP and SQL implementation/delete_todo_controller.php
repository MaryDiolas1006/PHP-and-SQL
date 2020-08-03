<?php
	// to get connection to database ($conn)
	require_once 'database.php';

	// var_dump($_GET["id"]);
	// get the id using get
	$id = $_GET['id'];

	// create query
	$sql_query = "DELETE FROM todos WHERE id = {$id}";
	// var_dump($sql_query);
	// var_dump($sql_query);
	$result = 	mysqli_query($conn, $sql_query);
	// var_dump($result);
	header("Location: {$_SERVER['HTTP_REFERER']}");
