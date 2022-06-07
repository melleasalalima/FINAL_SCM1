<?php 
	include('customer_functions.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Registration - Create user</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2><a href="login.php" style="color: white;">Sign Up</a></h2>
	</div>
	
	<form method="post" action="customer_sign_up.php">

		<?php echo display_error(); ?>

<!-- Username -->

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>

<!-- First Name -->

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="fname" value="<?php echo $fname; ?>">
		</div>

<!-- Middle Name -->

		<div class="input-group">
			<label>Middle Name</label>
			<input type="text" name="mname" placeholder="Optional" value="<?php echo $mname; ?>">
		</div>

<!-- Last Name -->

		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lname" value="<?php echo $lname; ?>">
		</div>

<!-- Email -->

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>

<!-- Address -->

		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>

<!-- Contact Number -->

		<div class="input-group">
			<label>Contact Number</label>
			<input type="text" name="contact_num" value="<?php echo $contact_num; ?>">
		</div>

<!-- User type -->

		<input hidden type="text" name="user_type" value="customer" readonly>


<!-- password -->
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
            	<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
	<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>