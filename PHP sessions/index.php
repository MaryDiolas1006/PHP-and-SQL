<?php session_start(); 
  echo $_SESSION['username'];
  echo $_SESSION['kopi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Sessions</title>
</head>
<body>
    <a href="page1.php">Go to Page 1</a>
    
	<h1>Please Login</h1>
	<form action="page1.php" method="post">
		<input type="text" name="username" placeholder="Enter your username">
		<button>Login</button>
	</form>
	
</body>
</html>