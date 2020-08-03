<?php

require_once './../partials/template.php';


function get_title(){
	echo "View Transaction";
}


function get_file_content(){
	?>

	<div class="container my-5">	
		<!-- start header -->
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">View Transaction</h1>
			</div>
		</div>
		<!-- end header -->

		<!-- start transaction details -->
            <div class="row">
            	<div class="col-12 col-md-8 col-lg-6 mx-auto">

            		<?php
                       require_once './../controllers/connection.php';

                       // query
                       $sql_query_transactions = "SELECT  
                       transactions.id,
                       transactions.total,
                       transactions.transaction_code, 
                       users.fullname,
                       statuses.name as status,
                       payment_modes.name as payment_mode   
                       FROM transactions JOIN users ON(transactions.user_id = users.id)
                       JOIN statuses ON (transactions.status_id = statuses.id)
                       JOIN payment_modes ON (transactions.payment_mode_id = payment_modes.id)
                        WHERE  transactions.id = {$_GET['id']}"; 

                        $result = mysqli_query($conn, $sql_query_transactions);
                        $transaction = mysqli_fetch_assoc($result);
                        extract($transaction);

  
            		?>
            		<div class="table-responsive">
            			<table class="table table-hover">
            				<tbody>
            					<!-- start trans code -->
            					<tr>
            						<td>Transaction code</td>
            						<td><?php echo $transaction_code ?></td>
            					</tr>
            					<!-- end trans code -->

            					<!-- start user name -->
                                     <tr>
                                     	<td>Customer Name:</td>
                                     	<td><?php echo $fullname ?></td>
                                     </tr>
            					<!-- end user name -->


            					<!-- start payment mode -->
	            					<tr>
	            						<td>Payment mode:</td>
	            						<td><?php echo $payment_mode ?></td>
	            					</tr>
            					<!-- end payment mode -->


            					<!-- start status -->
	            					<tr>
	            						<td>Status:</td>
	            						<td><?php echo $status ?></td>
	            					</tr>
            					<!-- end status -->


            					<!-- start total -->
            					<tr>
                                     	<td>Total:</td>
                                     	<td>&#8369; <?php echo number_format($total, 2) ?></td>
                                     </tr>
            					<!-- end total -->
            				</tbody>
            			</table>
            		</div>
            	</div>
            </div>
		<!-- end transaction details -->

		<!-- start product transactions -->
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
                             <?php 
                                // query
                             $sql_query_product_trans = "SELECT 
                            	products.name,
                            	product_transactions.price,
                            	product_transactions.quantity,
                            	product_transactions.subtotla
                            	FROM  product_transactions JOIN products
                            	ON (product_transactions.product_id = products.id)
                            	WHERE product_transactions.transaction_id = {$id}
                             ";

                             // result
                             $result = mysqli_query($conn, $sql_query_product_trans);

                             while($product = mysqli_fetch_assoc($result)){
                             extract($product)

                             	?>
							<!-- start display product -->
									<tr>
										<td><?php echo $name ?></td>
										<td>&#8369; <?php echo number_format($price, 2) ?></td>
										<td><?php echo $quantity ?></td>
										<td>&#8369; <?php echo number_format($subtotla, 2) ?></td>
									</tr>
									<!-- end display product -->

                             	<?php

                             }
                             
                               
                             ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end product transactions -->
	</div>

	<?php
}