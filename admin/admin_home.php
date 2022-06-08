<?php 
include('../functions.php'); require_once('../php/functions.php'); include('includes/header.php'); 
 
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
    <header>
    <?php
      
      $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-info p-4 sticky-top">
            <a class="animate__animated animate__pulse animate__infinite navbar-brand display-4" href="home.php">Velen and Anna's Seafoods Dealer</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-5">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Cart</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="home.php"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span class="badge badge-light badge-pill"><?php echo $row_count; ?></span></a>
                    </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->

            </div>
        </nav>
        <p class="animated animate__bounce moving-text h-25">Welcome to Velen & Anna's Seafood Stalls! <i class="fa fa-star"></i>  We offer fresh seafood items</p>
    </header>

	<!-- Start ADMIN HOMEPAGE -->
<div class="container">

	<div class="card shadow p-3 mb-3">
	<div class="header">
		<h2>Admin - Home Page</h2>
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
			<img src="../user.png"width="50"height="50" >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="admin_home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="admin_create_user.php"> + add user</a>
                       &nbsp; <a href="admin_index.php" style="color: orange;">users list</a>
					   &nbsp; <a href="../staff/product_list.php" style="color: orange;">See Inventory</a>
                       &nbsp; <a href="../orders_list.php" style="color: orange;">See Orders</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
	</div>
	
</div>
<?php include('includes/footer.php'); ?>



