<?php include('php/functions.php'); include('includes/header.php');
$name = $email = $tel = $address = $city = $province = $postal = $country = $landmark = $payment = $delivery = $payment = $paymentimg ="";

if(isset($_POST['order_btn'])){
    $name = $_POST['o_name'];
    $email = $_POST['o_email'];
    $tel = $_POST['o_tel'];
    $address = $_POST['o_address'];
    $city = $_POST['o_city'];
    $province = $_POST['o_province'];
    $postal = $_POST['o_postal'];
    $country = $_POST['o_country'];
    $landmark = $_POST['o_landmark'];
    $delivery = $_POST['o_delivery'];
    $payment = $_POST['o_payment'];
    $paymentimg = $_POST['o_paymentimg'];


    $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
       while($product_item = mysqli_fetch_assoc($cart_query)){
          $product_name[] = $product_item['cp_name'] .' ('. $product_item['cp_qty'] .') ';
          $product_price = ($product_item['cp_price'] * $product_item['cp_qty']);
          $price_total = $price_total + $product_price;
       };
    };

    $total_product = implode(', ',$product_name);
    $sql =  mysqli_query($con, " INSERT IGNORE orders (o_name, o_email, o_tel, o_address, o_city, o_province, o_postal, o_country, o_landmark, o_delivery, o_payment, o_paymentimg, total_price, total_product)
    VALUES ('$name', '$email', '$tel', '$address', '$city', '$province', '$postal', '$country', '$landmark', '$delivery', '$payment', '$paymentimg', '$price_total','$total_product')") or die('query failed');
   
//    if (mysqli_query($con, $sql) === TRUE) {
//     echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"> Order has been placed, thank you for shopping!
//     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
//       <span aria-hidden=\"true\">&times;</span>
//     </button></div>";
//     } 
// }
 ?>
 <form method="POST" action="">
    <div class="container">
    <span class="display-4">Personal Information</span><br>
        <div class="form-row p-3">
            <!-- NAME -->
            <div class="form-group col-md-6">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Enter your Name" name="o_name" required>
            </div>
            <!-- EMAIL -->
            <div class="form-group col-md-6">
                <label>Email Address</label>
                <input type="text" class="form-control" placeholder="Enter your Email Address" 
                pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]/" name="o_email" required>
            </div>
            <!-- CONTACT -->
            <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="tel" class="form-control" placeholder="Ex. 09XXXXXXXXX" maxlength="11" name="o_tel" required
                onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
            </div>
        </div>
        <hr>
        <span class="display-4">Shipping Information</span><br>
        <div class="form-row p-3">
            <!-- ADDRESS -->
            <div class="form-group col-md-6">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter your Address" name="o_address" required>
            </div>
            <!-- CITY -->
            <div class="form-group col-md-6">
                <label>Address</label>
                <select class="form-control" name="o_city">
                    <option value="Caloocan City" selected>Caloocan City</option>
                    <option value="Las Pinas City">Las Pinas City</option>
                    <option value="Makati City">Makati City</option>
                    <option value="Malabon City">Malabon City</option>
                    <option value="Mandaluyong City">Mandaluyong City</option>
                    <option value="Manila City">Manila City</option>
                    <option value="Marikina City">Marikina City</option>
                    <option value="Muntinlupa City">Muntinlupa City</option>
                    <option value="Navotas City">Navotas City</option>
                    <option value="Paranaque City">Paranaque City</option>
                    <option value="Pasay City">Pasay City</option>
                    <option value="Pasig City">Pasig City</option>
                    <option value="Quezon City">Quezon City</option>
                    <option value="San Juan City">San Juan City</option>
                    <option value="Taguig City">Taguig City</option>
                    <option value="Valenzuela City">Valenzuela City</option>
                </select>
            </div>
            <!-- PROVINCE -->
            <div class="form-group col-md-3">
                <span>Province</span>
                    <select class="form-control" name="o_province">
                        <option value="NCR">National Capital Region (NCR)</option>
                    </select>
            </div>
            <!-- POSTAL CODE -->
            <div class="form-group col-md-3">
                    <span>Postal Code</span>
                    <input type="text" class="form-control" placeholder="Enter your Postal Code" name="o_postal" required>
            </div>
            <!-- COUNTRY -->
            <div class="form-group col-md-3">
                <span>Country</span>c
                <select class="form-control" id="o_country" name="o_country">
                    <option value="Philippines">Philippines</option>
                    </select>
            </div>
            <div class="form-group col-md-3">
                <span>Nearest Landmark</span>
                <input type="text" class="form-control" placeholder="Enter Landmark" name="o_landmark">
            </div>
        </div>
        <hr>
        <span class="display-4">Delivery Method</span><br>
            <div class="form-row p-3">
                <!-- LOCAL DELIVERY -->
                <div class="form-group col-md-6">
                    <div class=" card shadow p-3" style="height: 8rem;">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="o_delivery" value="Local Delivery" checked>
                        <label class="form-check-label" for="exampleRadios1">
                        <i class="fa fa-truck"></i> Local Delivery
                        </label><br>
                        <span>For local delivery, your address indicated below will be used.
                            If you have any queries, feel free to contact us at 0927 605 9354</span>
                        </div>
                    </div>
                </div>
                <!-- PICK UP -->
                <div class="form-group col-md-6">
                  <div class=" card shadow p-3" style="height: 8rem;">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="o_delivery" value="Pick Up"checked>
                        <label class="form-check-label" for="exampleRadios1">
                           <i class="fa fa-store"></i> Pick Up
                        </label><br>
                        <span>Our store is located at Farmer's Market, Cubao.</span>
                     </div>
                  </div>
               </div>
            </div>
            <hr>
            <span class="display-4">Payment Option</span><br>
            <div class="form-row p-3">
                <!-- UPLOAD FILE -->
               <div class="form-group col-md-12">
                  <!-- <div class="custom-file">
                     <input type="file" class="custom-file-input" id="validatedCustomFile">
                     <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                     <div class="invalid-feedback">Example invalid custom file feedback</div> 
                  </div> -->
               </div>
               <!-- GCASH DIV -->
               <div class="form-group col-md-6">
                  <div class=" card shadow p-3" style="height: 30rem;">
                     <h6>GCASH</h6>
                     <ul>
                           <li>Account Name: Abegail Landicho</li>
                           <li>Account Number: 0927 605 9354</li>
                           <img src="/assets/mop-qr/gcash-qr.jpg" width="150" height="150">
                           <p>Please send copy of deposit slip to <a href="mailto:melleasalalima@gmail.com">fishnchix.ph@gmail.com</a> with Name and Order No.<br>
                              DELIVERY SCHEDULE: NEXT DAY DELIVERY FOR VERIFIED PAYMENT before 2pm Cut-Off.<br>
                              You may also call or text 0935-0014238 for any concern.
                           </p>
                     </ul> 
                  </div>
                </div>
                <!-- BPI DIV -->
                <div class="form-group col-md-6">
                  <div class=" card shadow p-3" style="height: 30rem;">
                  <h6>BPI</h6>
                  <ul>
                        <li>Account Name: Abegail L. Landicho</li>
                        <li>Account Number: 4279241075</li>
                        <li>Bank: BPI savings</li>
                        <li>Mobile: 0927 605 9354</li>
                        <img src="/assets/mop-qr/bpi-qr.jpg" width="150" height="150">
                        <p>Please send copy of deposit slip to <a href="mailto:melleasalalima@gmail.com">velenandana.ph@gmail.com</a> with Name and Order No.<br>
                        DELIVERY SCHEDULE: NEXT DAY DELIVERY FOR VERIFIED PAYMENT before 2pm Cut-Off.<br>
                        You may also call or text 0935-0014238 for any concern.</p>
                    </ul> 
                  </div>
                  
               </div>
            </div>
            <input type="submit" value="order now" name="order_btn" class="btn btn-success">
            <hr>
            <input type="hidden" placeholder="payment" value="" name="o_payment">
            <input type="hidden" placeholder="paymentimg" value="" name="o_paymentimg">
    </div>
</form>
<?php include('includes/footer.php'); ?>