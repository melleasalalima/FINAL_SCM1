<?php 
    include('includes/header.php');
    include('php/functions.php');


    if(isset($_POST['add_to_cart'])){
        $p_id = $_POST['id'];
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_image = $_POST['p_img'];
        $p_quantity = $_POST['cp_qty'];;

        // $sel_inv = mysqli_query($con, "SELECT * FROM `inventory`");
        $sel_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE cp_name = '$p_name'");
        if(mysqli_num_rows($sel_cart) > 0){
            $message[] = 'Product has already been added to cart';
         }else{
            $insert_product = mysqli_query($con, "INSERT INTO `cart`(cp_name, cp_price, cp_img, cp_qty, cp_id)
            VALUES('$p_name', '$p_price', '$p_image', '$p_quantity', '$p_id')");
            $message[] = 'Product added to cart successfully!';
         }
    }
     
?>
    <?php

    if(isset($message)){
    foreach($message as $message){
        echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><span>$message</span>
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
        </div>";
        
        // '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
    };

    ?>
    <div class="container">
    <h1><i class="fa fa-shopping-cart"></i> Shop </h1><br>
        <div class="row text-center py-5">
            <?php
                $result=$con->query("SELECT * FROM inventory")or die($con->error);
                if($result->num_rows>0){  
                while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3 col-sm-6 my-3 my-md-0 p-2">
                <form action="" method="post">
                    <div class="card shadow">
                        <input type="hidden" name="p_img" value="<?php echo $row['p_img'];?>">
                        <input type="hidden" name="p_name" value="<?php echo $row['p_name'];?>">
                        <input type="hidden" name="p_price" value="<?php echo $row['p_price'];?>">
                        <div>
                            <input type="hidden" name="p_img" value="<?php echo $row['p_img'];?>">
                            <img src="<?php echo $row['p_img'];?>" class="img-fluid card-img-top" style="width: 100%; height: 250px;"> 
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <div class="card-body">
                            <i class="animate__animated animate__rollIn animate__rollOut active animate__infinite fa fa-fish"></i> 
                            <h3 class="card-title"><?php echo $row['p_name'];?></h3>
                            <h5> 
                                ₱ <?php echo $row['p_price'];?>
                            </h5>
                            <p class="card-text"> 

                                <?php
                                    $p_desc = $row['p_desc'];
                                    $strCut = substr($p_desc, 0, 100);
                                    $p_desc = substr($strCut, 0, strrpos($strCut, ' ')). ' <small class="text-primary">...</small';
                                    echo $p_desc;
                                ?>
                            </p>

                            <p style="text-align: left;">
                                <small>
                                <i class="fa fa-fish"></i> Available: <?php echo $row['num_stocks'];?> Kilos <br>
                                <i class="fa fa-hashtag"></i> Category: <?php echo $row['p_type'];?></small>
                            </p>
                            <?php
                                $prod_qty = $row['num_stocks'];
                                $prod_status = $row['p_status'];
                                if( $prod_qty <= '0' || $prod_status == "inactive" ){   
                            ?>
                            <p>
                            <input type="number" disabled name="cp_qty" min="0" max="<?php echo $row['num_stocks'];?>" value="1">
                            </p>
                            <button type="submit" name="add"class="btn btn-danger my-3" disabled>
                                <i class="fa fa-octagon-exclamation"></i>
                                Out of Stock
                            </button>
                            <?php
                            } else{
                            ?>
                            <p>
                            <input type="number" name="cp_qty" min="1" max="<?php echo $row['num_stocks'];?>" value="1">
                            </p>
                            <button type="submit" class="btn btn-success my-3" value="add to cart" name="add_to_cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <?php
                                }
                            ?>
                        </div>

                    </div>
                </form>
            </div> 
                
            <?php } ?>
            <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
            <?php } ?>
<?php include('includes/footer.php');?>