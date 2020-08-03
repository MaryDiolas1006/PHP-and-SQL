<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Uploading Files</title>
</head>
<body>
     <!-- enctype="multipart/form-data"- use to see files that you uploaded -->
	<h1>Add Product form</h1>

	<form action="controller.php" method="post" enctype="multipart/form-data">
		<label for="name">Product Name:</label>
		<br>
		<input type="text" name="name" id="name">
		<br>

		<label for="image">Product Image:</label>
		<br>
		<input type="file" name="image" id="image">
		<br>

		<label for="price">Product Price:</label>
		<br>
		<input type="number" name="price" id="price">
		<br>

		<button type="submit">Add Product</button>
	</form>
	
</body>
</html>