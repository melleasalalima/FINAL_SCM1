<?php
    require_once('php/item-card.php');
    require_once('php/functions.php');
    include ('includes/header.php');

    $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
    $row_count = mysqli_num_rows($select_rows);

    if(isset($_POST['update_update_btn'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET cp_qty = '$update_value' WHERE c_id = '$update_id'");
        if($update_quantity_query){
            // echo $update_quantity_query;
           header('location:cart.php');
        };
     };
     
     if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($con, "DELETE FROM `cart` WHERE c_id = '$remove_id'");
        header('location:cart.php');
     };
     
     if(isset($_GET['delete_all'])){
        mysqli_query($con, "DELETE FROM `cart`");
        header('location:cart.php');
     }
?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <span class="text-center display-4">
                    <i class="fa fa-shopping-cart"></i>My Cart
                </span>
                
                <hr>
                <div class="mx-auto">
                <?php
                    if ($row_count <= 0){
                            echo " <p class=\"display-4\"> Your cart is empty</p>";
                        }
                ?>
                </div>
                <?php
                   
                    $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
                    $grand_total = 0; $sub_total="";
                    if(mysqli_num_rows($select_cart) > 0){
                        while($result = mysqli_fetch_assoc($select_cart)){
                            // echo $result;
                ?>
                <!-- cart.php?action=remove&id=$productid -->
                <form action="" method="post" class="cart-items">
                    <input type="hidden" name="update_quantity_id" value="<?php echo $result['c_id']; ?>" >
                    <?php echo $result['c_id']; ?>
                    <div class="border rounded shadow mb-3">
                        <div class="row bg-white">
                            <div class="col-md-3 pl-0">
                                <img src="<?php echo $result['cp_img']; ?>" width="200" height="200">
                            </div>
                            <div class="col-md-6 p-4">
                                <span class="text-muted">Product Name: </span>
                                <h5 class="pt-2 text-uppercase"><?php echo $result['cp_name']; ?></h5>
                                <span class="text-muted">Product Price: </span>
                                <h5 class="pt-2">₱ <?php echo $result['cp_price']; ?></h5>
                                <span class="text-muted">Subtotal: </span>
                                <h5 class="pt-2">₱  
                                    <?php $sub_total = ($result['cp_price'] * $result['cp_qty']);
                                    echo number_format($sub_total); ?>
                                </h5>
                            </div>
                            <div class="col-md-3 py-5">
                                <div>
                                    <input type="number" min="1" max="10" name="update_quantity" value="<?php echo $result['cp_qty']; ?>" class="form-control w-50 d-inline"> Kilo/s <br>
                                    <a href="cart.php?remove=<?php echo $result['c_id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn p-2 mt-4 mb-4"> <i class="fas fa-trash"></i> remove</a>
                                    <input type="submit" value="Update Cart" class="btn btn-info center" name="update_update_btn">
                                </div>  
                            </div>
                        </div>
                    </div>
                    <?php
                    $sub_total = ($result['cp_price'] * $result['cp_qty']);
                    $grand_total = $grand_total + $sub_total;  
                        };
                    };
                    ?>
                </form>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <!-- <button class="btn btn-info center" value="update" name="update_update_btn">Update Cart</button> -->
                <?php 
                if ($row_count > 0){
                    echo "<td><a href=\"cart.php?delete_all\" onclick=\"return confirm('are you sure you want to delete all?');\" class=\"delete-btn\"> <i class=\"fas fa-trash\"></i> delete all </a></td>";
                }else {
                    echo "Your cart is empty";
                }
                ?>
                <!-- <hr> -->
                <h6>PRICE DETAILS</h6>&nbsp;
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <h6>Price</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₱ <?php
                            if($sub_total <= 0 ){
                                echo number_format(0);
                            }else{
                                echo number_format($grand_total);
                            }?>
                        </h6>
                        <hr>
                        <h6 class="text-success">₱ <?php echo number_format($grand_total); ?></h6>
                    </div>

                    <div class="col-md-12 p-3">
                        <hr>
                        <div class="checkout-btn">
                            <a href="checkout.php" class="btn btn-warning <?= ($grand_total > 1)?'':'disabled'; ?>"> Checkout </a>
                        </div>
                        <a href="home.php"> Back to homepage </a> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>