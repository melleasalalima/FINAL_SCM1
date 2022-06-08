<?php include('functions.php'); include('includes/header.php');
	
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	}
?>
<div class="container">
	
	<div class="card shadow p-3 mt-3 mb-3">
	<h2>Customer Account Profile</h2>
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
			<img src="user.png"width="50" height="50">

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
						<a href="index.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="shop.php" style="color: orange;">Shop Now</a>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>

</div>

<?php include('includes/footer.php'); ?>