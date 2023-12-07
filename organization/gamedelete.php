<?php
	
	session_start();
	include('../private/connection.php');
	include('function.php');

	$org_data = check_login($con);

	$id = $_GET['game_id'];

	$sql1 = "delete from game_score where game_id = '$id'";
	$result1 = mysqli_query($con,$sql1);

	$sql2 = "delete from marshal where game_id = '$id'";
	$result2 = mysqli_query($con,$sql2);

	$sql3 = "delete from game_player where game_code = '$id'";
	$result3 = mysqli_query($con,$sql3);

	$sql4 = "delete from game where game_id = '$id'";
	$result4 = mysqli_query($con,$sql4);

	if($result1 && $result2 && $result3 && $result4){
		header("Location: recordgame.php?msg=Record Deleted Successfully");
	}
	else{
		echo "Failed: " . mysqli_error($con);
	}

?>