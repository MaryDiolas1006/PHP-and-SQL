<?php
require_once './../partials/template.php';

function get_title(){echo "home";}


function get_file_content() {
	?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Welcome to Pushcart!</h1>
					<p>Push your credit card limit to the fullest!</p>
				</div>
			</div>
		</div>
	</div>

	<!-- start view all products -->
	<div class="container-fluid">
		<div class="row">

			<?php
             // to get the list. everytime to select query  index
             // connection
			  require_once './../controllers/connection.php';

			// query
			  $sql_query = "SELECT
			  products.id,
			  products.name,
			  products.image,
			  products.price,
			  categories.name as category_name
			  FROM
			  products
			  JOIN categories ON (
			  products.category_id = categories.id
			)";

			// var_dump($sql_query);
                  
			// result
			$result = mysqli_query($conn, $sql_query);
			// loop
			while($product = mysqli_fetch_assoc($result)){
			// display
				?>
                 <!-- start of product card -->
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
				
				<div class="card">
					<img class="card-img-top" src="<?php echo $product['image'] ?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"><?php echo $product['name']?></h5>
						<p class="card-text">&#8369; <?php echo number_format($product['price'], 2) ?></p>

						<p class="card-text"><span class="badge badge-secondary"><?php echo $product['category_name'] ?></span></p>

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


						<!-- start view product details -->

						<a href="./single_product.php?id=<?php echo $product['id'] ?>" class="btn btn-primary w-100 mt-2">View details</a>

						<!-- end product details -->
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
			<!-- end of product card -->
				<?php

			}
            
            ?>
			
		</div>
	</div>
	
	<?php

}



