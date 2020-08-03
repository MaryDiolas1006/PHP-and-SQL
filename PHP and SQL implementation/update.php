<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Todo</title>
</head>
<body>
	<h1>Update</h1>
	<?php 
		require_once 'database.php';

		$sql_query = "SELECT * FROM todos WHERE id = {$_GET['id']}";

		$result = mysqli_query($conn, $sql_query);
		// die (var_dump(mysqli_num_rows($result)));
		// mysqli_num_rows return the number of rows of our query
		if (mysqli_num_rows($result) < 1) {
			header("Location: 404.php");
		}

		$todo = mysqli_fetch_assoc($result);
		// var_dump($todo);
	?>
	<form action="update_todo_controller.php?id=<?php echo $todo['id'] ?>" method="post">
		<input type="text" name="todo" value="<?php echo $todo['todo'] ?>">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<button>Update Todo</button>
	</form>
</body>
</html>
