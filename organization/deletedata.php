<?php
	
	session_start();
	include('../private/connection.php');
	include('function.php');

	$org_data = check_login($con);

	$id = $_GET['Delete'];
	$sql = "delete from game where game_id = '$id'";
	$result = mysqli_query($con,$sql);

	if($result){
		header("Location: gameresult.php?msg=Record Deleted Successfully");
	}
	else{
		echo "Failed: " . mysqli_error($con);
	}

?>