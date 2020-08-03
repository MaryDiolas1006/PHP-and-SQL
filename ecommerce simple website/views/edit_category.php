<?php
require_once './../partials/template.php';

function get_title(){echo "Edit Category";}

function get_file_content() {

	?>
     <!--  -->
     <div class="container my-5">
     	<div class="row">
     		<div class="col-12 col-md-8 col-lg-6 mx-auto">
     			<h1 class="text-center">Edit Category</h1>
     		</div>
             
            </div>


                  <!-- message alert -->
                  <?php 
                      if (isset($_SESSION['message'])){
                      	?>
              <div class="row">
              	<div class="col-12 col-md-8 col-md-6 mx-auto">
              		<p class="alert alert-<?php echo $_SESSION['message_color'] ?>">
              			<?php echo $_SESSION['message'] ?>
              		</p>
              	</div>
              </div>
                      	<?php

                      	unset($_SESSION['message']);
                      	unset($_SESSION['message_color']);
                      }
                   
                  ?>
              <!-- end of message alert -->

     		<div class="row">
     		<div class="col-12 col-md-8 col-lg-6 mx-auto">
     			<?php 
                    // connection
     			      require_once './../controllers/connection.php';
     			    // query
     			      $sql_query = "SELECT * FROM categories WHERE id = {$_GET['id']}";

     			      $result = mysqli_query($conn, $sql_query);

     			      $category = mysqli_fetch_assoc($result);
     			      // var_dump($category);

     			?>
     			<!-- start form -->
     			<form action="./../controllers/edit_category.php?id=<?php echo $category['id'] ?>" method="post">
     				<label for="name">Edit name:</label>
     				<input 
     				type="text" 
     				name="name" 
     				id="name" 
     				class="form-control"
                    value="<?php echo $category['name']; ?>"
     				>
     				<button class="btn btn-success my-1">Edit Category</button>
     			</form>
     			<!-- end form -->
     		</div>
     	</div>
     </div>
	<?php
}
