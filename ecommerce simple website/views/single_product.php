<?php

require_once './../partials/template.php';

function get_title(){
	echo "view Product";
}

function get_file_content() {
	?>
	<div class="container my-5">
		<div class="row">

			<?php
              // connection
			require_once './../controllers/connection.php';
			  // query
			$sql_query = "SELECT
			  products.id,
			  products.name,
			  products.image,
			  products.price,
			  products.description,
			  categories.name as category_name
			  FROM
			  products
			  JOIN categories ON (
			  products.category_id = categories.id
			) WHERE products.id = {$_GET['id']}";
			// var_dump($sql_query);

			// result
			$result = mysqli_query($conn, $sql_query);

			// fetch assoc result
			$product = mysqli_fetch_assoc($result);

			extract($product);
              
			 ?>
			<!-- start product card -->
			<div class="col-12 col-md-8 col-lg-6 mx-auto">
				
				<div class="card">
					<img class="card-img-top" src="<?php echo $image ?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"><?php echo $name?></h5>
						<p class="card-text">&#8369; <?php  echo number_format($price, 2) ?></p>
						<p class="card-text"><span class="badge badge-secondary"><?php echo $category_name ?></span></p>
						<p class="card-text"><?php echo $description ?></p>

						<?php 
                        	if((isset($_SESSION['user']) && $_SESSION['user']['role_id'] !== '1') || !isset($_SESSION['user'])){
                        		?>
	                        		<!-- start add to cart -->

	                        		<form action="./../controllers/add_to_cart.php?id=<?php echo $product['id'] ?>" method="post">

	                        			<label for="quantity">Add to cart:</label>
	                        			<input 
	                        			type="number" 
	                        			name="quantity" 
	                        			id="quantity" 
	                        			class="form-control" 
	                        			min="1"
	                        			value="1">

	                        			<button class="btn btn-success w-100 mt-1">Add to cart</button>
	                        		</form>
	                        		<!-- end add to cart form-->

                        		<?php
                        	}
						?>
					</div>
					
					<?php 
                    	if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] === '1'){
                    		?>

	                    		<div class="card-footer">
	                    			<!--  edit button -->
	                    			<a href="edit_product.php?id=<?php echo $product['id'] ?>" class="btn btn-warning w-100 mb-1">Edit</a>
	                    			<!-- end edit button -->

	                    			<!-- delete button -->
	                    			<a href="./../controllers/delete_product.php?id=<?php echo $product['id'] ?>" class="btn btn-danger w-100 mb-1">Delete</a>
	                    			<!-- end delete button -->
	                    		</div>
                    		<?php
                    	}
					?>

				</div>
			</div>
			<!-- end product card -->
		</div>
	</div>
	<?php
}