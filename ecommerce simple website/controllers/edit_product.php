<?php
session_start();
// connection
require_once './connection.php';

// query
$errors = 0;
 foreach($_POST as $field => $field_value){
    // everytime no value added errors will increment
 	if(trim($field_value)){

 	$_SESSION['old'][$field] = trim($field_value);
 }else {

 	$errors++;
 	$_SESSION['errors'][$field] = "empty";
 }

 }
  // echo "<pre>", var_dump($_SESSION), "</pre>";

 if(has_image($_FILES)) {
   // check the file type
 	// upload the image

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

 if ($errors === 0) {

 	if(has_image($_FILES)) {

 		move_uploaded_file($_FILES['image']['tmp_name'], $product_image_destination);

 		$sql_query = "UPDATE products SET
 		name = '{$_SESSION['old']['name']}', 
 		category_id = {$_SESSION['old']['category_id']}, 
 		price ={$_SESSION['old']['price']},
 		description = '{$_SESSION['old']['description']}',
 		image = '{$product_image_destination}'
 		WHERE id = {$_GET['id']}";

 	}else {

 		$sql_query = "UPDATE products SET
 		name = '{$_SESSION['old']['name']}', 
 		category_id = {$_SESSION['old']['category_id']}, 
 		price ={$_SESSION['old']['price']},
 		description = '{$_SESSION['old']['description']}'
 		WHERE id = {$_GET['id']}";

 	}


// result
mysqli_query($conn, $sql_query);
$_SESSION['message'] = "Edit product is successfull";
unset($_SESSION['old']);

 }

// redirect to edit product form


// has_image($_FILES);
 // var_dump($_FILES);
 function has_image($file) {

 	// tell if there's an image pass or not

     if($file['image']['name']){

     	return true;
     }else {
     	return false;
     }
 }


 // isset() is always true id the variable is declared doesn't have any value

 // isset will be false if the variable is not declared
 // if there's no isset return boolean is depending on value you imputed
 // if you put isset, it's depending on declared variable and boolean always return true even the declared variable has no value.

header("Location: {$_SERVER['HTTP_REFERER']}");