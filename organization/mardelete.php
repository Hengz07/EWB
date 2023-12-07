<?php
	
	session_start();
	include('../private/connection.php');
	include('function.php');

	$org_data = check_login($con);

	$game = $_GET['game'];
	$id = $_GET['mar_id'];

	$up ="update game_player set marshal = null where marshal = '$id'";
	$upquery = mysqli_query($con,$up);

	$sql = "delete from marshal where mar_id = '$id'";
	$result = mysqli_query($con,$sql);

	if($result && $upquery){
		header("Location: recordmar.php?id=$game&msg=Record Deleted Successfully");
	}
	else{
		echo "Failed: " . mysqli_error($con);
	}

?>