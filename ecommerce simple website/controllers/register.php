<?php
session_start();

require_once "./connection.php";

echo "<pre>", var_dump($_POST), "</pre>";

// no empty fields
function is_complete($details){
	$errors = 0;

	foreach($details as $input_field => $input_value){
		$_SESSION['old'][$input_field] = $input_value;
     // var_dump(!trim($input_value), "<br>");
		if(!trim($input_value)){
			$_SESSION['errors'][$input_field] = "Field required";
			$errors++;
	}
}

    return $errors === 0 ? true : false;
}

// var_dump(is_complete($_POST));

// password should be atleast 8 characters
function is_pw_length($password) {

	return strlen(trim($password)) >= 8 ? true : false;
	
}



// var_dump(is_pw_length($_POST['password']));


// password and confirm password should match
function is_pw_matched($password, $confirm_password){

	return trim($password) === trim($confirm_password) ? true : false;
}



// unique email
function is_unique_email($email, $conn){

	// create query
	$sql_query = "SELECT * FROM users WHERE email = '{$email}'";
    $find_email = mysqli_query($conn, $sql_query);
    // var_dump($sql_query);
    // var_dump($find_email);
    
	// check if there are already users using the email
	//returns an int if how many entry lumabas
	// var_dump(mysqli_num_rows($find_email));
	return mysqli_num_rows($find_email) > 0 ? false : true;
}

// var_dump(is_unique_email($_POST['email'], $conn));

if(
	is_complete($_POST) && 
	is_pw_length($_POST['password']) && 
	is_pw_matched($_POST['password'],$_POST['confirm_password']) && 
	is_unique_email($_POST['email'],$conn)
){
// hash the password using bcrypt. it will hide the password
	$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	// query to database
	$sql_query = "INSERT INTO users (fullname, email, password, role_id)
	VALUES (
     '{$_POST['fullname']}',
     '{$_POST['email']}',
      '{$hashed_password}',
      2 
)";

   $result = mysqli_query($conn, $sql_query);

   if($result) {
       
       $_SESSION['message']['success'] = "Registration successful";
       unset($_SESSION['old']);
    }
       
   }else{
      // check why it did not pass the validation
   	if(!is_pw_length($_POST['password'])){

   		$_SESSION['errors']['password'] = "Password length must be atleast 8 characters";

   	}

   	if(!is_pw_matched($_POST['password'],$_POST['confirm_password'])){
   		$_SESSION['errors']['confirm_password'] = "Password do not match";
   	}

   	if(!is_unique_email($_POST['email'],$conn)){
   		$_SESSION['errors']['email'] = "Email is already in use";
   	}

   }



header("Location: {$_SERVER['HTTP_REFERER']}");




