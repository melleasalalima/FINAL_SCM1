<?php 
include('../functions.php'); require_once('../php/functions.php');
 
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Velen Ana's Seafoods Dealer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
       
        <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
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

	<div class="card shadow p-3 mb-5">
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




<footer>
    <div class="footer">
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <div>
                <a href="https://www.facebook.com/velenandanaseafood/" class="me-4 text-reset">
                    <span class='bi bi-facebook'></span>
                </a>
                <a href="https://www.instagram.com/velenana_seafood/" class="me-4 text-reset">
                    <span class='bi bi-instagram'></span>
                </a>
            </div>
        </section>

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="shop.php" class="text-reset">Shop Now</a>
                    </p>
                    <p>
                        <a href="home.php" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="about.php" class="text-reset">About</a>
                    </p>
                    <p>
                        <a href="login.php" class="text-reset">Login / Sign Up</a>
                    </p>
                    <!-- <p>
                        <a href="contact.php" class="text-reset">Contact Us</a>
                    </p> -->
                    <p>
                        <a href="faqs.php" class="text-reset">FAQs</a>
                    </p>
                    <!-- <p>
                        <a href="tracking.php" class="text-reset">Track Orders</a>
                    </p> -->
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="shop.php" class="text-reset">Shop Alll</a>
                    </p>
                    <p>
                        <a href="shop-fish.php" class="text-reset">Fish</a>
                    </p>
                    <p>
                        <a href="shop-squid.php" class="text-reset">Squid</a>
                    </p>
                    <!-- <p>
                        <a href="#!" class="text-reset">Tuna</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Crab & Shrimp</a>
                    </p> -->
                </div>

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>We Accept
                    </h6>
                    <p>
                        <img src="https://lh3.googleusercontent.com/Du_mZaAL2CNiow-LUiZSPnDpWD6TGT2LgQRlg92sta54HJ-kIcwDbHtDZ5LEBeL-62mUp1YMgqCNmPhE_cXIpCf4l2pOtGlrFKBRpGmer2GyToNTBRUYWncAHweJvDvDkRRPiyZZJ4nN9GA_fSSyeAQqKPdcrn4gwkauD5SgMbrOZNtuq4i_pMS_E3RxGEpFReeKcxf2HRT_IJy2b_8QEGLIQrkV55A0vxCjx1CqnSVWZsUIlCJSWXjqcXDHSuJJSzs6G8l7sPvEfUVzvgSXo5ekz-jNnm3OV4qzECI-g0DTmS2GYPzZL6puTmxknW3QeL0xX2n3PGqqIZyMkECL9wJk0dvkKFjQGaS4jwKukS9wcVIWhk7egHHcFXO2kmS-Uk3-FHUNwafwT0iNwd1QZuskPGzPS8wGQUKE39ae7g8T1QcEK73T5IO9Z1DCjqiFzUiAb0e_5poUr2qvWt13IEPS5ZYsfVNtyejZqEoQTDTvMt_SExFx86sp3_phaBatMrti5AZpO6dEhiLWOR40zWheyIRv-4fAgzUNc8aaGfK6_YOXLpre8sI6M_fiZN4BrLLqNBrmxTOjzrZvEMfO5VWg7K0bV3JAK5X1Pjh42kwAgmBSnup6FbqmYHdH1ZF0XoFOxwccQscl8_O8moIPTCwdY2U1u0W3GNdKfYp0fhniWXVBnr0NtSI2mg8InxspgSKZpoBLSP0g-TURMBDYo4n2nXOWPo1od4PqVBE0FpOxmdUALyXk_5MUCEhvMlJegkmcwhE4mAzzUcmFBxYUYaF1d3DAi12dB0e1=w239-h211-no?authuser=1"
                        width="50px" height="50px">
                        &nbsp;
                        <img src="https://lh3.googleusercontent.com/WpLnRxY3I01HciABe5W3h1eA-NMduqeGSmNYWGHPDr5V8Ajmt3qPhsq6-f5Zf57Fs80-nzgWHlYijLzveBdv0uZ68v9NDuYosmQpIuoGKY4ouUzPeTrrIZq549wWVW5jsfrJ07otv_s9QM0MzOa3s66yTgyKPyuG88ULE56beMEdRqvKzqmDoAhucj-DGJ3KgWZInI4bARO2K_hcDPIWbIWDnvjizAxXbL3bfkEVYtQHOr63E_W17Enw_AwgkDkd9KNZHS9CUjDbucpHF8hg1xLd8Db0dUoN_m_AOox0zW78CK3dD1W6QAmKEcSwSDfFaDxQ_1CmSj736Sm_iSfbc4SkJUMFUc0w_vgqe4QPW6XHtd3XzZwkap1I-2pSUQyVsYwd3oTA68KNN7gjdgSxwgEXW3I0xC-WIrOAtxvOTMhgaFMWtOMB4oIw_pEwFmjvpX-diQPO-dHjt-vtXT2aaukkug1EEF9R1aDclay5aDJ1p8tvuR9PAFrBOafD34A3r9vOwp7cm2pQvMY--XMEsl4pBRMRnQQgd3caIUa2RBh8AbHuijpWSkgvtb-w1oGe8152Pbf_3Otpb3M6xcqjkaIm1eHViepn--NQZU2lJ4hQdxD13WG17LEwPzgvwI0UcH16Ts_izPMJi1Y0EOnRf-zryeGELyUoIeJoKSjfQP5gwlAwSXbPpMNvuF3xD6_Pd3oeyDELNpJLDs0qvgRCTjPV2Ymzgid1m7QMJdkR1s3ZvFtc86oKr7NHfkCZD4SOZfhecrOvH7EjMJVNVJnOxpVHJfqecee01y9Q=s512-no?authuser=1"
                        width="50px" height="50px">
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <p><span class="bi bi-house-door-fill"></span> Farmers Market, Araneta Center Cubao, Quezon City 1109 Quezon City, Philippines</p>
                    <p>
                        <span class="bi bi-envelope-fill"></span>
                        VelenAnaSeafoodsDealer@email.com
                    </p>
                    <p><span class="bi bi-telephone-fill"></span> +639276059354</p>
                </div>

            </div>
        </div>
        </section>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">© 2022 Copyright:
                <a class="text-reset fw-bold" href="https://www.facebook.com/velenandanaseafood/">Velen and Ana’s Seafood Dealer</a>
            </div>
        </footer>
    </div>
</footer>
        <script src="assets/jquery-3.6.0.min.js"></script>
        <script src="assets/owlcarousel/assets/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
