<?php

require_once './../partials/template.php';

function get_title(){

	echo "login";
}


function get_file_content(){
	?>
	<div class="container my-5">
		<!-- heading start -->
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 mx-auto">
				<h1 class="text-center">Login</h1>
			</div>			
		</div>
		<!-- heading end -->

		<!-- alert message -->

		<?php 
    		if(isset($_SESSION['errors']['login'])){
    			?>
    			<div class="row">
    				<div class="col-12 col-md-8 col-lg-6 mx-auto">
    					<p class="alert alert-danger">Please check your credentials</p>
    				</div>
    			</div>

    			<?php
    		}
      
		?>
         <!-- alert message end -->

         <!-- start login form -->
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 mx-auto">
				<form action="./../controllers/login.php" method="post">
					<label for="email">Email Address:</label>
					<input type="email" name="email" id="email" class="form-control">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" class="form-control">
					<button class="btn btn-primary my-1">Login</button>
				</form>
			</div>
		</div>
		<!-- end login form -->
	</div>

	<?php

	unset($_SESSION['errors']);
}