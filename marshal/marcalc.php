<?php

session_start();
include('../private/connection.php');
include('function.php');

$user_data = check_login($con);

if(isset($_POST['go'])){

	$ob = $_POST['obsave'];
	$point = $_POST['pointsave'];

	$sql = "select * from game_player where game_code = '$gameid' and marshal = '$marid'";
	$query = mysqli_query($con, $sql);

	while ($data = mysqli_fetch_array($query)){
		$player = $data['id'];

		$up = "update game_score set point = '$point', ob = '$ob' where play_id = '$player' and game_id = '$gameid' and gate = '$gate'";
		mysqli_query($con, $up);
		header("Location: marindex.php");
	}
}

?>