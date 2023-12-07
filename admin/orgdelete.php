<?php
	
	session_start();
	include('../private/connection.php');
	include('function.php');

	$org_data = check_login($con);

	$id = $_GET['id'];
	$sql = "delete from org_req where id = '$id'";
	$result = mysqli_query($con,$sql);

	if($result){
		header("Location: orgdata.php?msg=Record Deleted Successfully");
	}
	else{
		echo "Failed: " . mysqli_error($con);
	}

?>