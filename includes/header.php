<?php
    require_once('php/item-card.php');
    require_once('php/functions.php');

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Shopping Cart </title>
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
            <a class="animate__animated animate__pulse animate__infinite navbar-brand display-4" href="index.php">Velen and Anna's Seafoods Dealer</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Cart</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span class="badge badge-light"><?php echo $row_count; ?></span></a>
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
