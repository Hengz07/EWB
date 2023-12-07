<?php
	
	session_start();
	include('../private/connection.php');
	include('function.php');

	$org_data = check_login($con);

	$id = $_GET['id'];
	$gid = $_GET['gid'];

	$sql = "select * from game where game_id = '$gid'";
	$result = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($result);
	$player = $data['player'];

	$nump = $player - 1;

	$update = "update game set player = '$nump' where game_id = '$gid'";
	$query = mysqli_query($con,$update);

	$sql1 = "delete from game_score where play_id = '$id'";
	$result1 = mysqli_query($con,$sql1);

	$sql2 = "delete from game_player where id = '$id'";
	$result2 = mysqli_query($con,$sql2);

	if($result1 && $result2 && $query){
		header("Location: gameview.php?game_id=$gid&msg=Deleted");
	}
	else{
		echo "Failed: " . mysqli_error($con);
	}

?>