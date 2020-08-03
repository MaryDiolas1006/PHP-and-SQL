<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Registration Page</title>
</head>
<body>
	<!-- Create a form that uses post method going to result.php -->
	<!-- full name -->
	<!-- username -->
	<!-- password -->
	<!-- confirm password -->
	<!-- email -->
	<!-- birthday -->

	<form action="result.php" method="post">
		<label for="fullname">FullName:</label><br>
		<input type="text" id="fullname" name="fullname" placeholder="Fullname">
		<br>
		<br>
		<label for="username">Username:</label><br>
		<input type="text" id="username" name="username" Placeholder="Username">
		<br><br>
		<label for="email">Email:</label>
		<br>
		<input type="text" id="email" name="email" placeholder="Email">
		<br>
		<br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password" placeholder="Password">
		<br>
		<br>
		<label for="password2">Confirm Password:</label><br>
		<input type="password" id="password2" name="password2" placeholder="Confirm Password">
		<br>
		<br>
		<label for="birthday">Birthday:</label>
         <br>
		<input type="date" name="birthday" id="birthday" >
		<br><br>
		<button type="submit">Submit</button>
		
	</form>
	
</body>
</html>