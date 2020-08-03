<?php 
// echo $_POST['todo'];

//sanitize
// $todo = htmlspecialchars($_POST['todo']);
// echo $todo;


$todos = [
   'eat',
   'sleep',
   'code'

];

//way of adding todo 
// array_push($todos, $_POST['todo']);
$todos[] = $_POST['todo'];

?>

<ul>
<?php

foreach($todos as $todo){
  echo "<li>{$todo}</li>";


};

?>

</ul>



