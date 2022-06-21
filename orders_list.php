<?php include('functions.php'); include('includes/header.php');

  if (!$_SESSION['user']['user_type'] == 'admin'||!$_SESSION['user']['user_type'] == 'staff') {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
  <?php require_once "orders_process.php";?>
  <?php
    $result=$con->query("SELECT * FROM orders")or die($con->error);
  ?>
  <?php
    if(isset($_POST['search'])){
            $search = $_POST['search'];
            $result=$con->query("SELECT * FROM orders WHERE o_name LIKE '%$search%' OR o_email LIKE '%$search%' OR o_tel LIKE '%$search%' OR o_address LIKE '%$search%' 
            OR o_city LIKE '%$search%' OR o_province LIKE '%$search%' OR o_postal LIKE '%$search%' OR o_country LIKE '%$search%' OR o_landmark LIKE '%$search%'
             OR o_payment LIKE '%$search%' OR o_paymentimg LIKE '%$search%' OR total_price LIKE '%$search%' OR total_product LIKE '%$search%' OR o_delivery LIKE '%$search%'
             OR o_deliverydate LIKE '%$search%' OR o_status LIKE '%$search%'") or die ($con->error());
        }
  ?>
  <div class="container-fluid">

  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">

  <?php 
    if ($_SESSION['user']['user_type'] == 'admin') {
        echo "<h3><a href='../admin/admin_home.php'><i class='fa fa-home'>&nbsp;&nbsp;</i>Orders List</a></h3>";
    }else if ($_SESSION['user']['user_type'] == 'staff') {
      echo "<h3><a href='../staff/staff.php'><i class='fa fa-home'>&nbsp;&nbsp;</i>Orders List</a></h3>";
    }
  ?>
    <!-- <h3><a href="../admin/admin_home.php"><i class="fa fa-home">&nbsp;&nbsp;</i>Orders List</a></h3> -->
    <form action="orders_list.php" method="post">
          <div class="form-group">
            <input type="text" placeholder="Search" name="search" value="<?php echo $search; ?>">
            <button type="submit"><i class="fa fa-search"></i></button><br>
          </div>
    </form>
  </nav><br>
  <!-- End Search -->

  <!-- Input -->
  <div class="row justify-content-center">
  <form action="orders_process.php" method="post">
    <?php if($update==true){?>
      <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
      <label>Order Status: </label>&nbsp;&nbsp;&nbsp;<select name="o_status" required>
        <option value="<?php echo $user_type; ?>"><?php echo $o_status; ?></option>
        <option value="Accomplished">Accomplished</option>
        <option value="Pending">Pending</option>
        <option value="Cancelled">Cancelled</option>
      </select><br>
      <button type="submit" name="update" class="btn btn-warning">Save</button>
    <?php } ?>
      </div>
  </form><br>
  </div>
  <!-- End of Input -->
    <!-- SESSION -->
    <div class="d-flex justify-content-center">
    <?php
    if(isset($_SESSION['message'])){?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
    <?php } ?>
    </div>
  </div><br>
    <!-- End of SESSION -->
  <!-- TABLE -->
  <div class="container overflow-auto">
  <table class="table">
    <thread>
      <tr>
        <th>Delivery Date</th>
        <th>Order Status</th>
        <th>Proof of Payment</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact No.</th>
        <th>Address</th>
        <th>City</th>
        <th>Province</th>
        <th>Postal Code</th>
        <th>Country</th>
        <th>Landmark</th>
        <!-- <th>Payment</th> -->

        <th>Total Price</th>
        <th>Total Product</th>
        <th>Delivery</th>
        
        <th colspan="13">Actions</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['o_deliverydate'];?></td>
        <td><?php echo $row['o_status'];?></td>
        <td><img src="/payment_uploads/<?php echo $row['o_paymentimg'];?>" width="100" height="100"></td>
        <td><?php echo $row['o_name'];?></td>
        <td><?php echo $row['o_email'];?></td>
        <td><?php echo $row['o_tel'];?></td>
        <td><?php echo $row['o_address'];?></td>
        <td><?php echo $row['o_city'];?></td>
        <td><?php echo $row['o_province'];?></td>
        <td><?php echo $row['o_postal'];?></td>
        <td><?php echo $row['o_country'];?></td>
        <td><?php echo $row['o_landmark'];?></td>
    
        
        <td><?php echo $row['total_price'];?></td>
        <td><?php echo $row['total_product'];?></td>
        <td><?php echo $row['o_delivery'];?></td>
        
        <td>
                <a href="orders_list.php?edit=<?php echo $row['o_id'];?>" class="btn btn-info">Update Status</a>
            </td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
  </div>
  </div>
  <?php include('includes/footer.php'); ?>