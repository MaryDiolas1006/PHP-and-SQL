<?php 
session_start();

echo "<pre>", var_dump($_POST), "</pre>";
echo "<pre>", var_dump($_FILES), "</pre>";

$errors = 0;

foreach ($_POST as $field => $input_value){
	// echo "$field input is $input_value <br>";

	if(trim($input_value)){
		// echo "$field is not empty <br>";
		//for value field will stay in the input even after submission
		$_SESSION['old'][$field] = $input_value;
	}else {

		// echo "$field is empty";
		$_SESSION['errors'][$field] = "empty";
		$errors++;
	}
}

// var_dump($_FILES['image']['name']);

if(!$_FILES['image']['name']) {
	
	// echo "image doesn't exist";
	$errors++;
}else {

$image_extension_name = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

if(
	
	  !($image_extension_name === 'jpg' ||
		$image_extension_name === 'jpeg' ||
		$image_extension_name === 'png' ||
		$image_extension_name === 'gif')

) {

		$errors++;
}else {
	// ./../assets/uploads/panagalan_ng_image.jpg
	$product_image_destination = "./../assets/uploads/".date('Y-m-d-h-i-s').".{$image_extension_name}";
	

}

}

if($errors === 0) {

move_uploaded_file($_FILES['image']['tmp_name'], $product_image_destination);

require_once './connection.php';
// adding to database 
$sql_query = "INSERT INTO products 
(name, image, description, category_id, price) 
VALUES (
  '{$_SESSION['old']['name']}',
  '{$product_image_destination}',
  '{$_SESSION['old']['description']}',
   {$_SESSION['old']['category_id']},
   {$_SESSION['old']['price']}
)";

 // var_dump($sql_query);

$result = mysqli_query($conn, $sql_query);
   // var_dump($result);

// create session message
$_SESSION['message'] = "Product is added successfully";
unset($_SESSION['old']);
}


// var_dump($image_extension_name);


// var_dump($errors);
// to go back to add product
header("Location: {$_SERVER['HTTP_REFERER']}");
