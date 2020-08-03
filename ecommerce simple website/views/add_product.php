<?php

require_once './../partials/template.php';

function get_title() {
	echo "Add Product";
}


function get_file_content() {
    ?>
     <div class="container my-5">
     	<div class="row">
     		<div class="col-12 col-md-8 col-lg-6 mx-auto">
     			<h1 class="text-center">Add Product</h1>
     		</div>
     	</div>

     	<!-- start alert message -->
          <?php
            if(isset($_SESSION['message'])){
              ?>
          <div class="row">
          	<div class="col-12 col-md-8 col-lg-6 mx-auto">
          		<p class="alert alert-success">
                Product is added successfully
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
          		<form 
              action="./../controllers/add_product.php" 
              method="post"
              enctype="multipart/form-data"
              >
          			
          			<!-- product name -->
                       <div class="form-group">
                       	<label for="name">Product Name:</label>
                       	<input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control"
                        value="<?php echo isset($_SESSION['old']['name']) ? $_SESSION['old']['name'] : "" ?>"

                        >
                       	<small 
                        class="form-text text-danger <?php echo isset($_SESSION['errors']['name']) ? "" : "d-none" ?>">Product name required</small>
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
                        value="<?php echo isset($_SESSION['old']['price']) ? $_SESSION['old']['name'] : "" ?>"
                        >
                       	  <small 
                        class="form-text text-danger <?php echo isset($_SESSION['errors']['price']) ? "" : "d-none" ?>">Product Price required</small>
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

                          require_once './../controllers/connection.php';

                          $sql_query = "SELECT * FROM categories";
                          $result = mysqli_query($conn, $sql_query);

                          while($category = mysqli_fetch_assoc($result)){

                            ?>
                        		<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>

                            <?php
                          }

                          ?>
                        		
                        		

                        		  <small 
                        class="form-text text-danger <?php echo isset($_SESSION['errors']['category_id']) ? "" : "d-none" ?>">Product category required</small>
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

                        	 <small 
                        class="form-text text-danger <?php echo isset($_SESSION['errors']['image']) ? "" : "d-none" ?>">Product image required</small>
                        </div>

                        <!-- end product img -->


                        <!-- product description -->

                          <div class="form-control">
                          	<label for="description">Product Description</label>
                          	<textarea 
                            name="description" 
                            id="description" 
                            cols="30" 
                            rows="10" 
                            class="form-control"><?php echo isset($_SESSION['old']['description']) ? $_SESSION['old']['name'] : "" ?></textarea>
                          	 <small 
                        class="form-text text-danger <?php echo isset($_SESSION['errors']['description']) ? "" : "d-none" ?>">Product description required</small>
                          </div>
                        <!-- end product description -->

                        <button class="btn btn-success w-100">Add Product</button>

          		</form>
          	</div>
          </div>
             
     </div>


    <?php

    unset($_SESSION['errors']);
    unset($_SESSION['old']);
    unset($_SESSION['message']);

}
