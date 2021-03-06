<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

    <meta username="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>School Users List</title>
</head>
<body>
  <?php
    require_once "admin_process.php";
  ?>
  <?php
    $result=$con->query("SELECT * FROM users")or die($con->error);
  ?>
  <?php
    if(isset($_POST['search'])){
            $search = $_POST['search'];
            $result=$con->query("SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%' OR user_type LIKE '%$search%' OR fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR address LIKE '%$search%' OR contact_num LIKE '%$search%'") or die ($con->error());
        }
  ?>
  <!-- Search -->
  <nav class="navbar navbar-dark bg-light">
    <h3><a href="admin_home.php"><i class="fa fa-home">&nbsp;&nbsp;</i>USER LIST</a></h3>
    <form action="admin_index.php" method="post">
          <div class="form-group">
            <input type="text" placeholder="Search" name="search" value="<?php echo $search; ?>">
            <button type="submit"><i class="fa fa-search"></i></button><br>
          </div>
    </form>
  </nav><br>
  <!-- End Search -->
  <!-- Input -->

  <form action="admin_process.php" method="post">
    <?php if($update==true){?>
      <div class="container shadow p-3 mb-3 mt-3">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-row">
      <!-- Username -->
      <div class="form-group col-md-6">
        <label>Username</label>
        <input type="text" name="username"class="form-control" required value="<?php echo $username; ?>">
      </div>

      <!-- Email -->
      <div class="form-group col-md-6">
      <label>Email</label>
        <input type="email" name="email" required class="form-control" value="<?php echo $email; ?>">
      </div>

      <!-- User type -->
      <div class="form-group col-md-4">
        <label>User type</label>
          <select name="user_type" id="user_type" class="form-control" required>
            <option value="<?php echo $user_type; ?>"><?php echo $user_type; ?></option>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
            <option value="customer">Customer</option>
          </select>
        </div>
      <!-- First Name -->
      <div class="form-group col-md-4">
          <label>First Name</label>
            <input type="text" name="fname" required class="form-control" value="<?php echo $fname; ?>">
        </div>
        <!-- Middle Name -->
        <div class="form-group col-md-4">
            <label>Middle Name</label>
              <input type="text" name="mname" class="form-control" placeholder="Optional" value="<?php echo $mname; ?>">
            </div>

        <!-- Last Name -->
            <div class="form-group col-md-4">
            <label>Last Name</label>
              <input type="text" name="lname"  required class="form-control"  value="<?php echo $lname; ?>">
            </div>

          <!-- Address -->
          <div class="form-group col-md-4">
              <label>Address</label>
                <input type="text" name="address" required class="form-control"  value="<?php echo $address; ?>">
              </div>
    
          <!-- Contact Number -->
          <div class="form-group col-md-4">
          <label>Contact Number</label>
            <input type="text" name="contact_num" required class="form-control" value="<?php echo $contact_num; ?>">
          </div>

        <!-- password -->
        <div class="form-group col-md-6">
            <label>Password</label>
              <input type="password"  class="form-control" name="password" required>
            </div><br>
            </div>
            <div>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            </div>
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
    <div class="container-fluid">

 
  <!-- TABLE -->
  <table class="table">
    <thread>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>User Type</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Password</th>
        <th colspan="2">Actions</th>
      </tr>
    </thread>
      <?php
        if($result->num_rows>0){  
              while($row=$result->fetch_assoc()){?>
    <tr>
      <?php $rowcount=$rowcount+1; ?>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['user_type'];?></td>
        <td><?php echo $row['fname'];?></td>
        <td><?php echo $row['mname'];?></td>
        <td><?php echo $row['lname'];?></td>
        <td><?php echo $row['address'];?></td>
        <td><?php echo $row['contact_num'];?></td>
        <td><?php echo $row['password'];?></td>
        <td class="text-center">
          <a href="admin_index.php?edit=<?php echo $row['id'];?>" class="btn btn-warning btn-sm mb-3">Edit</a><br>
          <a href="admin_process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger btn-sm mb-3">Delete</a>
        </td>
      </tr>
        <?php } ?>
        <?php }else{ ?>
            <h1>SORRY NO RESULT!</h1>
        <?php } ?>
  </table>
  </div>
<!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>