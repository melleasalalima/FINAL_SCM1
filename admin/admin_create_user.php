<?php 
	include('../functions.php'); 
	
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
	<link rel="stylesheet" type="text/css" href="../style.css">
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
<!-- SIGN UP -->
<div class="container shadow p-3 mb-3 mt-3">
	<h2><a href="admin_home.php" class="display-4">Admin - create user</a></h2>
		<?php echo display_error(); ?>


	<form method="post" action="admin_create_user.php">
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
		<div class="form-group col-md-4">
		<label>Address</label>
			<input type="text" name="address" class="form-control"  value="<?php echo $address; ?>">
		</div>

<!-- Contact Number -->
		<div class="form-group col-md-4">
		<label>Contact Number</label>
			<input type="text" name="contact_num"  class="form-control" value="<?php echo $contact_num; ?>">
		</div>

<!-- User type -->
	<div class="form-group col-md-4">
		<label>User type</label>
			<select name="user_type" id="user_type" class="form-control" >
				<option value="admin">Admin</option>
				<option value="staff">Staff</option>
				<option value="customer" active>Customer</option>
			</select>
		</div>

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
		</div>
	</div>
	</form>

</div>











	<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>