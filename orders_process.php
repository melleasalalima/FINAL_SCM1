<?php
$o_status=$search="";
$o_id=$rowcount=0;
$update=false;
$con=new mysqli('localhost', 'u579272454_velen', 'Mamamopink123', 'u579272454_scm') or die (mysqli_error($mysqli));
/*if($con->connect_error){
	echo "<p>Connection Failed</p>".$con->connect_error;
}else{
	echo "<p>Connected Successfully!</p>";
}*/

//Delete records

//Edit
if(isset($_GET['edit'])){
	$o_id = $_GET['edit'];
	$update=true;
	$result=$con->query("SELECT * FROM orders WHERE o_id=$o_id") or die ($con->error());
	$row=$result->fetch_array();
	$o_status=$row['o_status'];
}

//Update
if(isset($_POST['update'])){
	$o_id = $_POST['o_id'];
	$o_status=$_POST['o_status'];
	$con->query("UPDATE orders SET o_status='$o_status' WHERE o_id=$o_id") or die ($con->error());

	$_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: orders_list.php");

}

?>