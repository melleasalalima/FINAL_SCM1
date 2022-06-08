<?php 
include('../functions.php');

if (!isStaff()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="card shadow mb-3 mt-3 p-3">
	<div class="title">
		<h2>Staff Account Profile</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../user.png" width="50" height="50">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
					<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></br>
						<i  style="color: #888;">Name: <?php echo $_SESSION['user']['fname']; ?></i> 
						<i  style="color: #888;"><?php echo $_SESSION['user']['mname']; ?> </i> 
						<i  style="color: #888;"><?php echo $_SESSION['user']['lname']; ?></i> </br>
						<i  style="color: #888;">Email: <?php echo $_SESSION['user']['email']; ?></i> </br>
						<i  style="color: #888;">Address: <?php echo $_SESSION['user']['address']; ?></i> </br>
						<i  style="color: #888;">Contact Number: <?php echo $_SESSION['user']['contact_num']; ?></i>
						<br>
						<a href="../index.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="product_list.php" style="color: orange;">Product List</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
	</div>
	<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>