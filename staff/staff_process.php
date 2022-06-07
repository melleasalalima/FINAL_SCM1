<?php
$p_name=$p_price=$num_stocks=$p_desc=$p_img=$p_type=$p_status=$search="";
$id=$rowcount=0;
$update=false;
$con=new mysqli('localhost','root','','scm') or die (mysqli_error($mysqli));
/*if($con->connect_error){
	echo "<p>Connection Failed</p>".$con->connect_error;
}else{
	echo "<p>Connected Successfully!</p>";
}*/

//Saving records
if(isset($_POST['save'])){
	$p_name=$_POST['p_name'];
	$p_price=$_POST['p_price'];
	$num_stocks=$_POST['num_stocks'];
	$p_desc=$_POST['p_desc'];
	$p_img=$_POST['p_img'];
	$p_type=$_POST['p_type'];
	$p_status=$_POST['p_status'];

	// $total=round((($prelim/100)*30)+(($midterm/100)*40)+(($final/100)*30));

    //     if($total<75){
    //         $remarks="Failed";
    //     }else{
    //         $remarks="Passed";
    //     }

	$con->query("INSERT INTO inventory(p_name,p_price,num_stocks,p_desc,p_img,p_type,p_status)VALUES('$p_name','$p_price','$num_stocks','$p_desc','$p_img','$p_type','$p_status')") or die ($con->error());

	$_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header("location: product_list.php");

}

//Delete records
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
	$con->query("DELETE FROM inventory WHERE id=$id") or die ($con->error());

	$_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: product_list.php");
}

//Edit
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update=true;
	$result=$con->query("SELECT * FROM inventory WHERE id=$id") or die ($con->error());
	$row=$result->fetch_array();
	$p_name=$row['p_name'];
	$p_price=$row['p_price'];
	$num_stocks=$row['num_stocks'];
	$p_desc=$row['p_desc'];
	$p_img=$row['p_img'];
	$p_type=$row['p_type'];
	$p_status=$row['p_status'];
}

//Update
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$p_name=$_POST['p_name'];
	$p_price=$_POST['p_price'];
	$num_stocks=$_POST['num_stocks'];
	$p_desc=$_POST['p_desc'];
	$p_img=$_POST['p_img'];
	$p_type=$_POST['p_type'];
	$p_status=$_POST['p_status'];
	// $total=round((($prelim/100)*30)+(($midterm/100)*40)+(($final/100)*30));

    //     if($total<75){
    //         $remarks="Failed";
    //     }else{
    //         $remarks="Passed";
    //     }

	$con->query("UPDATE inventory SET p_name='$p_name', p_price='$p_price', num_stocks='$num_stocks', p_desc='$p_desc', p_img='$p_img', p_type='$p_type', p_status='$p_status' WHERE id=$id") or die ($con->error());

	$_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: product_list.php");

}

?>