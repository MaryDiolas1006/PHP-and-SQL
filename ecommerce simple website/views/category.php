<?php


require_once './../partials/template.php';

function get_title(){echo "Categories";}


function get_file_content(){
	?>
	<div class="container">
		<div class="row ">
		<div class="col-12 col-md-8 col-lg-6 mx-auto">
		<h1 class="text-center">Categories</h1>
		</div>
	</div>
	<!-- end header -->

	<!-- start delete message -->
	<?php
       if(isset($_SESSION['result'])){
       	?>

     <div class="row">
     	<div class="col-12 col-md-8 col-md-6 mx-auto">
     		<p class="alert alert-success">
     		<?php echo $_SESSION['result']; ?>
     		</p>
     	</div>
     </div>
       	<?php
        
        // unset is use to end the session
       	unset($_SESSION['result']);
       }
  
	 ?>

	<!-- end delete message -->

	<!-- alert message -->
	<?php 
      //isset is to check if the variable inside it is existing or not
      if (isset($_GET['success'])){
         // var_dump($_GET['success']);
         ?>
      <div class="row">
      	<div class="col-12 col-md-8 col-md-6 mx-auto">
      		<p class="alert alert-<?php echo $_GET['success'] === 'true' ? "success" : "danger" ?>">
      			<?php 
                  if($_GET['success'] === 'true'){
                  	echo "Category added successfully";
                  }else {
                  	echo "Adding Category failed";
                  }
      			?>
      		</p>
      	</div>
      </div>

         <?php
      }
	?>


	<!-- end alert message -->
 
   <!-- add category form -->
	<div class="row">
		<div class="col-12 col-md-8 col-lg-6 mx-auto">
			<!-- start form -->
			<form action="./../controllers/add_category.php" method="post">
				<label for="name">Category name:</label>
				<input type="text" name="name" id="name" class="form-control">
				<button class="btn btn-primary my-1">Add Category</button>
			</form>
			<!-- end form -->
		</div>
	</div>
	<!-- end add category form -->

	<!-- display all categories -->
	<div class="row my-3">
		<div class="col-12 col-md-8 col-lg-6 mx-auto">
			<?php 
              // connection
			     require_once './../controllers/connection.php';

			   // query and sorting
			   $sql_query = "SELECT * FROM categories ORDER BY name ASC, id ASC";  
               
               // this is fetching data
			  $result = mysqli_query($conn, $sql_query);
			  // var_dump($result);
              
              // convert object to associative array/ like file format
			 while($category =  mysqli_fetch_assoc($result)){

			 	?>

			 	<!--  start category card-->
			 	<div class="card my-2">
			 		<div class="card-body">
			 			<h5 class="card-title"><?php echo $category['name'] ?> </h5>
			 		</div>
			 		<div class="card-footer">
			 			<a href="./edit_category.php?id=<?php echo $category['id'] ?>" class="btn btn-warning">Edit Category</a>
			 			
			 			<a href="./../controllers/delete_category.php?id=<?php echo $category['id'] ?>" class="btn btn-danger">Delete Category</a>
			 		</div>
			 	</div>
			<!-- end category -->

			 	<?php

			 }

			?>
			
		</div>
	</div>
</div>
<!-- end add category form -->
	<?php
}