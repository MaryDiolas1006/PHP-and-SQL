<!-- To connect to MySQL, use the mysqli_connect($host, $username, $password, $dbname) function -->


<?php 
  $conn = mysqli_connect("localhost", "root", "", "todo" );

// echo "<pre>", var_dump($conn), "</pre>";