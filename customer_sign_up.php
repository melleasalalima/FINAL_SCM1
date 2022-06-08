<?php 
	include('customer_functions.php'); include('includes/header.php');
?>
	<!-- <div class="header">
		<h2><a href="login.php" style="color: white;">Sign Up</a></h2>
	</div> -->
<div class="container shadow p-3 mb-3">
		<p class="display-4">Sign Up</p>
		<?php echo display_error(); ?>


	<form method="post" action="customer_sign_up.php">
	<div class="form-row">
<!-- Username -->
		<div class="form-group col-md-6">
			<label>Username</label>
			<input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
		</div>


<!-- Email -->
		<div class="form-group col-md-6">
		<label>Email</label>
			<input type="email" name="email"  class="form-control" value="<?php echo $email; ?>">
		</div>


<!-- First Name -->
		<div class="form-group col-md-4">
		<label>First Name</label>
			<input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
		</div>


<!-- Middle Name -->
		<div class="form-group col-md-4">
		<label>Middle Name</label>
			<input type="text" name="mname" class="form-control" placeholder="Optional" value="<?php echo $mname; ?>">
		</div>

<!-- Last Name -->
		<div class="form-group col-md-4">
		<label>Last Name</label>
			<input type="text" name="lname"  class="form-control"  value="<?php echo $lname; ?>">
		</div>

<!-- Address -->
		<div class="form-group col-md-6">
		<label>Address</label>
			<input type="text" name="address" class="form-control"  value="<?php echo $address; ?>">
		</div>

<!-- Contact Number -->
		<div class="form-group col-md-6">
		<label>Contact Number</label>
			<input type="text" name="contact_num"  class="form-control" value="<?php echo $contact_num; ?>">
		</div>

<!-- User type -->
		<input hidden type="text" name="user_type"  class="form-control" value="customer" readonly>


<!-- password -->
		<div class="form-group col-md-6">
		<label>Password</label>
			<input type="password"  class="form-control" name="password_1">
		</div>

		<div class="form-group col-md-6">
		<label>Confirm password</label>
			<input type="password"  class="form-control" name="password_2">
		</div>

		<div class="form-group">
            	<button type="submit" class="btn btn-info mb-2" name="register_btn"> + Create user</button>
				<p>Already have an account? <a href="login.php">Login</a></p>
				
		</div>
	</div>
	</form>

</div>
<?php
	include ('includes/footer.php'); ?>