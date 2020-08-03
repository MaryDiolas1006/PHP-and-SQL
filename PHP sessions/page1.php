<?php  
//initialize or resume session
session_start();

 ?>

<a href="page2.php">Go to Page 2</a>

<?php

echo "<h1>{$_POST['username']}</h1>";


//session
  //store data
  //it can be access to other pages

     
   //create a session
     // $_SESSION['session_name'] = "value"

$_SESSION['username'] = $_POST['username'];
$_SESSION['kopi'] = "Something";
