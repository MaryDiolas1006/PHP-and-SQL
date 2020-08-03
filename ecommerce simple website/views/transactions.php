<?php 

require_once './../partials/template.php';

function get_title(){
	echo "Transactions";
}


function get_file_content(){
	?>
	   <!-- start header -->
    	<div class="container my-5">
    		<div class="row">
    			<div class="col-12">
    				<h1 class="text-center">Transactions</h1>
    			</div>
    		</div>
    		<!-- end header -->


             <!-- start accordion -->
    		<div class="row">
    			<div class="col-12">
    				<!-- start accordion container -->
    				<div class="accordion" id="accordionExample">

                        <?php 
                        // connection
                        require_once './../controllers/connection.php';

                        // query
                        $sql_query = "SELECT  
                        transactions.id,
                        transactions.total,
                        transactions.created_date,
                        transactions.transaction_code,
                        users.fullname,
                        statuses.name as status,
                        payment_modes.name as payment_mode
                        FROM transactions
                         JOIN users ON (transactions.user_id = users.id)
                         JOIN statuses ON (transactions.status_id = statuses.id)
                         JOIN payment_modes ON (transactions.payment_mode_id = payment_modes.id)
                        ";


                        if($_SESSION['user']['role_id'] != 1){
                            $sql_query .= "WHERE transactions.user_id = {$_SESSION['user']['id']}";
                        }

                        $result = mysqli_query($conn, $sql_query);
                           
                        // loop

                        while($transaction = mysqli_fetch_assoc($result)){
                            extract($transaction)
                             // $timestamp();
                                ?>



                            <!-- start transaction entry -->
        					<div class="card">
        						<div class="card-header" id="headingOne">
        							<h2 class="mb-0">
        								<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $id?>" aria-expanded="true" aria-controls="collapseOne">
        									<?php echo $transaction_code ?> | <?php echo  date("d F Y", strtotime($created_date)) ?> | <span class="badge badge-success"><?php echo $status ?></span> 
        								</button>
        							</h2>
        						</div>

        						<div id="collapse-<?php echo $id ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        							<div class="card-body">
        								
        								<!-- start table -->
        								<div class="table-responsive">
        									<table class="table table-hover">
        										<tbody>
        											<!-- start trans code -->
        											<tr>
        												<th>Transaction code:</th>
        												<td><?php echo $transaction_code ?></td>
        											</tr>
        											<!-- end trans code -->
                                                    
                                                    <!-- start customer name -->
        											<tr>
        												<th>Customer name:</th>
        												<td><?php echo $fullname ?></td>
        											</tr>
        											<!-- end customer name -->

        											<!-- start date created -->
                                                      <tr>
                                                      	<th>Purchased date:</th>
                                                      	<td><?php echo date("d F Y", strtotime($created_date)) ?></td>
                                                      </tr>s
        											<!-- end date created -->

        											<!-- start total -->
        											<tr>
                                                      	<th>Total:</th>
                                                      	<td>&#8369; <?php echo number_format($total) ?></td>
                                                      </tr>
        											<!-- end total -->

        											<!-- start status -->
        											<tr>
                                                      	<th>Status:</th>
                                                      	<td><?php echo $status ?></td>
                                                      </tr>
        											<!-- end status -->


        											<!-- start payment mode -->
        											<tr>
                                                      	<th>Payment mode:</th>
                                                      	<td><?php echo $payment_mode ?></td>
                                                      </tr>
        											<!-- end payment mode -->


        											<!-- start view details -->
        											<!-- start total -->
        											<tr>
                                                      	<th>View Details:</th>
                                                      	<td>
                                                      		<!-- going to singletransaction page -->
                                                      		<a href="./single_transaction.php?id=<?php echo $id ?>">View</a>
                                                      	</td>
                                                      </tr>
        											<!-- end total -->
        											<!-- end view details -->
        										</tbody>
        									</table>
        								</div>
        								<!-- end table -->
        							</div>
        						</div>
        					</div>
                            <!-- end transaction entry -->
                            
                                <?php
                            }

                        ?>
    				</div>
    				<!-- end accordion container -->
    				
    			</div>
    		</div>
    		<!-- end accordion -->
    	</div>
	<?php
}