<?php include('functions.php'); include('includes/header.php'); require_once "customer_process.php";
  
  if (!$_SESSION['user']['user_type'] == 'admin'||!$_SESSION['user']['user_type'] == 'staff' ||!$_SESSION['user']['user_type'] == 'customer') {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>

  
  <?php
    $result=$con->query("SELECT * FROM inventory")or die($con->error);
    /*$result=$con->query("SELECT * FROM records")or die($con->error);*/
  ?>

  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="index.php"><i class="fa fa-home">&nbsp;&nbsp;</i>Product List</a></h3>
  </nav><br>
  <!-- End Search -->
  <!-- TABLE -->
  <div class="container">
  <div class="row justify-center">
  <table class="table">
    <thread>
      <tr>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Number of Stocks</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['p_name'];?></td>
        <td><?php echo $row['p_price'];?></td>
        <td><?php echo $row['num_stocks'];?></td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
  </div>
</div>

<?php include('includes/footer.php'); ?>