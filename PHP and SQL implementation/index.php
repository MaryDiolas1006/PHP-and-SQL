<!-- TO CONNECT TO DB
  PHP to our MySQL database we will be using the mysqli -->
  <?php require_once 'database.php'; ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<title>TODO LIST</title>
  </head>
  <body>

  	<h1>TODOS</h1>
  	<form action="add_todo_controller.php" method="post">
  	   <label for="todo">Add:</label>
  	   <input type="text" name="todo" id="todo">
  	   <button>Add Todo</button>
  	</form>   
  	
  	<h5>Todo List</h5>

  <!-- 	to show all data from table in database,
  	we need to query -->
  	 <!-- mysqli_query -->

  	 <?php

  	 $sql_query = "SELECT * FROM todos";
  	  $result = mysqli_query($conn, $sql_query);
  	  // var_dump($result);

  	  //translate object from result to associate array 
  	     //use mysqli_fetch_assc()
  	  //$row = mysqli_fetch_assoc($result);

  	     //var_dump($row);

  	  ?>
  	<ul>
  		<?php 
          while($row = mysqli_fetch_assoc($result)) {

          	?>

          	<li>
          		<?php echo $row['todo'] ?> ||
          		<a href="update.php?id=<?php echo $row['id'] ?>">
          			Update
          		</a> ||
          		<a href="delete_todo_controller.php?id=<?php echo $row['id'] ?>">Delete</a>
          	</li>

          	<?php
          }
       
  		?>
  	</ul>

  </body>
  </html>