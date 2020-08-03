<?php  session_start(); ?>

<a href="index.php">Login to Continue</a>

<?php

//it will erase all data stored in session
//take effect on the next request
session_destroy();

//unset() is use when you only want to delete a specific session
unset($_SESSION['kopi']);

?>
<h1><?php echo $_SESSION['username']?></h1>
<h1><?php echo $_SESSION['kopi']?></h1>