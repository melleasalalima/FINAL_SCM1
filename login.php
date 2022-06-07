<?php include('functions.php'); include('includes/header.php');?>
<div class="container">
	<div class="card">
		<form method="post" action="login.php">
		<h2><a href="login.php">Account Login</a></h2>
			<div class="form-row p-3">
				<div class="form-group col-md-6">
				<?php echo display_error(); ?>
					<label>Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group col-md-6">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group text-center justify-content-center">
					<button type="submit" class="btn btn-success" name="login_btn">Login</button>
					<a class="btn btn-secondary active" href="customer_sign_up.php">signup</a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include('includes/footer.php');?>