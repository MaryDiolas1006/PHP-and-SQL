
<!-- if all fieds are not empty -->
<?php 
//Secure Privacy
$fullname = htmlspecialchars($_POST['fullname']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$password2 = htmlspecialchars($_POST['password2']);
$email = htmlspecialchars($_POST['email']);
$birthday = htmlspecialchars($_POST['birthday']);



echo $fullname;
echo "<br>";

echo $username;
echo "<br>";

echo $password;
echo "<br>";

echo $password2;
echo "<br>";

echo $email;
echo "<br>";

echo $birthday;
echo "<br>";

// Not secure Privacy
// echo $_POST['fullname'];
// echo "<br>";
// echo $_POST['username'];
// echo "<br>";
// echo $_POST['password'];
// echo "<br>";
// echo $_POST['password2'];
// echo "<br>";
// echo $_POST['email'];
// echo "<br>";
// echo $_POST['birthday'];


 // it will check if password and confirm password matched
if($password2 === $password){

	echo "Password Matched";
}else {
	echo "Please Confirm password";
}
echo "<br>";

 // password should be atleast 8 characters 
if(strlen($password) < 8){

	echo "Password should be at least 8 characters";
}

 /*if all criteria are met  
display:
   _fullname_has successfully registered 
   inside h1.

   if one of the criterias are not met,

   display h1
   "Registration is not successful"*/
if($fullname === ""){

	echo "<h1> Registration is not successful</h1>";
}else {

	echo "<h1> {$fullname} is successfully registered";
}


//other solution
//to check
// echo "<pre>" , var_dump($_POST), "</pre>";

//trim 
// echo "fullname" . trim($fullname);

// if all fieds are not empty 
if (
$fullname &&
$username &&
$password &&
$password2 &&
$email &&
$birthday

){

	echo "All fields are not empty"
}else{

	echo "Some fields are empty are empty"
}



//using function
    
// function user( $fullname, $username, $password, $password2, $email, $birthday  ) {

// 	return true;
// }else{

// 	return false;
// }


// function password( $password  ) {

// 	if (strlen($password) < 8){

// 		return true;
// 	}else {

// 		return false;
// 	}

	
// }else{

	
// }