<?php

require_once './../partials/template.php';

function get_title() {
	echo "Edit Product";
}


function get_file_content() {
    ?>
     <div class="container my-5">
     	<div class="row">
     		<div class="col-12 col-md-8 col-lg-6 mx-auto">
     			<h1 class="text-center">Edit Product</h1>
     		</div>
     	</div>

     	<!-- start alert message -->

      <?php 
        if(isset($_SESSION['message'])){
          ?>
          <div class="row">
          	<div class="col-12 col-md-8 col-lg-6 mx-auto">
          		<p class="alert alert-danger">
          			Product is updated successfully
          		</p>
          	</div>
          </div>

          <?php
        }

      ?>
     	<!-- end altert message -->

     	<!-- add product form -->
          <div class="row">
          	<div class="col-12 col-md-8 col-lg-6 mx-auto">
              <!-- updating id product -->
          		<form action="./../controllers/edit_product.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
          			
                  <?php 
                    // connection
                  require_once './../controllers/connection.php';

                    // query
                  $sql_query = "SELECT * FROM products WHERE id = {$_GET['id']}";

                  // result
                  $result = mysqli_query($conn, $sql_query);

                  // display
                  $product = mysqli_fetch_assoc($result);

                  extract($product);
                     
                   ?>

          			<!-- product name -->
                       <div class="form-group">
                       	<label for="name">Product Name:</label>
                       	<input 
                       	type="text" 
                       	name="name" 
                       	id="name"
                        class="form-control"
                        value="<?php echo $name ?>"
                        >
                        <?php
                          if (isset($_SESSION['errors']['name'])){
                            ?>

                       	<small class="form-text text-danger">Product name required</small>

                            <?php
                          }
                         ?>

                       </div>
                        <!-- end product name -->

                        <!-- product price -->
                       <div class="form-group">
                       	<label for="price">Product price:</label>
                       	<input
                       	 type="number" 
                       	 name="price" 
                       	 id="price" 
                       	 class="form-control"
                         value="<?php echo $price ?>"
                         >

                           <?php
                          if (isset($_SESSION['errors']['price'])){
                            ?>

                       
                       	<small class="form-text text-danger">Product price required</small>
                            
                            <?php
                          }
                         ?>
                       </div>
                        <!-- end product price -->


                        <!-- category_id -->

                        <div class="form-group">
                        	<label for="category_id">Product Category</label>
                        	<select 
                        	name="category_id" 
                        	id="category_id" 
                        	class="form-control">

                          <?php
                             // query
                             $sql_query_categories = "SELECT * FROM categories";

                             // result
                             $result = mysqli_query($conn, $sql_query_categories);

                             // loop
                             while($category = mysqli_fetch_assoc($result)){
                             
                             // display
                              ?>
                        		<option value="<?php echo $category['id'] ?>">
                              <?php
                                echo $category_id == $category['id'] ? "selected" : "";
                               ?>
                            <?php echo $category['name'] ?>  
                            </option>

                              <?php
                             }


                           ?>
                        		
                        		  <?php
                          if (isset($_SESSION['errors']['category'])){
                            ?>

                        		<small class="form-text text-danger">Product category required</small>
                        
                            
                            <?php
                          }
                         ?>

                        	</select>
                        </div>

                        <!-- end category_id -->


                        <!-- product img -->

                        <div class="from-control">
                        	<label for="image">Product Image</label>
                        	<input 
                        	type="file"
                            name="image" 
                            id="image" 
                            class="form-control-file">

                            </div>

                        <!-- end product img -->


                        <!-- product decs -->

                          <div class="form-control">
                          	<label for="description">Product Description</label>
                          	<textarea 
                          	name="description" 
                          	id="description" 
                          	cols="30" 
                          	rows="10" 
                          	class="form-control"><?php echo $description ?></textarea>

                              <?php
                          if (isset($_SESSION['errors']['description'])){
                            ?>

                          	<small class="form-text text-danger">Product description required</small>
                            
                            <?php
                          }
                         ?>
                          </div>
                        <!-- end product desc -->

                        <button class="btn btn-success w-100">Update Product</button>

          		</form>
          	</div>
          </div>
             
     </div>


    <?php
    unset($_SESSION['message']);
    unset($_SESSION['old']);
    unset($_SESSION['errors']);

}
