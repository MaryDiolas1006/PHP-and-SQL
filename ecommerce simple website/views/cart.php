<?php

require_once './../partials/template.php';

function get_title(){

	echo "Cart";
}



function get_file_content(){
	?>
	<!-- start header -->

	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Cart</h1>
			</div>
		</div>
		<!-- end header -->


		<?php
		if(!isset($_SESSION['cart'])){
			?>

			<!-- alert message -->

			<div class="row">
				<div class="col-12">
					<p class="alert alert-info">
						No Items in Cart
					</p>
				</div>
			</div>

			<!-- end alert message -->
			<?php
		}else{
			?>
			<!-- start cart table -->
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Subtotal</th>
									<th calss="text-center">Action</th>
								</tr>
							</thead>
							<tbody>

								<!-- SELECT * FROM products WHERE id IN (1,4) -->
								<?php 
								$ids = implode(",",array_keys($_SESSION['cart'])); 
								require_once './../controllers/connection.php';
                                    // query
								$sql_query = "SELECT * FROM products WHERE id IN ({$ids})";

                                    // result
								$result = mysqli_query($conn, $sql_query);

                                    // loop
								$total = 0;
								while ($product = mysqli_fetch_assoc($result)){
									extract($product);
									$subtotal = $_SESSION['cart'][$id] * $price;
									$total += $subtotal;
                                    	// display
									?>
									<!-- start product row -->
									<tr>
										<!-- start name -->
										<td><?php echo $name ?></td>
										<!-- start price -->
										<td>&#8369; <?php echo number_format($price, 2) ?></td>

										<!-- start quantity -->
										<td>
											<form action="./../controllers/add_to_cart.php?id=<?php echo $id ?>" method="post">
												<div class="input-group mb-3">
													<input 
													type="number" 
													class="form-control" 
													placeholder="Quantity"
													min="1"
													value="<?php echo $_SESSION['cart'][$id] ?>"
													name="quantity">
													<div class="input-group-append">
														<button 
														class="btn btn-outline-secondary" 
														type="submit" 
														id="button-addon2">
														Change Quantity
													</button>
												</div>
											</div>
										</form>
									</td>  
									<!-- end quantity -->

									<!-- start subtotal -->
									<td>&#8369; <?php echo number_format($subtotal, 2) ?></td>

									<!-- start action -->
									<td class="text-center">
										<a href="./../controllers/remove_cart.php?id=<?php echo $id ?>" class="btn btn-outline-danger">Remove</a>
									</td>
								</tr>

								<!-- end product row -->
								<?php
							}

							?>

						</tbody>
						<tfoot>
							<tr>
								<th colspan="3" class="text-right">Total</th>
								<th>&#8369; <?php echo number_format($total, 2) ?></th>
								<th class="text-center">

									<?php
									if (isset($_SESSION['user'])){
										?>
										<a href="./../controllers/add_transaction.php" class="btn btn-success">Checkout <br> via Cash On Delivery</a>

										<!-- start paypal button -->

										<div id="paypal-smart-button" class="mt-3"></div>
										<!-- end paypal button -->
										<?php
									}else{
										?>

										<!-- Button trigger modal  -->
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
											Checkout <br> via Cash On Delivery
										</button>

										<?php
									}
									?>
								</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>   
		<!-- end cart table -->


		<!-- start clear cart -->
		<div class="row">
			<div class="col-12">
				<a href="./../controllers/clear_cart.php" class="btn btn-danger">Clear Cart</a>
			</div>
		</div>
		<!-- end clear cart -->
		<?php
	}
	?>




</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hello Guest</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Please login to continue
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="./login.php" class="btn btn-success">Login</a>
			</div>
		</div>
	</div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AeDOyDGeAXN3WfOFCIkWjMXJrTBoN6xLnBCzqb670GdscJW5BIUD49g1HSVlXHcEaFPKkYmXVs-BSkXr&currency=PHP"></script>
<script>
	paypal.Buttons({
  		createOrder: function(data, actions){
  			return actions.order.create({
  				purchase_units: [{
  					amount: {
  						value: <?php echo $total ?>
  					}
  				}]
  			})
  		},
  	    onApprove: function(data, actions) {
  	    	// This function captures the funds from the transaction.
  	    	return actions.order.capture().then(function(details) {
  	    		// This function shows a transaction success message to your buyer.
  	    		// console.log(data.orderID);
  	    		 alert('Transaction completed by ' + details.payer.name.given_name);
                 
                 //encrypt
  	    		 let orderID = new FormData;
  	    		 orderID.append("orderID", data.orderID);

            	 fetch("http://localhost:8000/controllers/add_transaction.php", {
            	 	method: "POST",
            	 	body: orderID
            	 })
            	 .then(function(response) {
            	 	return response.text();
            	 })
            	 .then(function(result){
            	 	console.log(result)
            	 	window.location = `http://localhost:8000/views/single_transaction.php?id=${result}`
            	 })

  	    		});
  	    }
	}).render('#paypal-smart-button');
</script>

<?php

}