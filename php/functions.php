<?php
    #database connection
    $db = mysqli_connect('localhost', 'u579272454_velen', 'Mamamopink123', 'u579272454_scm')or die (mysqli_error($mysqli));
    $search="";
    $rowcount=0;
    $con=new mysqli('localhost', 'u579272454_velen', 'Mamamopink123', 'u579272454_scm') or die (mysqli_error($mysqli));
    
    date_default_timezone_set('Asia/Manila');
    $order_date = date('Y-m-d', strtotime(' +1 day'));
    $maxorder_date = date('Y-m-d', strtotime(' +7 day'));

    if(isset($_POST['update_product'])){
        $update_p_id = $_POST['update_p_id'];
        $update_p_name = $_POST['update_p_name'];
        $update_p_price = $_POST['update_p_price'];
        $update_p_image = $_FILES['update_p_image']['name'];
        $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
        $update_p_image_folder = 'uploaded_img/'.$update_p_image;
     
        $update_query = mysqli_query($con, "UPDATE `inventory` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");
        
        
        
        if($update_query){
           move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
           $message[] = 'product updated succesfully';
           header('location:admin.php');
        }else{
           $message[] = 'product could not be updated';
           header('location:admin.php');
        }
     
    }
    $inv = mysqli_query($con, "SELECT * FROM `inventory`");
    // if (isset($_POST['id']) && $_POST['id']!=""){
    //     $id = $POST['id'];
    //     $result = mysqli_query($con, "SELECT * FROM inventory WHERE id = '$id'");
    //     $row = mysqli_fetch_assoc($result);
    // }
?>