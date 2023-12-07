<?php
	session_start();
	include "function.php";
	include "../private/connection.php";

	$org_data = check_login($con);

	$gameid = $_GET['id'];
	$link = random_num(5);

	$sql = "update game set link_code = '$link' where game_id = '$gameid'";
	mysqli_query($con,$sql);
	header("Location: recordgame.php");
	die;
?>