<!-- without using an html, no need to put closing for php -->

<?php 
// IF you are looking at a page use $_GET Method
//If You are posting, use $_POST


//Superglobal variables
   //$_GET- will get the details in the query string
   //and it converts to associative array
    // ?key=value&key=value&key=value
     
     //all forms need to sanitize
    //sanitize very important, to secure data privacy.
   //   $username = htmlspecialchars($_GET['username']);
   //   $password = htmlspecialchars($_GET['password']);

   // echo  $username;
   // echo "<br>";
   // echo $password;


//$_POST
// associative array
//key = name of the inputs
//value = input value
// var_dump($_POST);

echo $_POST['username'];

