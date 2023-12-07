<?php
	
	session_start();
	include('../private/connection.php');
	include('function.php');

	$org_data = check_login($con);

	$id = $_GET['mar_id'];
	$sql = "delete from marshal where mar_id = '$id'";
	$result = mysqli_query($con,$sql);

	if($result){
		header("Location: marsh.php?msg=Record Deleted Successfully");
	}
	else{
		echo "Failed: " . mysqli_error($con);
	}

?>