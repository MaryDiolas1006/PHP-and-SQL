<?php

require_once './../partials/template.php';

function get_title(){

	echo "Register";
}


function get_file_content(){
	?>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Hello Guest Please Register</h1>
			</div>
		</div>

		<!-- alert message start -->

		<?php 
		if(isset($_SESSION['message']['success'])){
			?>
			<div class="row">
				<div class="col-12 col-md-8 col-lg-6 mx-auto">
					<p class="alert alert-success">
						<?php echo $_SESSION['message']['success'] ?>
					</p>
				</div>
			</div>

			<?php
		}
		?>
		<!-- end alert message -->

		<!-- start form  -->
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 mx-auto">

				<form action="./../controllers/register.php" method= "post">
					<!-- fullname start -->
					<div class="form-group">
						<label for="fullname">Fullname:</label>
						<input 
						type="text" 
						name="fullname" 
						id="fullname" 
						class="form-control"
                        value="<?php echo isset($_SESSION['old']['fullname']) ? $_SESSION['old']['fullname'] : "" ?>"
						>

						<?php
						    if(isset($_SESSION['errors']['fullname'])){
						     	?>
									<small class="text-danger">
										<?php echo $_SESSION['errors']['fullname']; ?>
									</small>
								<?php	
						    }
						
						?>
					</div>
					<!-- end fullname -->


					<!-- email start -->
					<div class="form-group">
						<label for="email">Email:</label>
						<input 
						type="email"
					    name="email" 
					    id="email" 
					    class="form-control"
                         value="<?php echo isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : "" ?>"
					    >
						<?php
						    if(isset($_SESSION['errors']['email'])){
						     	?>
									<small class="text-danger">
										<?php echo $_SESSION['errors']['email']; ?>
									</small>
								<?php	
						    }
						
						?>
					</div>
					<!-- end email -->

					<!-- password start -->
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" class="form-control">
						<?php
						    if(isset($_SESSION['errors']['password'])){
						     	?>
									<small class="text-danger">
										<?php echo $_SESSION['errors']['password']; ?>
									</small>
								<?php	
						    }
						
						?>
					</div>

					<!-- end password -->


					<!-- confirmed password start -->
					<div class="form-group">
						<label for="confirm_password">Confirm Password:</label>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control">
						<?php
						    if(isset($_SESSION['errors']['confirm_password'])){
						     	?>
									<small class="text-danger">
										<?php echo $_SESSION['errors']['confirm_password']; ?>
									</small>
								<?php	
						    }
						
						?>
					</div>
					<!-- end confirmed password -->

					<button class="btn btn-success">Register</button>
				</form>
			</div>
		</div>
		<!-- end form -->
	</div>


	<?php
	unset($_SESSION['message']);
	unset($_SESSION['errors']);
	unset($_SESSION['old']);
}