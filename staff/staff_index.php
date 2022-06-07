<?php include('../functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Inventory</title>
</head>
<body>
  <?php
    require_once "staff_process.php";
  ?>
  <?php
    $result=$con->query("SELECT * FROM inventory")or die($con->error);
    /*$result=$con->query("SELECT * FROM records")or die($con->error);*/
  ?>
  <?php
    if(isset($_POST['search'])){
      $search = $_POST['search'];
      $result=$con->query("SELECT * FROM inventory WHERE p_name LIKE '%$search%' OR p_price LIKE '%$search%' OR num_stocks LIKE '%$search%'") or die ($con->error());
  }
  ?>
  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="staff.php"><i class="fa fa-home">&nbsp;&nbsp;</i>Inventory</a></h3>
    <form action="staff_index.php" method="post">
          <div class="form-group">
            <input type="text" placeholder="Search" name="search" value="<?php echo $search; ?>">
            <button type="submit"><i class="fa fa-search"></i></button><br>
          </div>
    </form>
  </nav><br>
  <!-- End Search -->



  <!-- Input -->
    <div class="row">
      <div class="col-md-3">
        <h2 class="text-center">Add Record</h2>
        <hr>


  <form action="staff_process.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="user_type" id="user_type" value="student">
      <label></label>&nbsp;&nbsp;&nbsp;<input type="text" name="p_name" placeholder="Product Name" required value="<?php echo $p_name; ?>"><br>
      <label></label>&nbsp;&nbsp;&nbsp;<input type="number" name="p_price" placeholder="Product Price" required value="<?php echo $p_price; ?>"><br>
      <label></label>&nbsp;&nbsp;&nbsp;<input type="number" name="num_stocks" placeholder="Number of Stocks" required value="<?php echo $num_stocks; ?>"><br>
    <?php if($update==true){?>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
        <?php }else{ ?>
            <button type="submit" name="save" class="btn btn-primary">Add</button>
        <?php } ?>

  </form><br>
  </div>
  <!-- End of Input -->
  <!-- TABLE -->
  <div class="col-md-9">
    <h2 class="text-center">Product List</h2>
      <hr>
  <div class="row justify-content-center">
  <table class="table">
    <thread>
      <tr>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Number of Stocks Available</th>
        <th colspan="4">Actions</th>
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
        <td>
                <a href="staff_index.php?edit=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                <a href="staff_process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
            </td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
  </div>
  </div>
  </div>

<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>