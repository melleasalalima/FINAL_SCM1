<?php include('functions.php'); include('includes/header.php');?>
<div class="container">
	<div class="card p-3">
		<form method="post" action="login.php">
		<h2><a href="login.php" class="display-4">Account Login</a></h2>
		<?php echo display_error(); ?>
			<div class="form-row">
				<div class="form-group col-md-4">

					<label>Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group">
					<button type="submit" class="btn btn-success" name="login_btn">Login</button>
					<a class="btn btn-secondary active" href="customer_sign_up.php">signup</a>
				</div>	
			</div>
		</form>
	</div>
</div>

<?php include('includes/footer.php');?>