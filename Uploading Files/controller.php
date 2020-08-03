<?php 

echo "<pre>", var_dump($_POST), "</pre>";

echo "<pre>", var_dump($_FILES), "</pre>";

//to change the name of image when uploading
//get the path information (extension name)
$fileinfo = pathinfo($_FILES['image']['name']);
//get the product name from the input form
$prod = $_POST['name'];
//Setting the name of image we prefer to say
//100000000product_name.extension
$prodNewName =time() . $prod ."." .$fileinfo['extension'];

// var_dump(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
// echo date('D d-M-Y', strtotime("14 Feb 1990");

//getting the file for ready to uploading
$tmp_name = $_FILES['image']['tmp_name'];
//Setting destination of file (with the name of the file)
$name = "uploads/{$prodNewName}";
// echo $name;

echo "<pre>", var_dump(pathinfo($_FILES['image']['name'])), "</pre>"; 


//validation the file first before uploading
//check if the file extension is valid
$fileinfo = pathinfo($_FILES['image']['name']);

if($fileinfo['extension'] == "jpg" || 
	$fileinfo['extension'] == "png" ||
    $fileinfo['extension'] == "jpeg"){

//if it is valid, upload it
move_uploaded_file($tmp_name, $name); 

}

?>

<img src="<?php echo $name ?>" alt="">