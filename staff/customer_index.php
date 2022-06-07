<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Product List</title>
</head>
<body>
  <?php
    require_once "customer_process.php";
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
<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>